<?php
class Upload extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('mfiles');
    $this->load->database();
    $this->load->helper('url');
  }

  public function index()
  {
    $this->load->view('upload');
  }

  public function upload_file()
  {
    $status = "";
    $msg = "";
    $file_name = 'userfile';

    if (empty($_POST['title']))
    {
      $status = "error";
      $msg = "Please enter a title";
    }

    if ($status != "error")
    {
      $config['upload_path'] = './files/';
      $config['allowed_types'] = 'gif|jpg|png|doc|txt';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload($file_name))
      {
        $status = 'error';
        $msg = $this->upload->display_errors('', '');
      }
      else
      {
        $data = $this->upload->data();
        $file_id = $this->mfiles->insert_file($data['file_name'], $_POST['title']);
        if($file_id)
        {
          $status = "success";
          $msg = "File successfully uploaded";
        }
        else
        {
          unlink($data['full_path']);
          $status = "error";
          $msg = "Please try again.";
        }
      }
      @unlink($_FILES[$file_name]);
    }
    echo json_encode(array('status' => $status, 'msg' => $msg));
  }


  public function files()
  {
    $files = $this->mfiles->get_files();
    $this->load->view('files', array('files' => $files));
  }

}