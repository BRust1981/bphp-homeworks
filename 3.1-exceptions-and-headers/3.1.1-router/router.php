<?php
  class Router {

    protected $links;

    function __construct($links)
    {
        $this->links = $links;
    }

    public function isAvailablePage($link){
      return empty(in_array($link, $this->links));
    }
  }
?>