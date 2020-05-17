<?php namespace App\Controllers;

use App\Models\UserModel;
class Home extends BaseController
{
	public function index()
	{
		return view('index');
	}

	public function allData(){
		$post 		= json_decode(file_get_contents('php://input'));
		#echo json_encode($post); return;
		$userModel 	= new UserModel();
		if(!empty($post->search))
		{
			$userModel->like('name', $post->search);
		}
		$actors = $userModel->findAll();
		echo json_encode($actors);
	}

}
