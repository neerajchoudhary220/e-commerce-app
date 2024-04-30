<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementProduct extends Model
{
    use HasFactory;
    protected $table ='measurement_product';
    protected $fillable =['price','product_id','measure_id'];
    
}
