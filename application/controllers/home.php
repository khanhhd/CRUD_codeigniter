<?php
session_start();
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['name'] = $session_data['name'];
     $this->load->view('home_index', $data);
   }
   else
   {
     redirect('login', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>