<?php
/*
 * Plugin Name:       Nonprofit Companion
 * Plugin URI:        https://colorlib.com/wp/themes/nonprofit/
 * Description:       Nonprofit Companion is a companion for Nonprofit theme.
 * Version:           1.0.1
 * Author:            Colorlib
 * Author URI:        https://colorlib.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nonprofit-companion
 * Domain Path:       /languages
 */


if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( !defined( 'NONPROFIT_COMPANION_VERSION' ) ){
    define( 'NONPROFIT_COMPANION_VERSION', '1.1' );
}

// Define dir path constant
if( !defined( 'NONPROFIT_COMPANION_DIR_PATH' ) ){
    define( 'NONPROFIT_COMPANION_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

// Define inc dir path constant
if( !defined( 'NONPROFIT_COMPANION_INC_DIR_PATH' ) ){
    define( 'NONPROFIT_COMPANION_INC_DIR_PATH', NONPROFIT_COMPANION_DIR_PATH.'inc/' );
}

// Define sidebar widgets dir path constant
if( !defined( 'NONPROFIT_COMPANION_SW_DIR_PATH' ) ){
    define( 'NONPROFIT_COMPANION_SW_DIR_PATH', NONPROFIT_COMPANION_INC_DIR_PATH.'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( !defined( 'NONPROFIT_COMPANION_EW_DIR_PATH' ) ){
    define( 'NONPROFIT_COMPANION_EW_DIR_PATH', NONPROFIT_COMPANION_INC_DIR_PATH.'elementor-widgets/' );
}

// Define demo data dir path constant
if( !defined( 'NONPROFIT_COMPANION_DEMO_DIR_PATH' ) ){
    define( 'NONPROFIT_COMPANION_DEMO_DIR_PATH', NONPROFIT_COMPANION_INC_DIR_PATH.'demo-data/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();



if( ( 'Nonprofit' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Nonprofit' == $is_parent->get( 'Name' ) ) ){
    require_once NONPROFIT_COMPANION_DIR_PATH . 'nonprofit-init.php';
}else{

    add_action( 'admin_notices', 'nonprofit_companion_admin_notice', 99 );
    function nonprofit_companion_admin_notice() {
        $url = 'https://demo.colorlib.com/nonprofit/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Nonprofit Companion</strong> plugin you have to also install the %1$sNonprofit Theme%2$s', 'nonprofit-companion' ), '<a href="'.esc_url( $url ).'" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}

?>