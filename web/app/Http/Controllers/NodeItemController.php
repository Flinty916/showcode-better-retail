<?php

namespace App\Http\Controllers;

use App\Http\Requests\NodeItem\CreateNodeItemRequest;
use App\Http\Requests\NodeItem\UpdateNodeItemRequest;
use App\Models\NodeItem;
use App\Models\Shop;
use Illuminate\Http\Request;

class NodeItemController extends Controller
{
    public function all(Shop $shop) {
        return response($shop->items());
    }

    public function single(Shop $shop, NodeItem $item) {
        return response($item);
    }

    public function create(Shop $shop, CreateNodeItemRequest $request) {
        return response(NodeItem::create($request->all()));
    }

    public function update(Shop $shop, NodeItem $item, UpdateNodeItemRequest $request) {
        $item->update($request->all());
        return response($item);
    }

    public function delete(NodeItem $item) {
        return response($item->delete());
    }
}
