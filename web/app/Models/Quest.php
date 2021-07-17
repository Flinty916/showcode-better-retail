<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Quest extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'node_id', 'reward'];

    public function node() {
        return $this->belongsTo(Node::class, 'node_id');
    }

    public function item() {
        return $this->belongsTo(NodeItem::class, 'item_id');
    }

    public function make() {
        $find = $this->getRandom($this->node->items, $this->item);
        $points = rand(50, 100);
        return "Go look for " . $find->name . " for " . $points . " points!";
    }

    public function getRandom(Collection $items, NodeItem $item) {
        $random = $items->random();
        if($random != $item)
            return $random;
        else
            return $this->getRandom($items, $item);
    }
}
