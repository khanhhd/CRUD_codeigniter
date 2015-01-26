<?php

class Products extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper("url");
    $this->load->model("Mproduct");
    $this->load->helper('form');
    $this->load->database();
  }


  public function new_product()
  {
    $this->load->helper(array('form', 'url'));
   $this->load->library('form_validation');

    $this->load->view('productform');
  }

  function index()
  {
    // $data['data'] = $this->Mproduct->listProducts();
    // $this->load->view("product_index", $data);


    $config['base_url']   = base_url(). "products/index";
    $config['total_rows'] = $this->Mproduct->count_all();
    $config['per_page']   = 4;
    $start = $this->uri->segment(2);
    $bb = str_split($start, 6);
    $realStart = $bb[1];
    $this->load->library("pagination",$config);
    $data['pagination'] = $this->pagination->create_links();
    $data['info'] = $this->Mproduct->listall($config['per_page'],$realStart);

    if($this->input->post("ajax")){
        $this->load->view("product_paginate",$data);
    }else{
        $this->load->view("product_paginate",$data);
    }
  }

  function create()
  {
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->library('my_validation');

    //$this->form_validation->set_rules('product_name', 'Name', 'required|regex_match[/^[a-z]+[A-Z]$/]');
    //$this->form_validation->set_rules('category_name', 'Category Name', 'required');
    //$this->form_validation->set_rules('product_date', 'Product Date', 'required');
    //$this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required');

    // another way
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $product_rules = array(
       array(
             'field'   => 'product_name',
             'label'   => 'Product Name',
             'rules'   => 'required|regex_match[/^[a-z]*[A-Z]*$/]'
          ),
       array(
             'field'   => 'category_name',
             'label'   => 'Category Name',
             'rules'   => 'required|callback_category_check'
          ),
       array(
             'field'   => 'product_date',
             'label'   => 'Product Date',
             'rules'   => 'required|valid_date'
          ),
       array(
             'field'   => 'expiry_date',
             'label'   => 'Expiry Date',
             'rules'   => 'required|valid_date'
          )
    );

    $this->form_validation->set_rules($product_rules);

    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('productform');
    }
    else
    {
      $data = $this->input->post();
      $this->db->insert('products', $data);
      $this->index();
    }
  }


  function delete($id)
  {
    $this->db->where("id", $id);
    $this->db->delete("products");
  }

  function edit()
  {

  }

  function category_check($str)
  {
    if (1 !== preg_match("/\A[A-z]{1}[a-z]+\z/", $str))
    {
      $this->form_validation->set_message('category_check', 'The %s start with UPERCASE');
      return FALSE;
    }
    else
    {
      return TRUE;
    }
  }
}
?>