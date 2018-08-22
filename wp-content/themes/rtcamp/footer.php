<?php
    $footer_logo = ot_get_option( 'footer_logo' );
?>
<footer>
    <div class="container">
        <div class="row spaceupdown">
            <div class="col-md-3">
                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
                <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-2' ); ?>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
                <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-3' ); ?>
                <?php endif; ?>
            </div>
            <div class="col-md-3">
                <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-4' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<div class="container backgroungimgbottom">
    <div class="row">
        <div class="col-md-9">
            <?php
                wp_nav_menu(
                  array(
                    'theme_location'    => 'footer-menu',
                    'menu_id'           => 'mymenu',
                    'menu_class'        => 'footer-widget-link footer-menu-class'
                  )
                );
            ?>
            <div class="copyrighttext">
                <p><?php echo $phone_no = ot_get_option( 'copyright_text' ); ?></p>
            </div>
        </div>
        <div class="col-md-3" style="text-align: center;">
            <a class="navbar-brand footerlogo" href="index.html"><img src="<?php if(empty($footer_logo)){echo'./wp-content/uploads/2018/08/footer-logo.png';}else{echo $footer_logo;} ?>" alt=""></a> 
        </div>
    </div>
</div>