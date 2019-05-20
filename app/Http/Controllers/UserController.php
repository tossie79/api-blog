<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\Contracts\SendEmailInterface;

class UserController extends Controller
{
	private $user;
	private $email;

	/**
	 * Constructor 
	 * @param \App\User
	 * @param \App\Services\Contracts\SendEmailInterface
	 * @return void
	*/

	public function __construct(User $user,SendEmailInterface $email)
	{
		$this->user=$user;
		$this->email=$email;
	}

	/** 
    * Display all Users
    *
    *  @return \Illuminate\Http\Response
    */
    public function index():Response
    {
    	$users = $this->user->getAllUsers();
    	$users=empty($users)?["There are currently no Users on our Blog. Please Check Later"]:$users;
        return response()->json(['data' => $users], 200);
    }

 	

    /** 
    * Delete User with Id and email the user
    * @param int
    *  @return \Illuminate\Http\Response
    */
    public function destroy($id):Response
    {
    	$userDetails = $this->user->deleteUser($id);
    	if(!empty($userDetails)){
    		$this->email->sendMail($userDetails);
    		return response()->json(['message' => "{$userDetails['name']} with ID: {$id} has been successfully deleted from our system"], 200);
    	}
    	return response()->json(['message' => "There was an issue deleting the User with ID:{$id}"], 200);
     
    }

    
}