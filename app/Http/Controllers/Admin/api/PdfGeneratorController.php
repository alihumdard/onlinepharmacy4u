<?php
namespace App\Http\Controllers\Admin\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
 
class PdfGeneratorController extends Controller
{
    public function index(Request $request) 
    {
        $data = $request->all();
        $data['order'] =json_decode($data['content'],true);
        $file_name = $data['order']['id'].'_order_details_'.$data['order']['shipingdetails']['firstName'].'.pdf';
        $view_name = 'pdf.'.$data['view_name'];
        unset($data['content']);
        unset($data['view_name']);
        // dd($data);
        // return view($view_name,$data);
        $pdf = PDF::loadView($view_name, $data);
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream($file_name);
        // return $pdf->download($file_name);
    }
}