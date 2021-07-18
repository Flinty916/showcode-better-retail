<?php

namespace App\Http\Controllers;

use App\Http\Requests\Shop\CreateShopRequest;
use App\Http\Requests\Shop\UpdateShopRequest;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function all() {
        return response(Shop::all());
    }

    public function single(Shop $shop) {
        return response([
            'shop' => $shop,
            'nodes' => $shop->nodes,
            'items' => $shop->items(),
            'collections' => $shop->nodeCollections,
        ]);
    }

    public function create(CreateShopRequest $request) {
        return response(Shop::create($request->all()));
    }

    public function update(Shop $shop, UpdateShopRequest $request) {
        $shop->update($request->all());
        return response($shop);
    }

    public function delete(Shop $shop) {
        return response($shop->delete());
    }
}
