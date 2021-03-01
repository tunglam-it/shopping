<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {

    Route::get('/', [
        'as' => 'admin.login',
        'uses' => 'AdminController@loginAdmin'
    ]);

    Route::post('/', [
        'as' => 'admin.post-login',
        'uses' => 'AdminController@postLoginAdmin'
    ]);

    Route::prefix('categories')->group(function () {
        Route::get('/', [
                'as' => 'categories.index',
                'uses' => 'CategoryController@index',
                'middleware' => 'can:category-list'
            ]
        );
        Route::get('/create', [
                'as' => 'categories.create',
                'uses' => 'CategoryController@create'
            ]
        );
        Route::post('/store', [
                'as' => 'categories.store',
                'uses' => 'CategoryController@store'
            ]
        );
        Route::get('/edit/{id}', [
                'as' => 'categories.edit',
                'uses' => 'CategoryController@edit'
            ]
        );
        Route::post('/update/{id}', [
                'as' => 'categories.update',
                'uses' => 'CategoryController@update'
            ]
        );
        Route::get('/delete/{id}', [
                'as' => 'categories.delete',
                'uses' => 'CategoryController@delete'
            ]
        );
    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [
                'as' => 'menus.index',
                'uses' => 'MenuController@index'
            ]
        );
        Route::get('/create', [
                'as' => 'menus.create',
                'uses' => 'MenuController@create'
            ]
        );
        Route::post('/store', [
                'as' => 'menus.store',
                'uses' => 'MenuController@store'
            ]
        );
        Route::get('/edit/{id}', [
                'as' => 'menus.edit',
                'uses' => 'MenuController@edit'
            ]
        );
        Route::post('/update/{id}', [
                'as' => 'menus.update',
                'uses' => 'MenuController@update'
            ]
        );
        Route::get('/delete/{id}', [
                'as' => 'menus.delete',
                'uses' => 'MenuController@delete'
            ]
        );

    });

    Route::prefix('product')->group(function () {
        Route::get('/', [
                'as' => 'product.index',
                'uses' => 'AdminProductController@index'
            ]
        );
        Route::get('/create', [
                'as' => 'product.create',
                'uses' => 'AdminProductController@create'
            ]
        );
        Route::post('/store', [
                'as' => 'product.store',
                'uses' => 'AdminProductController@store'
            ]
        );
        Route::get('/edit/{id}', [
                'as' => 'product.edit',
                'uses' => 'AdminProductController@edit'
            ]
        );

        Route::post('/update/{id}', [
                'as' => 'product.update',
                'uses' => 'AdminProductController@update'
            ]
        );

        Route::get('/delete/{id}', [
                'as' => 'product.delete',
                'uses' => 'AdminProductController@delete'
            ]
        );
    });

    Route::prefix('slider')->group(function () {
        Route::get('/', [
                'as' => 'slider.index',
                'uses' => 'SliderAdminController@index'
            ]
        );
        Route::get('/create', [
                'as' => 'slider.create',
                'uses' => 'SliderAdminController@create'
            ]
        );
        Route::post('/store', [
                'as' => 'slider.store',
                'uses' => 'SliderAdminController@store'
            ]
        );
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'SliderAdminController@update'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'SliderAdminController@edit'
        ]);

        Route::get('/delete/{id}', [
                'as' => 'slider.delete',
                'uses' => 'SliderAdminController@delete'
            ]
        );
    });

    Route::prefix('setting')->group(function () {
        Route::get('/', [
                'as' => 'setting.index',
                'uses' => 'SettingAdminController@index'
            ]
        );
        Route::get('/create', [
                'as' => 'setting.create',
                'uses' => 'SettingAdminController@create'
            ]
        );
        Route::post('/store', [
                'as' => 'setting.store',
                'uses' => 'SettingAdminController@store'
            ]
        );
        Route::get('/edit/{id}', [
                'as' => 'setting.edit',
                'uses' => 'SettingAdminController@edit'
            ]
        );
        Route::post('/update/{id}', [
                'as' => 'setting.update',
                'uses' => 'SettingAdminController@update'
            ]
        );
        Route::get('/delete/{id}', [
                'as' => 'setting.delete',
                'uses' => 'SettingAdminController@delete'
            ]
        );
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [
            'as' => 'user.index',
            'uses' => 'UserAdminController@index'
        ]);
        Route::get('/create', [
            'as' => 'user.create',
            'uses' => 'UserAdminController@create'
        ]);
        Route::post('/store', [
            'as' => 'user.store',
            'uses' => 'UserAdminController@store'
        ]);
        Route::post('/update/{id}', [
            'as' => 'user.update',
            'uses' => 'UserAdminController@update'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'user.edit',
            'uses' => 'UserAdminController@edit'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'user.delete',
            'uses' => 'UserAdminController@delete'
        ]);
    });

    Route::prefix('role')->group(function () {
        Route::get('/', [
                'as' => 'role.index',
                'uses' => 'RoleAdminController@index'
            ]
        );
        Route::get('/create', [
                'as' => 'role.create',
                'uses' => 'RoleAdminController@create'
            ]
        );
        Route::post('/store', [
                'as' => 'role.store',
                'uses' => 'RoleAdminController@store'
            ]
        );
        Route::get('/edit/{id}', [
                'as' => 'role.edit',
                'uses' => 'RoleAdminController@edit'
            ]
        );
        Route::post('/update/{id}', [
                'as' => 'role.update',
                'uses' => 'RoleAdminController@update'
            ]
        );
        Route::get('/delete/{id}', [
                'as' => 'role.delete',
                'uses' => 'RoleAdminController@delete'
            ]
        );
    });
});


