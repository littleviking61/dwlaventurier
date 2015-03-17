<?php 
	if(isset($allMarker)){

		$locationsAll = [];
		$args = array( 'posts_per_page' => -1);
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : 
		  setup_postdata( $post ); 
			$point = get_field('travel_point', $post->ID);
			if( !empty($point) && !empty($point['lat']) && !empty($point['lng']) ){
				$point['link'] = get_permalink($post->ID);
				$point['title'] = get_the_title($post->ID);
				$point['thumbnail'] = get_the_post_thumbnail($post->ID, 'thumbnail');
				$locationsAll[] = $point;
			}
		endforeach;
		wp_reset_postdata();

	}else{
		$locations = [];
		$point = get_field('travel_point', $post->ID);
		if( !empty($point) && !empty($point['lat']) && !empty($point['lng']) ){
			$locations[] = $point;
		}
	}

if( count($locations) === 1 ): ?>

	<?php foreach ($locations as $location): ?>
		<h3>
			<b><?= $location['address'] ?></b>
		</h3>
		<p>
			<i class="fa fa-dot-circle-o"></i> <b>Latitude</b> : <?= $location['lat'] ?>&nbsp;&nbsp;
			<i class="fa fa-dot-circle-o"></i> <b>Longitude</b> : <?= $location['lng'] ?>
		</p>
		<div class="acf-map">
			<div class="marker" data-lat="<?= $location['lat']; ?>" data-lng="<?= $location['lng']; ?>"><?= $location['address'] ?></div>
		</div>
	<?php endforeach ?>

<?php elseif(count($locationsAll) > 0): ?>
	<div class="full-content">
		<div class="acf-map">
			<?php foreach ($locationsAll as $location): ?>
				<div class="marker" data-lat="<?= $location['lat']; ?>" data-lng="<?= $location['lng']; ?>">
					<a href="<?= $location['link'] ?>">
						<?= $location['thumbnail'] ?>
						<h4><?= $location['title'] ?></h4>
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>

<?php endif; ?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
(function($) {

/*
*  render_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function render_map( $el ) {

	// var
	var $markers = $el.find('.marker');

	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP,
	  mapTypeControl: false,
    panControl: true,
    panControlOptions: {
        position: google.maps.ControlPosition.LEFT_CENTER
    },
    zoomControl: true,
    zoomControlOptions: {
        position: google.maps.ControlPosition.LEFT_CENTER
    },
    scaleControl: true,  // fixed to BOTTOM_RIGHT
    streetViewControl: true,
    streetViewControlOptions: {
        position: google.maps.ControlPosition.LEFT_CENTER
    },
	};

	// create map	        	
	var map = new google.maps.Map( $el[0], args);

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function(){

    	add_marker( $(this), map );

	});

	// center map
	center_map( map );
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/

$(document).ready(function(){

	$('.acf-map').each(function(){

		render_map( $(this) );

	});

});

})(jQuery);
</script>