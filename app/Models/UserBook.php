<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $book_id
 * @property int $user_id
 * @property float $count
 * @property float $price
 * */


class UserBook extends Model
{
    use HasFactory;

    protected $table = 'user_book';

    protected $fillable = [
        'book_id',
        'user_id',
        'count',
        'price',
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
