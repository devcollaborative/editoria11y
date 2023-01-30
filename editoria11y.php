<?php
/**
 * Plugin Name: Editoria11y Accessibility Checker
 * Plugin URI: https://github.com/devcollaborative/editoria11y
 * Description: A user-friendly accessibility checker, using <a href="https://github.com/itmaybejj/editoria11y">Editoria11y</a>.
 * Version: 0.1.0
 * Author: DevCollaborative
 * Author URI: https://devcollaborative.com/
 * GitHub Plugin URI: devcollaborative/editoria11y
 * Primary Branch: main
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue plugin scripts & styles.
 */
function editoria11y_enqueue_scripts() {

	if ( is_user_logged_in() ) {
		wp_enqueue_script(
			'editoria11y/js',
			plugin_dir_url( __FILE__ ) . 'assets/editoria11y.min.js',
			null,
			filemtime( plugin_dir_path( __FILE__ ) . 'assets/editoria11y.min.js' ),
			true,
		);
	}

}
add_action( 'wp_enqueue_scripts', 'editoria11y_enqueue_scripts' );

/**
 * Initialize Editoria11y.
 */
function editoria11y_init(){
	?>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const ed11y = new Ed11y();
			});
		</script>
	<?php
};
add_action ('wp_footer', 'editoria11y_init', 100 );
