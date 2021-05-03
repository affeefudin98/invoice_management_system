<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_no',
        'method',
        'invoice_id'
    ];

    //one payment method have many invoices
    public function invoices() 
    {
        return $this->hasMany(Invoice::class);
    }
}
