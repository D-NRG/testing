<?php

namespace Tests\Feature;

use App\Models\Categories;
use App\Models\Color;
use App\Models\Manufacture;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
//    use RefreshDatabase;
    public function test_products_store(): void
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->post('product',[
                'name'=>'T-shirt',
                'color'=>Color::get()->random()->name,
                'size'=>Size::get()->random()->name,
                'manufacture'=>Manufacture::get()->random()->name,
                'categories'=>Categories::get()->random()->name,
            ]);

        $this->assertDatabaseHas('products',[
            'name'=>'T-shirt'
        ]);
//        $response->assertStatus(302);
//        $response->assertJsonPath('data.product',$product->product);
    }

    public function test_products_editStore(): void
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->post('product/edit', [
                'name'=>'t-shirt',
                'rename' => 'm-shirt',
            ]);
        $this->assertDatabaseMissing('products', [
            'name' => 't-shirt'
        ]);
        $this->assertDatabaseHas('products', [
            'name' => 'm-shirt'
        ]);
//        $response->assertStatus(302);
    }

    public function test_products_delete(): void
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->delete('product/m-shirt');
        $this->assertDatabaseMissing('products',[
            'name' => 'm-shirt'
        ]);
//        $response->assertStatus(302);
    }

}
