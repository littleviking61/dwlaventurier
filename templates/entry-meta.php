<div class="entry-meta">
	<span class="entry-date"><a href="<?php the_permalink(); ?>"><time class="published" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time></a></span>
	<span class="sep">&bull;</span>
	<?= get_the_category_list( ', ' ); ?></span>
</div>
