<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MockTestController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Payment Routes
    Route::post('/payment/submit', [PaymentController::class, 'submit'])->name('payment.submit');
    Route::get('/premium-class/{payment_id}', function ($payment_id) {
        return view('premium-class', ['payment_id' => $payment_id]);
    })->name('premium.class');

    //user
    Route::get('/mock-test', [MockTestController::class, 'showMockTest']);
    Route::post('/mock-test-submit', [MockTestController::class, 'submitMockTest'])->name('submit.mockTest');
    Route::get('/', [MockTestController::class, 'showWelcomePage'])->name('welcome.page');
Route::get('/mock-test/{templateId}', [MockTestController::class, 'showMockTestQuestions'])->name('mockTest.showQuestions');
Route::get('/mock-test/payment/{templateId}', [MockTestController::class, 'showPaymentPage'])->name('mockTest.payment');
Route::post('/mock-test/payment/submit', [MockTestController::class, 'submitPayment'])->name('payment.submit');
Route::post('/submit-mock-test', [MockTestController::class, 'submitMockTest'])->name('mockTest.submit');
});

      

// ✅ Admin Routes (Grouped with Prefix and Middleware)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // User Management
    Route::get('/users', [AdminController::class, 'showUsers'])->name('users.index');
    Route::get('/users/{id}', [AdminController::class, 'showUser'])->name('users.show');
    Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');

    // Mock Test Templates
    Route::get('/mock-test-templates', [AdminController::class, 'indexMockTestTemplates'])->name('mockTestTemplates.index');
    Route::get('/mock-test-templates/create', [AdminController::class, 'createMockTestTemplate'])->name('mockTestTemplates.create');
    Route::post('/mock-test-templates', [AdminController::class, 'storeMockTestTemplate'])->name('mockTestTemplates.store');
    Route::get('/mock-test-templates/{id}/edit', [AdminController::class, 'edit'])->name('mockTestTemplates.edit');
    Route::put('/mock-test-templates/{id}', [AdminController::class, 'update'])->name('mockTestTemplates.update');
    Route::delete('/mock-test-templates/{id}', [AdminController::class, 'destroy'])->name('mockTestTemplates.destroy');
      // Mock Test Template Routes
      Route::get('/mock-test-templates/{templateId}/questions/create', [AdminController::class, 'createQuestion'])->name('mockTestTemplates.questions.create');
      Route::post('/mock-test-templates/{templateId}/questions', [AdminController::class, 'storeQuestion'])->name('mockTestTemplates.questions.store');
      Route::get('/mockTestTemplates/{templateId}/show', [AdminController::class, 'mockTestTemplatesshow'])->name('mockTestTemplates.show');
      



});

require __DIR__.'/auth.php';
