<?php
  class Router {

    protected $links;

    function __construct($links)
    {
        $this->links = $links;
    }

    public function isAvailablePage(){
      if(!empty($_GET) && !empty($_GET['page'])){

        $pagename = $_GET['page'];
    
        if(empty(in_array($pagename, $this->links))){
          throw new Exception('(Not Found) Страница не найдена!', 404);
        } else{
          return $pagename;
        }
      } else {
        throw new Exception('(Bad Request) Плохой запрос, очень...', 400);
      }
    }
  }
?>