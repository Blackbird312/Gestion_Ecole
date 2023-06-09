<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\FullCalenderController;
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

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/', [adminController::class , 'index'])->name('dashboard');

// admin side Formateur
// => afficher tous les formateur
Route::get('/formateurs', [adminController::class , 'index_formateur'])->name('formateurs');
// => affiche la formulaire pour ajouter un Prof
Route::get('/ajouter/formateur', [adminController::class , 'create_formateur'])->name('create.formateurs');
Route::post('/store/formateur', [adminController::class , 'store_formateur'])->name('store.formateurs');
Route::delete('/formateur/{id}' , [adminController::class , "delete_formateur"])->name("delete.formateurs");
Route::get('/formateur/{id}/edit' , [adminController::class , "edit_formateur"])->name("edit.formateurs");
Route::put('/formateur/{id}' , [adminController::class , "update_formateur"])->name("update.formateurs");

// => afficher tous les eleves
Route::get('/eleves', [adminController::class , 'index_eleve'])->name('eleves');
// => ajouter un eleve
Route::get('/ajouter/eleve', [adminController::class , 'create_eleve'])->name('create.eleve');
Route::post('/store/eleve', [adminController::class , 'store_eleve'])->name('store.eleve');
Route::delete('/delete/eleve/{id}', [adminController::class , 'delete_eleve'])->name('delete.eleve');
Route::get('/edit/eleve/{id}' , [adminController::class , 'edit_eleve'])->name("edit.eleve");
Route::put('/update/eleve/{id}' , [adminController::class , 'update_eleve'])->name("update.eleve");


// => afficher tous les groupes
Route::get('/groupes', [adminController::class , 'index_groupes'])->name('groupes');
Route::get('/ajouter/groupe', [adminController::class , 'create_groupe'])->name('create.groupe');
Route::post('/store/groupe' , [adminController::class , 'store_groupe'])->name("store.groupe") ;
Route::delete('/delete/groupe/{id}' , [adminController::class , 'delete_groupe'])->name("delete.groupe") ;

// => afficher tous les modules
Route::get('/modules', [adminController::class , 'index_modules'])->name('modules');
Route::get('/ajouter/module', [adminController::class , 'create_module'])->name('create.module');
Route::post('/store/module', [adminController::class , 'store_module'])->name('store.module');
Route::delete('/delete/moduel/{id}' , [adminController::class , 'destroy_module'] )->name("delete.moduel") ;
Route::get("/module/edit/{id}" , [adminController::class , "edit_module"])->name("edit.module") ;
Route::put("/module/update/{id}" , [adminController::class , "update_module"])->name("upadate.module") ;

// => afficher tous les notes
Route::get('/notes', [adminController::class , 'index_notes'])->name('notes');
Route::get('/ajouter/note', [adminController::class , 'create_note'])->name('create.note');
Route::post('/store/note', [adminController::class , 'store_note'])->name('store.note');
Route::get('/note/{id}', [adminController::class , 'note'])->name('note');
Route::delete('/note/{id}', [adminController::class , 'delete_note'])->name('delete.note');


// => seance
Route::get("/seances" , [adminController::class , "seance_index"])->name("seances");
Route::get("/delete/seances/{id}" , [adminController::class , "delete_seance"])->name("delete.seance");




Route::controller(FullCalenderController::class)->group(function(){
  Route::get('fullcalender', 'index');
  Route::post('fullcalenderAjax', 'ajax');
});






















































// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');

// User Interface
Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');



