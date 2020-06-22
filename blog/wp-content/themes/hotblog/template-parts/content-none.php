<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nada encontrado', 'daily-insight' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<div class="widget widget_search">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( wp_kses( __( 'Pronto para publicar seu primeiro post?<a href="%1$s">Comece aqui</a>.', 'daily-insight' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Desculpe, mas nada correspondeu aos seus termos de pesquisa. Por favor, tente novamente com algumas palavras-chave diferentes.', 'daily-insight' ); ?></p>
				<?php
					get_search_form();

			else : ?>

				<p><?php esc_html_e( 'Parece que não conseguimos encontrar o que você está procurando. Talvez a pesquisa possa ajudar.', 'daily-insight' ); ?></p>
				<?php
					get_search_form();

			endif; ?>
		</div><!-- .widget_search -->
	</div><!-- .page-content -->
</section><!-- .no-results -->
