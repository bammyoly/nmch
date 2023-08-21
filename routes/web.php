<?php

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

Route::get('/', [
	'uses' => 'ExcoController@welcome',
	'as' => '/'
]);

Auth::routes(['verify' => 'true']);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('excos', [
	'uses' => 'ExcoController@index',
	'as' => 'excos'
]);

Route::get('blog', [
	'uses' => 'BlogController@index',
	'as' => 'blog'
]);

Route::get('b/{slug}', [
	'uses' => 'BlogController@show',
	'as' => 'blog.show'
]);

Route::get('mentorship', [
	'uses' => 'MentorController@index',
	'as' => 'mentorship'
]);

Route::post('mentorship/request', [
	'uses' => 'MentorController@store',
	'as' => 'mentorship.request'
]);

Route::get('elibrary', [
	'uses' => 'BookController@elibrary',
	'as' => 'elibrary'
]);

Route::get('profile/{slug}', [
	'uses' => 'ProfileController@profile',
	'as' => 'profile'
]);

Route::get('gallery', [
	'uses' => 'GalleryController@index',
	'as' => 'gallery'
]);

Route::get('gallery/{slug}', [
	'uses' => 'GalleryController@show',
	'as' => 'gallery.show'
]);


Route::group([ 'middleware' => 'auth', 'prefix' => 'users'], function()
{

	Route::get('mentor/request', [
		'uses' => 'MentorController@create',
		'as' => 'mentor.request'
	]);

	Route::post('mentor/store', [
		'uses' => 'MentorController@store',
		'as' => 'mentor.store'
	]);

	Route::get('profile/settings/{slug}', [
		'uses' => 'ProfileController@edit',
		'as' => 'settings'
	]);

	Route::post('profile/update/{slug}', [
		'uses' => 'ProfileController@update',
		'as' => 'profile.update'
	]);

	Route::post('profile/image/{slug}', [
		'uses' => 'ProfileController@profileImage',
		'as' => 'profile.image'
	]);

	Route::post('user/update/{slug}', [
		'uses' => 'ProfileController@profileUpdate',
		'as' => 'user.update'
	]);

	Route::get('mentors', [
		'uses' => 'ProfileController@mentors',
		'as' => 'mentors'
	]);

	Route::get('mentor/add/{user}', [
		'uses' => 'MentorController@mentor',
		'as' => 'mentor.add'
	]);

	Route::get('mentor/remove/{user}', [
		'uses' => 'MentorController@unmentor',
		'as' => 'mentor.remove'
	]);

	Route::get('inbox/{slug}', [
		'uses' => 'MessageController@index',
		'as' => 'inbox'
	]);

	Route::get('outbox/{slug}', [
		'uses' => 'MessageController@outbox',
		'as' => 'outbox'
	]);

	Route::get('mentor/request/{slug}', [
		'uses' => 'MessageController@create',
		'as' => 'request.new'
	]);

	Route::post('message/{slug}', [
		'uses' => 'MessageController@store',
		'as' => 'message.new'
	]);

	Route::get('message/{id}/show', [
		'uses' => 'MessageController@show',
		'as' => 'message.show'
	]);

	Route::post('message/{id}/reply', [
		'uses' => 'MessageController@reply',
		'as' => 'message.reply'
	]);

	Route::get('reply/show/{id}', [
		'uses' => 'MessageController@showReply',
		'as' => 'reply.show'
	]);

	Route::get('blog/add', [
		'uses' => 'BlogController@create',
		'as' => 'blog.add'
	]);

	Route::post('blog/store', [
		'uses' => 'BlogController@store',
		'as' => 'blog.store'
	]);

	Route::get('blog/edit/{slug}', [
		'uses' => 'BlogController@edit',
		'as' => 'blog.edit'
	]);

	Route::get('blog/delete/{blog_id}', [
		'uses' => 'BlogController@destroy',
		'as' => 'blog.delete'
	]);

	Route::post('blog/update/{blog_id}', [
		'uses' => 'BlogController@update',
		'as' => 'blog.update'
	]);

	Route::get('blogs/manage', [
		'uses' => 'BlogController@manage',
		'as' => 'blog.manage'
	]);

	Route::get('elibrary/books', [
		'uses' => 'BookController@index',
		'as' => 'elibrary.books'
	]);

	Route::get('book/download/{file}', [
		'uses' => 'BookController@download',
		'as' => 'book.download'
	]);

	Route::get('book/search', [
		'uses' => 'BookController@search',
		'as' => 'book.search'
	]);

	Route::get('book/{book_id}', [
		'uses' => 'BookController@show',
		'as' => 'book.show'
	]);

	Route::get('books/category/{slug}', [
		'uses' => 'BcategoryController@show',
		'as' => 'books.category'
	]);

	Route::post('blog/comment/{blog_id}', [
		'uses' => 'CommentController@store',
		'as' => 'blog.comment'
	]);

	Route::get('category/{slug}', [
		'uses' => 'CategoryController@show',
		'as' => 'category.show'
	]);




});

