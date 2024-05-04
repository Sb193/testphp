<?php
	class Database{
		private static $instance = null;
		private $pdo;
		
		private function __construct(){
			$host = 'localhost';
			$dbname = 'test1';
			$user = 'root';
			$pass = '';
			$charset = 'utf8';
			
			$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
			
			$options =[
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES=>FALSE,
			];
			
			$this->pdo = new PDO($dsn , $user , $pass , $options);
		}
		
		public static function getInstance(){
			if (self::$instance === null){
				self::$instance = new Database();
			}
			return self::$instance;
		}
		
		public function prepare($sql){
			return $this->pdo->prepare($sql);
		}
		
		public function getData($table){
			$sql = "SELECT * FROM `$table`";
			$stmt = $this->prepare($sql);
			$stmt->execute();
			$data = array();
			while ($row = $stmt->fetchObject()){
				$data[] = $row;
			}
			
			return $data;
		}
		
		public function getDataWhere($table , $where){
			$sql = "SELECT * FROM $table WHERE $where";
			$stmt = $this->prepare($sql);
			$stmt->execute();
			$data = array();
			while ($row = $stmt->fetchObject()){
				$data[] = $row;
			}
			
			return $data;
		}
		
		public function addData($table , $data){
			$fields = array();
			$values = array();
			
			foreach ($data as $key => $value){
				$fields[] = "`$key`";
				$values[] = ":$key";
			}
			
			$fields = implode(", ", $fields);
			$values = implode(", ", $values);
			
			$sql = "INSERT INTO `$table`($fields) VALUES ($values)";
			
			$stmt = $this->prepare($sql);
			
			try {
				$stmt->execute($data);
			} catch(PDOException $e){
				echo $e;
				exit();
			}
			
			return $stmt->rowCount();
		}
		
		public function updateData($table , $data , $where){
			$fields = array();
			foreach ($data as $key => $value){
				$fields[] = "`$key` = :$key";
			}
			$fields = implode(", ", $fields);
			$sql = "UPDATE `$table` SET $fields WHERE $where";
			$stmt = $this->prepare($sql);
			try {
				$stmt->execute($data);
			} catch(PDOException $e){
				echo $e;
				exit();
			}
			
			return $stmt->rowCount();
		}
		
		public function deleteData($table , $where){

			$sql = "DELETE FROM `$table` WHERE $where";
			$stmt = $this->prepare($sql);
			
			try {
				$stmt->execute();
			} catch(PDOException $e){
				echo $e;
				exit();
			}
			
			return $stmt->rowCount();
		}
		
		
	}
?>