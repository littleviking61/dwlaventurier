<?php $point = get_field('travel_point'); ?>
<?php if ( !empty($point)): ?>
	<a class="country popup-gmaps" href="https://maps.google.com/maps?q=<?= $point['address'] ?>" title="Voir sur une carte"><i class="glyphicon glyphicon-map-marker"></i> <?= $point['address'] ?></a>
<?php endif ?>

<span class="entry-date"><i class="glyphicon glyphicon-calendar"></i> <time class="published" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time></span>

<span class="entry-comments"><a class="simple-ajax-popup" href="/wp-admin/admin-ajax.php?postId=<?= get_the_id() ?>&action=get_comment"><i class="glyphicon glyphicon-comment"></i> <?php comments_number( '0', '1', '%' ); ?></a></span>
<?php $tags_list = get_the_tag_list( '', ', ' ); ?>
<?php if ( $tags_list) : ?>
	<span class="tags">
		<i class="glyphicon glyphicon-tags"></i> <?php printf( __( '%1$s', 'dw-timeline' ), $tags_list ); ?>
	</span>
<?php endif; ?>

