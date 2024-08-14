<?php

defined( 'ABSPATH' ) || exit;



get_header( 'shop' );





echo '<div class="banner_shop class_relative" style="background-image: url(\'' . esc_url( get_template_directory_uri() ) . '/images/shop_baner.png\');">';
  // Centered header and breadcrumb
  echo '<div class="woocommerce-banner-content">';
    echo '<h1 class="woocommerce-products-header__title page-title">' . woocommerce_page_title(false) . '</h1>';
    echo '<div class="woocommerce-breadcrumb">';
      woocommerce_breadcrumb();
    echo '</div>';
  echo '</div>'; 
echo '</div>'; 

echo '<div class="count_sort">';
 echo '<div class="container line_banenr">';
 echo '<div class="count-filter">';
 echo  '<div class="">Filter</div>';
   echo '<h1 class="woocommerce-result-count">' . woocommerce_result_count() . '</h1>';
   echo '</div>';
   echo '<div class="woocommerce-result-count">' . woocommerce_catalog_ordering() . '</div>';
 echo '</div>';
echo '</div>';



echo '<div  class="container">';

/**
* Hook: woocommerce_shop_loop_header.
*
* @since 8.6.0
*
* @hooked woocommerce_product_taxonomy_archive_header - 10
*/
 //  all product and filter

if ( woocommerce_product_loop() ) {

/**
* Hook: woocommerce_before_shop_loop.
*
* @hooked woocommerce_output_all_notices - 10
* @hooked woocommerce_result_count - 20
* @hooked woocommerce_catalog_ordering - 30
*/
// do_action( 'woocommerce_before_shop_loop' );

// Start of woocommerce-content div
echo '<div class="woocommerce-content">';

  // Start Sidebar inside the woocommerce-content div
  if ( is_active_sidebar( 'shop-sidebar' ) ) {
  echo '<aside class="woocommerce-sidebar">';
    dynamic_sidebar( 'shop-sidebar' );
    echo '</aside>';
  }

  // Start Main content (products)
  echo '<div class="woocommerce-main-content">';
    woocommerce_product_loop_start();

    if ( wc_get_loop_prop( 'total' ) ) {
    while ( have_posts() ) {
    the_post();

    /**
    * Hook: woocommerce_shop_loop.
    */
    do_action( 'woocommerce_shop_loop' );

    wc_get_template_part( 'content', 'product' );
    }
    }

    woocommerce_product_loop_end();
    echo '</div>'; // End of woocommerce-main-content div

  // End of woocommerce-content div
  echo '</div>';

/**
* Hook: woocommerce_after_shop_loop.
*
* @hooked woocommerce_pagination - 10
*/
do_action( 'woocommerce_after_shop_loop' );

} else {
/**
* Hook: woocommerce_no_products_found.
*
* @hooked wc_no_products_found - 10
*/
do_action( 'woocommerce_no_products_found' );
}

/**
* Hook: woocommerce_after_main_content.
*
* @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
*/
do_action( 'woocommerce_after_main_content' );
echo '</div>'; // Close banner_shop

get_footer( 'shop' );