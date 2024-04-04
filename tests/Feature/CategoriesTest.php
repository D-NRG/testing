<?php

namespace Tests\Feature;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
//    use RefreshDatabase;
    public function test_categories_store(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('category',[
                'name'=>'car',
            ]);

        $this->assertDatabaseHas('categories',[
            'name'=>'car'
        ]);
        $response->assertStatus(302);
//        $response->assertJsonPath('data.size',$size->size);
    }

    public function test_categories_show(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("category/1");


        $response->assertStatus(200);
    }

    public function test_categories_editStore(): void
    {
        $user = User::factory()->create();
//        $this->test_colors_store();
        $response = $this
            ->actingAs($user)
            ->post('category/edit', [
                'name' => 'car',
                'rename' => 'far',
            ]);
        $this->assertDatabaseMissing('categories', [
            'name' => 'car'
        ]);
        $this->assertDatabaseHas('categories', [
            'name' => 'far'
        ]);
        $response->assertStatus(302);
    }

    public function test_categories_delete(): void
    {
        $user = User::factory()->create();
//        $this->test_categories_store();
//        $this->test_categories_editStore();
        $response = $this
            ->actingAs($user)
            ->delete('category/far');
        $this->assertDatabaseMissing('categories',[
            'name' => 'far'
        ]);
        $response->assertStatus(302);
    }

}
