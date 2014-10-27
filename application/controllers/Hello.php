<?php
class Hello extends CI_Controller{
    public function __construct(){
        parent::__construct();
         $this->load->helper("url");
    }
    public function index(){
      echo "<h3>Started with codeigniter framework</h3>";
      $data["user_name"] = "My name is CI";
      $this->load->view("hello_world", $data);
    }
}