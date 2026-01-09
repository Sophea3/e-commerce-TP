<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
    ];

    public function category() {
        return $this->belongTo(category::class , 'category_id');
        
    }

}
