<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     /** 
      *@test 
     */
     
    public function redirect_to_login_Test()
    {
        $response=$this->get('/home')
        ->assertRedirect('/login');
    }

    /**
     * @test 
    */
    public function authenticate_user_can_visit_home_Test()
    {
        $this->actingAs(factory(User::class)->create());

        $response=$this->get('/home')
        ->assertOk();
    }
    /**
     * @test 
    */
    public function store_posts_method_Test()
    {
        $this->actingAs(factory(User::class)->create([
            'role_id'=>'1'
        ]));
        $this->withoutExceptionHandling();
        $response=$this->put('/post-store',[
            'title'=>'abc',
            'description'=>'anannnannnannnna',
            
            'user_id'=>'13'
           
        ]);
        $this->assertCount(1, Post::all());
    }
    /**
     * @test 
    */
    public function check_for_already_exit_user_Test()
    {
        $this->browse(function ($browser) {           
            $browser->visit('/register')              
                ->assertSee('Register')               
                ->type('name', 'Webber Wang')         
                ->type('email', 'admin@admin.com') 
                ->type('password', 'password')        
                ->press('Register');                   
        });  
           
         $this->assertDatabaseHas('users', [
                 'email' => 'admin@admin.com'
         ]);
    }
}
