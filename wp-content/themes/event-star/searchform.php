<?php
/**
 * Custom Search Form
 *
 * @package Acme Themes
 * @subpackage Event Star
 */
global $event_star_customizer_all_values;
?>
<div class="search-block">
    <form action="<?php echo esc_url( home_url() )?>" class="searchform" method="get" role="search">
        <div>
            <label for="menu-search" class="screen-reader-text"></label>
            <?php
            $placeholder_text = '';
            if ( isset( $event_star_customizer_all_values['event-star-search-placeholder']) ):
                $placeholder_text = ' placeholder="' . esc_attr( $event_star_customizer_all_values['event-star-search-placeholder'] ). '" ';
            endif; ?>
            <input type="text" <?php echo  $placeholder_text ;?> class="menu-search" id="menu-search" name="s" value="<?php echo get_search_query();?>" />
            <button class="searchsubmit fa fa-search" type="submit" id="searchsubmit"></button>
        </div>
    </form>
</div>