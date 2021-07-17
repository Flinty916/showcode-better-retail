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
        return collect([
            "quest" => "Go look for " . $this->item->name . " for " . $points . " points!",
            "hint" => "It's near " . $find->name . "...",
        ]);
    }

    public function getRandom(Collection $items, NodeItem $item) {
        $random = $items->random();
        if($random != $item)
            return $random;
        else
            return $this->getRandom($items, $item);
    }

    public function complete(User $user) {
        return QuestReward::create([
            'points' => $this->points,
            'user_id' => $user->id,
        ]);
    }
}
