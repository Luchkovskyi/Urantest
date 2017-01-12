@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Find</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{action('HomeController@find')}}" >
                        {{ csrf_field() }}
                        <div class="inf2">
                            <label for="name" class="edit" >name</label>
                            <input id="name" type="text" class="form-control editf" name="name" />
                        </div>

                        <div class="inf2">
                            <label for="category"  class="edit" >category</label>
                            <select id="category" type="text" class="form-control editf" name="category">
                                <option value="" selected></option>
                                @foreach( $Category as $er)
                                    <option value="{{$er->id}}">{{$er->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="inf2">
                            <label for="product"  class="edit" >product-type</label>
                            <select id="product" type="text" class="form-control editf" name="product" >
                                <option value="" selected></option>
                                @foreach( $Type as $er)
                                    <option value="{{$er->id}}">{{$er->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" id="bitedit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i>FIND
                        </button>

                    </form>



                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Results</div>

                <div class="panel-body" id>
                    <table class="table table-hover" id="firsttab" border="2px solid grey" >
                        <tr><th> id </th><th> Name </th><th> Description </th><th> Category </th><th>Product-Type </th><th> Image </th></tr>
                        @foreach( $Product as $er)
                            <tr>
                                <td class="{{$er->id}}">{{$er->id}}</td>
                                <td class="{{$er->id}}">{{$er->name}}</td>
                                <td class="{{$er->id}}">{{$er->description}}</td>
                                <td class="{{$er->id}}">{{$er->categories_id}}</td>
                                <td class="{{$er->id}}">{{$er->product_types_id}}</td>
                                <td class="{{$er->id}}"><img src="{{$er->image}}" style="width: 80px; height: 80px;"></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
