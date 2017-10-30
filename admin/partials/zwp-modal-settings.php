<?php
  $options = $this->options[$this->current_page->ID] ?: []; 
  $id = $this->plugin_name.'-'.$this->current_page->ID;
  $name = $this->plugin_name . '[pages][' . $this->current_page->ID . ']';
?>
<fieldset>
  <label for="<?= $id ?>-cookie-time">
    Set cookie time in days
  </label>
  <input
    id="<?= $id ?>-cookie-time"
    type="number"
    value="<?= $options ? $options['cookie_time'] : '' ?>"
    name="<?= $name ?>[cookie_time]"
  />
  <br />
</fieldset>

<fieldset>
  <label for="<?= $id ?>-background-style">
    Background style
  </label>
  <input
    id="<?= $id ?>-background-style"
    value="<?= $options ? $options['background-style'] : '' ?>"
    name="<?= $name ?>[background-style]"
    placeholder="#fff"
  />
  <br />
</fieldset>

<fieldset>
  <label for="<?= $id ?>-max-width">
    Max width
  </label>
  <input
    id="<?= $id ?>-max-width"
    value="<?= $options ? $options['max-width'] : '' ?>"
    name="<?= $name ?>[max-width]"
    placeholder="600px"
  />
  <br />
</fieldset>

<fieldset>
  <label for="<?= $id ?>-max-width">
    Max width
  </label>
  <input
    id="<?= $id ?>-max-width"
    value="<?= $options ? $options['max-width'] : '' ?>"
    name="<?= $name ?>[max-width]"
    placeholder="600px"
  />
  <br />
</fieldset>

<fieldset>
  <label for="<?= $id ?>-vertical-space">
    Vertical space
  </label>
  <input
    id="<?= $id ?>-vertical-space"
    value="<?= $options ? $options['vertical-space'] : '' ?>"
    name="<?= $name ?>[vertical-space]"
    placeholder="60px"
  />
  <br />
</fieldset>

<fieldset>
  <label for="<?= $id ?>-padding">
    Padding
  </label>
  <input
    id="<?= $id ?>-padding"
    value="<?= $options ? $options['padding'] : '' ?>"
    name="<?= $name ?>[padding]"
    placeholder="30px"
  />
  <br />
</fieldset>

<fieldset>
  <label for="<?= $id ?>-border-radius">
    Border radius
  </label>
  <input
    id="<?= $id ?>-border-radius"
    value="<?= $options ? $options['border-radius'] : '' ?>"
    name="<?= $name ?>[border-radius]"
    placeholder="6px"
  />
  <br />
</fieldset>

<fieldset>
  <label for="<?= $id ?>-box-shadow">
    Box shadow style
  </label>
  <input
    id="<?= $id ?>-box-shadow"
    value="<?= $options ? $options['box-shadow'] : '' ?>"
    name="<?= $name ?>[box-shadow]"
    placeholder="1px 1px 12px rgba(0,0,0,0.5)"
  />
  <br />
</fieldset>

<fieldset>
  <label for="<?= $id ?>-hide-close-button">
    Hide close button
  </label>
  <input
    id="<?= $id ?>-hide-close-button"
    type="checkbox"
    <?= $options['hide-close-button'] ? 'checked' : '' ?>
    value="hide"
    name="<?= $name ?>[hide-close-button]"
  />
  <br />
</fieldset>