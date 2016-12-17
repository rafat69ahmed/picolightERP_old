<?php
use App\Cadminreceipt;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|dsklfjlsdjf
*/


Route::auth();

Route::get('/', 'HomeController@index');


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');

Route::get('piku', 'CadminController@piku');


//admin route
Route::get('/admin', 'AdminController@index'); //ok
//Route::post('/admin', 'AdminController@store'); //ok

////Admin User
Route::get('/admin/user', 'AdminUserController@index'); //ok
Route::get('/admin/user/create', 'AdminUserController@create'); //ok
Route::get('/admin/user/view/{id}', 'AdminUserController@show');
Route::get('/admin/user/edit/{id}', 'AdminUserController@edit'); //ok
Route::post('/admin/user/update/{id}', 'AdminUserController@update'); //ok
Route::delete('/admin/user/delete/{id}', 'AdminUserController@delete'); //ok

////client route_______________COMPLETE_____________////
Route::get('/admin/client', 'ClientController@index'); //done
Route::get('/admin/client/create', 'ClientController@create'); //done
Route::get('/admin/client/view/{id}', 'ClientController@show');//done
Route::get('/admin/client/edit/{id}', 'ClientController@edit'); //done
Route::post('/admin/client/update/{id}', 'ClientController@update'); //done
Route::delete('/admin/client/delete/{id}', 'ClientController@delete'); //done

////Client User from admin
Route::get('/admin/client/{c_id}/user', 'AdminClientUserController@index'); //ok
Route::get('/admin/client/{c_id}/user/create', 'AdminClientUserController@create'); //ok
Route::get('/admin/client/{c_id}/user/view/{id}', 'AdminClientUserController@show');
Route::get('/admin/client/{c_id}/user/edit/{id}', 'AdminClientUserController@edit'); //ok
Route::post('/admin/client/{c_id}/user/update/{id}', 'AdminClientUserController@update'); //ok
Route::delete('/admin/client/{c_id}/user/delete/{id}', 'AdminClientUserController@delete'); //ok

////Client User
Route::get('/user', 'ClientUserController@index'); //done
Route::get('/user/create', 'ClientUserController@create'); //ok
Route::get('/user/view/{id}', 'ClientUserController@show');
Route::get('/user/edit/{id}', 'ClientUserController@edit'); //ok
Route::post('/user/update/{id}', 'ClientUserController@update'); //ok
Route::delete('/user/delete/{id}', 'ClientUserController@delete'); //ok

////Client Company  ________COMPLETE___________///     
Route::get('/client/company', 'CompanyController@index'); //done
Route::get('/client/company/create', 'CompanyController@create'); //done
Route::get('/client/company/view/{id}', 'CompanyController@show');//done
Route::get('/client/company/edit/{id}', 'CompanyController@edit'); //done
Route::post('/client/company/update/{id}', 'CompanyController@update'); //done
Route::delete('/client/company/delete/{id}', 'CompanyController@delete'); //done


////Client Admin For Company  ________COMPLETE___________///     
Route::get('/clientadmin', 'CadminController@index');
Route::get('/clientadmin/receipt/create', 'CadminController@create');
Route::get('/clientadmin/receipt/list', 'CadminController@list1');
// Route::get('/clientadmin/receipt/view/{id}', 'CadminController@list');
Route::get('/clientadmin/receipt/edit/{id}', 'CadminController@edit');
Route::post('/clientadmin/receipt/update/{id}', 'CadminController@update');
Route::delete('/clientadmin/receipt/delete/{id}', 'CadminController@delete');


Route::get('/pdf',function(){

	$pdf = PDF::loadView('company\clientadminpanel\clientadmin');

	return $pdf->stream();

	// return $pdf->download('clientadmin.pdf');

	// $pdf = PDF::loadView('company\clientadminpanel\clientadmin', $data);

});
Route::get('/viewpdf',function(){
	$cadminreceipt = new Cadminreceipt();
	$cadminreceipt ->id=1;
	$pdf = PDF::loadView('company\clientadminpanel\edit', compact('cadminreceipt'));

	return $pdf->stream();

	// return $pdf->download('clientadmin.pdf');

	// $pdf = PDF::loadView('company\clientadminpanel\clientadmin', $data);

});
 
        Route::get('/taskdesh', 'TaskController@index');
        Route::post('/task', 'TaskController@create');
        Route::delete('/task/{id}', 'TaskController@delete');
 

