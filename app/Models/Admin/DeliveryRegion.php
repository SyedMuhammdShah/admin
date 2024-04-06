<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryRegion extends \Illuminate\Database\Eloquent\Model{

    use SoftDeletes;

    protected $fillable = [
        "one_off_fee",
        "region",
        "region_tax",
    ];
}
