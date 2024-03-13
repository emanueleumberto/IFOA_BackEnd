<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Libro extends Model
{
    use HasFactory;

    /* public function autores(): HasMany {
        return $this->hasMany(Autore::class);
    }

    public function categorie(): HasMany {
        return $this->hasMany(Categoria::class);
    } */
}
