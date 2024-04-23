<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Attr;
use App\Models\Categories;
use App\Models\Color;
use App\Models\Manufacture;
use App\Models\Product;

final class ProductResolver
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Product::all();
    }
    public function show($_,array $args){
        return Product::findOrFail($args["id"]);
    }
    public function create($_, array $args)
    {
        return Product::create(['name' => $args["name"]]);
    }

    public function update($_, array $args)
    {
        if (Product::where('id', $args["id"])->update(['name' => $args["name"]])) return Product::findOrFail($args["id"]);
    }
}
