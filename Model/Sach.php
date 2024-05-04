<?php
	require_once "Model/Database.php";
	class Sach{
		public static function getData(){
			$db = Database::getInstance();
			return $db->getDataWhere("`sach` , `tacgia`" , "sach.matg = tacgia.matg");
		}
		
		public static function getDataSearch($search){
			$db = Database::getInstance();
			return $db->getDataWhere("`sach` , `tacgia`" , "sach.matg = tacgia.matg AND sach.tensach LIKE '%$search%'");
		}
		
		public static function getDatabyID($masach){
			$db = Database::getInstance();
			return $db->getDataWhere("`sach`" , "masach = '$masach'")[0];
		}
		
		public static function addData($data){
			$db = Database::getInstance();
			return $db->addData("sach" , $data);
		}
		
		public static function updateData($data , $masach){
			$db = Database::getInstance();
			return $db->updateData("sach" , $data , "masach = '$masach'");
		}
		
		public static function deleteData($masach){
			$db = Database::getInstance();
			return $db->deleteData("sach","masach = '$masach'");
		}
	}
?>