Route::group([ 'middleware' => 'admin', 'prefix' => 'admin'], function()
{

	Route::get('blogs/pending', [
		'uses' => 'BlogController@pending',
		'as' => 'blog.pending'
	]);

	Route::get('blogs/approved', [
		'uses' => 'BlogController@approved',
		'as' => 'blog.approved'
	]);

	Route::get('blog/all', [
		'uses' => 'BlogController@all',
		'as' => 'blog.all'
	]);

	Route::get('blog/approve/{blog_id}', [
		'uses' => 'BlogController@approve',
		'as' => 'blog.approve'
	]);

	Route::get('users/manage', [
		'uses' => 'ProfileController@manage',
		'as' => 'users.manage'
	]);

	Route::get('blog/approve/{blog_id}', [
		'uses' => 'BlogController@approve',
		'as' => 'blog.approve'
	]);

	Route::get('mentor/join/{slug}', [
		'uses' => 'ProfileController@joinMentor',
		'as' => 'mentor.join'
	]);

	Route::post('mentor/become/{slug}', [
		'uses' => 'ProfileController@becomeMentor',
		'as' => 'mentor.become'
	]);

	Route::get('mentor/remove/{slug}', [
		'uses' => 'ProfileController@removeMentor',
		'as' => 'mentor.remove'
	]);

	Route::get('admin/make/{slug}', [
		'uses' => 'ProfileController@makeAdmin',
		'as' => 'admin.make'
	]);

	Route::get('admin/remove/{slug}', [
		'uses' => 'ProfileController@removeAdmin',
		'as' => 'admin.remove'
	]);

	Route::get('mentors/manage', [
		'uses' => 'ProfileController@manageMentors',
		'as' => 'mentors.manage'
	]);

	Route::get('manage_admins', [
		'uses' => 'ProfileController@manageAdmins',
		'as' => 'admins.manage'
	]);

	Route::get('adminpanel', [
		'uses' => 'ProfileController@adminpanel',
		'as' => 'adminpanel'
	]);

	Route::get('excos/manage', [
		'uses' => 'ExcoController@manage',
		'as' => 'excos.manage'
	]);

	Route::get('exco/add', [
		'uses' => 'ExcoController@create',
		'as' => 'exco.add'
	]);

	Route::post('exco/store', [
		'uses' => 'ExcoController@store',
		'as' => 'exco.store'
	]);

	Route::get('exco/edit/{id}', [
		'uses' => 'ExcoController@edit',
		'as' => 'exco.edit'
	]);

	Route::post('exco/update/{id}', [
		'uses' => 'ExcoController@update',
		'as' => 'exco.update'
	]);

	Route::get('exco/delete/{id}', [
		'uses' => 'ExcoController@destroy',
		'as' => 'exco.delete'
	]);

	Route::get('categories', [
		'uses' => 'CategoryController@index',
		'as' => 'categories'
	]);

	Route::get('category/add', [
		'uses' => 'CategoryController@create',
		'as' => 'category.add'
	]);

	Route::get('category/edit/{id}', [
		'uses' => 'CategoryController@edit',
		'as' => 'category.edit'
	]);

	Route::post('category/store', [
		'uses' => 'CategoryController@store',
		'as' => 'category.store'
	]);

	Route::post('category/update/{id}', [
		'uses' => 'CategoryController@update',
		'as' => 'category.update'
	]);

	Route::get('category/delete/{id}', [
		'uses' => 'CategoryController@destroy',
		'as' => 'category.delete'
	]);

	Route::get('book/categories', [
		'uses' => 'BcategoryController@index',
		'as' => 'bcategories'
	]);

	Route::get('bookcategory/add', [
		'uses' => 'BcategoryController@create',
		'as' => 'bcategory.add'
	]);

	Route::get('bookcategory/edit/{id}', [
		'uses' => 'BcategoryController@edit',
		'as' => 'bcategory.edit'
	]);

	Route::post('bookcategory/store', [
		'uses' => 'BcategoryController@store',
		'as' => 'bcategory.store'
	]);

	Route::post('bookcategory/update/{id}', [
		'uses' => 'BcategoryController@update',
		'as' => 'bcategory.update'
	]);

	Route::get('bookcategory/delete/{id}', [
		'uses' => 'BcategoryController@destroy',
		'as' => 'bcategory.delete'
	]);

	Route::get('book/manage', [
		'uses' => 'BookController@manage',
		'as' => 'books.manage'
	]);

	Route::get('book/add', [
		'uses' => 'BookController@create',
		'as' => 'book.add'
	]);

	Route::post('book/store', [
		'uses' => 'BookController@store',
		'as' => 'book.store'
	]);

	Route::get('book/files/{book_id}', [
		'uses' => 'BookController@files',
		'as' => 'book.files'
	]);

	Route::post('book/uploadfiles/{id}', [
		'uses' => 'BookController@uploadFiles',
		'as' => 'book.uploadfile'
	]);

	Route::get('book/edit/{book_id}', [
		'uses' => 'BookController@edit',
		'as' => 'book.edit'
	]);

	Route::post('book/{book_id}', [
		'uses' => 'BookController@update',
		'as' => 'book.update'
	]);

	Route::get('book/delete/{book_id}', [
		'uses' => 'BookController@destroy',
		'as' => 'book.delete'
	]);

	Route::get('upload/delete/{id}', [
		'uses' => 'BookController@deleteFile',
		'as' => 'upload.delete'
	]);

	Route::get('gallery/manage', [
		'uses' => 'GalleryController@manage',
		'as' => 'gallery.manage'
	]);

	Route::get('gallery/photos/{id}', [
		'uses' => 'GalleryController@photos',
		'as' => 'gallery.photos'
	]);

	Route::get('gallery/add', [
		'uses' => 'GalleryController@create',
		'as' => 'gallery.add'
	]);

	Route::post('gallery/store', [
		'uses' => 'GalleryController@store',
		'as' => 'gallery.store'
	]);

	Route::post('gallery/uploadimage/{id}', [
		'uses' => 'GalleryController@uploadimage',
		'as' => 'gallery.uploadimage'
	]);

	Route::get('gallery/edit/{id}', [
		'uses' => 'GalleryController@edit',
		'as' => 'gallery.edit'
	]);

	Route::get('gallery/delete/{id}', [
		'uses' => 'GalleryController@destroy',
		'as' => 'gallery.delete'
	]);

	Route::post('gallery/update/{id}', [
		'uses' => 'GalleryController@update',
		'as' => 'gallery.update'
	]);

	Route::get('gallery/delete_photo/{id}', [
		'uses' => 'GalleryController@destroyPhoto',
		'as' => 'gallery.deletephoto'
	]);

	Route::get('mentor/requests', [
		'uses' => 'MentorController@viewRequests',
		'as' => 'mentor.requests'
	]);


});
