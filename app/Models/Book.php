<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable =[
        'title',
        'author',
        'isbn',
        'description',
        'category',
        'publication_date',
        'image',
        'trade_price',
        'retail_price',
        'quantity'
        
    ];
}
