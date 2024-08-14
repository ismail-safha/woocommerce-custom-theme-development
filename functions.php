<?php



// attach/add assests file

function simple_basic_theme_load_scripts() {

	// Enqueue Google Fonts
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,700;1,300;1,600&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500&display=swap', false);

	// Enqueue Font Awesome
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), null, false);
	wp_enqueue_style('font-awesome-min', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(),null,  false);
	wp_enqueue_style('font-awesome-style', get_template_directory_uri() . '/assets/css/fontawesome.css', array(), null, false);

	// Enqueue Slick Carousel
	wp_enqueue_style('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',null,  false);
	wp_enqueue_style('slick-carousel-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', null, false);

	// Enqueue Custom Styles
	wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css', array(), null,  false);
	wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(),null,  false);

	 // Enqueue jQuery
	 wp_enqueue_script('jquery-3.6.1', get_template_directory_uri() . '/assets/js/jquery-3.6.1.min.js', array(), null, true);
	 wp_enqueue_script('jquery-3.6.3', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js', array(), null, true);
	 wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.13.1/jquery-ui.min.js', array('jquery'), null, true);

	 // Enqueue Slick Carousel JS
	 wp_enqueue_script('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);

	 // Enqueue Custom JS
	 wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
	
}
add_action('wp_enqueue_scripts', 'simple_basic_theme_load_scripts');

// register nav menu

function simple_theme_register_menus() {
	register_nav_menus(array(
		// menu_id/location_id => menu name
			'header-menu' =>  'simple-theme'
	));
}

add_action('init', 'simple_theme_register_menus');



//=================================


// Enable WooCommerce support
function simple_theme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    // Optional: Add support for WooCommerce gallery features
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'simple_theme_add_woocommerce_support' );


//

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

//====


// Remove the default WooCommerce content wrapper
// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );

// Add your custom content  'container' class in archive-product.php

function mytheme_output_content_wrapper() {
    echo '<div id="primary" class="content-area container">';
}
add_action( 'woocommerce_before_main_content', 'mytheme_output_content_wrapper', 10 );

// Remove the default WooCommerce content wrapper end
// woocommerce_after_main_contentremove_action( '', 'woocommerce_output_content_wrapper_end', 10 );

// Add your custom content wrapper end
function mytheme_output_content_wrapper_end() {
    echo '</div>';
}
add_action( 'woocommerce_after_main_content', 'mytheme_output_content_wrapper_end', 10 );










//
// Change WooCommerce page title

//====


// Register WooCommerce Sidebar

function simple_theme_register_sidebar() {
	register_sidebar( array(
			'name'          => __( 'Shop Sidebar', 'your-theme-textdomain' ),
			'id'            => 'shop-sidebar',
			'description'   => __( 'Widgets in this area will be shown on the shop and product archive pages.', 'your-theme-textdomain' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'simple_theme_register_sidebar' );


// ===


function simple_basic_theme_woocommerce_styles() {
	if ( class_exists( 'WooCommerce' ) ) {
			wp_enqueue_style( 'woocommerce-custom', get_template_directory_uri() . '/assets/css/woocommerce-custom.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'simple_basic_theme_woocommerce_styles' );
 

// add_loading_spinner_script
function add_loading_spinner_script() {
	?>
<script type="text/javascript">
jQuery(document).ready(function($) {
  var $spinner = $('#loading-spinner');
  $spinner.show(); // Show spinner when the DOM is ready

  // Wait until the page is fully loaded
  $(window).on('load', function() {
    // Ensure that both the sidebar and product loop are loaded
    var checkContentLoaded = setInterval(function() {
      if ($('.woocommerce-content').length > 0 && $('.woocommerce-main-content').length > 0) {
        $spinner.hide(); // Hide spinner once the content is loaded
        clearInterval(checkContentLoaded);
      }
    }, 100);
  });
});
</script>
<?php
}
add_action('wp_footer', 'add_loading_spinner_script');