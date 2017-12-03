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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home','HomeController@index')->name('home');
Route::resource('/admin','AdminController');
//Route::get('/search','AdminController@search');

// chính sách trả phòng
// P.Manh - 4/11/17
Route::resource('checkoutpolicy','CheckoutpolicyController');
Route::get('/checkoutpolicy.search','CheckoutpolicyController@search');

// khách hàng
// P.Manh - 4/11/17
Route::resource('customer','CustomerController');
Route::get('/customer.search','CustomerController@search');

// thiết bị
// P.Manh - 6/11/17
Route::resource('device','DeviceController');
Route::get('/device.search','DeviceController@search');

// chi tiêt hóa đơn
// P.Manh - 6/11/17
Route::resource('billdetail','BilldetailController');
Route::get('/billdetail.search','BilldetailController@search');

// chi tiết phiếu nhận phòng
// P.Manh - 6/11/17
Route::resource('checkindetail','CheckindetailController');
Route::get('/checkindetail.search','CheckindetailController@search');

// chi tiết phiếu thuê phòng
// P.Manh - 6/11/17
Route::resource('roomreservationdetail','RoomreservationdetailController');
Route::get('/roomreservationdetail.search','RoomreservationdetailController@search');

// danh sách sử dụng dịch vụ
// P.Manh - 6/11/17
Route::resource('serviceusagelist','ServiceusagelistController');
Route::get('/serviceusagelist.search','ServiceusagelistController@search');

// dịch vụ
// P.Manh - 6/11/17
Route::resource('service','ServiceController');
Route::get('/service.search','ServiceController@search');

// đơn vị
// P.Manh - 6/11/17
Route::resource('unit','UnitController');
Route::get('/unit.search','UnitController@search');

// hóa đơn
// P.Manh - 6/11/17
Route::resource('bill','BillController');
Route::get('/bill.search','BillController@search');

// loại dịch vụ
// P.Manh - 6/11/17
Route::resource('typeofservice','TypeofserviceController');
Route::get('/typeofservice.search','TypeofserviceController@search');

// loại phòng
// P.Manh - 6/11/17
Route::resource('roomtype','RoomtypeController');
Route::get('/roomtype.search','RoomtypeController@search');

// loại tình trạng phòng
// P.Manh - 6/11/17
Route::resource('statusroomtype','StatusroomtypeController');
Route::get('/statusroomtype.search','StatusroomtypeController@search');

// phiếu nhận phòng
// P.Manh - 6/11/17
Route::resource('checkin','CheckinController');
Route::get('/checkin.search','CheckinController@search');

// phòng
// P.Manh - 6/11/17
Route::resource('room','RoomController');
Route::get('/room.search','RoomController@search');

// quy định
// P.Manh - 6/11/17
Route::resource('regulation','RegulationController');
Route::get('/regulation.search','RegulationController@search');

// so do phong
// P.Manh 1/12/17
Route::resource('roommap','RoommapController');