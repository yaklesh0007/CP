<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Slider;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class sliderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function authenticated_user_can_add_slider()
    {
        $this->actingAs(factory(User::class)->create());
        
        $slider = factory('App\Slider')->make();
        
        $this->post('/slider-store',$slider->toArray());
        
        $this->assertEquals(1,Slider::all()->count());
    }
}
