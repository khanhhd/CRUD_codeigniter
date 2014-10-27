<?php
class Users extends CI_Controller{

    public function __construct(){
      parent::__construct();
      $this->load->helper("url");
      $this->load->model("Muser");
      $this->load->helper('form');
    }

    public function index(){
      $name = $this->input->post("name");
      if ($name != ""){
        $data['data'] = $this->Muser->searchUser($name);
      }else{
        $data['data'] = $this->Muser->listUser();
      }
      $this->load->view("user_index", $data);
    }

    public function edit($id)
    {
      $this->load->model("Muser");
      $data['user'] = $this->db->where("id", $id);
      $query = $this->db->get("users");
      $data['user'] = $query->result();
      $this->load->view("edit_user", $data);
    }

    public function new_user()
    {
      $this->load->view("new");
    }

    public function delete($id)
    {
      $this->db->where("id", $id);
      $this->db->delete("users");
      $this->index();
    }

    public function create()
    {
      $data = $this->input->post();
      $this->db->insert('users', $data);
      $this->index();
    }

    public function update()
    {
      $id = $this->input->post("id");
      $this->db->where("id", $id);
      $data = $this->input->post();
      $this->db->update('users', $data);
      $this->show_user($id);
    }

    public function show_user($id)
    { 
      $data['user'] = $this->db->where("id", $id);
      $query = $this->db->get("users");
      $data['user'] = $query->result();
      $this->load->view("show_user", $data);
    }
}