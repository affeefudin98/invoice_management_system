<?php

namespace App\Http\Controllers\Client;
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
        $totalInvoices = \DB::table('invoices')->where('user_id', Auth::user()->id)->count();
        //$totalUsers = \DB::table('users')->count();
        $totalCompanies = \DB::table('companies')->where('user_id', Auth::user()->id)->count();
        $totalProducts = \DB::table('products')->where('user_id', Auth::user()->id)->count();
        $totalPaymethods = \DB::table('paymethods')->where('user_id', Auth::user()->id)->count();

        return view('dashboard')
        ->with('totalInvoices', $totalInvoices)
        //->with('totalUsers', $totalUsers)
        ->with('totalCompanies', $totalCompanies)
        ->with('totalPaymethods', $totalPaymethods)
        ->with('totalProducts', $totalProducts);
    }
}
