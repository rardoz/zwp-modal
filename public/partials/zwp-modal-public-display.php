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
?>

<? include('zwp-modal-css.php') ?>
<div id="<?= $this->plugin_name ?>-<?= $this->page_name ?>" style="display: none;" class="<?= $this->plugin_name ?>">
  <div class="<?= $this->plugin_name ?>-container">
    <div class="<?= $this->plugin_name ?>-content" style="transform: translateY(-100vh);">
      <? include('zwp-modal-close-button.php') ?>
      <div class="<?= $this->plugin_name ?>-post">
        <h2 class="entry-title">
          <?= $this->post->post_title ?>
        </h2>
        <div class="post-content">
          <?= $this->post->post_content ?>
        </div>
      </div>
    </div>
  </div>
</div>
<? include('zwp-modal-js.php') ?>