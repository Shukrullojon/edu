<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRow extends Model
{
    use HasFactory;

    protected $table = 'payment_rows';

    protected $guarded = [];
}
