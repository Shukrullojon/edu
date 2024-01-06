<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property String $name
 * */
class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'name',
    ];

    public function cnt()
    {
        return $this->hasOne(BookCount::class)->where('count', '>', 0);
    }

    public function book_sum()
    {
        return $this->hasOne(BookCount::class, 'book_id', 'id')
            ->select(
                DB::raw('sum(count) as count'),
                DB::raw('sum(sale) as sale'),
            );
    }
}
