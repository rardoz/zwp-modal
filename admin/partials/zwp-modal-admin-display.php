<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://zardozcs.com
 * @since      1.0.0
 *
 * @package    Zwp_Modal
 * @subpackage Zwp_Modal/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h2><?php esc_attr_e( 'ZWP Modal Settings', 'WpAdminStyle' ); ?></h2>

<!-- select a page -->
<select name="page-dropdown"> 
  <option value="">
    <?php echo esc_attr( __( 'Select page' ) ); ?>
  </option> 
 <?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) {
    $option = '<option value="' . get_page_link( $page->ID ) . '">';
    $option .= $page->post_title;
    $option .= '</option>';
    echo $option;
  }
 ?>
</select>

<!-- select a post to render in the modal

for each page
render out it as an uneditable text field with the page id
and then each page will have the option to select a post from the dropdown
then we will save each key value pair in the db
ie pageID => postID.

 -->
<select name="post-dropdown"> 
  <option value="">
    <?php echo esc_attr( __( 'Select post to display' ) ); ?>
  </option> 
 <?php 
  $posts = get_posts( ['posts_per_page' => 1000]); 
  foreach ( $posts as $post ) {
    $option = '<option value="' . get_page_link( $post->ID ) . '">';
    $option .= $post->post_title;
    $option .= '</option>';
    echo $option;
  }
 ?>
</select>


