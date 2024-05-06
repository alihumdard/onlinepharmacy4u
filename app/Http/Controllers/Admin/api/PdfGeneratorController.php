<?php

namespace App\Http\Controllers\Admin\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class PdfGeneratorController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $data['order'] = json_decode($data['content'], true);
        $order = Order::findOrFail($data['order']['id']);
        $order->print = 'Printed';
        $update = $order->save();

        $file_name = $data['order']['id'] . '_order_details_' . $data['order']['shipingdetails']['firstName'] . '.pdf';
        $view_name = 'pdf.' . $data['view_name'];
        unset($data['content']);
        unset($data['view_name']);
        // dd($data);
        // return view($view_name,$data);
        $pdf = PDF::loadView($view_name, $data);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream($file_name);
        // return $pdf->download($file_name);
    }

    public function gpa_letter(Request $request)
    {
        if ($request->id) {
            $id = $request->id;
            $order = Order::with('user', 'shipingdetails', 'orderdetails', 'orderdetails.product')->where(['id' => $id, 'payment_status' => 'Paid'])->first();
            if ($order) {
                $data['order']  = $order->toArray() ?? [];
                $file_name = $data['order']['id'] . '_gpa_letter_' . $data['order']['shipingdetails']['firstName'] . '.pdf';
                $view_name = 'pdf.' . $request->view_name;
                // dd($data);
                // return view($view_name,$data);
                $pdf = PDF::loadView($view_name, $data);
                $pdf->setPaper('a4', 'portrait');
                // return $pdf->stream($file_name);
                return $pdf->download($file_name);
            } else {
                return redirect()->back()->with('error', 'Order not found.');
            }
        } else {
            return redirect()->back()->with('error', 'Order not found.');
        }
    }
    public function order_bulk_print(Request $request)
    {
        if ($request->order_ids) {
            $orderIds = explode(',', $request->order_ids);
            $orders = Order::with('user', 'shipingdetails', 'orderdetails', 'orderdetails.product')
                ->whereIn('id', $orderIds)
                ->where('payment_status', 'Paid')
                ->get();
            if ($orders) {
                $data['orders']  = $orders->toArray() ?? [];
                $file_name = 'bulk_orders_print_' . time() . '.pdf';
                $view_name = 'pdf.' . $request->view_name;
                // return view($view_name,$data);
                $pdf = PDF::loadView($view_name, $data);
                $pdf->setPaper('a4', 'portrait');
                return $pdf->stream($file_name);
                // return $pdf->download($file_name);
            } else {
                return redirect()->back()->with('error', 'Order not found.');
            }
        } else {
            return redirect()->back()->with('error', 'Order not found.');
        }
    }
}
