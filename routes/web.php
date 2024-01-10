<?php


// Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Security\RolePermission;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\UserController;
////////////////////
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ClientsController;
// Packages
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::get('/storage', function () {
    Artisan::call('storage:link');
});

Route::resource('companies' , CompaniesController::class);

Route::resource('properties' , PropertiesController::class);

Route::resource('employees' , EmployeesController::class);

Route::resource('clients' , ClientsController::class);




Route::group(['middleware' => 'auth'], function () {
    // Permission Module
    Route::get('/permission-role',[RolePermission::class, 'index'])->name('permission-role.list')->middleware('password.confirm');
    Route::post('/permission-role/store',[RolePermission::class, 'store'])->name('permission-role.store');
    Route::resource('permission',PermissionController::class);
    Route::resource('role', RoleController::class);

    //Alternative routes
    // Route::get('/alternate_dashboard', [HomeController::class, 'index1'])->name('alternate_dashboard');
    Route::get('/analytics-dashboard', [HomeController::class, 'analytics'])->name('analytics-dashboard');
    Route::get('/crypto-dashboard', [HomeController::class, 'crypto'])->name('crypto-dashboard');

    //UI Pages Routs
    Route::get('/', [HomeController::class, 'index'])->name('dashboards');
    // Dashboard Routes
    Route::get('/dashboards', [HomeController::class, 'index'])->name('dashboards');
    // Users Module
    Route::resource('users', UserController::class);

});

//App Details Page => 'Dashboard'], function() {
Route::group(['prefix' => 'menu-style'], function() {
    //MenuStyle Page Routs
    Route::get('horizontal', [HomeController::class, 'horizontal'])->name('menu-style.horizontal');
    Route::get('dual-horizontal', [HomeController::class, 'dualHorizontal'])->name('menu-style.dual-horizontal');
    Route::get('dual-compact', [HomeController::class, 'dualCompact'])->name('menu-style.dual-compact');
    Route::get('boxed', [HomeController::class, 'boxed'])->name('menu-style.boxed');
    Route::get('boxed-fancy', [HomeController::class, 'boxedFancy'])->name('menu-style.boxed-fancy');
    Route::get('boxed-fixed', [HomeController::class, 'boxedFixed'])->name('menu-style.boxed-fixed');
});

//App Details Page => 'special-pages'], function() {
Route::group(['prefix' => 'special-pages'], function() {
    //Example Page Routs
    Route::get('billing', [HomeController::class, 'billing'])->name('special-pages.billing');
    Route::get('billing-1', [HomeController::class, 'billing_1'])->name('special-pages.billing-1');
    Route::get('billing-2', [HomeController::class, 'billing_2'])->name('special-pages.billing-2');

    Route::get('calender', [HomeController::class, 'calender'])->name('special-pages.calender');
    Route::get('kanban', [HomeController::class, 'kanban'])->name('special-pages.kanban');
    Route::get('pricing', [HomeController::class, 'pricing'])->name('special-pages.pricing');
    Route::get('rtl-support', [HomeController::class, 'rtlsupport'])->name('special-pages.rtlsupport');
    Route::get('timeline', [HomeController::class, 'timeline'])->name('special-pages.timeline');
});



//Widget Routs
Route::group(['prefix' => 'widget'], function() {
    Route::get('widget-basic', [HomeController::class, 'widgetBasic'])->name('widget.widget-basic');
    Route::get('widget-chart', [HomeController::class, 'widgetChart'])->name('widget.widget-chart');
    Route::get('widget-card', [HomeController::class, 'widgetCard'])->name('widget.widget-card');
});

//Maps Routs
Route::group(['prefix' => 'maps'], function() {
    Route::get('google', [HomeController::class, 'google'])->name('maps.google');
    Route::get('vector', [HomeController::class, 'vector'])->name('maps.vector');
});
//plugins routes
Route::group(['prefix' => 'plugins'], function() {
    Route::get('apexcharts', [HomeController::class, 'apexcharts'])->name('plugins.apexcharts');
    Route::get('button-hover', [HomeController::class, 'buttonHover'])->name('plugins.button-hover');
    Route::get('choise-js', [HomeController::class, 'choiseJs'])->name('plugins.choise-js');
    Route::get('flatpickr', [HomeController::class, 'flatpickr'])->name('plugins.flatpickr');
    Route::get('fslightbox', [HomeController::class, 'fslightbox'])->name('plugins.fslightbox');
    Route::get('gallery-hover', [HomeController::class, 'galleryHover'])->name('plugins.gallery-hover');
    Route::get('image-croper', [HomeController::class, 'imageCroper'])->name('plugins.image-croper');
    Route::get('loader', [HomeController::class, 'loader'])->name('plugins.loader');
    Route::get('quill-editor', [HomeController::class, 'quillEditor'])->name('plugins.quill-editor');
    Route::get('rating', [HomeController::class, 'rating'])->name('plugins.rating');
    Route::get('select2', [HomeController::class, 'select2'])->name('plugins.select2');
    Route::get('sweet-alert', [HomeController::class, 'sweetAlert'])->name('plugins.sweet-alert');
    Route::get('ui-color', [HomeController::class, 'uiColor'])->name('plugins.ui-color');
    Route::get('uppy', [HomeController::class, 'uppy'])->name('plugins.uppy');
});

//Auth pages Routs
Route::get('auth-login', [HomeController::class, 'signin'])->name('auth.confirm-login');
Route::get('auth-register', [HomeController::class, 'signup'])->name('auth.confirm-register');
Route::get('confirm-mail', [HomeController::class, 'confirmmail'])->name('auth.confirm-mail');
Route::get('user-privacy-setting', [HomeController::class, 'userPrivacySetting'])->name('auth.user-privacy-setting');
Route::get('lock-screen', [HomeController::class, 'lockscreen'])->name('auth.lock-screen');

