<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'type_id', 'manager_id'];

    public function manager() {
        return $this->hasOne(User::class, 'shop_id');
    }

    public function type() {
        return $this->belongsTo(ShopType::class, 'type_id');
    }

    public function nodes() {
        return $this->hasMany(Node::class, 'shop_id');
    }

    public function items() {
        $items = [];
        foreach($this->nodes as $node)
            foreach($node->items as $item)
                $items[$item->id] = $item;
        return collect($items);
    }

    public function nodeCollections() {
        return $this->hasMany(NodeItemCollection::class, 'shop_id');
    }
}
