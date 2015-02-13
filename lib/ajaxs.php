<?php  

if( ! function_exists('dwtl_front_submit_post') ) {
	function dwtl_front_submit_post() {
		$ajax_referer = check_ajax_referer( '_dwtl_front_submit_post_dwtl', 'nonce', false );
		if( ! wp_verify_nonce( $_POST['nonce'], '_dwtl_front_submit_post_dwtl' ) || ! $ajax_referer ) {
			wp_send_json_error( array(
				'message' => __('Are you cheating huh?','dw-timeline')
			) );
		} //Verify nonce

		if( !isset($_POST['content']) && $_POST['content'] ) {
			wp_send_json_error( array(
				'message' => __('Post content is empty.','dw-timeline')
			) );
		} // Verify Post Content
		global $current_user;

		$post_id = wp_insert_post( array(
			'post_status'	=> 'publish',
			'post_content'	=> $_POST['content'],
			'post_title'	=> htmlentities($_POST['title']),
			'post_author'	=> $current_user->ID,
			'tags_input'	=> isset($_POST['tags']) ? $_POST['tags'] : '',
			'post_category'	=> isset($_POST['categories']) ? array($_POST['categories']) : array( -1 ),
		) );

		if( ! is_wp_error( $post_id ) ) {
			global $post;
			if( isset($_POST['thumbnail']) ) {
				set_post_thumbnail( $post_id, $_POST['thumbnail'] );
			}
			if( isset($_POST['post_format']) ) {
				set_post_format( $post_id, $_POST['post_format'] );
			}
			$post = get_post( $post_id );
			setup_postdata( $post );
			$html = '';
			ob_start();
			get_template_part('templates/content', get_post_format());
			$html = ob_get_contents();
			ob_end_clean();
			wp_reset_postdata();
			wp_send_json_success( array(
				'html'	=> $html
			) );
		} else {
			wp_send_json_error( array(
				'message'	=> $post_id->get_error_message()
			) );
		}
		
	}
	add_action( 'wp_ajax_dwtl-front-submit-post', 'dwtl_front_submit_post' );
}



if( ! function_exists('dwtl_parse_url') ) {
	function dwtl_parse_url() {
		include get_template_directory() . '/lib/simple_html_dom.php';
		//Security
		if( ! isset($_POST['nonce']) || ! wp_verify_nonce( $_POST['nonce'], '_dwtl_parse_link_nonce' ) ) {
			wp_send_json_error( array(
				'message'	=> __('Are you cheating huh?','dw-timeline')
			) );
		}
		$referer = check_ajax_referer( '_dwtl_parse_link_nonce', 'nonce', false );
		if( !$referer ) {
			wp_send_json_error( array(
				'message'	=> __('Are you cheating huh?','dw-timeline')
			) );
		}
		$url = isset($_POST['url']) ? $_POST['url'] : '';
		if( ! $url ) {
			wp_send_json_error( array(
				'message'	=> __('Invalid URL','dw-timeline')
			) );
		}

		$result = array( 'url' => $url );
		// Retrieve the DOM from a given URL
		$html = file_get_html($url);
		if( ! $html ) {
			wp_send_json_error( array(
				'message'  => __('Cannot retrive content from this URL','dw-timeline')
			) );
		}
		//Retrive url title
		$title = $html->find('meta[property="og:title"]',0);
		if( $title ) {
			$result['title'] = $title->content;	
		} 
		if ( ! isset($result['title']) || empty($result['title'])) {
			$title = $html->find('title',0);
			if( $title ) {
				$result['title'] = $title->plaintext;
			}
		}
		// Retrive description
		$description = $html->find('meta[property="og:description"]',0);
		if( $description ) {
			$result['description'] = $description->content;
		}
		if( ! isset($result['description']) || empty($result['description']) ) {
			$description = $html->find('meta[name="description"]',0);
			if( $description ) {
				$result['description'] = $description->content;
			}
		}

		//Find out all images
		
		$images = $html->find('meta[property="og:image"]');
		if( $images ) {
			foreach ($images as $img) {
				$result['images'][] = $img->content;
			}
		} 
		if( ! isset($result['images']) || empty($result['images']) ) {
			foreach($html->find('img') as $img) {
				$img->src = trim($img->src);
				if( ! $img->src ) {
					continue;
				}
				$dimensions = getimagesize( $img->src );
				if( $dimensions[0] > 200 && $dimensions[1] > 200 ) {
					$result['images'][] = $img->src;
				}
			}
		}

		$result['preview'] = '';
		$result['url'] = $url;
		if( !empty($result['images']) ) {
			$result['preview'] .= '<div class="col-sm-5 col-md-4"><div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="0"><div class="carousel-inner">';
			$i = 0;
			foreach ($result['images'] as $img) {
				$result['preview'] .=	'<div class="item '.($i==0?'active':'').'"><img src="'.$img.'"></div>';
				$i++;
			}
            $result['preview'] .= '</div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                  </div>
                </div>';
		}
                  	
                    
        $result['preview'] .=  '<div class="'.( !empty($result['images'])?'col-sm-7 col-md-8':'col-sm-12 col-md-12').'">
								<strong><a href="#">'.$result['title'].'</a></strong>
								'.$result['description'].'</div>';

		wp_send_json_success($result);
	}
	add_action( 'wp_ajax_dwtl-parse-url', 'dwtl_parse_url' );
}
if( ! function_exists('dwtl_parse_video_link') ) {
	function dwtl_parse_video_link(){
		//Security
		$referer = check_ajax_referer( '_dwtl_parse_video_link_nonce', 'nonce', false );
		if( !$referer ) {
			wp_send_json_error( array(
				'message'	=> __('Are you cheating huh?','dw-timeline')
			) );
		}
		if( ! isset($_POST['nonce']) || ! wp_verify_nonce( $_POST['nonce'], '_dwtl_parse_video_link_nonce' ) ) {
			wp_send_json_error( array(
				'message'	=> __('Are you cheating huh?','dw-timeline')
			) );
		}

		if( !isset($_POST['url']) ) {
			wp_send_json_error( array(
				'message' => __('Video URL is not valid','dwqa')
			) );
		}

		wp_send_json_success( array(
			'html'	=> wp_oembed_get( esc_url( $_POST['url'] ) )
		) );
	}
	add_action( 'wp_ajax_dwtl-parse-video-link', 'dwtl_parse_video_link' );
}
?>