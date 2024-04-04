<?php

namespace Tests\Feature;

use App\Models\Size;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SizeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
//    use RefreshDatabase;
    public function test_sizes_store(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('size',[
                'name'=>'XXL',
            ]);

        $this->assertDatabaseHas('sizes',[
            'name'=>'XXL'
        ]);
        $response->assertStatus(302);
//        $response->assertJsonPath('data.size',$size->size);
    }

    public function test_sizes_show(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("size/1");


        $response->assertStatus(200);
    }

    public function test_sizes_editStore(): void
    {
        $user = User::factory()->create();
//        $this->test_sizes_store();
        $response = $this
            ->actingAs($user)
            ->post('size/edit', [
                'name'=>'xxl',
                'rename' => 'xl',
            ]);
        $this->assertDatabaseMissing('sizes', [
            'name' => 'xxl'
        ]);
        $this->assertDatabaseHas('sizes', [
            'name' => 'xl'
        ]);
        $response->assertStatus(302);
    }

    public function test_sizes_delete(): void
    {
        $user = User::factory()->create();
//        $this->test_sizes_store();
//        $this->test_sizes_editStore();
        $response = $this
            ->actingAs($user)
            ->delete('size/xl');
        $this->assertDatabaseMissing('sizes',[
            'name' => 'xl'
        ]);
        $response->assertStatus(302);
    }

}
