<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fuelmodel extends Model
{
    use HasFactory;
    protected $fillable = ['fuel_name', 'fuel_price', 'fuel_unit'];
}
