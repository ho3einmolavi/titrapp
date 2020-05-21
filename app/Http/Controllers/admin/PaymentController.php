<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::Filter()->latest()->paginate(20);
        return view('admin.payment.list', compact('payments'));
    }
}
