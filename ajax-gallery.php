<?php $gallery = split(',', $gallery) ?>
<div class="gallery">

	<div class="fotorama-ajax" data-startindex="<?= $index ?>">
		
		<?php foreach ($gallery as $image):

			$i++;

			$imageURL = wp_get_attachment_image_src($image, 'full');
			$thumbnailURL = wp_get_attachment_image($image);
			?>

			<a href="<?= $imageURL[0] ?>" title="<?= $description ?>" class="load-it" >
				<?= $thumbnailURL ?>
			</a>
		<?php endforeach ?>

	</div>
</div>