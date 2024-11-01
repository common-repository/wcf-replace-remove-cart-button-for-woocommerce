<?php
/*
Plugin Name: WCF Replace & Remove Cart Button
Plugin URI: http://wecodefuture.com
Description: WCF Replace & Remove Cart Button make your website E-commerce to Classified.  
Version: 1.1
Author: WeCodeFuture
Author URI: http://wecodefuture.com
*/
		/* 
		function wcf_enquiry_form() {
			wp_enqueue_style( 'wcf-enquiry-form-style', plugin_dir_url( '__FILE__' ) . 'wcf-replace-remove-cart-button/asset/css/bootstrap.min.css', false, '5.2.2');
			wp_enqueue_script( 'wcf-enquiry-form-js', plugin_dir_url( '__FILE__' ) . 'wcf-replace-remove-cart-button/asset/js/bootstrap.min.js', true, '5.2.2');
		}
		add_action( 'wp_enqueue_scripts', 'wcf_enquiry_form' );
		
		*/
		
		

			function wcf_replace_cart_scripts() {
				wp_enqueue_style( 'wcf-replace-cart-bscss', plugins_url('asset/css/bootstrap.min.css', __FILE__));
				wp_enqueue_script( 'wcf-replace-cart-bsscript', plugins_url('asset/js/bootstrap.min.js', __FILE__) );
			}
			
			add_action( 'init', 'wcf_replace_cart_scripts' );

			add_action('admin_menu', 'wcf_replace_cart_menu');

			function wcf_replace_cart_menu()
				{
					add_menu_page('WCF Remove Cart Button', 'WCF Remove Cart Button', 'administrator', dirname(__FILE__) , 'welcome_wcf_replace_remove_cart');
					

				}
				function welcome_wcf_replace_remove_cart()
				{

				include ('option_main.php');
				
				}

		
	if(get_option('wcf_enqry_enable') != '') {

		
			// The custom replacement button function
		function wcfp_custom_product_button(){
			// HERE your custom button text and link
		   // $button_text = __( "Enquiry Now", "woocommerce" );
			$button_text =  get_option('wcf_enqry_button');
			$button_link = '#';
			
			// Display button
		   // echo '<a class="button" href="'.$button_link.'">' . $button_text . '</a>';
				  
		 
				global $product;
				
				 $product_title = $product->get_name();
				
				$id = $product->get_id();
				echo'<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal_'.$id.'" id="enqsbtn_'.$id.'">' .$button_text. '</button>';
		
			?>
			
			
			
			<?php
			
			  include('enquiry_form.php');
		}

// Replacing the single product button add to cart by a custom button for a specific product category


		add_action( 'woocommerce_single_product_summary', 'wcfp_replace_single_page_cart_button', 1 );
		function wcfp_replace_single_page_cart_button() {
			global $product;
			
			// Only for product category ID Ex.
			if( has_term( '', 'product_cat', $product->get_id() ) ){

				// For variable product types (keeping attribute select fields)
				if( $product->is_type( 'variable' ) ) {
					remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
					add_action( 'woocommerce_single_variation', 'wcfp_custom_product_button', 20 );
				}
				// For all other product types
				else {
					remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
					add_action( 'woocommerce_single_product_summary', 'wcfp_custom_product_button', 30 );
				}
			}
		}




// Replacing the button add to cart by a link to the product in Shop and archives pages for as specific product category

		add_filter( 'woocommerce_loop_add_to_cart_link', 'wcfp_replace_loop_cart_button', 10, 2 );
		function wcfp_replace_loop_cart_button( $button, $product  ) {
			// Only for product category ID 
			
			if( has_term( '', 'product_cat', $product->get_id() ) ){
			   // $button_text = __( "Enquiry Now", "woocommerce" );
			   $button_text =  get_option('wcf_enqry_button');
				$button_link = '#';
			   // $button = '<a class="button" href="' . $button_link . '">' . $button_text . '</a>';
			   
				$id = $product->get_id();
				$product_title = $product->get_name();
	
					//echo $product_title;

		//	$button = '<button type="submit" class="btn btn-primary" data-bs-toggle="modal" value="'.$product_title.'" onclick="myFunction()" data-bs-target="#myModal" id="enqbtn_'.$id.'" name="cat_pro_enq">' .$button_text. '</button>';

	
		
			echo '<button type="submit" class="btn btn-primary" data-bs-toggle="modal" value="'.$product_title.'" onclick="myFunction()" data-bs-target="#myModal_'.$id.'" id="enqbtn_'.$id.'" name="cat_pro_enq">' .$button_text. '</button>';

			

				include('enquiry_form.php');
				
		
		
				

			}
			
			
			
		//	 return $button;
			 
			
			
		}

	}

	if(get_option('wcf_price_hide') != '') {

		/*add_filter( 'woocommerce_get_price_html', 'wcf_woocommerce_hide_product_price' );
		function wcf_woocommerce_hide_product_price( $price ) {
			return '';
		}
			*/
			
			add_filter( 'woocommerce_variable_sale_price_html', 'wcf_remove_prices', 9999, 2 );
	 
			add_filter( 'woocommerce_variable_price_html', 'wcf_remove_prices', 9999, 2 );
			 
			add_filter( 'woocommerce_get_price_html', 'wcf_remove_prices', 9999, 2 );
	 
		function wcf_remove_prices( $price, $product ) {
		   if ( ! is_admin() ) $price = '';
		   return $price;
		}
			
	}


?>