<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package fog-lite
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
<div class="container">
			<section class="error-404 not-found">
				<div class="row">
		<div class="col-md-12">
			<header class="page-header main_cattegy">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'fog-lite' ); ?></h1>
			</header><!-- .page-header -->
		</div>
	</div>
			<div class="row">
				<div class="col-md-8 blog-single-post">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'fog-lite' ); ?></p>
				</div>
				<div class="searchhh_1 col-md-4  blog-right">
					<div class="page-content searchhh_2">
					

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'fog-lite' ); ?></h2>
						<ul>
							<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					$fog_lite_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'fog-lite' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$fog_lite_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>
					
				</div><!-- .page-content -->
				</div>
			</div>


			</section><!-- .error-404 -->

	
</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
