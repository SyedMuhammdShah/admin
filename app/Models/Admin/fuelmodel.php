<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fuelmodel extends Model
{
    protected $table = 'fuelmodel';

    use HasFactory;
    protected $fillable = ['fuel_name', 'fuel_price', 'fuel_unit'];
}
