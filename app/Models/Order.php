<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = 'orders'; // Specify the table name if it's different from the default convention
    public $timestamps = false;

    protected $fillable = [
        'customerName',
        'orderType',
        'nominalOrder',
        'orderWeight',
        'orderDate',
        'orderStatus',
        'dateWashed',
        'dateIroned',
        'dateReady'
    ];

}
