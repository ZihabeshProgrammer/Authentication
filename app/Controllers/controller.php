<?php

namespace App\Controllers;

class controller {
 
    protected $container;


    public function __construct($container){
      $this->container= $container;
    }

    public function __get($p){
        if($this->container->{$p}){
                return $this->container->{$p};
        }
    }
}