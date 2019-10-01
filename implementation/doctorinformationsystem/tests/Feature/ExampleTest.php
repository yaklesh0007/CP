<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /** @test */
    public function login_displays_validation_errors()
    {
        $response = $this->post('/login', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }
    /**
     * @test 
    */
    public function aboutusTest()
    {
        $response=$this->get('/about');

        $response->assertStatus(200);
    }
     /**
     * @test 
    */
    public function contact_us_Test()
    {
        $response=$this->get('/contact');

        $response->assertStatus(200);   
    }

}
