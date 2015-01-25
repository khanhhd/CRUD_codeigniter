<?php
class VerifyLogin extends CI_Controller {
 function __construct()
 {
   parent::__construct();
   $this->load->model("Muser");
   $this->load->helper("url");
 }
 function index()
 {
   $this->load->library('form_validation');
   $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
   if($this->form_validation->run() == FALSE)
   {

	 $this->load->view('login_view');
   }
   else
   {
	 redirect('home', 'refresh');
   }

 }

 function check_database($password)
 {
   $name = $this->input->post('name');
   $result = $this->Muser->login($name, $password);
   if($result)
   {
	 $sess_array = array();
	 foreach($result as $row)
	 {
	   $sess_array = array(
		 'id' => $row->id,
		 'name' => $row->name
		 );
	   $this->session->set_userdata('logged_in', $sess_array);
	 }
	 return TRUE;
   }
   else
   {
	 $this->form_validation->set_message('check_database', 'Invalid name or password');
	 return false;
   }
 }
}
?>