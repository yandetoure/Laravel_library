<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','image', 'publication_date', 'publisher_id','shelf_id','category_id','isbn', 'autor_id'];



    public function category() {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    public function shelf() {
        return $this->belongsTo(Shelve::class, 'shelf_id');
    }

    public function publisher() {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function autor() {
        return $this->belongsTo(Autor::class, 'autor_id');
    }
    
}
