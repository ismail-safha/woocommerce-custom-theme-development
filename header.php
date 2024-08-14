<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('title'); ?></title>
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <!--Start header-->
  <header>
    <div class="container d-flex al-center js-between header">
      <!-- logo -->
      <img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo" />
      <!-- NavBar -->

      <nav class="navHeader">
        <?php
    wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'container' => false,
        // 'menu_class' => '',
        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
        // 'fallback_cb' => false,
    ));
    ?>
      </nav>
      <!-- Icon -->
      <div class="icons">
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon/Vector_2.svg" alt="icons1" />
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon/Vector_1.svg" alt="icons2" />
        <!-- WooCommerce Cart Icon -->

        <div class="woocommerce-cart-icon" id="cart-icon-trigger">
          <img src="<?php echo get_template_directory_uri(); ?>/images/icon/Vector.svg" alt="Cart" />

          <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>

        </div>

        <!-- Overlay -->
        <div id="page-overlay" class="hidden"></div>

        <div id="mini-cart" class="woocommerce-mini-cart hidden">
          <?php woocommerce_mini_cart(); ?>
        </div>



      </div>
    </div>
  </header>