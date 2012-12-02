<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<section id="primary" class="forum-results">
			<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?></h2>


			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */

						// if post_type=reply (forum) change display to forum results
						if($_GET['post_type'] == "reply"){
							//get_template_part( 'search_forum' );
							get_template_part( 'search-forum' );

						// otherwise, assume we're search stacks
						} else {
							get_template_part( 'stacks/shortstack' );
						}

					?>

				<?php endwhile; ?>

			<?php else : ?>

				<div id="content" role="main" class="page-container">
					<article id="post-0" class="post no-results not-found">
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyeleven' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-0 -->
				</div><!-- #content -->

			<?php endif; ?>

		</section><!-- #primary -->

<?php get_footer(); ?>