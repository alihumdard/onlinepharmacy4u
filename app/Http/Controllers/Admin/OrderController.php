<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $status;
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->status = config('constants.USER_STATUS');
    }

    public function prescription_orders()
    {
        $user = auth()->user();
        $page_name = 'prescription_orders';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        // when order received than get from there
        // $data['orders'] = Order::get();
        $data['title'] = 'Prescription Orders';
        return view('admin.pages.user_orders_list', $data);
    }

    public function online_clinic_orders()
    {
        $user = auth()->user();
        $page_name = 'online_clinic_orders';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        // when order received than get from there
        // $data['orders'] = Order::get();
        $data['title'] = 'Online Clinic Orders';
        return view('admin.pages.user_orders_list', $data);
    }

    public function shop_orders()
    {
        $user = auth()->user();
        $page_name = 'shop_orders';
        if (!view_permission($page_name)) {
            return redirect()->back();
        }

        $data['user'] = auth()->user();

        // when order received than get from there
        // $data['orders'] = Order::get();
        $data['title'] = 'Shop Orders';
        return view('admin.pages.user_orders_list', $data);
    }
}
