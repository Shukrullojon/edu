<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookCount;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'book' => [
                    'name' => 'English 1'
                ],
                'count' => [
                    'count' => 50,
                    'price' => 20000,
                    'sell_price' => 25000
                ],
            ],
            [
                'book' => [
                    'name' => 'English 2'
                ],
                'count' => [
                    'count' => 70,
                    'price' => 18000,
                    'sell_price' => 20000
                ],
            ],
            [
                'book' => [
                    'name' => 'English 3'
                ],
                'count' => [
                    'count' => 70,
                    'price' => 18000,
                    'sell_price' => 20000
                ],
            ],
            [
                'book' => [
                    'name' => 'English 4'
                ],
                'count' => [
                    'count' => 150,
                    'price' => 40000,
                    'sell_price' => 45000
                ],
            ],
        ];
        foreach ($data as $d) {
            $book = Book::create($d['book']);
            BookCount::updateOrCreate([
                'book_id' => $book->id
            ],$d['count']);
        }
    }
}
