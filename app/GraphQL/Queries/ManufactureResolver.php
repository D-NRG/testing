<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Manufacture;

final class ManufactureResolver
{
    /**
     * @param null $_
     * @param array{} $args
     */
    public function __invoke($_, array $args)
    {
        return Manufacture::all();
    }

    public function show($_, array $args)
    {
        return Manufacture::findOrFail($args["id"]);
    }
    public function create($_, array $args)
    {
        return Manufacture::create(['name' => $args["name"]]);
    }

    public function update($_, array $args)
    {
        if (Manufacture::where('id', $args["id"])->update(['name' => $args["name"]])) return Manufacture::findOrFail($args["id"]);
    }
}
