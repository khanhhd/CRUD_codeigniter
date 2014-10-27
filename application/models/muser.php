<?php
class Muser extends CI_Model{
  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function listUser()
  {
    $query = $this->db->get("users");
    return $query->result_array();
  }

  public function searchUser($name)
  {
    $this->db->where("name", $name);
    $query = $this->db->get("users");
    return $query->result_array();
  }
}