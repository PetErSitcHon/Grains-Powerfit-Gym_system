<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CouroselController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PlanController;
use App\Http\Middleware\Auth;
use App\Models\Attendance;
use Illuminate\Support\Facades\Route;
use App\Models\Plan;
use Laravel\Cashier\Subscription;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Attendance Section

Route::get('attendance', [ProfileController::class, 'attendances'])->name('attendance');
Route::get('record', [AttendanceController::class, 'store'])->name('time_in');
Route::put('record', [AttendanceController::class, 'update'])->name('time_out');


Route::get('/', function(){
    $about = DB::table('abouts')->select('content','content2','vision','mission')->get();
    $courosel = DB::table('courosels')->select('title','details','image', 'id')->get();
    return view('welcome', compact('about', 'courosel'));

});

Route::get('admin/about/edit', function(){
    $about = DB::table('abouts')->select('content','vision','mission')->get();
    return view('admin.edit', compact('about'));
});

// ABOUT Display all records from the table
Route::get('admin/about/display', [AboutController::class, 'displayrecord'])->name('display.about');

Route::get('update/{id}', [AboutController::class, 'getdataforupdate']);

Route::put('/update/{id}', [AboutController::class, 'updaterecord'])->name('update.about');

Route::put('/update/about/{id}', [AboutController::class, 'updaterecord2'])->name('update.about1');

Route::put('/update/vision/{id}', [AboutController::class, 'updaterecord3'])->name('update.vision');

Route::put('/update/mission/{id}', [AboutController::class, 'updaterecord4'])->name('update.mission');

Route::get('admin/about/edit', [AboutController::class, 'edit'])->name('about.edit');

Route::patch('about/update', [AboutController::class, 'update'])->name('about.update');

Route::get('admin/about/edit', [AboutController::class, 'addAbout'])->name('about.add');

Route::post('/admin/about/edit', [AboutController::class, 'addrecord'])->name('about.addrecord');


// END OF ABOUT 

// COUROSEL SECTION

Route::get('admin/corousel/display', [CouroselController::class, 'index'])->name('courosel.view');

Route::get('admin/courosel/display', [CouroselController::class, 'show'])->name('show');

Route::get('admin/corousel/create', [CouroselController::class, 'create'])->name('create'); 

Route::post('admin/corousel/store', [CouroselController::class, 'store'])->name('store');

Route::put('edit/{id}', [CouroselController::class, 'update'])->name('update');

Route::get('show/{id}', [CouroselController::class, 'showcourosel'])->name('showh');

Route::get('edit/{courosels}', [CouroselController::class, 'edit'])->name('edit');

Route::delete('/{courosels}', [CouroselController::class, 'destroy'])->name('destroy');

// END COUROSEL SECTION





// admin route////////////////////////////////

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'Index'])->name('login_from');

    Route::get('/register', [AdminController::class, 'AdminRegister'])->name('AdminRegister');

    Route::post('register', [AdminController::class, 'store'])->name('RegisterAdmin');;

    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');

    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard');
});

//  end of admin ////////////////////////////   

Route::get('/dashboard', function () {
    $subscribe = Subscription::where('user_id', auth()->id())->get();
    return view('dashboard', compact('subscribe'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/subscription', function () {
//     $plans = Plan::get();
//     return view("plans" , compact("plans"));
// })->middleware(['auth', 'verified'])->name('plans');

// Subscription Route

Route::middleware("auth")->group(function(){
    Route::get('plans', [PlanController::class, 'index'])->name("plans");
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
});


// End of Subscription Route

Route::get('/welcome', function () {
    $about = DB::table('abouts')->select('content','content2','vision','mission')->get();
    $courosel = DB::table('courosels')->select('title','details','image')->get();
    return view('welcome', compact('about' , 'courosel'));
})->middleware(['auth', 'verified'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// About/////////////////////////////////////////////////////////////////////////////////////////
// Route::prefix('about')->group(function(){
// Route::get('/edit', [AboutController::class, 'edit'])->name('about.edit');
// }


require __DIR__.'/auth.php';