Route::get('/profile', 'ProfileController@index'); //done
Route::get('/profile/create', 'ProfileController@create'); //done
Route::get('/profile/view/{id}', 'ProfileController@show');//done
Route::get('/profile/edit/{id}', 'ProfileController@edit'); //done
Route::post('/profile/update/{id}', 'ProfileController@update'); //done
Route::delete('/profile/delete/{id}', 'ProfileController@delete'); //done
 


 Route::get('/multy', 'CadminController@multy');//multiple insert UI




/////_______________Cold_Storage_Receipts__________//////

Route::get('/cold_storage_receipts','Coldstorage\ReceiptController@index');//test
Route::get('/cold_storage_receipts/create','Coldstorage\ReceiptController@create');
Route::get('/cold_storage_receipts/view/{id}','Coldstorage\ReceiptController@show');
Route::get('/cold_storage_receipts/edit/{id}','Coldstorage\ReceiptController@edit');
Route::post('/cold_storage_receipts/update/{id}','Coldstorage\ReceiptController@update');
Route::delete('/cold_storage_receipts/delete/{id}','Coldstorage\ReceiptController@delete');
Route::delete('/cold_storage_receipts/search-data','Coldstorage\ReceiptController@data_search');

Route::get('/json/{agentcode?}','Coldstorage\ReceiptController@getAgentCode');
Route::get('/json','Coldstorage\ReceiptController@json');




/////_______________Storage Deed__________//////receive

Route::get('/potato_storage_deed','Coldstorage\DeedReceiveController@index');
Route::get('/potato_storage_deed/create','Coldstorage\DeedReceiveController@create');
Route::get('/potato_storage_deed/view/{id}','Coldstorage\DeedReceiveController@show');
Route::get('/potato_storage_deed/edit/{id}','Coldstorage\DeedReceiveController@edit');
Route::post('/potato_storage_deed/update/{id}','Coldstorage\DeedReceiveController@update');
Route::delete('/potato_storage_deed/delete/{id}','Coldstorage\DeedReceiveController@delete');



/////_________________Withdrawl Deed____________/////

Route::get('/potato_withdraw_deed','Coldstorage\PotatoDistributionController@index');
Route::get('/potato_withdraw_deed/create','Coldstorage\PotatoDistributionController@create');
Route::get('/potato_withdraw_deed/view/{id}','Coldstorage\PotatoDistributionController@show');
Route::get('/potato_withdraw_deed/edit/{id}','Coldstorage\PotatoDistributionController@edit');
Route::post('/potato_withdraw_deed/update/{id}','Coldstorage\PotatoDistributionController@update');
Route::delete('/potato_withdraw_deed/delete/{id}','Coldstorage\PotatoDistributionController@delete');


/////_________________Loan Deed____________/////

Route::get('/loan', 'Coldstorage\LoanReceivePaperController@index');
Route::get('/loan/create', 'Coldstorage\LoanReceivePaperController@create');
Route::get('/loan/view/{id}', 'Coldstorage\LoanReceivePaperController@show');
Route::get('/loan/edit/{id}', 'Coldstorage\LoanReceivePaperController@edit');
Route::post('/loan/update/{id}', 'Coldstorage\LoanReceivePaperController@update');
Route::delete('/loan/delete/{id}', 'Coldstorage\LoanReceivePaperController@delete');


/////_________________agent____________/////

Route::get('/agent', 'Coldstorage\AgentRegisterController@index');
Route::get('/agent/create', 'Coldstorage\AgentRegisterController@create');
Route::get('/agent/view/{id}', 'Coldstorage\AgentRegisterController@show');
Route::get('/agent/edit/{id}', 'Coldstorage\AgentRegisterController@edit');
Route::post('/agent/update/{id}', 'Coldstorage\AgentRegisterController@update');
Route::delete('/agent/delete/{id}', 'Coldstorage\AgentRegisterController@delete');


// AngularJS
Route::get('/item1', function () {
    return view('item');
});

Route::group(['middleware' => ['web']], function () {
    Route::resource('item','ItemController');
});



/////_________________client register____________/////

Route::get('/cold_storage_client', 'Coldstorage\ClientRegisterController@index');
Route::get('/cold_storage_client/create', 'Coldstorage\ClientRegisterController@create');
Route::get('/cold_storage_client/view/{id}', 'Coldstorage\ClientRegisterController@show');
Route::get('/cold_storage_client/edit/{id}', 'Coldstorage\ClientRegisterController@edit');
Route::post('/cold_storage_client/update/{id}', 'Coldstorage\ClientRegisterController@update');
Route::delete('/cold_storage_client/delete/{id}', 'Coldstorage\ClientRegisterController@delete');
