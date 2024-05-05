<?php
	require_once "Model/Sach.php";
	require_once "Model/TacGia.php";
	class SachController{
		public function __construct(){}
		
		public function handleRequest(){
			$action = null;
			
			if (isset($_GET["action"])){
				$action = $_GET["action"];
			}
			switch($action) {
				case 'index':
					$this->index();
					break;
				case 'add':
					$this->add();
					break;
				case 'edit':
					$this->edit();
					break;
				default:
					$this->index();
					break;
			}
			
		}
		
		private function index(){
			$data = Sach::getData();
			include "View/index.php";
		}
		
		private function add(){
			if (isset($_POST["add_btn"])){
				$hinhanh = $_POST['tensach'];
				$path = "upload/$hinhanh";
				move_uploaded_file($_FILES['hinhanh']['tmp_name'],$path);
				$errors = array();
				/*$file_name = $_FILES['image']['name'];
				$file_size = $_FILES['image']['size'];
				$file_tmp = $_FILES['image']['tmp_name'];
				$file_type = $_FILES['image']['type'];
				$file_parts = explode('.', $_FILES['image']['name']);
				$file_ext = strtolower(end($file_parts));
				$allowed_extensions = array("jpeg", "jpg", "png");

				if (!in_array($file_ext, $allowed_extensions)) {
					$errors[] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
				}

				if ($file_size > 2097152) {
					$errors[] = 'Kích thước file không được lớn hơn 2MB.';
				}

				$image = $_FILES['image']['name'];
				$target = "photo/" . basename($image);

				$sql = "INSERT INTO images (image) VALUES ('$image')";

				if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
					echo '<script>alert("Đã upload thành công!");</script>';
				} else {
					echo '<script>alert("Đã upload thất bại!");</script>';
				}*/
				$data = [
					'tensach' => $_POST['tensach'],
					'matg' => $_POST['matg'],
					'namxb' => $_POST['namxb'],
				];
				
				if (Sach::addData($data)>0){
					header("location:index.php");
				}
			} else {
				$tacgia = TacGia::getData();
				include "View/add.php";
			}
		}
		
		private function edit(){
			if (isset($_GET["id"])){
				$sach = Sach::getDataID($_GET["id"]);
				
				if (isset($_POST["edit_btn"])){
					$data = [
						'tensach' => $_POST['tensach'],
						'matg' => $_POST['matg'],
						'namxb' => $_POST['namxb'],
					];
					
					if (Sach::editData($data , $_POST["masach"])>0){
						header("location:index.php");
					}
				} else {
					$tacgia = TacGia::getData();
					include "View/edit.php";
				}
			}
		}
	}
?>