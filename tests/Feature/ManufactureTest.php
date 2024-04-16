<?php

namespace Tests\Feature;

use App\Models\manufacture;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManufactureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
//    use RefreshDatabase;
    public function test_manufactures_store(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('manufacture',[
                'name'=>'minsk',
            ]);

        $this->assertDatabaseHas('manufactures',[
            'name'=>'minsk'
        ]);
        $response->assertStatus(201);

//        $response->assertJsonPath('data.size',$size->size);
    }

    public function test_manufactures_show(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("manufacture/1");



    }

    public function test_manufactures_update(): void
    {
        $user = User::factory()->create();
//        $this->test_manufactures_store();
        $response = $this
            ->actingAs($user)
            ->post('manufacture/edit', [
                'name'=>'minsk',
                'rename' => 'gomel',
            ]);
        $this->assertDatabaseMissing('manufactures', [
            'name' => 'minsk'
        ]);
        $this->assertDatabaseHas('manufactures', [
            'name' => 'gomel'
        ]);

    }

    public function test_manufactures_destroy(): void
    {
        $user = User::factory()->create();
//        $this->test_manufactures_store();
//        $this->test_manufactures_store();
        $response = $this
            ->actingAs($user)
            ->delete('manufacture/gomel');
        $this->assertDatabaseMissing('manufactures',[
            'name' => 'gomel'
        ]);
        $response->assertStatus(204);
    }

}
