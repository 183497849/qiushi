<?php
	class UserModel{
		public $mysqli;
		function __construct(){
			$this->mysqli = new Mysqli("localhost","root","","user");
		}
		function userAdd($name,$age,$password){
			$sql = "insert into user (name,age,password) value ('{$name}','{$age}','{$password}')";
			$res=$this->mysqli->query($sql);
			return $res;
		}
		function getUserLists(){
			$sql = "select * from user";
			$res = $this->mysqli->query($sql);
			$data=$res->fetch_all(MYSQL_ASSOC);
			return $data; 
		}

		function doDelete($id){
			$sql = "delete from user where id = {$id}";
			$res = $this->mysqli->query($sql);
			return $res;
		}

		function getUserUpdate(){
			$sql = "selete * from user where id={$id}";
			$res = $this->mysqli->query($sql);
			$data=$res->fetch_all(MYSQL_ASSOC);
			
		}
	}