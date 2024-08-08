<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'fuel', 'age', 'manufacturer_id', 'dir_img'];
    protected $casts = [
        'items' => 'array'
    ];


    public function manufacturer(){
        // uma fabricante
        return $this->belongsTo(Manufacture::class, 'manufacturer_id');
    }

   
}
