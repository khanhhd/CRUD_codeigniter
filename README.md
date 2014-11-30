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
