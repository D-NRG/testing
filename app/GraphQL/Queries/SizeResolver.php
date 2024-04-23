<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Size;

final class SizeResolver
{
    /**
     * @param null $_
     * @param array{} $args
     */
    public function __invoke($_, array $args)
    {
        return Size::all();
    }

    public function show($_, array $args)
    {
        return Size::findOrFail($args["id"]);
    }
    public function create($_, array $args)
    {
        return Size::create(['name' => $args["name"]]);
    }

    public function update($_, array $args)
    {
        if (Size::where('id', $args["id"])->update(['name' => $args["name"]])) return Size::findOrFail($args["id"]);
    }
}
