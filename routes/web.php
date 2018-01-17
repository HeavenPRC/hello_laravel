<?php

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');

/*以上资源路由等同于以下代码

1.显示所有用户列表的页面
Route::get('/users', 'UsersController@index')->name('users.index');
2.显示用户个人信息的页面
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
3.创建用户的页面
Route::get('/users/create', 'UsersController@create')->name('users.create');
4.创建用户
Route::post('/users', 'UsersController@store')->name('users.store');
5.编辑用户个人资料的页面
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
6.更新用户
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
7.删除用户
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');

*/
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
/*重设密码路由*/
/*显示页面*/
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
/*发送邮件*/
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
/*用户修改路由*/
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
/*提交重置密码*/
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');