<?php
/**
 * Adds Event Star Theme Widgets in SiteOrigin Pagebuilder Tabs
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return null
 *
 */
function event_star_siteorigin_widgets($widgets) {
    $theme_widgets = array(
        'Event_Star_About',
        'Event_Star_Accordion',
        'Event_Star_Posts_Col',
        'Event_Star_Contact',
        'Event_Star_Schedule',
        'Event_Star_Gallery',
        'Event_Star_Social',
        'Event_Star_Team',
        'Event_Star_Testimonial',
        'Event_Star_Event'
    );
    foreach($theme_widgets as $theme_widget) {
        if( isset( $widgets[$theme_widget] ) ) {
            $widgets[$theme_widget]['groups'] = array('event-star');
            $widgets[$theme_widget]['icon']   = 'dashicons dashicons-screenoptions';
        }
    }
    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'event_star_siteorigin_widgets');

/**
 * Add a tab for the theme widgets in the page builder
 *
 * @since Event Star 1.0.0
 *
 * @param null
 * @return null
 *
 */
function event_star_siteorigin_widgets_tab($tabs){
    $tabs[] = array(
        'title'  => esc_html__('AT Event Star Widgets', 'event-star'),
        'filter' => array(
            'groups' => array('event-star')
        )
    );
    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'event_star_siteorigin_widgets_tab', 20 );