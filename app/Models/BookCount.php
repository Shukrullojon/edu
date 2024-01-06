<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $book_id
 * @property float $count
 * @property float $sale
 * @property float $price
 * @property float $sell_price
 * */

class BookCount extends Model
{
    use HasFactory;

    protected $table = 'book_count';

    protected $fillable = [
        'book_id',
        'count',
        'sale',
        'price',
        'sell_price',
    ];

}
