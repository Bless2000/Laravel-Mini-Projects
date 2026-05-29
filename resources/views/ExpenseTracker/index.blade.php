<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-200 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 py-12">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Financial Dashboard</h1>
                <p class="text-slate-500 mt-1">Manage your transactions and track your savings.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800">
                    <span class="w-2 h-2 mr-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    Live Tracking
                </span>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Total Balance -->
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-indigo-50 rounded-2xl text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Balance</span>
                </div>
                <p class="text-3xl font-bold text-slate-900">${{ number_format($total, 2) }}</p>
            </div>

            <!-- Total Income -->
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-emerald-50 rounded-2xl text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Income</span>
                </div>
                <p class="text-3xl font-bold text-emerald-600">+${{ number_format($income, 2) }}</p>
            </div>

            <!-- Total Expenses -->
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-rose-50 rounded-2xl text-rose-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0v-8m0 8l-8-8-4 4-6-6" />
                        </svg>
                    </div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Expenses</span>
                </div>
                <p class="text-3xl font-bold text-rose-600">-${{ number_format($expense, 2) }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Form Section -->
            <div class="lg:col-span-1">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 sticky top-8">
                    <h2 class="text-xl font-bold text-slate-900 mb-6">New Transaction</h2>
                    <form action="{{ route('expenses.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Description</label>
                            <input type="text" name="description" placeholder="Netflix, Salary, Grocery..." class="w-full bg-slate-200 border-none rounded-xl p-3 focus:ring-2 focus:ring-indigo-500 transition" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Amount</label>
                            <input type="number" step="0.01" name="amount" placeholder="0.00" class="w-full bg-slate-200 border-none rounded-xl p-3 focus:ring-2 focus:ring-indigo-500 transition" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Type</label>
                            <select name="type" class="w-full bg-slate-200 border-none rounded-xl p-3 focus:ring-2 focus:ring-indigo-500 transition cursor-pointer" required>
                                <option value="income">Income</option>
                                <option value="expense">Expense</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 rounded-xl hover:bg-slate-800 transform active:scale-[0.98] transition shadow-lg">
                            Add Transaction
                        </button>
                    </form>
                </div>
            </div>

            <!-- List Section -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                    <div class="p-8 border-b border-slate-50 flex items-center justify-between">
                        <h2 class="text-xl font-bold text-slate-900">Recent Activity</h2>
                        <span class="text-sm text-slate-400 font-medium">{{ count($expenses) }} Total</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50/50">
                                <tr>
                                    <th class="px-8 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Transaction</th>
                                    <th class="px-8 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-right">Amount</th>
                                    <th class="px-8 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($expenses as $item)
                                <tr class="group hover:bg-slate-50/50 transition">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-full flex items-center justify-center mr-4 {{ $item->type == 'income' ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600' }}">
                                                @if($item->type == 'income')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                                </svg>
                                                @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                                </svg>
                                                @endif
                                            </div>
                                            <span class="font-semibold text-slate-700">{{ $item->description }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <span class="font-bold text-lg {{ $item->type == 'income' ? 'text-emerald-600' : 'text-rose-600' }}">
                                            {{ $item->type == 'income' ? '+' : '-' }}${{ number_format($item->amount, 2) }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 text-center">
                                        <form action="{{ route('expenses.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-slate-300 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-8 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="p-4 bg-slate-50 rounded-full mb-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <p class="text-slate-500 font-medium">No transactions found</p>
                                            <p class="text-slate-400 text-sm">Add your first income or expense to get started.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
