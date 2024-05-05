<?php
	require_once "Model/Database.php";
	
	class TacGia{
		public static function getData(){
			$db = Database::getInstance();
			return $db->getData("tacgia");
		}
		
	}
?>