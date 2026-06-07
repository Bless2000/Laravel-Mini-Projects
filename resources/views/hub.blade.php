<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice Hub | Learning Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen text-slate-900">
    <div class="max-w-5xl mx-auto px-6 py-16">
        
        <!-- Header -->
        <header class="mb-12 flex flex-col md:flex-row md:items-start md:justify-between gap-6">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <span class="px-3 py-1 bg-indigo-100 text-indigo-700 text-xs font-bold uppercase tracking-widest rounded-full">Practice Environment</span>
                </div>
                <h1 class="text-4xl font-extrabold tracking-tight mb-2 text-slate-900">
                    Practice Project Hub
                </h1>
                <p class="text-slate-500 text-lg">Quick access to all my internal learning modules and mini-projects.</p>
            </div>

            <div class="flex flex-wrap gap-3">
                @guest
                    <a href="{{ route('auth.login') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-100 active:scale-95">
                        Login
                    </a>
                    <a href="{{ route('auth.register') }}" class="px-6 py-3 bg-white text-slate-700 border border-slate-200 rounded-2xl font-bold hover:bg-slate-50 transition-all active:scale-95">
                        Register
                    </a>
                @endguest

                @auth
                    <div class="flex items-center gap-4 bg-white p-2 pr-4 rounded-2xl border border-slate-200 shadow-sm">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-700 rounded-xl flex items-center justify-center font-bold">
                            {{ substr(Auth::user()->fullName, 0, 1) }}
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs text-slate-400 font-bold uppercase tracking-wider">Welcome back</span>
                            <span class="text-slate-900 font-bold leading-tight">{{ Auth::user()->fullName }}</span>
                        </div>
                        <form action="/logout" method="POST" class="ml-2">
                            @csrf
                            <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Expense Tracker -->
            <a href="{{ route('expenses.index') }}" class="group bg-white p-8 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="p-4 bg-emerald-50 rounded-2xl text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors w-fit mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Expense Tracker</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">Track income and expenses with live calculations and category management.</p>
                <div class="flex items-center text-indigo-600 font-semibold text-sm">
                    Open Module
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </a>

            <!-- Task Manager -->
            <a href="{{ route('tasks.index') }}" class="group bg-white p-8 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="p-4 bg-indigo-50 rounded-2xl text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors w-fit mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Task Manager</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">A complete Todo system with task creation, completion toggles, and deletion.</p>
                <div class="flex items-center text-indigo-600 font-semibold text-sm">
                    Open Module
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </a>

            <!-- Student Registry -->
            <a href="{{ route('students.index') }}" class="group bg-white p-8 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="p-4 bg-amber-50 rounded-2xl text-amber-600 group-hover:bg-amber-600 group-hover:text-white transition-colors w-fit mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Student Registry</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">Manage student records, including creation and removal from the database.</p>
                <div class="flex items-center text-indigo-600 font-semibold text-sm">
                    Open Module
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </a>

            <!-- Shopping Cart -->
            <a href="/cart" class="group bg-white p-8 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="p-4 bg-rose-50 rounded-2xl text-rose-600 group-hover:bg-rose-600 group-hover:text-white transition-colors w-fit mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Shopping Cart</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">Session-based cart logic for adding and removing items.</p>
                <div class="flex items-center text-indigo-600 font-semibold text-sm">
                    Open Module
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </a>

            <!-- Notes App -->
            <a href="/notes" class="group bg-white p-8 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="p-4 bg-blue-50 rounded-2xl text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors w-fit mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Quick Notes</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">Simple CRUD interface for managing text-based notes.</p>
                <div class="flex items-center text-indigo-600 font-semibold text-sm">
                    Open Module
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </a>

            <!-- User Management -->
            <a href="/users" class="group bg-white p-8 rounded-3xl shadow-sm border border-slate-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="p-4 bg-purple-50 rounded-2xl text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition-colors w-fit mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">User Directory</h3>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">Explore user listing, addition, and deletion logic within a controller.</p>
                <div class="flex items-center text-indigo-600 font-semibold text-sm">
                    Open Module
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </a>

            @guest
            <!-- Login Module -->
            <a href="{{ route('auth.login') }}" class="group bg-slate-900 p-8 rounded-3xl shadow-sm border border-slate-800 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="p-4 bg-slate-800 rounded-2xl text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors w-fit mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2 text-white">Sign In</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">Log in to your account to sync your data across modules.</p>
                <div class="flex items-center text-indigo-400 font-semibold text-sm">
                    Access Account
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </a>

            <!-- Register Module -->
            <a href="{{ route('auth.register') }}" class="group bg-indigo-600 p-8 rounded-3xl shadow-sm border border-indigo-500 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="p-4 bg-indigo-500 rounded-2xl text-white group-hover:bg-white group-hover:text-indigo-600 transition-colors w-fit mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2 text-white">Create Account</h3>
                <p class="text-indigo-100 text-sm leading-relaxed mb-6">New here? Register a new account in seconds.</p>
                <div class="flex items-center text-white font-semibold text-sm">
                    Join Now
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </a>
            @endguest

            @auth
            <!-- Logout Module -->
            <form action="/logout" method="POST" id="grid-logout-form" class="hidden">@csrf</form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('grid-logout-form').submit();" class="group bg-rose-50 p-8 rounded-3xl shadow-sm border border-rose-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="p-4 bg-rose-100 rounded-2xl text-rose-600 group-hover:bg-rose-600 group-hover:text-white transition-colors w-fit mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2 text-rose-900">Sign Out</h3>
                <p class="text-rose-600/70 text-sm leading-relaxed mb-6">Finished your session? Logout securely here.</p>
                <div class="flex items-center text-rose-600 font-semibold text-sm">
                    End Session
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
            </a>
            @endauth

        </div>

        <!-- Footer -->
        <footer class="mt-20 pt-8 border-t border-slate-200 text-center text-slate-400 text-sm">
            &copy; {{ date('Y') }} Practice Lab Hub &bull; Local Learning Environment
        </footer>
    </div>
</body>
</html>
