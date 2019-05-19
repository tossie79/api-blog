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
    public function index()
    {
    	$users = User::all();
    	$users=empty($users)?["There are currently no Users on our Blog. Please Check Later"]:$users;
        return response()->json(['data' => $users], 200);
    }

 	/** 
    * Show User with Id
    *
    * @param int
    * @return  \Illuminate\Http\Response
    */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json(['message' => "The user with {$id} doesn't exist"], 404);
        }
        return response()->json(['data' => $user], 200);
    }

    /** 
    * Delete User with Id and email the user
    * @param int
    *  @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
    	$userDetails = $this->user->deleteUser($id);
    	if(!empty($userDetails)){
    		$this->email->sendMail($userDetails);
    		return response()->json(['data' => "{$userDetails['name']} with ID: {$id} has been successfully deleted from our system"], 200);
    	}
    	return response()->json(['data' => "There was an issue deleting the User with ID:{$id}"], 200);
     
    }

    
}