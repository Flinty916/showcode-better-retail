<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NodeType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function nodes() {
        return $this->hasMany(Node::class, 'type_id');
    }
}
