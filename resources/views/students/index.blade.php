<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Directory | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 py-12">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Student Directory</h1>
                <p class="text-slate-500 mt-1">Manage student records, scores, and academic performance.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('students.create') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-xl shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all transform active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Student
                </a>
            </div>
        </div>

        <!-- Student Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Enrolled</span>
                </div>
                <p class="text-3xl font-bold text-slate-900">{{ count($students) }} Students</p>
            </div>
        </div>

        <!-- Student Table -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50/50">
                        <tr>
                            <th class="px-8 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Student Details</th>
                            <th class="px-8 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-center">Score</th>
                            <th class="px-8 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-center">Grade</th>
                            <th class="px-8 py-4 text-xs font-bold text-slate-400 uppercase tracking-wider text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($students as $student)
                        <tr class="group hover:bg-slate-50/50 transition">
                            <td class="px-8 py-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-lg mr-4">
                                        {{ substr($student->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-900">{{ $student->name }}</p>
                                        <p class="text-slate-400 text-sm">ID: #{{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span class="text-lg font-semibold {{ $student->score < 50 ? 'text-rose-500' : 'text-slate-700' }}">
                                    {{ $student->score }}%
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                @php
                                    $grade = 'F';
                                    $color = 'bg-rose-100 text-rose-700';
                                    if($student->score >= 90) { $grade = 'A'; $color = 'bg-emerald-100 text-emerald-700'; }
                                    elseif($student->score >= 80) { $grade = 'B'; $color = 'bg-blue-100 text-blue-700'; }
                                    elseif($student->score >= 70) { $grade = 'C'; $color = 'bg-amber-100 text-amber-700'; }
                                    elseif($student->score >= 60) { $grade = 'D'; $color = 'bg-orange-100 text-orange-700'; }
                                @endphp
                                <span class="inline-flex items-center px-4 py-1 rounded-full text-sm font-bold {{ $color }}">
                                    {{ $grade }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <form action="{{ route('students.remove', $student->id) }}" method="POST">
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
                            <td colspan="4" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="p-4 bg-slate-50 rounded-full mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <p class="text-slate-500 font-medium">No students registered</p>
                                    <p class="text-slate-400 text-sm">Add a student to start tracking performance.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
