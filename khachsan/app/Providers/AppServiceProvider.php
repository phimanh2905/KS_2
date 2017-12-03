<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use View;
use App\RoomType;
use App\StatusRoomType;
use App\TypeOfService;
use App\Unit;
use App\Service;
use App\CheckIn;
use App\Room;
use App\Customer;
use App\RoomReservationDetail;
use App\User;
use App\CheckOutPolicy;
use App\ServiceUsageList;
use App\Device;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

// combo ma loai phong ( thiet bi )
        view()->composer('admin.device.device', function($view) {
            $loaiPhong = RoomType::all();
            $view->with('loaiPhong', $loaiPhong);
        });


// combo ma loai phong ( phong )
        view()->composer('admin.room.room', function($view) {
            $loaiPhong = RoomType::all();
            $view->with('loaiPhong', $loaiPhong);
        });

// combo ma tinh trang phong ( phong )
        view()->composer('admin.room.room', function($view) {
            $tinhTrangPhong = StatusRoomType::all();
            $view->with('tinhTrangPhong', $tinhTrangPhong);
        });

// combo ma loai dich vu ( dich vu )
        view()->composer('admin.service.service', function($view) {
            $loaiDichVu = TypeOfService::all();
            $view->with('loaiDichVu', $loaiDichVu);
        });

// combo ma don vi ( dich vu)
        view()->composer('admin.service.service', function($view) {
            $donVi = Unit::all();
            $view->with('donVi', $donVi);
        });

// combo ma loai dich vu ( danh sach su dung dich vu)
        view()->composer('admin.serviceusagelist.serviceusagelist', function($view) {
            $loaiDichVu = TypeOfService::all();
            $view->with('loaiDichVu', $loaiDichVu);
        });

// combo ma nhan phong ( danh sach su dung dich vu)
        view()->composer('admin.serviceusagelist.serviceusagelist', function($view) {
            $nhanPhong = Room::all();
            $view->with('nhanPhong', $nhanPhong);
        });

// combo ma phong ( danh sach chi tiet phieu nhan phong )
        view()->composer('admin.checkindetail.checkindetail', function($view) {
            $tenPhong = Room::all();
            $view->with('tenPhong', $tenPhong);
        });

// combo ho ten khach hang ( danh sach khach hang )
        view()->composer('admin.checkindetail.checkindetail', function($view) {
            $khachHang = Customer::all();
            $view->with('khachHang', $khachHang);
        });

// combo ma phong ( danh sach chi tiet phieu nhan phong )
        view()->composer('admin.roomreservationdetail.roomreservationdetail', function($view) {
            $tenPhong = Room::all();
            $view->with('tenPhong', $tenPhong);
        });

// combo ma khach hang ( phieu nhan phong )
        view()->composer('admin.checkin.checkin', function($view) {
            $khachHang = Customer::all();
            $view->with('khachHang', $khachHang);
        });

// combo ma khach hang ( chi tiet phieu thue phong )
        view()->composer('admin.roomreservationdetail.roomreservationdetail', function($view) {
            $khachHang = Customer::all();
            $view->with('khachHang', $khachHang);
        });

// combo ma phieu thue ( phieu nhan phong )
        view()->composer('admin.checkin.checkin', function($view) {
            $phieuThue = RoomReservationDetail::all();
            $view->with('phieuThue', $phieuThue);
        });


// combo ma khach hang, ma nhan phong, nhan vien lap ( hoa don )
        view()->composer('admin.bill.bill', function($view) {
            $khachHang = Customer::all();
            $view->with('khachHang', $khachHang);
        });

        view()->composer('admin.bill.bill', function($view) {
            $nhanPhong = Room::all();
            $view->with('nhanPhong', $nhanPhong);
        });

        view()->composer('admin.bill.bill', function($view) {
            $nhanVienLap = user::all();
            $view->with('nhanVienLap', $nhanVienLap);
        });

// combo  (chi tiet hoa don)
        view()->composer('admin.billdetail.billdetail', function($view) {
            $tenPhong = Room::all();
            $view->with('tenPhong', $tenPhong);
        });

        view()->composer('admin.billdetail.billdetail', function($view) {
            $chinhSach = CheckOutPolicy::all();
            $view->with('chinhSach', $chinhSach);
        });

        view()->composer('admin.billdetail.billdetail', function($view) {
            $suDungDichVu = ServiceUsageList::all();
            $view->with('suDungDichVu', $suDungDichVu);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
