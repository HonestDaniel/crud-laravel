<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';

    protected $fillable = [
        'name',
        'number'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
