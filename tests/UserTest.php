<?php

use App\User;
use App\Post;
use App\Comment;
use Carbon\Carbon;
use Faker\Factory;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
class UserTest extends TestCase
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
  	* /api/v1/users [GET]
  	* @method testShouldReturnAllUsers
 	 * @return Response
  	*/
  	public function testShouldReturnAllUsers(){
      	$this->get("/api/v1/users", []);
      	$this->seeStatusCode(200);
      	$this->seeJsonStructure([
          	'data' => ['*' =>
              	[
                 	"id",
            		"name",
            		"email",
            		"created_at",
            		"updated_at"
              	]
          	],
          
      	]);
      
  	}

    /**
   * Test delete user and assert response status
   * @method testDeleteUser
   */

    public function testDeleteUser()
    {
       	$response = $this->delete('/api/v1/users/1', [
        'http_errors' => false
   		])-> assertEquals(200, $this->response->status());
    }

    

  	

    
  
}