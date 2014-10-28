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

#####*ActiveRecord trong CI
+ Lấy dữ liệu: `$this->db->get("tên bảng");`


#Xây dựng ứng dụng đầu tiên:

Đối với controller: Được viết dưới dạng classs và extend từ CI_Controller

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
- Chú ý đến phương thức khởi tạo của controller đây là nơi để khởi tạo các giá trị default
- Ở đây tôi có action index của controller users dùng để lấy ra một danh sách các users

