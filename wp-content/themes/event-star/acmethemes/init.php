<?php
/**
 * Main include functions ( to support child theme ) that child theme can override file too
 *
 * @since Event Star 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('event_star_file_directory') ){

    function event_star_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }
    }
}

/**
 * Check empty or null
 *
 * @since Event Star 1.0.0
 *
 * @param string $str, string
 * @return boolean
 *
 */
if( !function_exists('event_star_is_null_or_empty') ){
    function event_star_is_null_or_empty( $str ){
        return ( !isset($str) || trim($str)==='' );
    }
}

/*file for library*/
require event_star_file_directory('acmethemes/library/tgm/class-tgm-plugin-activation.php');

/*
* file for customizer theme options
*/
require event_star_file_directory('acmethemes/customizer/customizer.php');

/*
* file for additional functions files
*/
require event_star_file_directory('acmethemes/functions.php');

require event_star_file_directory('acmethemes/functions/sidebar-selection.php');

/*woocommerce*/
require event_star_file_directory('acmethemes/woocommerce/functions-woocommerce.php');

require event_star_file_directory('acmethemes/woocommerce/class-woocommerce.php');

/*
* files for hooks
*/
require event_star_file_directory('acmethemes/hooks/tgm.php');

require event_star_file_directory('acmethemes/hooks/front-page.php');

require event_star_file_directory('acmethemes/hooks/slider-selection.php');

require event_star_file_directory('acmethemes/hooks/feature-info.php');

require event_star_file_directory('acmethemes/hooks/header.php');

require event_star_file_directory('acmethemes/hooks/feature-info.php');

require event_star_file_directory('acmethemes/hooks/header-helper.php');

require event_star_file_directory('acmethemes/hooks/dynamic-css.php');

require event_star_file_directory('acmethemes/hooks/footer.php');

require event_star_file_directory('acmethemes/hooks/comment-forms.php');

require event_star_file_directory('acmethemes/hooks/excerpts.php');

require event_star_file_directory('acmethemes/hooks/siteorigin-panels.php');

require event_star_file_directory('acmethemes/hooks/acme-demo-setup.php');

require event_star_file_directory('acmethemes/hooks/template.php');

/*
* file for sidebar and widgets
*/
require event_star_file_directory('acmethemes/sidebar-widget/acme-schedule.php');

require event_star_file_directory('acmethemes/sidebar-widget/acme-contact.php');

require event_star_file_directory('acmethemes/sidebar-widget/acme-gallery.php');

require event_star_file_directory('acmethemes/sidebar-widget/acme-about.php');

require event_star_file_directory('acmethemes/sidebar-widget/acme-accordion.php');

require event_star_file_directory('acmethemes/sidebar-widget/acme-col-posts.php');

require event_star_file_directory('acmethemes/sidebar-widget/acme-team.php');

require event_star_file_directory('acmethemes/sidebar-widget/acme-testimonial.php');

require event_star_file_directory('acmethemes/sidebar-widget/acme-social.php');

require event_star_file_directory('acmethemes/sidebar-widget/acme-event.php');

require event_star_file_directory('acmethemes/sidebar-widget/sidebar.php');

/*file for metaboxes*/
require event_star_file_directory('acmethemes/metabox/meta-icons.php');

require event_star_file_directory('acmethemes/metabox/metabox-defaults.php');

/*
* file for core functions imported from functions.php while downloading Underscores
*/
require event_star_file_directory('acmethemes/core.php');
require event_star_file_directory('acmethemes/gutenberg/gutenberg-init.php');

/*themes info
*/
require event_star_file_directory('acmethemes/at-theme-info/class-at-theme-info.php');