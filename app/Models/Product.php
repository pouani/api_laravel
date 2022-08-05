<?php

namespace App\Models;

use App\Models\CategorieProduit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function categorie_product()
    {
        return $this->belongsTo(CategorieProduit::class);
    }
}
