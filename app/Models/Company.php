<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'contact',
        'email',
        'website',
        'PIC_name',
        'PIC_id'
    ];

    //one company can buy many product
    public function products() 
    {
        return $this->belongsToMany(Product::class);
    }

    //one company belongs to one user
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    //one company receive many invoice
    public function invoices() 
    {
        return $this->hasMany(Invoice::class);
    }
}
