<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Color;

final class ColorResolver
{
    /**
     * @param null $_
     * @param array{} $args
     */
    public function __invoke($_, array $args)
    {
        return Color::all();
    }

    public function show($_, array $args)
    {
        return Color::findOrFail($args["id"]);
    }

    public function create($_, array $args)
    {
        return Color::create(['name' => $args["name"]]);
    }

    public function update($_, array $args)
    {
        if (Color::where('id', $args["id"])->update(['name' => $args["name"]])) return Color::findOrFail($args["id"]);
    }

//    public function delete($_, array $args){
//        return Color::where('id', $args["id"])->delete();
//    }
}
