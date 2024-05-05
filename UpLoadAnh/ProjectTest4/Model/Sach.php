<?php
	require_once "Model/Database.php";
	
	class Sach{
		public static function getData(){
			$db = Database::getInstance();
			return $db->getDataWhere("sach , tacgia" , "sach.matg = tacgia.matg");
		}
		
		public static function getDataID($id){
			$db = Database::getInstance();
			return $db->getDataWhere("sach , tacgia" , "sach.matg = tacgia.matg AND sach.masach = '$id'")[0];
		}
		
		public static function addData($data){
			$db = Database::getInstance();
			return $db->addData("sach" , $data);
		}
		
		public static function editData($data , $id){
			$db = Database::getInstance();
			return $db->editData("sach" , $data , "masach = '$id'");
		}
		
	}
?>