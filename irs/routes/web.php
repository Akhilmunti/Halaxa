<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\EmployerController;
use Illuminate\Http\Request;
use League\Flysystem\Config;
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

Route::get('/', function(){
    //echo ;exit;
    return redirect()->to(config('constants.base.social_url'));
})->name('login');

//activejobopenings
//createjobposting
//employerdashboard
//employerinformation
//savedjobpostings

//Auth::routes();

Route::get('/waytosms', 'WelcomeController@waytosms');
Route::post('/waytosms', 'WelcomeController@waytosms');
Route::get('/auth/logout1', 'UserController@logout1');
Route::post('/auth/logout', 'UserController@logout');
Route::get('/auth/logout', 'UserController@logout')->name('logout');
Route::get('/users/', 'UserController@index');
Route::get('/users/create_user/', function(Request $request){
    session(['photo' => $request->photo]);
    if(Auth::check()){
        if($request->role==config('app.Job_Seeker')){
            return redirect()->route('JobSeekerDashboard');
        }elseif($request->role==config('app.Employer')){
            return redirect()->route('employerdashboard');
        }elseif($request->role=="HOME"){
            return redirect('/home/profile');//->route('users.profile');
        }
    }else{
        $userController = new UserController();
        return $userController->createUser($request);
    }
});
Route::get('/sendmail', 'WelcomeController@sendmail');

Route::get('/storetests', 'WelcomeController@storetests');
Route::get('/json', 'WelcomeController@createJsonForJobs');

Route::get('/home/{any}', 'HomeController@profileMaster')->name('users.profile');
Route::post('/home/{any}', 'HomeController@profileMaster');

Route::get('/common/{any}', 'HomeController@master');
Route::post('/common/{any}', 'HomeController@master');



//Employer Routings
Route::get('/employer/company_registration', 'EmployerController@Company_registration')->name('employerhome');
Route::get('/employer', 'EmployerController@index')->name('employerdashboard');
Route::post('/employer/register_company', 'EmployerController@register_company');
// master route for all the request after user login
Route::get('/employer/{any}', 'EmployerController@master');
Route::get('/employer/{any}/{id}', 'EmployerController@master_with_id');
Route::post('/employer/{any}', 'EmployerController@master');
Route::post('/employer/createjob', 'EmployerController@Createjob');
Route::post('/employer/{any}/{id}', 'EmployerController@master_with_id');

//Job Seeker Routings
Route::get('/job_seeker', 'JobSeekerController@applyForJobs')->name('JobSeekerDashboard');
Route::get('/job_Preferences', 'JobSeekerController@index1')->name('job_Preferences');
Route::post('/job_seeker/register_jobseeker', 'JobSeekerController@register_jobseeker');
// master route for all the request after user login
Route::get('/job_seeker/{any}/{id}', 'JobSeekerController@master_with_id');

Route::post('/job_seeker/{any}', 'JobSeekerController@master');
Route::post('/job_seeker/{any}/{id}', 'JobSeekerController@master_with_id');
Route::get('/job_seeker/{any}', 'JobSeekerController@master');
// make groups and add rules to check users login & role of user

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

Route::get('/refresh', function() {
    $exitCode = Artisan::call('migrate:refresh --database=mysql1');
    return '<h1>refresh class loader</h1>';
});
