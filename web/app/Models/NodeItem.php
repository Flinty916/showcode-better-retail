<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NodeItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'node_id', 'price', 'description'];

    public function node() {
        return $this->belongsTo(Node::class, 'node_id');
    }
}
