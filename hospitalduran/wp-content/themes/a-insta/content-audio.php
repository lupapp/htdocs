<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<header class="entry-header">

		<i class="fa fa-music"></i>

		<time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" <?php hybrid_attr( 'entry-published' ); ?>><?php echo esc_html( get_the_date() )?></time>

		<?php the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header><!-- .entry-header -->

	<?php $audio = hybrid_media_grabber( array( 'type' => 'audio', 'split_media' => true ) ); ?>
	<?php if ( $audio ) :  ?>
		<div class="featured-audio"><?php echo $audio; ?></div>
	<?php endif; ?>

	<div class="entry-summary" <?php hybrid_attr( 'entry-summary' ); ?>>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer clearfix">
		<a class="more-link pull-right" href="<?php the_permalink(); ?>"><?php apply_filters( 'imedical_readmore_text', _e( 'Read More &hellip;', 'imedical' ) ); ?></a>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->