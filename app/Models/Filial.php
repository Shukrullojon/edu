<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filial extends Model
{
    use HasFactory;

    static $statuses = [
        1 => "✅ Active",
        0 => "📦 Archive",
    ];

    protected $table = 'filials';

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['name'])) {
            $query->where('name', 'like', "%{$filters['name']}%");
        }
        if (isset($filters['address'])) {
            $query->where('address', 'like', "%{$filters['address']}%");
        }
        if (isset($filters['phone'])) {
            $query->where('phone', 'like', "%{$filters['phone']}%");
        }
        if (isset($filters['room_count'])) {
            $query->where('room_count', 'like', "%{$filters['room_count']}%");
        }
        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        return $query;
    }
}
