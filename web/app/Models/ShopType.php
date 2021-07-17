<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function shops() {
        return $this->hasMany(Shop::class, 'type_id');
    }
}
