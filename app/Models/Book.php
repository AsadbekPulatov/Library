<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_name',
        'author_name',
        'language',
        'year',
        'count',
        'price',
        'type_id',
    ];

    protected $attributes = [
        'type_id' => 0,
        'year' => 0,
        'language' => 'null',
        'author_name' => 'null',
        'book_name' => 'null',
        'count' => 0,
        'price' => 0,
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
