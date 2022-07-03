<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable = [
        'fullname',
        'phone',
        'email',
        'address',
        'payment_id',
        'country',
        'deliverycharges',
        'grandtotal',
        'payment_mode',
        'tracking_num',
        'status',
        'remark',
    ];




    public function orderitems(){
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }
}
