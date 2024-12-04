<?php

namespace App\Http\Controllers\API;

use App\Enums\StatusTransaction;
use App\Enums\TypeTransaction;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{
    public $token;

    public function __construct()
    {
        $this->token = base64_encode('Yehosafat Bezaleel C');
    }

    public function deposit(Request $request)
    {
        try {
            $validated = $request->validate([
                'amount' => 'required|numeric|min:1',
                'order_id' => 'required|string',
                'created_at' => 'required|date',
            ]);

            $transaction = Transaction::create([
                'order_id' => $validated['order_id'],
                'type' => TypeTransaction::DEPOSIT,
                'amount' => $validated['amount'],
                'status' => StatusTransaction::SUCCESS,
                'created_at' => $validated['created_at'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Transaction successfully created',
                'data' => $transaction,
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function withdrawal(Request $request)
    {
        try {
            $validated = $request->validate([
                'amount' => 'required|numeric|min:1',
                'order_id' => 'required|string',
                'created_at' => 'required|date',
            ]);

            $transaction = Transaction::create([
                'order_id' => $validated['order_id'],
                'type' => TypeTransaction::WITHDRAWAL,
                'amount' => $validated['amount'],
                'status' => StatusTransaction::SUCCESS,
                'created_at' => $validated['created_at'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Transaction successfully created',
                'data' => $transaction,
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
