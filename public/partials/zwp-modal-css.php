<style>
  .<?= $this->plugin_name ?> {
    position: fixed;
    width: 100vw;
    height: 100vh;
    background: transparent;
    z-index: 99999;
    top: 0;
    left: 0;
  }

  .<?= $this->plugin_name ?>-container {
    display: flex;
    height: 100%;
    align-items: center;
    justify-content: center;
  }

  .<?= $this->plugin_name ?>-content {
    max-width: 600px;
    width: calc(100vw - 60px);
    max-height: 600px;
    height: calc(100vh - 120px);
    padding-bottom: 30px;
    background: #fff;
    border-radius: 6px;
    box-shadow: 1px 1px 12px rgba(0,0,0,0.5);
    position: relative;
    display: flex;
    transition: transform 1s ease-in-out;
    flex-direction: column;
  }

  .<?= $this->plugin_name ?>-post {
    overflow: auto;
    width: 100%;
    height: 100%;
    padding: 0 30px;
  }

  .<?= $this->plugin_name ?>-close-button {
    align-self: flex-end;
    cursor: pointer;
    margin-top: 5px;
    margin-right: 5px;
    height: 30px;
    width: 30px;
    padding: 3px;
    transition: transform 1s ease-in-out, opacity 1s ease-in-out;
  }

  .<?= $this->plugin_name ?>-close-button:focus {
    outline: none;
    transform: rotate(360deg);
  }

  .<?= $this->plugin_name ?>-close-button:hover {
    opacity: 0.6;
  }

  .<?= $this->plugin_name ?>-close-icon {
    width: 100%;
    height: 100%
  }
</style>