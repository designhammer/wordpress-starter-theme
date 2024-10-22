<?php
/**
 * Adds toggle button for drop-down menu.
 *
 * Convert parent menu item to button to expand sub-menu. These better support screen readers.
 *
 * @package STARTER
 */

if ( ! class_exists( 'Button_Sublevel_Walker' ) ) {

	/**
	 * This class handles adding button to expand sub-menus.
	 *
	 * @since 3.0.0
	 * @var string
	 */
	class Button_Sublevel_Walker extends Walker_Nav_Menu {

		/**
		 * Starts the element output.
		 *
		 * The $args parameter holds additional values that may be used with the child
		 * class methods. Also includes the element output.
		 *
		 * @since 2.1.0
		 * @since 5.9.0 Renamed `$object` (a PHP reserved keyword) to `$data_object` for PHP 8 named parameter support.
		 * @abstract
		 *
		 * @param string $output        Used to append additional content (passed by reference).
		 * @param object $data_object   The data object.
		 * @param int    $depth         Depth of the item.
		 * @param array  $args          An array of additional arguments.
		 * @param int    $id Optional   ID of the current item. Default 0.
		 */
		public function start_el( &$output, $data_object, $depth = 0, $args = array(), $id = 0 ) {

			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$class_names = '';
			$value       = '';

			$classes     = empty( $data_object->classes ) ? array() : (array) $data_object->classes;
			$classes[]   = 'menu-item-' . $data_object->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $data_object, $args ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $data_object->ID, $data_object, $args );
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

			// Check if the current menu item is the current page.
			$current_page = '';
			if ( in_array( 'current-menu-item', $classes, true ) ) {
				$current_page = ' aria-current="page"';
			}

			$output .= $indent . '<li' . $id . $value . $class_names . $current_page . '>';

			$attributes  = ! empty( $data_object->attr_title ) ? ' title="' . esc_attr( $data_object->attr_title ) . '"' : '';
			$attributes .= ! empty( $data_object->target ) ? ' target="' . esc_attr( $data_object->target ) . '"' : '';
			$attributes .= ! empty( $data_object->xfn ) ? ' rel="' . esc_attr( $data_object->xfn ) . '"' : '';
			$attributes .= ! empty( $data_object->url ) ? ' href="' . esc_attr( $data_object->url ) . '"' : '';

			$data_object_output = $args->before;

			// If $has_children, change parent anchor to a button.
			if ( in_array( 'menu-item-has-children', $classes, true ) && 0 === $depth ) {
				$data_object_output .= '<button aria-expanded="false" class="toggle-dropdown"><span>';
				$data_object_output .= apply_filters( 'the_title', $data_object->title, $data_object->ID );
				$data_object_output .= '</span></button>';
			} else {
				$data_object_output .= '<a' . $attributes . '>';
				$data_object_output .= $args->link_before . apply_filters( 'the_title', $data_object->title, $data_object->ID ) . $args->link_after;
				$data_object_output .= '</a>';
				$data_object_output .= $args->after;
			}

			$output .= apply_filters( 'walker_nav_menu_start_el', $data_object_output, $data_object, $depth, $args );
		}
	}
}
