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
  public function login($name, $password)
  {
    $this -> db -> select('id, name, password');
    $this -> db -> from('users');
    $this -> db -> where('name', $name);
    $this -> db -> where('password', MD5($password));
    $this -> db -> limit(1);
    $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
