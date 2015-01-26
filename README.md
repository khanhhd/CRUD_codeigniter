##Giới thiệu

- Codeigniter là một PHP Framework, CI có thư viện code nhẹ.
- CI là một trong nhiều Framwork được viết theo mô hình chuẩn MVC

##Cài đặt

- Để làm việc được với CI ta cần phải download CI về tại trang chủ có địa chỉ sau [codeigniter](https://ellislab.com/codeigniter)
- Sau khi download xong giải nén tệp vừa tải về: chúng ta cần quan tâm đến 2 thư mục application và system và file index.php
+ File index.php dùng để nhận tất cả các request từ phía người dùng, chuyển dữ liệu đến từng controller tương ứng
Tóm lại ta cần copy thử mục application, system và file index.php và thư mục project mà ta cần làm.
+ Thư mục system chứa phần core xử lý của CI Framework
+ Thư mục application là thư mục mà ta sẽ làm việc và tương tác với nó hay nói cách khác là phần để xây dựng ứng dụng

######Trong thư mục application ta cần chú ý một số thư mục trong đó như:
+ config: dùng để chứa các file cấu hình ở đây ta tập chung vào 2 file config.php và file database.php
+ database: Chứa các thông tin kết nối với db như host, db name, db password ..
+ controller: Chứa các controller của ứng dụng, ta sẽ viết các controller ở trong này
+ model: Là thư mục chứa các lớp để tương tác với CSDL
+ view: Thư mục này chứa các file view hiển thị tương ứng với từng controller

# Sơ lược về một ứng dụng CI

#####Controller trong CI:
+ Được tạo trong thư mục application
+ Tên của controller phải viết hoa và tên file giống với tên controller (viết thường)
+ Các lớp sẽ kế thừa từ CI_Controller
+ Tên của các function bên trong controller đại diện cho các action
+ 1 chú ý khá quan trọng không được viết action tên là list trong controller vì action này đã được định nghĩa trong CI

#####View trong CI
+ Muốn load view từ controller ta sử dụng: `$this->load->view("view_name", $data)`
+ Tham số khi truyền từ controller sang view sẽ bị chuyenr 1 lần => cần lưu tham số dưới dạng mảng ví dụ `$data["user_name"] = "Khanhhd"` thì trên view ta chỉ cần gọi `$user_name`

#####Mode trong CI

+ Kết nối CSDL ta sử dụng `$this->load->database();`
+ Thực thi câu truy vấn `$this->load->query("câu truy vấn");`

######*ActiveRecord trong CI
- Cho phép lấy dữ liệu, cập nhât dữ liệu một cách ngắn gọn 
+ Lấy toàn bộ dữ liệu của bảng: `$this->db->get("tên bảng")
+ Thực thi câu lệnh select: `$this->db->select('name, age, address');`
+ Truy vấn kết hợp với điều kiên: `$this->db->where();`
Và rất nhiều câu lệnh khác có thể tham khảo trong user_guide của CI [ActivRecord CI ](https://ellislab.com/codeigniter/user-guide/database/active_record.html)

#Xây dựng ứng dụng đầu tiên:

######Đối với controller: 

```
<?php
class Users extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper("url");
    }
    
    public function index(){
      $this->load->model("Muser");
      $data['data'] = $this->Muser->listUser();
      $this->load->view("user_index", $data);
    }
}
```
- Được viết dưới dạng classs và extend từ CI_Controller
- Chú ý đến phương thức khởi tạo của controller đây là nơi để khởi tạo các giá trị default
- Ở đây tôi có action index của controller users dùng để lấy ra một danh sách các users
- Thay vì khởi tạo object user như thông thường là `User.new` thì CI sử dụng `$this->load->model("Muser");`

###### Đối với model 
```
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
```
- Chú ý tên model không được trùng với tên của controller 
- Mọi model phải được kế thừa từ CI_Model, trong ứng dụng này việc kết nối CSDL sử dụng luôn trong phương thức khởi tạo của model ` $this->load->database();`

## Session trong CI

###### Sesion làm việc như thế nào?

Khi một trang được load, sesion sẽ kiểm tra xem session data có tồn tại trong cookie của user session hay không. Nếu không tồn tại session data thì sẽ tạo một sesion mới và  lưu vào trong cookie. Nếu session đã tồn tại thì thông tin sẽ được update và đồng thời update vào cookie, với mỗi lần update sẽ tạo ra một session_id. Session class chạy một cách tự động, khi làm việc với session data hoặc thậm chí thêm chính data của bạn vào sesion user thì quá trình đọc, ghi và cập nhật session là tự động. 

###### Sesion Data là gì ?

Trong CI nó đơn giản chỉ là một mảng chứa các thông tin như: Session ID, IP, User Agent và Last activity (timestamp)
Nếu option `$config['encryption_key']`  này được enable trong config thì mảng seesion data sẽ đưuọc mã hóa trước khi lưu vào cookie, làm tăng tính bảo mật cho dữ liệu.

######* Lấy dữ liệu trong session data 

ví dụ để lấy sesion_id `$session_id = $this->session->userdata('session_id');`

######*Thêm dữ liệu vào trong session data:

`$this->session->set_userdata('some_name', 'some_value');`

######* Lấy tất cả data trong session data
`$this->session->all_userdata()`

######* Xóa session 

`$this->session->unset_userdata('some_name');`

###### Session trong ứng dụng

- config `autoload.php`

 `$autoload['libraries'] = array('database','session')`

- Trong ứng dụng việc valid dữ liệu và gán session  bằng hàm sau
```
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
		 'name' => $row->nameli
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

