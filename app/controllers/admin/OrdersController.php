<?php

namespace admin;

use View;
use Redirect;
use Order;
use OrderItem;
use User;
use DB;

class OrdersController extends \BaseController {
	
	public function orders() {

		$orders = DB::table('orders')
            ->join('users', 'orders.user', '=', 'users.id')
            ->select('users.name', 'users.company_name', 'orders.id','orders.datetime','orders.treated')
            ->get();

  		return View::make('admin.order')->with('orders', $orders);
	}


	public function edit($id) {

		$order = DB::table('orders')
            ->join('users', 'orders.user', '=', 'users.id')
            ->select('users.id as user_id', 'users.name', 'users.company_name', 'users.email', 'users.phone', 'users.address',
            		 'orders.id', 'orders.datetime','orders.treated')
            ->where('orders.id', '=', $id)
            ->get();

        $products = OrderItem::where('order_id', '=', $id)->get();

		return View::make('admin.order-edit')->with('order', $order)->with('products', $products);
	}


	public function update($id) {

		$order = Order::find($id);

		$order->treated = 1;

		$order->save();
    	return Redirect::to('admin/encomendas/' . $id)->withInput();
	}

}