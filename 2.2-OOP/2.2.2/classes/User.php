<?php
  class User extends DataRecordModel 
  {
    public $name;
    public $email;
    public $password;
    public $rate;

    public function addUserFromForm($name, $email, $password, $rate){
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
      $this->rate = $rate;
    }
  }
?>