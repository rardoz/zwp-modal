<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://zardozcs.com
 * @since      1.0.0
 *
 * @package    Zwp_Modal
 * @subpackage Zwp_Modal/public/partials
 */
  $options = $this->zwp_modal_options ?: [];
  $page_id = $this->page_id;
  $this->post_name = $page_object->post_name;
?>

<?php if($options[$page_id]): ?>
  <?php $post = get_post( $options[$page_id] ); ?>
  <? include('zwp-modal-css.php') ?>
  <div id="<?= $this->plugin_name ?>-<?= $this->post_name ?>" style="display: none;" class="<?= $this->plugin_name ?>">
    <div class="<?= $this->plugin_name ?>-container">
      <div class="<?= $this->plugin_name ?>-content" style="transform: translateY(-100vh);">
        <? include('zwp-modal-close-button.php') ?>
        <div class="<?= $this->plugin_name ?>-post">
          <h2 class="entry-title">
            <?= $post->post_title ?>
          </h2>
          <div class="post-content">
            <?= $post->post_content ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <? include('zwp-modal-js.php') ?>
<?php endif ?>