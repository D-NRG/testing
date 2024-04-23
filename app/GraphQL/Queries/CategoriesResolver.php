<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Categories;

final class CategoriesResolver
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Categories::all();
    }
    public function show($_,array $args){
        return Categories::findOrFail($args["id"]);
    }
    public function create($_, array $args)
    {
        return Categories::create(['name' => $args["name"]]);
    }

    public function update($_, array $args)
    {
        if (Categories::where('id', $args["id"])->update(['name' => $args["name"]])) return Categories::findOrFail($args["id"]);
    }
}
