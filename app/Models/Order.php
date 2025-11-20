<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
    'customer_id',
    'order_date',
    'order_timestamp',
    'order_total',
    'tax_total',
    'shipping_total',
    'delivery_address',
    'payment_type',
    'order_status',
    'delivery_status',
    'payment_status',
    'currency',
    'transaction_id',
  ];

  public function orderDetails(): HasMany
  {
    return $this->hasMany(OrderDetail::class);
  }
}
