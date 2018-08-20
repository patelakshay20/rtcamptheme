<?php /* template name: Home */ ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo get_bloginfo( 'name' ); ?> - <?php echo get_bloginfo( 'description' ); ?></title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?php echo $favicon_icon = ot_get_option( 'favicon_icon' ); ?>" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap-grid.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap-reboot.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/tab.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/easy-responsive-tabs.css">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
    </head>
    <body>
        <?php get_header(); ?>
        <div class="slider">
            <div class="container">
                <div class="banner-holder">
                    <div class="banner-slider">
                        <?php
                            $wp_query = new WP_Query();
                            $order = "ASC";
                            $wp_query->query('showposts=3&post_type=slider'.'&paged='.$paged.'&order='.$order);
                            while ($wp_query->have_posts()) : $wp_query->the_post();
                            $postid = get_the_ID();  
                        ?>
                        <div class="ban-slide">
                            <div class="slider-info">
                                <img src="<?php echo get_the_post_thumbnail_url( $postid, 'full' ); ?>">
                                <div class="slider-content-holder">
                                    <div class="slider-content">
                                        <h3><?php the_title(); ?></h3>
                                        <p><?php the_content(); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container spaceupdown">
            <div class="row">
                <div id="verticalTab">
                    <ul class="resp-tabs-list">
                        <?php
                            $args = array('post_type' => 'page','sort_order' => 'asc','post_parent' => 14);
                            $query = new WP_Query($args);
                            if ($query->have_posts()) 
                            {
                                while ($query->have_posts()) : $query->the_post();
                                $pid = get_the_ID();
                        ?>
                        <li><?php the_title(); ?></li>
                        <?php
                            endwhile;
                            }
                            wp_reset_postdata();
                        ?>
                    </ul>
                    <div class="resp-tabs-container">
                        <?php
                            $args = array('post_type' => 'page','sort_order' => 'asc','post_parent' => 14);
                            $query = new WP_Query($args);
                            if ($query->have_posts()) 
                            {
                                while ($query->have_posts()) : $query->the_post();
                                $childpageid = get_the_ID(); 
                        ?>
                        <div>
                            <div class="row">
                                <?php
                                    $args1 = array('posts_per_page' => 3,'post_type' => 'page','sort_order' => 'desc','post_parent' => $childpageid);

                                    $subpages = new WP_Query($args1);
                                    if ($subpages->have_posts()) 
                                    {
                                        while ($subpages->have_posts()) : $subpages->the_post();
                                        $childpageid = get_the_ID();
                                ?>
                                <div class="col-md-4">
                                    <div class="postimg">
                                        <img src="<?php echo get_the_post_thumbnail_url( $childpageid, 'full' ); ?>" class="img2">
                                        <p class="img2title"><?php the_title(); ?></p>
                                        <p class="img2desc"><?php the_excerpt(); ?></p>
                                    </div>
                                </div>
                                <?php
                                        endwhile;
                                    }
                                    else
                                    {
                                        echo '<b style="padding-left: 15px;">Pages not Available</b>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            }
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php get_footer(); ?>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-latest.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/easy-responsive-tabs.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/swiperRunner.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/mycustom.js"></script>
    </body>
</html>