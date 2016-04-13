<?php /**
 * Custom Walker for Top menu
 * @since 1.0
 */

class fp4_walker_nav_menu extends Walker_Nav_Menu {
 /**
   * Adjust classes for individual menu items.
   */

  function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
    if ( $element->current )
      $element->classes[] = 'active';
    $element->is_dropdown = ! empty( $children_elements[$element->ID] );
    if ( $element->is_dropdown ) {
        $element->classes[] = 'has-dropdown';
    }
    parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }
  /**
   * Set class for list.
   */
  function start_lvl( &$output, $depth ) {
    $indent  = str_repeat( "\t", $depth );
    $class   = ( $depth < 4 ) ? 'dropdown' : 'unstyled';
    $output .= "\n{$indent}<ul class='{$class}'>\n";
  }
/**
   * Adjust markup for top level dropdown menu item.
   */

  function start_el( &$output, $item, $depth, $args ) {
    $item_html = '';
    parent::start_el( $item_html, $item, $depth, $args );
    if ( $item->is_dropdown && ( 0 == $depth ) ) {

      //$item_html = str_replace( '<li', '<li class="has-dropdown"', $item_html );
      $item_html = str_replace( esc_attr( $item->url ), '#', $item_html );
    }
    $output .= $item_html;
  }
}?>