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