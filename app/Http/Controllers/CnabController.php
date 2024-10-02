<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class CnabController extends Controller
{
    public function index()
    {
        return view('upload');  
    }

    public function uploadCnab(Request $request)
    {
        $request->validate([
            'cnab_file' => 'required|mimes:txt',
        ]);

     
        $file = $request->file('cnab_file');
        $content = file($file->getRealPath());

        foreach ($content as $line) {
            $this->parseLine($line);
        }

        return redirect()->back()->with('success', 'Arquivo CNAB processado com sucesso!');
    }

    public function showTransactions()
    {
        $transactions = Transaction::selectRaw('store_name, sum(amount) as total, type')
            ->groupBy('store_name', 'type')
            ->get();

        return view('transactions', compact('transactions'));
    }

    private function parseLine($line)
    {
   
        if (empty(trim($line))) {
            return;
        }

        $transaction = new Transaction();
        $transaction->type = substr($line, 0, 1);
        $transaction->transaction_date = date('Y-m-d', strtotime(substr($line, 1, 8)));
        
        
        $amountString = trim(substr($line, 9, 10)); 
        $transaction->amount = floatval($amountString) / 100;  
        
        $transaction->cpf = trim(substr($line, 19, 11));
        $transaction->card = trim(substr($line, 30, 12));
        $transaction->transaction_time = date('H:i:s', strtotime(substr($line, 42, 6)));
        $transaction->store_owner = trim(substr($line, 48, 14));
        $transaction->store_name = trim(substr($line, 62, 19));

       
            $transaction->save();
        
    }
}
