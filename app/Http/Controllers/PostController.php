<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
	private $post;
	
	/** 
    * PostController constructor
    * @param \App\Post
    * @return void
    */

	public function __construct(Post $post)
	{
		$this->post=$post;
	}

	/** 
    * Display all Posts
    *
    *  @return \Illuminate\Http\Response
    *
    */

    public function index()
    {
    	$posts = $this->post->getAllPosts();
    	$posts=empty($posts)?["There are currently no Posts on our Blog. Please Check Later"]:$posts;
    	return response()->json(['data'=>$posts]);
    }

    /** 
    * Display Post with ID with related user and the associated comments 
    *
    * @var int
    * @return \Illuminate\Http\Response
    *
    */

    public function show($id)
    {
    	$post=$this->post->getPost($id);
    	$post=empty($post)?["There is no Post with ID({$id}) on our Blog. Please check the ID and try again"]:$post;
    	return response()->json(['data'=>$post]);
    }

}