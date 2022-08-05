<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategorieProduit extends Model
{
    use HasFactory;

    //fonction relation one to many(ici une actegorie peut detenir plusieurs produits)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