```

Ngoài ra còn các Libraries cho việc chứng thực như 
[ion_auth](http://benedmunds.com/ion_auth/)




## Rewrite url trong CI

###### URI Segments

Ví dụ trong ứng dụng này của tôi (theo mô hình MVC) có đường dẫn như sau `192.168.1.31/CURD_codeigniter/users/index`
thì trong đó `users` là controller được gọi đến và `index` là action được gọi
- Thông thường mặc định uri sẽ là `192.168.1.31/CURD_codeigniter/index.php/users/index` và để xóa `index.php` trong mỗi đường dẫn làm như sau:
 Nếu trong thư mục `root` của bạn chưa có file `.htaccess` thì create một phải mới với tên đó và thêm vào đoạn code sau để loại bỏ `index.php` trong mỗi đường dẫn mặc định

```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule .* index.php/$0 [PT,L]
```
 - Ngoài ra cũng có thể custom đường dẫn theo ý muốn của mình trông thân thiện hơn, giả sử tôi thay `192.168.1.31/CURD_codeigniter/users/index` này bằng một uri khác như `192.168.1.31/CURD_codeigniter/danh-sach-nguoi-dung` chẳng hạn
 với đoạn code sau:

Trong file `routes.php`

```
$route['^danh-sach-nguoi-dung$'] = "users/index";
```

Trong đó `^danh-sach-nguoi-dung$` là một regrex bắt đầu được match tương ứng.
hay trong một trường hợp khác tôi có các trang sản phẩm và tôi không muốn sử dụng các uri mặc định:
ban đầu các trang product của tôi sẽ có dạng sau `/products/index/1` trong đó một là trang
và với đoạn code như sau:

Trong file `routes.php`

```
$route['^san-pham(/trang-([1-9]+))?$'] = "products/index/$1";
```

Tôi đã thay thế nó bằng một uri thân thiện  như `192.168.1.31/CURD_codeigniter/san-pham/trang-1` 
Việc sử dụng friendly url trong codeigniter khá đơn giản chỉ việc cấu hình trong routes có một điều quan trọng đó là bạn phải biết sử dụng `regrex`.


## Upload files trong codeigniter
- Công cụ sử dụng để upload trong proj này là `AjaxFileUpload` 
- Tạo một thư mục để lưu trữ files khi upload lên trong thư mục root của bạn `files` chẳng hạn và nhớ set quyển read write cho nó. 

###### Tạo một model 

Trước tiên tạo một model để lưu những file sẽ được upload lên 
Trong proj này là `mfiles.php`

```
<?php
class Mfiles extends CI_Model {
  public function insert_file($filename, $title)
  {
    $data = array(
      'filename'      => $filename,
      'title'         => $title
    );
    $this->db->insert('files', $data);
    return $this->db->insert_id();
  }
  public function get_files()
  {
    return $this->db->select()
          ->from('files')
          ->get()
          ->result();
  }
}
```

Và tất nhiên bạn cũng phải tạo một table có 2 trường là `filename` và `title`. `filename` sẽ lưu trữ tên files sau khi up lên và được mã hóa bởi thư viện

###### Tạo một controller 

Action xử lý upload chính là hàm sau:

```
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

```

Action sẽ kiểm tra xem đường dẫn files và files name có hợp lệ hay không, nếu thành công sẽ lưu lại trong db với name và title đồng thời upload lên thư mục files 
Trong đó:

```
  $config['upload_path'] = './files/';
```

Thư mục chứa files được upload 

```
$config['allowed_types'] = 'gif|jpg|png|doc|txt';
```

Kiểu files sẽ cho phép upload ngoài `gif|jpg|png|doc|txt` thì những kiểu khác là không hợp lệ
      
```
$config['encrypt_name'] = TRUE;
```

Tên files sẽ được mã hóa và lưu lại trong db


## Tạo form 

Tạo ra một form và  add thư viện cần thiết cho việc upload

```
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/my_upload.js"></script>
    <script src="<?php echo base_url();?>js/ajaxfileupload.js"></script>
```

## Upload files

Việc upload files thông qua ajax xem file `/js/my_upload.js` với controller là `upload` và action là `upload_files`.
