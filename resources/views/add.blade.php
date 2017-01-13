@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">edit</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{action('CrudController@add')}}" enctype="multipart/form-data" >
                            {{ csrf_field() }}

                                <label for="name" class="edit" >name</label>
                                <input id="name" type="text" class="form-control edit" name="name" /><br/>

                                <label for="desc"  class="edit" >description</label>
                                <input id="desc" type="text" class="form-control edit" name="desc" /><br/>

                                <label for="category"  class="edit" >category</label>
                                <input id="category" type="text" class="form-control edit" name="category" /><br/>

                                <label for="product"  class="edit" >product type</label>
                                <input id="product" type="text" class="form-control edit" name="product" /><br/>

                                <label for="file"  class="edit" >image</label>
                                <input type="file" id="file" name="file"  class="form-control edit" /><br/>

                            <button type="button" id="bitedit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Add new
                            </button><br/>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var name=$('#name');  var desc=$('#desc'); var category=$('#category'); var product =$('#product');
            $('#bitedit').click(function(){
                    if(name.val()=="" ||  desc.val()=="" || category.val()=="" || product.val()==""){
                        if(name.val()==""){
                            name.css('border', 'red 1px solid');
                        }
                        if(desc.val()==""){
                            desc.css('border', 'red 1px solid');
                        }
                        if(category.val()==""){
                            category.css('border', 'red 1px solid');
                        }
                        if(product.val()==""){
                            product.css('border', 'red 1px solid');
                        }
                        event.stopPropagation();
                    }
                   if(name.val()!="" &&  desc.val()!="" && category.val()!="" && product.val()!=""){
                     $('#bitedit').attr('type', 'submit');
                   }
            });
        });
    </script>
@endsection