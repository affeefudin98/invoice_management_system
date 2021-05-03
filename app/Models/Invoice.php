<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_created',
        'due_date',
        'user_id',
        'company_id',
        'paymethod_id'
    ];

    //One invoice has many products
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    //One invoice belongs to one user
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    //one invoice belongs to one company
    public function company() 
    {
        return $this->belongsTo(Company::class);
    }

    //one invoice belongs to one payment method
    public function paymethod() 
    {
        return $this->belongsTo(Paymenthod::class);
    }
}
