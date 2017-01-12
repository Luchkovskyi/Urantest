<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Product;
use App\Product_type;


class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('edit',['Product' => $Product]);
    }

    public function create()
    {
        return view('add');
    }

    public function add(Request $request)
    {
        if(!empty($request->category) && !empty($request->product) && !empty($request->name) && !empty($request->desc)) {
            $request->category=htmlspecialchars($request->category);
            $request->product=htmlspecialchars($request->product);
            $request->name=htmlspecialchars($request->name);
            $request->desc=htmlspecialchars($request->desc);

            $cat = new Category();
            $type = new Product_type();
            $product = new Product();
            //var_dump($request->name); exit;
            $cat->name = $request->category;
            $cat->save();
            $indexCat = Category::max('id');

            $type->name = $request->product;
            $type->save();
            $indexType = Product_type::max('id');

            $product->name=$request->name;
            $product->description=$request->desc;
            $product->categories_id=$indexCat;
            $product->product_types_id=$indexType;

            if($request->hasFile('file'))
            {
                $root=$_SERVER['DOCUMENT_ROOT']."/images/"; // это корнева¤ папка дл¤ загрузки картинок
                $f_name=$request->file('file')->getClientOriginalName();//определ¤ем им¤ файла
                $request->file('file')->move($root,$f_name); //перемещаем файл в папку с оригинальным именем

            $product->image="/images/".$f_name;
            }
            $product->save();
            return back()->with('message', 'Товар сохранен');
        }
        else {
            return view("add");

        }
    }

    public function update(Request $request)
    {
        $product=Product::find($request->ind);

        $indexCat = Category::find($product->categories_id);

        $indexCat->name=$request->category;
        $indexCat->save();

        $indexType = Product_type::find($product->product_types_id);
        $indexType->name=$request->product;
        $indexType->save();

        $product->name=$request->name;
        $product->description=$request->desc;
        if($request->hasFile('file'))
        {
            $root=$_SERVER['DOCUMENT_ROOT']."/images/"; // это корнева¤ папка дл¤ загрузки картинок
            $f_name=$request->file('file')->getClientOriginalName();//определ¤ем им¤ файла
            $request->file('file')->move($root,$f_name); //перемещаем файл в папку с оригинальным именем

            $product->image="/images/".$f_name;
        }
        $product->save();

        return back();

    }

}