//Error Page Route
Route::group(['prefix' => 'errors'], function() {
    Route::get('error404', [HomeController::class, 'error404'])->name('errors.error404');
    Route::get('error500', [HomeController::class, 'error500'])->name('errors.error500');
    Route::get('maintenance', [HomeController::class, 'maintenance'])->name('errors.maintenance');
});

//Forms Pages Routs
Route::group(['prefix' => 'forms'], function() {
    Route::get('element', [HomeController::class, 'element'])->name('forms.element');
    Route::get('wizard', [HomeController::class, 'wizard'])->name('forms.wizard');
    Route::get('validation', [HomeController::class, 'validation'])->name('forms.validation');
});


//Table Page Routs
Route::group(['prefix' => 'table'], function() {
    Route::get('bootstraptable', [HomeController::class, 'bootstrapTable'])->name('table.bootstrap-table');
    Route::get('datatable', [HomeController::class, 'dataTable'])->name('table.data-table');
    Route::get('bordertable',[HomeController::class, 'borderTable'])->name('table.border-table');
    Route::get('fancytable',[HomeController::class, 'fancyTable'])->name('table.fancy-table');
    Route::get('fixedtable',[HomeController::class, 'fixedTable'])->name('table.fixed-table');
});

//Icons Page Routs
Route::group(['prefix' => 'icons'], function() {
    Route::get('solid', [HomeController::class, 'solid'])->name('icons.solid');
    Route::get('outline', [HomeController::class, 'outline'])->name('icons.outline');
    Route::get('dualtone', [HomeController::class, 'dualtone'])->name('icons.dualtone');
    Route::get('colored', [HomeController::class, 'colored'])->name('icons.colored');
});
//Extra Page Routs
Route::get('blank-page',[HomeController::class, 'blankPage'])->name('pages.blank-page');
Route::get('privacy-policy', [HomeController::class, 'privacyPolicy'])->name('pages.privacy-policy');
Route::get('terms-of-use', [HomeController::class, 'termsOfUse'])->name('pages.term-of-use');

//UI Elements Routes
Route::group(['prefix' => 'ui-elements'], function() {
    Route::get('ui-alerts', [HomeController::class, 'alerts'])->name('ui-elements.ui-alerts');
    Route::get('ui-avatars', [HomeController::class, 'avatars'])->name('ui-elements.ui-avatars');
    Route::get('ui-badges', [HomeController::class, 'badges'])->name('ui-elements.ui-badges');
    Route::get('ui-breadcrumb', [HomeController::class, 'breadcrumb'])->name('ui-elements.ui-breadcrumb');
    Route::get('ui-buttons-group', [HomeController::class, 'buttons_groups'])->name('ui-elements.ui-buttons-group');
    Route::get('ui-buttons', [HomeController::class, 'buttons'])->name('ui-elements.ui-buttons');
    Route::get('ui-cards', [HomeController::class, 'cards'])->name('ui-elements.ui-cards');
    Route::get('ui-carousel', [HomeController::class, 'carousel'])->name('ui-elements.ui-carousel');
    Route::get('ui-color', [HomeController::class, 'color'])->name('ui-elements.ui-color');
    Route::get('ui-embed-video', [HomeController::class, 'embed_video'])->name('ui-elements.ui-embed-video');
    Route::get('ui-grid', [HomeController::class, 'grid'])->name('ui-elements.ui-grid');
    Route::get('ui-images', [HomeController::class, 'images'])->name('ui-elements.ui-images');
    Route::get('ui-list-group', [HomeController::class, 'list'])->name('ui-elements.ui-list-group');
    Route::get('ui-modal', [HomeController::class, 'modal'])->name('ui-elements.ui-modal');
    Route::get('ui-notifications', [HomeController::class, 'notifications'])->name('ui-elements.ui-notifications');
    Route::get('ui-offcanvas', [HomeController::class, 'offcanvas'])->name('ui-elements.ui-offcanvas');
    Route::get('ui-pagination', [HomeController::class, 'pagination'])->name('ui-elements.ui-pagination');
    Route::get('ui-popovers', [HomeController::class, 'popovers'])->name('ui-elements.ui-popovers');
    Route::get('ui-progressbars', [HomeController::class, 'progressbars'])->name('ui-elements.ui-progressbars');
    Route::get('ui-tabs', [HomeController::class, 'tabs'])->name('ui-elements.ui-tabs');
    Route::get('ui-tooltips', [HomeController::class, 'tooltips'])->name('ui-elements.ui-tooltips');
    Route::get('ui-typography', [HomeController::class, 'typography'])->name('ui-elements.ui-typography');

});













// Module Routes
// if (file_exists(__DIR__.'/modules/appointment.php')) require __DIR__.'/modules/appointment.php';
// if (file_exists(__DIR__.'/modules/blog.php')) require __DIR__.'/modules/blog.php';
// if (file_exists(__DIR__.'/modules/chat.php')) require __DIR__.'/modules/chat.php';
if (file_exists(__DIR__.'/modules/e-commerce.php')) require __DIR__.'/modules/e-commerce.php';
// if (file_exists(__DIR__.'/modules/file-manager.php')) require __DIR__.'/modules/file-manager.php';
// if (file_exists(__DIR__.'/modules/mail.php')) require __DIR__.'/modules/mail.php';
// if (file_exists(__DIR__.'/modules/social.php')) require __DIR__.'/modules/social.php';
