<?php
/**
 * Title: Widgets
 * Description: Create custom widgets to be used in the specified widget areas.
 * Documentation: http://codex.wordpress.org/Widgets_API
 */

// Adds Sub Page Menu widget.
class Sub_Page_Menu_Widget extends WP_Widget
{

	// Register widget with WordPress.
	function __construct() {
		parent::__construct(
			 // Base ID
			'sub_page_menu',

			 // Name
			__('Sub Page Menu', 'text_domain'),

			 // Args
			array('description' => __('Display sub pages of current parent page.', 'text_domain'))
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance) {

		// Set up post data for current post
        global $post;

		if ($post->post_parent) {
			$parent = get_post($post->post_parent);

			// Check to see if we have a grandparent.
			if ($parent->post_parent) {
				$page_list    = wp_list_pages(array('title_li' => '', 'child_of' => $parent->post_parent, 'echo' => FALSE, 'link_after' => '<i class="caret caret--down"></i>'));
				$parent_title = get_the_title($parent->post_parent);
				$parent_link  = get_permalink($parent->post_parent);
			} else {
				$page_list    = wp_list_pages(array('title_li' => '', 'child_of' => $post->post_parent, 'echo' => FALSE, 'link_after' => '<i class="caret caret--down"></i>'));
				$parent_title = get_the_title($post->post_parent);
				$parent_link  = get_permalink($post->post_parent);
			}
		} else {
			$page_list    = wp_list_pages(array('title_li' => '', 'child_of' => $post->ID, 'echo' => FALSE, 'link_after' => '<i class="caret caret--down"></i>'));
			$parent_title = get_the_title($post->ID);
			$parent_link  = get_permalink($post->ID);
		}

		if ($page_list) {

			print($args['before_widget']);

			print('
				<nav class="side-nav">
					<header class="sidebar-header">
						<h5><a href="' . $parent_link . '">' . $parent_title . '</a></h5>
					</header>
					<ul>' . $page_list . '</ul>
				</nav>
			');

			print($args['after_widget']);
		}
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance) {
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}
		else {
			$title = __('New title', 'text_domain');
		}
		?>
		<p>
			<label for="<?= $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" type="text" value="<?= esc_attr($title); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param  array $new_instance Values just sent to be saved.
	 * @param  array $old_instance Previously saved values from database.
	 * @return array Updated safe values to be saved.
	 */
	public function update($new_instance, $old_instance) {
		return array(
			'title' => (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : ''
		);
	}
}

// Register Sub Page Menu widget.
function register_theme_widgets() {
	register_widget('Sub_Page_Menu_Widget');
}
add_action('widgets_init', 'register_theme_widgets');
