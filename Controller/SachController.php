<?php
	require_once "Model/Sach.php";
	require_once "Model/TacGia.php";
	class SachController{
		public function __construct(){
			
		}
		
		public function handleRequest(){
			$action = null;
			if (isset($_GET['action'])){
				$action = $_GET['action'];
			}
			
			switch($action){
				case 'index':
					$this->index();
					break;
				case 'add':
					$this->add();
					break;
				case 'edit':
					$this->edit();
					break;
				case 'delete':
					$this->delete();
					break;
				default:
					$this->index();
					break;
			}
		}
		
		private function index(){
			$data = null;
			if (isset($_POST["search_btn"])){
				$search = $_POST["search"];
				$data = Sach::getDataSearch($search);
			} else {
				$data = Sach::getData();
			}
			include "View/index.php";
		}
		
		private function add(){
			if (isset($_POST["add_btn"])){
				$data = [
					'tensach' => $_POST["tensach"],
					'matg' => $_POST["matg"],
					'namxb' => $_POST["namxb"]
				];
				
				
				if (Sach::addData($data)>0){
					echo "Thêm thành công";
					header("location:index.php");
				} else {
					echo "Thêm thất bại";
				}
				
			} else {
				$tg = TacGia::getData();
				include "View/add.php";
			}
		}
		
		private function edit(){
			if (isset($_GET["id"])){
				$sach = Sach::getDatabyID($_GET["id"]);
				if (isset($_POST["edit_btn"])){
					$data = [
						'tensach' => $_POST["tensach"],
						'matg' => $_POST["matg"],
						'namxb' => $_POST["namxb"]
					];
					
					
					if (Sach::updateData($data, $_POST["masach"])>0){
						echo "Cập nhật thành công";
						header("location:index.php");
					} else {
						echo "Cập nhật thất bại";
					}
					
				} else {
					$tg = TacGia::getData();
					include "View/edit.php";
				}
			} else {
				echo "403";
			}
		}
		
		private function delete(){
			if (isset($_GET["id"])){
				$sach = Sach::getDatabyID($_GET["id"]);
				if (isset($_POST["delete_btn"])){
					if (Sach::deleteData($_POST["masach"])>0){
						echo "Xóa thành công";
						header("location:index.php");
					} else {
						echo "Xóa thất bại";
					}
					
				} else {
					$tg = TacGia::getData();
					include "View/delete.php";
				}
			} else {
				echo "403";
			}
		}
		
		
	}
?>