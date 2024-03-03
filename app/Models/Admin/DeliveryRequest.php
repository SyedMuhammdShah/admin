<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_address',
        'delivery_address',
        'one_off_fee',
        'total_miles',
        'delivery_region',
        'vehicle',
        'fuel',
        'delivery_weight',
        'no_of_items',
        'customer_name',
        'customer_phone',
        'customer_email',
    ];
}
