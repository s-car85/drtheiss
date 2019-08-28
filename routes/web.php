<?php


Route::get('/', function () {
    return view('front.pages.index');
});

Route::get('/lekovito-bilje', function () {
    return view('front.pages.bilje');
});

Route::get('/pravila-uslovi-koriscenja-sajta', function () {
    return view('front.pages.uslovi');
});

Route::get('/o-kompaniji', function () {
    return view('front.pages.okompaniji');
});

Route::get('/kontakt', function () {
    return view('front.pages.kontakt');
});

Route::get('/prijava', function () {

    $lectureEvents = \App\LectureEvent::where('active', 1)->get();

    return view('front.pages.prijava', compact('lectureEvents'));
});

// Blog
Route::get('/blog', 'PostsController@index');
Route::get('/blog/pretraga', 'PostsController@searchByTermPaginated');
Route::get('/blog/{slug}', 'PostsController@show');

// Vaucer
Route::get('/vauceri', 'VaucersController@index');
Route::post('/vaucer-download', 'VaucersController@postDownload');
Route::get('/vaucer/{slug}', 'VaucersController@show');


//Sitemap
Route::get('/sitemap', 'StemapController@index');

// Products
Route::get('proizvodi/{slug}', [ 'as' => 'category.index', 'uses' => 'ProductsController@index'])->where('id', '\d+');
Route::get('proizvodi/{slug}/{id?}', [ 'as' => 'products.index', 'uses' => 'ProductsController@index'])->where('id', '\d+');
Route::get('proizvod/{slug}/{id?}', [ 'as' => 'products.show', 'uses' => 'ProductsController@show'])->where('id', '\d+');

// Search Products
Route::get('pretraga', 'ProductsController@searchByTermPaginated');

// Post Contact
Route::post('kontakt', 'ContactController@store');
// Post Lecture
Route::post('prijava', 'LectureController@store');


// Admin Panel
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.' ], function() {

    Route::get('/', 'Admin\AdminController@index');

    // Contacts
    Route::resource('contacts', 'Admin\ContactController', ['only' => ['index', 'update', 'destroy']]);

    // LectureEvents
    Route::resource('lectureevents', 'Admin\LectureEventsController',  ['except' => ['show', 'destroy']]);

    // Lecturers
    Route::get('lectures/archive', 'Admin\LectureController@archive');
    Route::resource('lectures', 'Admin\LectureController', ['only' => ['index', 'update', 'destroy']]);
    Route::post('lectures/archive-all', ['as' => 'lectures.archiveall',  'uses' =>  'Admin\LectureController@archiveAll']);

    // Filemanager
    Route::get('medias', ['as' => 'medias', 'uses' => 'Admin\AdminController@filemanager']);

    // Categories Ajax
    Route::get('categories/brzo', 'Admin\CategoryController@getIndex');
    Route::post('categories/brzo', 'Admin\CategoryController@postIndex');

    // Categories
    Route::resource('categories', 'CategoriesController');

    // Products
    Route::resource('products', 'Admin\ProductsController',  ['except' => ['show']]);

    // Posts
    Route::resource('posts', 'Admin\PostsController',  ['except' => ['show']]);
    // Vauceri
    Route::resource('vaucers', 'Admin\VaucersController',  ['except' => ['show']]);
//   // Photos logos
//    Route::resource('photos', 'Admin\PhotosController',  ['except' => ['show']]);
//   // Edit ajax photo
//    Route::get('photos/edit',['as'=>'photos.editphoto', 'uses'=> 'Admin\PhotosController@editPhoto']);
//    // Delete ajax photo
//    Route::delete('photos',['as'=>'photos.deletephoto', 'uses'=> 'Admin\PhotosController@destroyPhoto']);
//
//    // Testimoials
//    Route::resource('testimonials', 'Admin\TestimonialController',  ['except' => ['show']]);
//    // Client logos
//    Route::resource('clientlogos', 'Admin\ClientlogosController',  ['except' => ['show']]);

    // Image delete
    Route::delete('/image-post', 'Admin\PostsController@imageDelete');

    Route::delete('/image-vaucer', 'Admin\VaucersController@imageDelete');
    Route::delete('/image-vaucer-banner', 'Admin\VaucersController@imagebannerDelete');

    Route::delete('/image-product', 'Admin\ProductsController@imageDelete');

    //Route::delete('/image-testimonials', 'Admin\TestimonialController@imageDelete');

    //Route::delete('/image-logos', 'Admin\ClientlogosController@imageDelete');

    //Route::delete('/image-photos', 'Admin\PhotosController@imageDelete');

    // Users and Profile
    Route::resource('users', 'Admin\UsersController', ['except' => ['show']]);

    Route::get('profile', ['as' => 'users.profile', 'uses' => 'Admin\UsersController@profile']);

    Route::put('profile',['as' => 'users.uprofile', 'uses' => 'Admin\UsersController@updateProfile']);

    // Update Active
    Route::put('updateactive/{id}', 'Admin\ProductsController@updateactive');

    Route::put('updateactivepost/{id}', 'Admin\PostsController@updateactive');

    Route::put('updateactivevaucer/{id}', 'Admin\VaucersController@updateactive');

    Route::put('updatelectureevents/{id}', 'Admin\LectureEventsController@updateactive');

    // DataTables data
    Route::get('usersData',['as' => 'users.data', 'uses' => 'Admin\UsersController@usersData']);

    Route::get('lecturesData',['as' => 'lectures.data', 'uses' => 'Admin\LectureController@lecturesData']);
    Route::get('lecturesDataArchive',['as' => 'lectures.dataArchived', 'uses' => 'Admin\LectureController@lecturesArchivedData']);

    Route::get('contactsData',['as' => 'contacts.data', 'uses' => 'Admin\ContactController@contactsData']);

    Route::get('productsData',['as' => 'products.data', 'uses' => 'Admin\ProductsController@productsData']);

    Route::get('postsData',['as' => 'posts.data', 'uses' => 'Admin\PostsController@postsData']);

    Route::get('vaucersData',['as' => 'vaucers.data', 'uses' => 'Admin\VaucersController@vaucersData']);

    Route::get('lectureeventsData',['as' => 'lectureevents.data', 'uses' => 'Admin\LectureEventsController@lectureeventsData']);

    //Route::get('testmData',['as' => 'testimonials.data', 'uses' => 'Admin\TestimonialController@testmData']);

    //Route::get('logosData',['as' => 'clientlogos.data', 'uses' => 'Admin\ClientlogosController@logosData']);

    //Route::get('photosData',['as' => 'photos.data', 'uses' => 'Admin\PhotosController@photosData']);
    //Order
    //Route::post('reorderData',['as' => 'photos.order', 'uses' => 'Admin\PhotosController@reorderData']);

});

//Tinymce Image upload
Route::get('route/used/for/image/upload', function() {
    return view('admin._image-dialog');
});
Route::post('/image/upload', [
    'as' => 'image.upload',
    'uses' => 'Admin\ControllerCustom@imageUpload'
]);

// Admin login
Route::get('admin/login', 'Admin\AdminController@login')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::post('admin/logout', 'Auth\LoginController@logout')->name('logout');

