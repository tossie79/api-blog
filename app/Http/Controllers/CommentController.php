<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CommentController extends Controller
{
	private $comment;
	
	/** 
    * PostController constructor
    * @param \App\Comment
    * @return void
    */

	public function __construct(Comment $comment)
	{
		$this->comment=$comment;
	}

	/** 
    * Display all Comments
    *
    *  @return \Illuminate\Http\Response
    *
    */

    public function index()
    {
    	$comments = $this->comment->getAllComments();
    	$comments=empty($comments)?["There are currently no Comments on our Blog. Please Check Later"]:$comments;
    	return response()->json(['data'=>$comments]);
    }
   
    
}