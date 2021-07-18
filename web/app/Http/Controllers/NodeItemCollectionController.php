<?php

namespace App\Http\Controllers;

use App\Http\Requests\NodeItemCollection\AddItemNodeCollectionRequest;
use App\Http\Requests\NodeItemCollection\CreateNodeItemCollectionRequest;
use App\Http\Requests\NodeItemCollection\RemoveItemNodeCollectionRequest;
use App\Http\Requests\NodeItemCollection\UpdateNodeItemCollectionRequest;
use App\Models\Node;
use App\Models\NodeItem;
use App\Models\NodeItemCollection;
use App\Models\Shop;
use Illuminate\Http\Request;

class NodeItemCollectionController extends Controller
{
    public function all(Shop $shop) {
        return response($shop->nodeCollections);
    }

    public function single(NodeItemCollection $collection) {
        return response([
            'collection' => $collection,
            'items' => $collection->items,
        ]);
    }

    public function create(CreateNodeItemCollectionRequest $request) {
        return response(NodeItemCollection::create($request));
    }

    public function update(NodeItemCollection $collection, UpdateNodeItemCollectionRequest $request) {
        $collection->update($request->all());
        return response($this->single($collection));
    }

    public function delete(NodeItemCollection $collection) {
        return response($collection->delete());
    }

    // Add / Remove NodeItems

    public function addItem(NodeItemCollection $collection, AddItemNodeCollectionRequest $request) {
        foreach ($request->input('items') as $item_id)
            $collection->addItem(NodeItem::findOrFail($item_id));
        return response($collection->items);
    }

    public function removeItem(NodeItemCollection $collection, RemoveItemNodeCollectionRequest $request) {
        $collection->items()->detach([$request->input('item')]);
        return response($collection->items);
    }
}
