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
                                <?php if(has_post_thumbnail()) : ?>
                                <div class="col-md-3">
                                    <div class="post-thumbnail">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <h2>
                                        <a href="<?php echo the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <p class="meta">
                                        Posted at <?php the_time(); ?> on <?php the_date(); ?>
                                        by <strong><?php the_author(); ?></strong>
                                    </p>
                                    <div class="excerpt">
                                        <?php echo get_the_excerpt(); ?>
                                    </div>
                                    <br>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-outline-dark">Read More
                                        &raquo;</a>
                                </div>
                                <?php else: ?>
                                <div class="col-md-12">
                                    <h2>
                                        <a href="<?php echo the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <p class="meta">
                                        Posted at <?php the_time(); ?> on <?php the_date(); ?>
                                        by <strong><?php the_author(); ?></strong>
                                    </p>
                                    <div class="excerpt">
                                        <?php echo get_the_excerpt(); ?>
                                    </div>
                                    <br>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-outline-dark">Read More
                                        &raquo;</a>
                                        <?php 
                                        
                                        $blocks = parse_blocks(get_the_content());

                                        print("<pre>".print_r($blocks,true)."</pre>");

                                        foreach ($blocks as $block){
                                            //block data
                                            // print_r($block);
                                            echo '<br>';
                                            echo '<hr>';
                                            echo '<h4>Before</h4>';
                                            
                                            print_r(render_block( $block ));
                                            echo '<h4>After</h4>';
                                            echo '<hr>';
                                            }

                                        ?>
                                </div>
                                <?php endif; ?>
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