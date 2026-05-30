<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\crudController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExpenseController;


Route::get('/', function () {
    return view('hub');
});

Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/students', [WelcomeController::class, 'students']);

Route::get('/products', [WelcomeController::class, 'products']);

// Route::get('/user/{name}', [WelcomeController::class, 'user']);


Route::get('/users', [WelcomeController::class, 'users']);
Route::get('/users/add/{name}', [WelcomeController::class, 'addUser']);
Route::get('/users/delete/{name}', [WelcomeController::class, 'deleteUser']);


Route::get('/notes', [crudController::class, 'notes']);
Route::get('/notes/addNote/{text}', [crudController::class, 'addNote']);


// Route::get('/tasks', [crudController::class, 'tasks']);
// Route::get('/tasks/complete/{taskName}', [crudController::class, 'complete']);

Route::get('/cart', [crudController::class, 'cart']);
Route::get('/cart/addItem/{newItem}', [crudController::class, 'addItem']);
Route::get('/cart/removeItem/{cartItem}', [crudController::class, 'removeItem']);

// Route::get('/students1', [crudController::class, 'students1']);
// Route::get('/students1/addStudent/{studentName}', [crudController::class, 'addStudent']);
// Route::get('/students1/removeStudent/{stud}', [crudController::class, 'removeStudent']);
// Route::get('/students1/find/{studentName}', [crudController::class, 'findStudent']);

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::patch('/tasks/{id}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
Route::delete('/tasks/{id}/delete', [TaskController::class, 'delete'])->name('tasks.delete');

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store']);
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::delete('/students/{id}/remove', [StudentController::class, 'remove'])->name('students.remove');


Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
Route::post('/expenses', [ExpenseController::class, 'storeExpenses'])->name('expenses.store');
Route::get('/expenses/create', [ExpenseController::class, 'createExpenses'])->name('expenses.create');
Route::delete('/expenses/{expenseid}/remove', [ExpenseController::class, 'removeExpense'])->name('expenses.remove');

