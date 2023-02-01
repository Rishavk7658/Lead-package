<?php



// Route::group(['namespace' =>'Netweb\Lead\Http\Controllers'],function(){

//     Route::get('crud','CrudController@index')->name('crud-index');
//     Route::post('/insert','CrudController@insert');

//     Route::get('/admin-interest-level','CrudController@admin_interest_level');
//     Route::post('/store-interest-level','CrudController@store_interest_level');
//     Route::post('/edit-interest-level','CrudController@edit_interest_level');
//     Route::post('/delete-interest-level','CrudController@delete_interest_level');

//     Route::get('/admin-lead-status','CrudController@admin_lead_status');
//     // Route::post('/store-lead-status','CrudController@store_lead_status');


// });
Route::group(['middleware' => ['web'],'namespace' =>'Netweb\Lead\Http\Controllers'],function(){

    Route::group(['prefix' => config('lead.Admin_middleware_prefix')], function () {
        Route::post('/store-interest-level','CrudController@store_interest_level');
        Route::post('/edit-interest-level','CrudController@edit_interest_level');
        Route::post('/delete-interest-level','CrudController@delete_interest_level');
        Route::get('/admin-lead-status','CrudController@admin_lead_status');
        Route::get('/admin-interest-level','CrudController@admin_interest_level');
    });

    Route::group(['prefix' => config('lead.User_middleware_prefix')], function () {

        Route::get('/lead-history','CrudController@lead_history_view');
        });
        
        
        Route::get('crud/{id?}','CrudController@index')->name('crud-index');
        Route::post('/insert','CrudController@insert');

        Route::post('/edit-lead','CrudController@edit_lead');
        Route::get('/delete-lead/{id?}','CrudController@delete_lead');
        Route::post('/add-next-foolow-up','CrudController@add_next_foolow_up');

});
?>