<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::auth();

    Route::get('/', 'indexController@index');

    /*Route::get('/food_index', function () {
        return view('food/index');
    });*/
    
    Route::post('contact','CmsController@storeContact');
    Route::get('/self_set', [
        'middleware' => 'auth',
        'uses' => 'userController@index',

    ]);
    Route::get('/self_intro', [
        'middleware' => 'auth',
        'uses' => 'userController@selfintro',

    ]);
    Route::get('member/{id}','MemberController@show');

/*
    Route::get('food_index', 'TaskController@index');
    Route::post('/taskp', 'TaskController@storep');
    Route::delete('/task/{task}', 'TaskController@destroy');
*/
    Route::get('/addFood_v', ['middleware' => 'auth', 
        'uses' =>'TaskController@addFoodv',
]);
    Route::get('/addFood_p', ['middleware' => 'auth', 
    // 只有認證過的使用者能進來這裡...
        'uses' =>'TaskController@addFoodp',
]);
    //Route::get('food_index/{task}','TaskController@show');
    Route::resource('tasks','TaskController');
    Route::get('tasks/{id}/delete','TaskController@destroy');
    Route::post('index_search','TaskController@index_search');
    //Route::post('/tasks', 'TaskController@store');
    Route::post('userchange','userController@userchange');
    Route::post('userchangepic','userController@userchangepic');
    Route::post('userchangeintro','userController@userchangeintro');
    Route::post('changepassword','userController@changepassword');
    Route::post('tasks/collect','CollectController@collect');
    Route::post('tasks/recommand','RecommandController@food_recommand');
    Route::post('selectstyle','indexController@selectstyle');
    Route::post('member/follow','FollowerController@follower');
    Route::post('chooserandomfood','indexController@chooserandomfood');
Route::post('storerandomfood','indexController@storerandomfood');


    Route::resource('school','SchoolController');
Route::get('school/create', ['middleware' => 'auth', 
        'uses' =>'SchoolController@create',
]);
Route::post('school/schoolcomment', ['middleware' => 'auth', 
        'uses' =>'CommentController@schoolcomment',
]);
Route::post('school/joinschool',['middleware' => 'auth', 
        'uses' =>'SchoolController@join',
]);
Route::post('tasks/foodcomment', ['middleware' => 'auth', 
        'uses' =>'CommentController@foodcomment',
]);
Route::get('tasks/foodcomment/{id}', ['middleware' => 'auth', 
        'uses' =>'TaskController@show',
]);
####實在好文
    Route::get('/article','ArticleController@index');
    Route::get('/article/addArticle','ArticleController@create');

####實在好物
    Route::resource('product','ProductController');
    Route::get('/product','ProductController@index');
    Route::get('/product/addProduct', ['middleware' => 'auth', 
        'uses' =>'ProductController@create',
]);
    Route::post('store_product','ProductController@store');

   # Route::post('tasks/foodcomment','CommentController@foodcomment');
    Route::get('cms','CmsController@index');
    Route::get('cms/statistic','CmsController@statistic');
    Route::post('cms/addAnnounce','CmsController@create');
    Route::post('cms/editAnnounce','CmsController@edit');
    Route::post('cms/deleteAnnounce','CmsController@destroy');

    Route::resource('cms/cms_member','CmsMemberController');
    Route::post('cms/cms_memberedit','CmsMemberController@edit');
    Route::post('cms/cms_memberdelete','CmsMemberController@destroy');
    #Route::get('cms/cms_member','CmsMemberController@index');
    Route::resource('cms/cms_task','CmsTaskController');
    Route::post('cms/cms_taskdelete','CmsTaskController@destroy');
    Route::post('cms/cms_commentdelete','CmsTaskController@destroycomment');
    Route::post('cms/recommand_food','CmsTaskController@recommand_food');

    Route::resource('cms/cms_school_deny','CmsSchoolController');
    Route::get('cms/cms_school_agree','CmsSchoolController@index_agree');
    Route::post('cms/cmsSchoolagree','CmsSchoolController@agree');
    Route::post('cms/cmsSchooldeny','CmsSchoolController@deny');

    Route::post('cms/cmsSchooldeletedeny','CmsSchoolController@destroydeny');
    Route::post('checked','indexController@checked');
	Route::post('cms/cms_member/mailtomember','CmsMemberController@mailtomember');
    
    Route::get('cms/changelogo','CmsController@changelogopage');
    Route::post('cms/logochangepic','CmsController@logochangepic');
    Route::get('cms/contact','CmsController@viewcontactpage');
    //Password Reset
    Route::get('password/reset/{token?}','Auth\PasswordController@showResetForm');
    Route::post('password/email','Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset','Auth\PasswordController@reset');
});
