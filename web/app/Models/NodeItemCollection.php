<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NodeItemCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'shop_id'
    ];

    public function items() {
        return $this->belongsToMany(NodeItem::class, 'collection_node_item');
    }

    public function addItem(NodeItem $item) {
        $this->items()->sync([$item->id], false);
    }
}
