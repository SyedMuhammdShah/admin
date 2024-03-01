<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculate_Delivery_Cost_Model extends Model
{
    use HasFactory;
    protected $fillable = ['collection_addr', 'delivery_addr', 'vehicle_name','fuel','delivery_weight','delivery_regin','one_off_fee','total_cost'];
}
