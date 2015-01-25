<?php
class Mproduct extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function listProducts()
  {
    $query = $this->db->get("products");
    return $query->result_array();
  }

  public function searchProduct($name)
  {
    $this->db->where("product_name", $name);
    $query = $this->db->get("products");
    return $query->result_array();
  }

  public function listall($offset,$start){
    $this->db->limit($offset,$start);
    $this->db->order_by("id","desc");
    return $this->db->get("products")->result_array();
  }
  public function count_all(){
    return $this->db->count_all("products");
  }
}
