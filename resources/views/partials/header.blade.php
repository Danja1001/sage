<?php // todo rewrite to blade ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ya' ); ?></a>

<header id="masthead" class="site-header">
  <div class="container top-header">
    <div class="row">
      <div class="event_link">
        <a href="#">Events</a>
      </div>
      <div class="socials">
        <a href="#" class="social_button"><i class="fa fa fa-share-alt"></i></a>
        <ul>
          <li><a href=""><i class="fa fa-facebook"></i></a></li>
          <li><a href=""><i class="fa fa-twitter"></i></a></li>
          <li><a href=""><i class="fa fa-linkedin"></i></a></li>
          <li><a href=""><i class="fa fa-envelope"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container main-header">
    <div class="row">
      <div class="site-branding">
        <?php
        the_custom_logo();
        if ( is_front_page() && is_home() ) :
        ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span
                    class="sr-only"><?php bloginfo( 'name' ); ?></span></a></h1>
        <?php
        else :
        ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span
                    class="sr-only"><?php bloginfo( 'name' ); ?></span></a></p>
        <?php
        endif;
        ?>
      </div><!-- .site-branding -->

      <nav id="site-navigation" class="main-navigation">
        <?php
        wp_nav_menu( array(
                'theme_location' => 'primary_navigation',
                'menu_id'        => 'primary-menu',
                'menu_class' => 'primary-menu'
        ) );
        ?>
      </nav><!-- #site-navigation -->

      <div class="site-search">
        <a href="#" class="search"><i class="fa fa-search"></i></a>
      </div>
      <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <span></span>
        <p class="sr-only"><?php esc_html_e( 'Primary Menu', 'ya' ); ?></p>
      </button>


      <?php echo get_search_form(); ?>
    </div>
  </div>
</header><!-- #masthead -->

<div id="content" class="site-content">
