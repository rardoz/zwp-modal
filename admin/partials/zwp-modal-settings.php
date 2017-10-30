<?php
  $options = $this->options[$this->current_page->ID] ?: []; 
  $id = $this->plugin_name.'-'.$this->current_page->ID;
  $name = $this->plugin_name . '[pages][' . $this->current_page->ID . ']';
?>

<table class="widefat">
  <tr>
    <td scope="row">
      <label for="<?= $this->plugin_name ?>-<?= $this->current_page->ID ?>-select">
        <strong><? esc_attr_e( 'Page:' ) ?> </strong>
        <a href="<?= get_page_link( $this->current_page->ID ) ?>" target="_blank"><?= $this->current_page->post_title ?></a>
      </label>
    </td>
  </tr>
  <? include('zwp-modal-autocomplete.php') ?>
  <tr valign="top">
		<td scope="row">
      <label for="<?= $id ?>-cookie-time">
        <? esc_attr_e( 'Set days until next display' ) ?>
      </label>
    </td>
    <td>
      <input
        id="<?= $id ?>-cookie-time"
        type="number"
        value="<?= $options ? $options['cookie_time'] : '' ?>"
        name="<?= $name ?>[cookie_time]"
        data-lpignore="true"
        class="large-text"
      />
    </td>
  </tr>
  <tr valign="top">
		<td scope="row">
      <label for="<?= $id ?>-background-style">
      <? esc_attr_e( 'Background style' ) ?>
      </label>
    </td>
    <td>
      <input
        id="<?= $id ?>-background-style"
        data-lpignore="true"
        value="<?= $options ? $options['background-style'] : '' ?>"
        name="<?= $name ?>[background-style]"
        placeholder="#fff"
        class="large-text"
      />
    </td>
  </tr>
  <tr valign="top">
		<td scope="row">
      <label for="<?= $id ?>-max-width">
        <? esc_attr_e( 'Max width' ) ?>
      </label>
    </td>
    <td>
      <input
        id="<?= $id ?>-max-width"
        value="<?= $options ? $options['max-width'] : '' ?>"
        name="<?= $name ?>[max-width]"
        placeholder="600px"
        data-lpignore="true"
        class="large-text"
      />
    </td>
  </tr>
  <tr valign="top">
    <td scope="row">
      <label for="<?= $id ?>-vertical-space">
        <? esc_attr_e( 'Vertical space' ) ?>
      </label>
    </td>
    <td>
      <input
        id="<?= $id ?>-vertical-space"
        value="<?= $options ? $options['vertical-space'] : '' ?>"
        name="<?= $name ?>[vertical-space]"
        placeholder="60px"
        data-lpignore="true"
        class="large-text"
      />
    </td>
  </tr>
  <tr valign="top">
    <td scope="row">
      <label for="<?= $id ?>-padding">
        <? esc_attr_e( 'Padding' ) ?>
      </label>
    </td>
    <td>
      <input
        id="<?= $id ?>-padding"
        value="<?= $options ? $options['padding'] : '' ?>"
        name="<?= $name ?>[padding]"
        placeholder="30px"
        data-lpignore="true"
        class="large-text"
      />
    </td>
  </tr>
  <tr valign="top">
    <td scope="row">
      <label for="<?= $id ?>-border-radius">
        <? esc_attr_e( 'Border radius' ) ?>
      </label>
    </td>
    <td>
      <input
        id="<?= $id ?>-border-radius"
        value="<?= $options ? $options['border-radius'] : '' ?>"
        name="<?= $name ?>[border-radius]"
        placeholder="6px"
        data-lpignore="true"
        class="large-text"
      />
    </td>
  </tr>
  <tr valign="top">
    <td scope="row">
      <label for="<?= $id ?>-box-shadow">
        <? esc_attr_e( 'Box shadow style' ) ?>
      </label>
    </td>
    <td>
      <input
        id="<?= $id ?>-box-shadow"
        value="<?= $options ? $options['box-shadow'] : '' ?>"
        name="<?= $name ?>[box-shadow]"
        placeholder="1px 1px 12px rgba(0,0,0,0.5)"
        data-lpignore="true"
        class="large-text"
      />
    </td>
  </tr>
  <tr valign="top">
    <td scope="row">
      <label for="<?= $id ?>-hide-close-button">
        <? esc_attr_e( 'Hide close button' ) ?>
      </label>
    </td>
    <td>
      <input
        id="<?= $id ?>-hide-close-button"
        type="checkbox"
        <?= $options['hide-close-button'] ? 'checked' : '' ?>
        value="hide"
        name="<?= $name ?>[hide-close-button]"
        data-lpignore="true"
      />
    </td>
  </tr>
</table>
<br />