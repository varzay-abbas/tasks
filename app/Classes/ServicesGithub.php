<?php 

namespace App\Classes {


class ServicesGithub 
{

	public static function getUsers()
	{
		$str = file_get_contents('https://gitlab.iterato.lt/snippets/3/raw');
		$users = json_decode($str, false);
		return $users;
   
	}

}

}
