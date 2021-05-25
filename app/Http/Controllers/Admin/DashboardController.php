<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use App\Models\Paymethod;
use DB;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInvoices = \DB::table('invoices')->count();
        //$totalUsers = \DB::table('users')->count();
        $totalCompanies = \DB::table('companies')->count();
        $totalProducts = \DB::table('products')->count();
        $totalPaymethods = \DB::table('paymethods')->count();

        return view('dashboard')
        ->with('totalInvoices', $totalInvoices)
        //->with('totalUsers', $totalUsers)
        ->with('totalCompanies', $totalCompanies)
        ->with('totalPaymethods', $totalPaymethods)
        ->with('totalProducts', $totalProducts);
    }
}
