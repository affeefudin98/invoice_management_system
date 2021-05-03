<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    //one product belongs to many company
    public function companies() 
    {
        return $this->belongsToMany(Company::class);
    }

    //one product belongs to many invoice
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }

    //one product belongs to one user
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
