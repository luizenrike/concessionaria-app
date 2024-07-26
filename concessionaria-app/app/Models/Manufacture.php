<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cars(){
        //muitos carros
        return $this->hasMany(Car::class);
    }
}
