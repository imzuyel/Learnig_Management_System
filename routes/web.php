<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\FollowController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AchiementController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UpcommingController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Models\Category;
use App\Models\Setting;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/details', [FrontendController::class, 'details'])->name('frontend.details');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth',]], function () {
  Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
  // Bannaer
  Route::resource('banner', BannerController::class)->except('show');
  Route::post('banner/update-status', [BannerController::class, 'updateStatus'])->name('banner.updateStatus');

  // Achiement
  Route::resource('achiement', AchiementController::class)->except('show');
  Route::post('achiement/update-status', [AchiementController::class, 'updateStatus'])->name('achiement.updateStatus');

  // Category
  Route::resource('category', CategoryController::class)->except('show');
  Route::post('category/update-status', [CategoryController::class, 'updateStatus'])->name('category.updateStatus');

  // Post Post
  Route::resource('post', PostController::class)->except('show');
  Route::post('post/update-status', [PostController::class, 'updateStatus'])->name('post.updateStatus');
  Route::post('append/posts', [PostController::class, 'appendPost'])->name('post.appendPost');

  // Upcomming Post
  Route::resource('upcomming', UpcommingController::class)->except('show');
  Route::post('upcomming/update-status', [UpcommingController::class, 'updateStatus'])->name('upcomming.updateStatus');

  // Testimonial Post
  Route::resource('testimonial', TestimonialController::class)->except('show');

  //Contact here
  Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
  Route::delete('contact/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');

  //Subscriber  here
  Route::get('subscriber', [SubscriberController::class, 'index'])->name('subscriber.index');
  Route::delete('subscriber/{subscriber}', [SubscriberController::class, 'destroy'])->name('subscriber.destroy');
  // Setting
  Route::resource('setting', SettingController::class)->except('show', 'destroy');
  // Follow
  Route::resource('follow', FollowController::class)->except('show');
  Route::post('follow/update-status', [FollowController::class, 'updateStatus'])->name('follow.updateStatus');


  //Other information
  view()->composer('backend.include.sidebar', function ($view) {
    $setting = Setting::latest('id')->first();
    $view->with('setting', $setting);
  });
});
// Contact
Route::get('/contact', [FrontendController::class, 'create'])->name('contact.create');
Route::post('contact', [FrontendController::class, 'contacStore'])->name('contact.store');
//Subscriber  here
Route::post('subscriber', [FrontendController::class, 'subscriberStore'])->name('subscriber.store');
//Ckeditor
Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');

//Other information
view()->composer('frontend.include.header', function ($view) {
  $setting = Setting::latest('id')->first();
  $categories  = Category::with(['subCategories', 'posts'])->where(['parent_id' => 0, 'status' =>  true])->get();
  $view->with('setting', $setting);
  $view->with('categories', $categories);
});

view()->composer('frontend.include.about', function ($view) {
  $setting = Setting::latest('id')->first();
  $view->with('setting', $setting);

});