<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSpend extends Model
{
    use HasFactory;

    protected $table = 'payment_spends';

    protected $guarded = [];
}
