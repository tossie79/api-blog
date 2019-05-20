<?php

use App\User;
use App\Post;
use App\Comment;
use Carbon\Carbon;
use Faker\Factory;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

class PostTest extends TestCase
{
 
  use DatabaseTransactions;
  
  public function setUp()
  {
      parent::setUp();
      Artisan::call('db:seed');
  }
   
  
  public function testRoute()
  {
       $response = $this->get('/');

        $this->assertEquals(200, $this->response->status());
  }



/**
 * Tests the showpost route and assert that it is valid
 * @method testShowPostRoute
 */
  public function testShowPostRoute()
  {
      $response = $this->json('GET', '/api/v1/posts/1', [])
      -> assertEquals(200, $this->response->status());

  }

  /**
  * /api/v1/posts/1 [GET]
  * @method testShouldReturnSinglePost
  * @return Response
  */
  public function testShouldReturnSinglePost()
  {
      $this->get("/api/v1/posts/2", []);
      $this->seeStatusCode(200);
      $this->seeJsonStructure(
          ['data' =>
             [
                  'id',
                  'title',
                  'content',
                  'username',
                  'comments'
              ]
            ]    
        );
        
  }

  /**
  * /api/v1/posts [GET]
  * @method testShouldReturnAllPosts
  * @return Response
  */
  public function testShouldReturnAllPosts(){
      $this->get("/api/v1/posts", []);
      $this->seeStatusCode(200);
      $this->seeJsonStructure([
          'data' => ['*' =>
              [
                  'id',
                  'title',
                  'content',
                  'user_id'
              ]
          ],
          
      ]);
      
  }


  
}