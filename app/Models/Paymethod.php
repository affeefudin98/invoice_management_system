<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'bank_no',
        'method'
    ];

    //one payment method have many invoices
    public function invoices() 
    {
        return $this->hasMany(Invoice::class);
    }

    //one payment method belongs to one user
    public function user() 
    {
        return $this->belongsTo(Invoice::class);
    }
}
