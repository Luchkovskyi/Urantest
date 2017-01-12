@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">edit</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{action('CrudController@update')}}" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <div class="inf">
                                <label for="name" class="edit" >name</label>
                                <input id="name" type="text" class="form-control edit" name="name" />
                            </div>

                            <div class="inf">
                                <label for="desc"  class="edit" >description</label>
                                <input id="desc" type="text" class="form-control edit" name="desc" />
                            </div>

                            <div class="inf">
                                <label for="category"  class="edit" >category</label>
                                <input id="category" type="text" class="form-control edit" name="category" />
                            </div>

                            <div class="inf">
                                <label for="product"  class="edit" >product-type</label>
                                <input id="product" type="text" class="form-control edit" name="product" />
                                <input type="hidden" id="ind" name="ind"  class="form-control edit" />
                            </div>

                            <div class="inf" id="file">
                                <label for="file"  class="edit" >image</label>
                                <input type="file" id="file" name="file"  class="form-control edit" />
                            </div>

                            <button type="submit" id="bitedit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> update
                            </button>

                        </form>

                    </div>

                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">table with data</div>
                    <div class="panel-body" >
                        <table class="table table-hover" id="firsttab" border="2px solid grey" >
                            <tr><th> id </th><th> Name </th><th> Description </th><th> Category </th><th>Product-Type </th><th> Image </th><th> option </th></tr>
                            @foreach( $Product as $er)
                                <tr>
                                <td class="{{$er->id}}">{{$er->id}}</td>
                                    <td class="{{$er->id}}">{{$er->name}}</td>
                                    <td class="{{$er->id}}">{{$er->description}}</td>
                                    <td class="{{$er->id}}">{{$er->categories_id}}</td>
                                    <td class="{{$er->id}}">{{$er->product_types_id}}</td>
                                    <td class="{{$er->id}}"><img src="{{$er->image}}" style="width: 80px; height: 80px;"></td>
                                    <td><a class="click" id="{{$er->id}}" href="#">edit</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {

       $('.click').click(function() {
           var ind=$(this).attr("id");
           var name=$('.'+ind);
           var ArrList = $(name).map(function(){
               return $(this).text();
           }).get();
           $('#ind').val(ArrList[0]);
           $('#name').val(ArrList[1]);
           $('#desc').val(ArrList[2]);
           $('#category').val(ArrList[3]);
           $('#product').val(ArrList[4]);

        });

    });</script>

@endsection


