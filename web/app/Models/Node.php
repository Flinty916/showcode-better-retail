<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type_id', 'coordX', 'coordY', 'sizeX', 'sizeY'];

    public function items() {
        return $this->hasMany(NodeItem::class, 'node_id');
    }

    public function shop() {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
