<?php

namespace Database\Seeders;

use App\Enums\StatusTransaction;
use App\Enums\TypeTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            [
                'order_id' => 'DP' . strtoupper(uniqid()),
                'type' => TypeTransaction::DEPOSIT,
                'amount' => 150000.00,
                'status' => StatusTransaction::SUCCESS,
            ],
            [
                'order_id' => 'WD' . strtoupper(uniqid()),
                'type' => TypeTransaction::WITHDRAWAL,
                'amount' => 200000.00,
                'status' => StatusTransaction::SUCCESS,
            ],
            [
                'order_id' => 'DP' . strtoupper(uniqid()),
                'type' => TypeTransaction::DEPOSIT,
                'amount' => 500000.00,
                'status' => StatusTransaction::FAILED,
            ],
            [
                'order_id' => 'WD' . strtoupper(uniqid()),
                'type' => TypeTransaction::WITHDRAWAL,
                'amount' => 750000.00,
                'status' => StatusTransaction::SUCCESS,
            ],
            [
                'order_id' => 'DP' . strtoupper(uniqid()),
                'type' => TypeTransaction::DEPOSIT,
                'amount' => 180000.00,
                'status' => StatusTransaction::FAILED,
            ],
        ]);
    }
}
