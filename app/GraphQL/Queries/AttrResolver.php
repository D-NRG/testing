<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Attr;

final class AttrResolver
{
    /**
     * @param null $_
     * @param array{} $args
     */
    public function __invoke($_, array $args)
    {
        return Attr::all();
    }

    public function show($_, array $args)
    {
        return Attr::findOrFail($args["id"]);
    }
    public function create($_, array $args)
    {
        return Attr::create(['color_id' => $args["color_id"],'size_id' => $args["size_id"],
            'manufacture_id' => $args["manufacture_id"],'categories_id' => $args["categories_id"],
            'product_id' => $args["product_id"]]);
    }

    public function update($_, array $args)
    {
        if (Attr::where('id', $args["id"])->update([$args["column"] => $args["attr_id"]])) return Attr::findOrFail($args["id"]);
    }
}
