<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionCollection;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::get();

        return Inertia::render('Dashboard', [
            'transactions' => new TransactionCollection($transactions),
        ]);
    }
}
