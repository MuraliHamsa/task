<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
 protected $fillable = ['invoiceid',
'orderid',
'suppliername',
'product',
'quantity',
'price',
'gstpercent',
'totalamount',
  'gstamount'];


    

}
