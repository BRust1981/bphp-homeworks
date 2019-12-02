<?php
  class Users extends JsonDataArray 
  {
      public function displaySortedList(){
        foreach ($this->newQuery()->orderBy('name')->getObjs() as $data){
          echo '<div>
                  <h3>' . $data->name . '</h3>
                  <p>e-mail: ' . $data->email . '</p>
                  <p>rate: ' . $data->rate . '</p>
                </div>
                <hr>
          ';
        }
      }
  }
?>