<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandName extends Model
{
    use HasFactory;

    protected $fillable = ['brand_name' , 'brand_img'] ; 

    public function brand(){
        return $this->hasOne(Product::class , 'brand_id') ; 
    }

}
