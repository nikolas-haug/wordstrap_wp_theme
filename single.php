<?php get_header(); ?>

<div class="container index pt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body bg-primary">
                    <h3 class="card-title mb-0">
                        Blog Posts
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <?php if(have_posts()) : ?>
                        <?php while(have_posts()) : the_post(); ?>
                        <article class="post">
                            <div class="row pt-3">
                                <div class="col-md-12">
                                    <h2>
                                        <a href="<?php echo the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <!-- Check for thumbnail -->
                                    <?php if(has_post_thumbnail()) : ?>
                                        <!-- Display thumbnail / Featured image -->
                                        <div class="post-thumbnail">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <br>
                                    <p class="meta">
                                        Posted at <?php the_time(); ?> on <?php the_date(); ?>
                                        by <strong><?php the_author(); ?></strong>
                                    </p>
                                    <div class="content">
                                        <?php the_content( ); ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <?php if(is_active_sidebar('sidebar')) : ?>
            <?php dynamic_sidebar('sidebar'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>