<?php
	class UserController{
		function add(){
			include "./view/user/add.html";
		}

		function doAdd(){
			$name=$_POST['name'];
			$age=$_POST['age'];
			$password=$_POST['password'];
			if(empty($name) || empty($age) || empty($password)){
				header('Refresh:3,Url=index.php?c=User&a=lists');
				echo "添加失败，参数错误三秒后返回lists";
				die();
			}
			$userModel = new UserModel();
			$status = $userModel->userAdd($name,$age,$password);
			if($status){
				header("Refresh:1,Url=index.php?c=User&a=lists");
				echo"添加成功，一秒后返回lists";
				die();
			}else{
				header("Refresh:3,Url=index.php?c=User&a=lists");
				echo"添加失败，三秒后返回lists";
				die();
			}
		}

		function lists(){
			$userModel = new UserModel();
			$data = $userModel->getUserLists();
			include "./view/user/lists.html";

		}
		function delete(){
			$id = $_GET['id'];
			$userModel = new UserModel();
			$status = $userModel->doDelete($id);
			if($status){
				header("Refresh:1,Url=index.php?c=User&a=lists");
				echo"删除成功，一秒后返回lists";
				die();
			}else{
				header("Refresh:30,Url=index.php?c=User&a=lists");
				echo"删除失败，三秒后返回lists";
				die();
			}
		}

		function update(){
			$id = $_GET['id'];
			$userModel = new UserModel();
			$userModel->getUserUpdate($id);
			include "./view/user/update.html";
		}

	}