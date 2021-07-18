<?php

namespace App\Http\Controllers;

use App\Http\Requests\Node\CreateNodeRequest;
use App\Http\Requests\Node\UpdateNodeRequest;
use App\Models\Node;
use App\Models\Shop;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    public function all(Shop $shop) {
        return response($shop->nodes);
    }

    public function single(Shop $shop, Node $node) {
        return response(['node' => $node, 'items' => $node->items]);
    }

    public function create(CreateNodeRequest $request) {
        return response(Node::create($request->all()));
    }

    public function update(Shop $shop, Node $node, UpdateNodeRequest $request) {
        $node->update($request->all());
        return response($node);
    }

    public function delete(Shop $shop, Node $node) {
        return response($node->delete());
    }
}
