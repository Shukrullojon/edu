<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    protected $table = 'directions';

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['name'])) {
            $query->where('name', 'like', "%{$filters['name']}%");
        }

        if (isset($filters['filial_id'])) {
            $query->where('filial_id', $filters['filial_id']);
        }
        return $query;
    }

    public function filial()
    {
        return $this->belongsTo(Filial::class);
    }
}
