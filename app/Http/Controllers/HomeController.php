<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Product_type;

class HomeController extends Controller
{
    public function index()
    {
        $Product = Product::all();
        $Type = Product_type::all();
        $Category = Category::all();
        foreach($Product as $item){
            foreach($Category as $item2){
                if($item->categories_id == $item2->id){
                    $item->categories_id=$item2->name;
                }
            }
        }
        foreach($Product as $item){
            foreach($Type as $item2){
                if($item->product_types_id == $item2->id){
                    $item->product_types_id=$item2->name;
                }
            }
        }
        return view('home',['Product' => $Product, 'Type'=>$Type, 'Category'=>$Category]);
    }

    public function find(Request $request)
    {

        $name=htmlspecialchars($request->name);
        $prod=htmlspecialchars($request->product);
        $category=htmlspecialchars($request->category);
        $Type = Product_type::all();
        $Category = Category::all();

        if(!empty($name) && !empty($prod) && !empty($category)){
           $Product = Product::where('name','=',$name)->where('product_types_id','=',$prod)->where('categories_id','=',$category)->get();
        }
        elseif(!empty($name) && empty($prod) && empty($category)){
            $Product = Product::where('name','=',$name)->get();
        }
        elseif(empty($name) && !empty($prod) && empty($category)){
            $Product = Product::where('product_types_id','=',$prod)->get();
        }
        elseif(empty($name) && empty($prod) && !empty($category)){
            $Product = Product::where('categories_id','=',$category)->get();
        }
        elseif(!empty($name) && !empty($prod) && empty($category)){
            $Product = Product::where('name','=',$name)->where('product_types_id','=',$prod)->get();
        }
        elseif(!empty($name) && empty($prod) && !empty($category)){
            $Product = Product::where('name','=',$name)->where('categories_id','=',$category)->get();
        }
        elseif(empty($name) && !empty($prod) && !empty($category)){
            $Product = Product::where('categories_id','=',$category)->where('product_types_id','=',$prod)->get();
        }
        elseif(empty($name) && empty($prod) && empty($category)){
            $Product = Product::all();
        }

        foreach($Product as $item){
            foreach($Category as $item2){
                if($item->categories_id==$item2->id)
                    $item->categories_id=$item2->name;
            }
        }

        foreach($Product as $item){
            foreach($Type as $item2){
                if($item->product_types_id == $item2->id)
                    $item->product_types_id=$item2->name;
            }
        }
        return view('home',['Product' => $Product, 'Type'=>$Type, 'Category'=>$Category]);


    }



}
