<?php
/**
 * Template Name: Page 9 columns
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package mille-fiori
 */
include_font_awesome();
get_header(); ?>

    <section id="page-container" class="visible-over">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-9">
                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
//get_sidebar();
get_footer();
