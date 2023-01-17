<?php



Route::group(['namespace' =>'Netweb\Crud\Http\Controllers'],function(){

    Route::get('crud','CrudController@index')->name('crud-index');
    Route::post('/insert','CrudController@insert');

    Route::get('/admin-interest-level','CrudController@admin_interest_level');
    Route::post('/store-interest-level','CrudController@store_interest_level');
    Route::post('/edit-interest-level','CrudController@edit_interest_level');
    Route::post('/delete-interest-level','CrudController@delete_interest_level');

    Route::get('/admin-lead-status','CrudController@admin_lead_status');
    Route::post('/store-lead-status','CrudController@store_lead_status');


});
?>