<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class StrukController extends Controller
{
    public function index($idcustomer)
    {
        $orders = Order::with('menu')->where('customer_id', $idcustomer)->get();
        // habungan 3 tabel tabel cart dengan menu dan menu cart dengan customer
        $data = DB::table('tbl_carts')
            ->join('tbl_menuses', 'tbl_carts.menu_id', '=', 'tbl_menuses.id')
            ->join('tbl_customers', 'tbl_carts.customer_id', '=', 'tbl_customers.id')            
            ->select('tbl_carts.*', 'tbl_menuses.*', 'tbl_customers.*')
            ->where('tbl_carts.customer_id', '=', $idcustomer)
            ->get();

        return view('kasir\struk.index', ['data' => $data,'orders' => $orders ]);
    }

    // tidak kepake
    public function cetak()
    {
        // $pdf = PDF::loadview('kasir.struk.index')->setPaper('a4', 'portrait');     

        $pdf = PDF::loadView('kasir.struk.index')->setPaper('a4', 'portrait');

        return $pdf->download('struk.pdf');
        
        
    }
}
