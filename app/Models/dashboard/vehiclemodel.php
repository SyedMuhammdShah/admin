<?php

namespace App\Models\dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiclemodel extends Model
{
    use HasFactory;
    protected $fillable = ['vehicle_name', 'vehicle_mileage'];
}
