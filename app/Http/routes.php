<?php



Route::get('/whatToDo', function () {
    return redirect('/core/publik/whatToDo');
});

Route::group(
[
    'middleware' => ['web'],
    'namespace'  => 'Tafio\Http\Controllers',
],
function () {

});
Route::group(['middleware' => ['web','auth','dibatasi']], function () {

    Route::get('coba', 'CobaController@index')->name('company.index');
// Route::resource('marketing', 'Marketing\MarketingController')->except(['destroy']);

    // Route::post('authorization/ubah', 'AuthorizationController@ubah');
    // Route::resource('authorization', 'AuthorizationController');
    // Route::resource('role', 'RoleController');
    // Route::get('role/create', 'RoleController@edit');
    // Route::post('role', 'RoleController@update');
});
