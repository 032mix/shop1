<?php

namespace App\Http\Controllers;

use App\Mail\OrderDetails;
use App\Order;
use App\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if (auth()->check()) {
        return view('order-address', ['cart' => session()->get('cart')]);
//        } else {
//            return view('order-login');
//        }
    }

    public function indexAdmin()
    {
        return view('admin.orders', ['orders' => Order::orderBy('created_at', 'desc')->paginate(10)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!session()->has('cart.products')) {
            return redirect('home');
        }

        $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric'
        ]);

        if (auth()->check()) {
            $user = auth()->user()->id;
        } else {
            $user = null;
        }

        $userDetails = UserDetails::create([
            'first_name' => $request['fname'],
            'last_name' => $request['lname'],
            'address' => $request['address'],
            'phone_num' => $request['phone'],
            'email' => $request['email'],
            'user_id' => $user
        ]);

        $order = Order::create([
            'user_id' => $user,
            'user_details_id' => $userDetails->id,
            'status' => 1
        ]);

        foreach (session('cart.products') as $product) {
            $order->products()->attach($product->id, ['quantity' => $product->cart_quantity, 'price' => $product->price]);
        }

        session()->forget('cart');

//        Mail::to($user)->send(new OrderDetails($user));

        return view('order-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.order', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Order               $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
