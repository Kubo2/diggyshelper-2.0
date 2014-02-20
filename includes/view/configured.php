<?php

namespace View {
  function getConfigured() {
    if(!isset($smarty)) {
      static $smarty = new  \Smarty();
    }
    return clone $smarty;
  }
}