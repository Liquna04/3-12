<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customers;
use App\Models\orders;
class Transaction extends Model
{
    use HasFactory;

    // Set the primary key to TransactionID
    protected $primaryKey = 'TransactionID';
    
    // Define fillable fields
    protected $fillable = [
        'CustomerID',
        'OrderID',
        'Amount',
        'TransactionDate'
    ];

    // Define date fields
    protected $dates = [
        'TransactionDate'
    ];

    // Relationship with Customer
    public function customer()
    {
        return $this->belongsTo(customers::class, 'CustomerID', 'CustomerID');
    }

    // Relationship with Order
    public function order()
    {
        return $this->belongsTo(orders::class, 'OrderID', 'OrderID');
    }
}