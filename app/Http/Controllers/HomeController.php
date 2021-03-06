<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB as FacadesDB;
use App\Http\Requests;
use Mail;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index(Request $request){

        // seo
        $meta_desc= " Computer Supermarket, Laptop, Computer Accessories, PC Gaming, Gaming Gear, Workstations, Console, Supermarket Equipment";
        $meta_keywords = " Computer Technology, PC Gaming, pc gaming";
        $meta_title = "Computer Technology, PC Gaming, pc gaming ";
        $url = $request->url();

        // --seo --
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id', 'desc')->get();
        
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get(); 
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id', 'desc')->limit(6)->get();

        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product',$all_product)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url',$url);
    }

    public function search(Request $request){
        $meta_desc= " Computer Supermarket, Laptop, Computer Accessories, PC Gaming, Gaming Gear, Workstations, Console, Supermarket Equipment";
        $meta_keywords = " Computer Technology, PC Gaming, pc gaming";
        $meta_title = "Computer Technology, PC Gaming, pc gaming ";
        $url = $request->url();
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id', 'desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();



        return view('pages.product.search')->with('category', $cate_product)->with('brand', $brand_product)
        ->with('search_product', $search_product)->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)
        ->with('url',$url) ;;
        
    }
}
