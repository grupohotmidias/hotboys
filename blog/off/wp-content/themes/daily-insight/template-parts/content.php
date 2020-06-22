<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 */

$options = daily_insight_get_theme_options();
global $post;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header blog-header">
		<span class="cat-links">
            <span class="screen-reader-text"><?php esc_html_e( 'Categorias','daily-insight' );?> </span>

            <?php $categories = get_the_category( $post->ID ); // get categories assigned to a post
				foreach ( $categories as $category ) {
					echo '<a href="'. esc_url( get_category_link( $category->cat_ID ) ) .'" class="category" rel="category tag">'. esc_html( $category->name ) .'</a>';
				} 
			?> 
        </span>
		<?php 	
			if ( is_single() ) :
				the_title( '<h2 class="entry-title">', '</h2>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; 
		?>
	</header><!-- .entry-header -->

	<?php 
		$archive_meta = $options['archive_meta']; 
		if ( 'post' === get_post_type() && ! $archive_meta ) :
			do_action( 'daily_insight_entry_meta' ); // get post meta 
		endif; 
		
		$archive_image = $options['archive_image']; 
		if ( has_post_thumbnail() && ! $archive_image ) :
			daily_insight_blog_post_thumbnail(); // get post thumbnail
		endif; 
	?>

	<div class="entry-content">
		<?php
		if ( $options['archive_content_type'] == 'full' ) :

			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue Lendo %s <span class="meta-nav">&rarr;</span>', 'daily-insight' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		else :
			the_excerpt();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Páginas:', 'daily-insight' ),
				'after'  => '</div>',
			) );

			if( !empty( $options['readmore_text'] ) ) : ?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more"><?php echo esc_html( $options['readmore_text'] ); ?></a>
			<?php endif;
		endif;
		?>

	</div><!-- .entry-content -->
</article><!-- #post-## -->
