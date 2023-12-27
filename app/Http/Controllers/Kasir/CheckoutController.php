<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idcustomer)
    {
        $orders = Order::with('menu')->where('customer_id', $idcustomer)->get();
        $chef = User::where('role', 'chef')->get();
        // gabungan 3 tabel
        $data = DB::table('tbl_carts')
            ->join('tbl_menuses', 'tbl_carts.menu_id', '=', 'tbl_menuses.id')
            ->join('tbl_customers', 'tbl_carts.customer_id', '=', 'tbl_customers.id')
            ->select('tbl_carts.*', 'tbl_menuses.*', 'tbl_customers.*')
            ->where('tbl_carts.customer_id', '=', $idcustomer)
            ->get();
            

        return view('kasir.checkout', ['orders' => $orders, 'data' => $data, 'chef' => $chef]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idCustomer)
    {
        $order = Order::where('customer_id', $idCustomer)->first();

        // Check if the order exists
        if ($order) {
            // Update the order details
            $order->user_id = $request->chef;
            $order->total = $request->total;
            $order->status_pembayaran = 'Sudah Dibayar';
            $order->metode_pembayaran = $request->metode;
            $order->save();

            // return redirect()->route('kasir.dashboard');
            // gas ke halaman struk
            return redirect()->route('struk', ['idCustomer' => $idCustomer]);
        } else {
            return redirect()->route('kasir.dashboard')->with('error', 'Pesanan Tidak Ada');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
