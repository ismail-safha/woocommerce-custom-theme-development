<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;


global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
  <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" class="product-link">
    <div class="card">
      <div class="card_img">
        <?php
                // Display the product thumbnail
                echo woocommerce_get_product_thumbnail();

              
                    echo  woocommerce_show_product_loop_sale_flash();
                
                ?>
      </div>
      <div class="card-info">
        <h1><?php the_title(); ?></h1>
        <p><?php echo $product->get_short_description(); ?></p>
        <div class="price">
          <?php
                    // Display the product price
                    echo $product->get_price_html();
                    ?>
        </div>
      </div>
      <div class="hover-info">
        <div class="info">
          <?php
                    // Display the add to cart button
                    woocommerce_template_loop_add_to_cart();
                    ?>
          <div class="icons">
            <span><?php esc_html_e( 'Share', 'your-theme-textdomain' ); ?></span>
            <span><?php esc_html_e( 'Compare', 'your-theme-textdomain' ); ?></span>
            <span><?php esc_html_e( 'Like', 'your-theme-textdomain' ); ?></span>
          </div>
        </div>
      </div>
    </div>
  </a>
</li>