<?php
    $headerlogo = ot_get_option( 'headerlogo' );
?>
<nav id="navigation" class="navbar navbar-expand-lg nav-bg-white backgroungimgtop">
    <div class="container">
        <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img src="<?php if(empty($headerlogo)){echo'./wp-content/uploads/2018/08/logo.png';}else{echo $headerlogo;} ?>" alt=""></a>
        <?php
            wp_nav_menu(
              array(
                'theme_location'    => 'header-menu',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'nav-list',
                'menu_class'        => 'navbar-nav ml-auto'
              )
            );
        ?>
        <button class="second-nav-toggler" type="button"> <i class="fa fa-bars"></i> </button>
    </div>
</nav>
<div id="mobile-nav" data-prevent-default="true" data-mouse-events="true">
    <div class="mobile-nav-box">
        <div class="mobile-logo"> <a href="<?php echo get_home_url(); ?>" class="mobile-main-logo"><img src="<?php if(empty($headerlogo)){echo'./wp-content/uploads/2018/08/logo.png';}else{echo $headerlogo;} ?>" alt="Mobile LOGO"></a> <a href="#" class="manu-close">MENU <i class="fa fa-times"></i></a> </div>
        <?php
            wp_nav_menu(
              array(
                'theme_location'    => 'header-menu',
                'menu_class'        => 'mobile-list-nav'
              )
            );
        ?>
    </div>
</div>