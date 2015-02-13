<article data-page="1" class="dwtl-post-form remove-time-anchor dwtl normal hentry">
  <div class="entry-inner">
    <div class="entry-content">
      <div id="dwtl-post-form-holder">
        <textarea id="dwtl-post-form-holder-text" placeholder="<?php _e('What\'s on your mind','dw-timeline'); ?>" class="form-control"></textarea>
        <div class="form-group post-formats">
          <button id="option-standard" class="active">
            <span class="fa fa-pencil"></span>
            <span class="post-formats-title"><?php _e('text','dw-timeline'); ?></span>
          </button>
          <button id="option-image">
            <span class="fa fa-camera"></span>
            <span class="post-formats-title"><?php _e('photo','dw-timeline'); ?></span>
          </button>
          <button id="option-video">
            <span class="fa fa-play-circle-o"></span>
            <span class="post-formats-title"><?php _e('Video','dw-timeline'); ?></span>
          </button>
          <button id="option-link">
            <span class="fa fa-link"></span>
            <span class="post-formats-title"><?php _e('link','dw-timeline'); ?></span>
          </button>
        </div>
      </div>
      <div class="dwtl-post-editor-box hide">
        <form action="" name="dwtl-post-form" name="dwtl-post-form-content" id="dwtl-post-form-content">
          <input type="hidden" name="action" value='dwtl-front-submit-post' >
          <input type="hidden" id="dwtl-post-thumbnail" name="dwtl-post-thumbnail" value="">
          <?php wp_nonce_field( '_dwtl_front_submit_post_dwtl', 'dwtl-post-form-nonce' ); ?>
          
          <div id="tab-link" class="tab-content hide">
            <div class="link-preview row form-group"></div>
            <div class="form-group">
              <textarea name="dwtl-link-caption" id="dwtl-link-caption" class="form-control" rows="3" placeholder="<?php _e('Share what\'s new ','dw-timeline') ?>" ></textarea>
            </div>
            <div class="form-group">
              <label for="dwtl-link"><?php _e('Paste URL here','dw-timeline') ?></label>
              <input type="text" name="dwtl-link" id="dwtl-link" class="form-control" data-nonce="<?php echo wp_create_nonce( '_dwtl_parse_link_nonce' ); ?>">
            </div>
          </div>
          
          <div id="tab-standard" class="tab-content">
            <div class="thumbnail-preview form-group"></div>
            <div class="form-group postarea wp-core-ui">
              <?php 
                wp_editor( '', 'dwtl-post-editor', array(
                  'textarea_rows' => 5
                ) ); 
              ?>
              <button id="dwtl-add-thumbnail" class="button post-thumbnail"><?php _e('Add post thumbnail','dw-timline') ?></button>
            </div>
          </div>  
          
          <div id="tab-image" class="tab-content hide">
            <div class="image-preview form-group"></div>
            <div class="form-group">
              <textarea name="dwtl-image-caption" id="dwtl-image-caption" class="form-control" rows="3" placeholder="<?php _e('Share what\'s new ','dw-timeline') ?>" ></textarea>
            </div>
            <div class="form-group">
              <button id="dwtl-add-media" class="btn btn-default"><?php _e('Add Media','dw-timeline') ?></button>&nbsp;<small class="description"><?php _e('Upload from your comupter or  media library','dw-timline'); ?></small>
            </div>
          </div> 

          <div id="tab-video" class="tab-content hide">
            <div class="video-preview form-group"></div>
            <div class="form-group">
            <textarea name="dwtl-video-caption" id="dwtl-video-caption" class="form-control" rows="3" placeholder="<?php _e('Share what\'s new ','dw-timeline') ?>" ></textarea>
            </div>
            <div class="form-group">
              <label for="dwtl-video-url"><?php _e('Paste Video URL here','dw-timeline') ?></label>
              <input type="text" name="dwtl-video-url" id="dwtl-video-url" class="form-control" data-nonce="<?php echo wp_create_nonce( '_dwtl_parse_video_link_nonce' ); ?>">
            </div>
          </div>

          <p class="form-group title-wrap">
            <label for="dwtl-post-title"><?php _e('Post title','dw-timeline') ?></label>
            <input type="text" name="dwtl-post-title" id="dwtl-post-title" placeholder="<?php _e('Enter title here','dw-timeline') ?>" class="form-control">
          </p>

          <p class="form-group meta-area">
              <label for="dwtl-post-tags"><?php _e('Post Tags','dw-timeline') ?></label>
              <input type="text" name="dwtl-post-tags" id="dwtl-post-tags" class="form-control tags" >
          </p>

          <p class="actions">
            <button type="button" class="btn btn-default btn-link dwtl-post-form-cancel"><?php _e('Cancel','dw-timeline'); ?></button>
            <input name="dwtl-post-form-submit" type="submit" class="dwtl-post-form-submit btn btn-primary btn-lg" value="<?php _e('Publish','dw-timeline'); ?>">
          </p>
        </form>

      </div>
    </div>
  </div>
</article>
