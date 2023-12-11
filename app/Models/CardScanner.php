<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CardScanner extends Pivot
{
    protected $table = 'card_scanner';

    protected $fillable = [
        'is_success',
        'transaction_amount',
        'created_at',
        'updated_at', 
    ];
}
