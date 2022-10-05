<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'Pending' => 'Pending',
        'Processing' => 'Processing',
        'On Way' => 'On Way',
        'Delivered' => 'Delivered',
        'Cancelled' => 'Cancelled',
        'Paid' => 'Paid',
    ];

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_no',
        'client_name',
        'client_phone',
        'email',
        'shipping_address',
        'notes',
        'payment_id',
        'shipping_id',
        'total',
        'status',
        'updatedby_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_id');
    }

    public function shipping()
    {
        return $this->belongsTo(ShippingType::class, 'shipping_id');
    }

    public function updatedby()
    {
        return $this->belongsTo(User::class, 'updatedby_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
