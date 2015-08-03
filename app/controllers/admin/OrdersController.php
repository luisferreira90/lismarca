<?php

namespace admin;

use View;
use Redirect;
use Order;
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
            ->select('users.id', 'users.name', 'users.company_name', 'users.email', 'users.phone', 'users.address',
            		 'orders.datetime','orders.treated')
            ->where('orders.id', '=', $id)
            ->get();

            //var_dump($order);die();

		return View::make('admin.order-edit')->with('order', $order);
	}


	public function update($id) {
		$data = Input::only(['name']);
		
		$validator = Validator::make($data, [
			'name' => 'required|min:2'
		]);

        if($validator->fails()){
            return Redirect::to('admin/localizacoes/' . $id)->withErrors($validator)->withInput();
        }

        Location::find($id)->fill($data)->save();  
    	return Redirect::to('admin/localizacoes/' . $id)->withInput();
	}


	public function destroy($id) {
		Location::find($id)->delete();
		return Redirect::to('admin/localizacoes');
	}

}