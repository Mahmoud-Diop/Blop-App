<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // Table associée (optionnel si le nom est bien "posts") protected $table = 'posts'; 
    // Colonnes autorisées pour l’insertion en masse  // ta nouvelle colonne 
    protected $fillable = [
        'title',
        'image',
        'slug',
        'CreationDate',
        'like',
        'user_id',
        'category_id',
        'content',
    ];
    // Relations 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
