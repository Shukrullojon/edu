<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    static $statuses = [
        1 => "✅ Active",
        0 => "📦 Archive",
    ];

    protected $table = 'rooms';

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['name'])) {
            $query->where('name', 'like', "%{$filters['name']}%");
        }
        if (isset($filters['filial_id'])) {
            $query->where('filial_id', $filters['filial_id']);
        }
        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        return $query;
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }
}
