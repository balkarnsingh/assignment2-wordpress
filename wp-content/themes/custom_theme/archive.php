<?php get_header(); ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-9">
            <h1 class="my-4">
                <?php bloginfo('description'); ?>
            </h1>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!-- Blog Post -->
                <div class="card mb-4">
                    <?php  if ( has_post_thumbnail() ) {
                        the_post_thumbnail(array(800, 400, true), array('class' => ' card-img-top')); // add post thumbnail
                    }
                    ?>
                    <div class="card-body">
                        <a href="<?php the_permalink() ?>" >
                            <h2 class="card-title">
                                <?php the_title(); ?>
                            </h2>
                        </a>
                        <p class="card-text">
                            <?php the_excerpt();?>
                        </p>
                        <a href="<?php the_permalink() ?>" class="btn btn-primary">Read More &rarr;
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on
                        <?php the_time('F j, Y'); ?> by
                        <?php if(get_the_author() != "adam"): ?>, by
                            <span class="post-author">
                <?php the_author_posts_link() ?>
              </span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; else: ?>
                <div class="no-results">
                    <p>
                        <strong>There has been an error.
                        </strong>
                    </p>
                    <p>We apologize for any inconvenience, please
                        <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page
                        </a> or use the search form below.
                    </p>
                    <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
                </div>
                <!--noResults-->
            <?php endif; ?>
            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <div class="navigation">
                    <div class="alignleft">
                        <?php previous_posts_link('&laquo; Previous Entries') ?>
                    </div>
                    <div class="alignright">
                        <?php next_posts_link('Next Entries &raquo;','') ?>
                    </div>
                </div>
            </ul>
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-3">
            <?php if ( is_active_sidebar( 'main-sidebar' ) ) { ?>
                <?php dynamic_sidebar('main-sidebar'); ?>
            <?php } ?>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<?php get_footer(); ?>
