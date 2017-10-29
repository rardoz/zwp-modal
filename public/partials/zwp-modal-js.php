<script type="text/javascript">
  (function(){
    var ZWPModal = function(){
      var
        self = this,
        modal = document.getElementById('<?= $this->plugin_name ?>-<?= $this->page_name ?>'),
        content = modal.getElementsByClassName('<?= $this->plugin_name ?>-content')[0],
        container = modal.getElementsByClassName('<?= $this->plugin_name ?>-container')[0],
        closeBtn = modal.getElementsByClassName('<?= $this->plugin_name ?>-close-button')[0],
        originalScroll = {x: 0, y: 0}

      self.noScroll = function(e){
        e.preventDefault();
        e.stopPropagation();
        window.scrollTo( originalScroll.x, originalScroll.y )
      }

      self.lockScroll = function(){
        originalScroll.x = window.scrollX || 0
        originalScroll.y = window.scrollY || 0
        window.addEventListener('scroll', self.noScroll)
      }

      self.unlockScroll = function(){
        window.removeEventListener('scroll', self.noScroll)
      }

      self.open = function(){
        self.lockScroll()
        modal.style.display = ''
        setTimeout(function(){
          content.style.transform = 'translateY(0px)'
        }, 100)
      }

      self.close = function(){
        self.unlockScroll()
        content.style.transform = 'translateY(-100vh)'
        setTimeout(function(){
          modal.style.display = 'none'
        }, 1000)
      }

      self.init = function(){
        closeBtn.addEventListener('click', self.close)
        container.addEventListener('click', function(e){
          if(e.target === container) {
            self.close(e)
          }
        })
      }

      self.init();
    }
    var zwpModal = new ZWPModal()
    zwpModal.open()
  })()
</script>