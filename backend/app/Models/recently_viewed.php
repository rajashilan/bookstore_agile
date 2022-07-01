<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recently_viewed extends Model
{
    use HasFactory;

    protected $table = 'recently_viewed';
    protected $fillable = [
        'id', 'book_cat', 'viewed_by', 'created_at', 'updated_at'
    ];
}
