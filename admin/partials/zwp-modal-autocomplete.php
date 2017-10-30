
 <?php  
  $type = $this->current_page ? 'post' : 'page';
  $post = false;
  $currentPost = $type === 'post' ? $this->options[$this->current_page->ID] : '';

  if($type === 'post' ) {
    foreach($this->posts as $p) {
      if($p->ID == $currentPost['post_id']) {
        $post = $p;
        break;
      }
    }
  }

  $suffix = $type === 'post' ? '-' .  $this->current_page->ID : '';
  $auto_id = $this->plugin_name . '-' . $type . $suffix;
  $block_name = $type === 'post' ? $this->plugin_name . '[pages][' . $this->current_page->ID . '][post_id]' : $auto_id; 
?>

<tr valign="top">
	<td scope="row">
    <label for="<?= $auto_id ?>-typeahead">
      <? if($type === 'page'): ?>
        <strong><? esc_attr_e( 'Add ' . $type ) ?></strong>
      <? else: ?>
        <? esc_attr_e( 'Add ' . $type ) ?>
      <? endif ?>
    </label>
  <? if($type === 'post'): ?>
    </td>
    <td>
  <? else: ?>
    <br />
  <? endif ?>
    <input
      id="<?= $auto_id ?>-typeahead"
      list="<?= $auto_id ?>-typeahead-list"
      placeholder="<? esc_attr_e( 'ID or title') ?>"
      value="<?= $post ? $post->ID : '' ?>"
      name="<?= $block_name  ?>"
      data-lpignore="true"
      class="<?=$type === 'post' ? 'large-text' : 'regular-text'?>"
    />
    <datalist
      id="<?= $auto_id ?>-typeahead-list"
    >
      <? if($post): ?>
        <option selected value="<?= $post->ID ?>">
          <?= $post->post_title ?>
        </option>
      <? endif ?>
    </datalist>
  <? if($type === 'page'): ?>
    <br />
    <span class="description"><?php esc_attr_e( 'Select a page from the list to display the modal. When you click on an option, it will add the setup form to the list below.' ); ?></span>
  <? endif ?>
  </td>
</tr>

<script type="text/javascript">
  (function(){

    var ZWPModalTypeahead = function(){
      var self = this
      self.typeahead = document.getElementById('<?= $auto_id ?>-typeahead');
      self.dataset = document.getElementById('<?= $auto_id ?>-typeahead-list'),
      self.form = null,
      self.throttle = null
      self.request = null
      self.data = []
      self.type = <?= json_encode($type) ?>
      
      self.fetchData = function(search){
        self.request = fetch('/wp-admin/admin-ajax.php?action=get_listing_names', {
          method: 'POST',
          headers: new Headers({
            "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
          }),
          body: "name=" + encodeURI(search) + "&type=<?= $type ?>"
        })
          .then(function(response){
            return response.json()
          })
          .then(function(response){
            var innerHTML = ""
            response.forEach(function(item){
              innerHTML += "<option value='" + item.id + "'>" + item.title + "</option>"
            })
            self.dataset.innerHTML = innerHTML
            self.data = response
          })
          .catch(function(response) {
            console.error(response)
          })
      }

      self.onOptionClick = function(e) {
        if(e.type === 'input' && e.constructor.name !== 'InputEvent') {
          e.preventDefault()
          e.stopPropagation()
          self.form = document.getElementById('<?= $this->plugin_name ?>-pages-form')
          console.log(self.form)
          if(self.type === 'page') {
            var child = JSON.parse(self.data.find(function(item){
              return item.id == e.target.value
            })['form'])
            var wrap = document.createElement('div');
            wrap.innerHTML = child
            self.form.innerHTML = child + self.form.innerHTML
            var arr = wrap.getElementsByTagName('script')
            for (var n = 0; n < arr.length; n++) {
              eval(arr[n].innerHTML)
            }
            self.typeahead.value = ''
          }
        }
      }

      self.onChange = function(e){
        clearTimeout(self.throttle)
        if(e.type !== 'input') {
          self.throttle = setTimeout(function(){
            self.fetchData(e.target.value)
          }, 1000)
        }
      }

      self.init = function(){
        self.typeahead.addEventListener('keydown', self.onChange)
        self.typeahead.addEventListener('input', self.onOptionClick)
      }
      self.init()
    }
    
    new ZWPModalTypeahead();
  })()
</script>
