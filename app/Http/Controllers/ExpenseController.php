<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{

      public function createExpenses() {
          return view('ExpenseTracker.create');
      }

      public function storeExpenses(Request $request) {
            $validated = $request->validate([
                'description' => 'required',
                'amount' => 'required|numeric',
                'type' => 'required',
            ]);

            $expense = new Expense();
            $expense->description = $validated['description'];
            $expense->amount = $validated['amount'];
            $expense->type = $validated['type'];
            $expense->save();

            return redirect()->route('ExpenseTracker.index')->with('Expense successfully created');
      }

        public function index() {
            $expenses = Expense::all();
            $income = Expense::where('type', 'income')->sum('amount');
            $expense = Expense::where('type', 'expense')->sum('amount');
            $total = $income - $expense;

            return view('ExpenseTracker.index', compact('expenses', 'total',  'income', 'expense'));
        }

        public function removeExpense($expenseid) {
            $expense = Expense::find($expenseid);
            $expense->delete();

            return redirect()->route('ExpenseTracker.index')->with('Expense remove successfully');
        }
}
