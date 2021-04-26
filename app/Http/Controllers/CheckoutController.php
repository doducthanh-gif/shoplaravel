<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use insertGetId;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;

session_start();

class CheckoutController extends Controller
{
    
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function view_order($orderId){
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order.order_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_shipping.*','tbl_order_details.*')->first();
        
        
        $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);

        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);

    }
    public function login_checkout(request $request)
    {
        $meta_desc= "Login";
        $meta_keywords ="Login Checkout";
        $meta_title = "Login Checkout";
        $url = $request->url();

        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();
        return view('pages.checkout.login_checkout')->with('category', $cate_product)->with('brand', $brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url',$url);
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect::to('/checkout');
    }

    public function checkout(request $request)
    {
        $meta_desc= "Checkout";
        $meta_keywords ="Checkout";
        $meta_title = " Checkout";
        $url = $request->url();

        
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();
        return view('pages.checkout.show_checkout')->with('category', $cate_product)->with('brand', $brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url',$url);
    }

    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);
        return Redirect::to('/payment');
    }

    public function payment(request $request)
    {
        $meta_desc= "Payment";
        $meta_keywords ="Payment";
        $meta_title = " Payment";
        $url = $request->url();

        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();
        return view('pages.checkout.payment')->with('category', $cate_product)->with('brand', $brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url',$url);
    }
    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function order_place(Request $request)
    {
        $meta_desc= "Payment";
        $meta_keywords ="Payment";
        $meta_title = " Payment";
        $url = $request->url();

        // payment_method
        $data = array();
        $data['payment_method'] = $request->check_option;
        $data['payment_status'] = 'Waitting Process';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        // order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Waitting Process';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //order details
        $content = Cart::content();
        foreach( $content as $v_content){
        $order_details_data = array();
        $order_details_data['order_id'] = $order_id;
        $order_details_data['product_id'] = $v_content->id;
        $order_details_data['product_name'] = $v_content->name;
        $order_details_data['product_price'] = $v_content->price;
        $order_details_data['product_sales_quantity'] = $v_content->qty;
        DB::table('tbl_order_details')->insert($order_details_data);


        }
        if($data['payment_method']==1){
            echo 'thanh toan the ATM';
        }elseif($data['payment_method']==2){
           Cart::destroy();
           $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
           $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();
           return view('pages.checkout.hand_cash')->with('category', $cate_product)->with('brand', $brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url',$url);

        }else{
            echo'the ghi no';
        }

        //return Redirect::to('/payment');
    }
    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customer')->where('customer_email', $email)->where('customer_password', $password)->first();

        if ($result) {
            Session::put('customer_id', $result->customer_id);
            return Redirect::to('/checkout');
        } else {
            return Redirect::to('/login-checkout');
        }

        Session::put('customer_id', $result->customer_id);
    }

    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->select('tbl_order.*','tbl_customer.customer_name')
        ->orderby('tbl_order.order_id','desc')->get(); 
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);

        return view('admin_layout')->with('admin.manage_order', $manager_order);
        
    }
}
