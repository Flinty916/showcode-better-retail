<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Shop $shop, $query) {
        $items = [];
        foreach ($shop->items() as $item)
            if(stripos($item->name, $query))
                $items[$item->id] = $item;
        return response(collect($items));
    }

    public function random6(Shop $shop) {
        return response($shop->items()->random(6));
    }

    public function collections4(Shop $shop) {
        return response($shop->nodeCollections->random(4));
    }
}
