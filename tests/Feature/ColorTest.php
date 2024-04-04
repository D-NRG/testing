<?php

namespace Tests\Feature;

use App\Models\color;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ColorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
//    use RefreshDatabase;
    public function test_colors_store(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('color',[
                'name'=>'white',
            ]);

        $this->assertDatabaseHas('colors',[
            'name'=>'white'
        ]);
        $response->assertStatus(302);
//        $response->assertJsonPath('data.size',$size->size);
    }

    public function test_colors_show(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("color/1");


        $response->assertStatus(200);
    }

    public function test_colors_editStore(): void
    {
        $user = User::factory()->create();
//        $this->test_colors_store();
        $response = $this
            ->actingAs($user)
            ->post('color/edit', [
                'name'=>'white',
                'rename' => 'black',
            ]);
        $this->assertDatabaseMissing('colors', [
            'name' => 'white'
        ]);
        $this->assertDatabaseHas('colors', [
            'name' => 'black'
        ]);
        $response->assertStatus(302);
    }

    public function test_colors_delete(): void
    {
        $user = User::factory()->create();
//        $this->test_colors_store();
//        $this->test_colors_editStore();
        $response = $this
            ->actingAs($user)
            ->delete('color/black');
        $this->assertDatabaseMissing('colors',[
            'name' => 'black'
        ]);
        $response->assertStatus(302);
    }

}
