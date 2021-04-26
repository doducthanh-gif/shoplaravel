@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            Product Category Updates
              <?php
			$message = Session::get('message');
			if ($message) {
				echo '<span  class="text-alert">'. $message .'</span>';
				Session::put('message', null);
			}
			?>   
            </header>
           
            <div class="panel-body">
                @foreach($edit_category_product as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post" >
                    {{csrf_field()}} 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" value="{{$edit_value->category_name}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Ten Danh Muc">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Cateogry Description</label>
                            <textarea style=" resize:none"  name="category_product_desc" rows=8 class="form-control"   id="exampleInputPassword1" > {{$edit_value->category_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category Keywords</label>
                            <textarea style=" resize:none" name="category_product_keywords" rows=8 class="form-control"   id="exampleInputPassword1" placeholder="Mo ta danh muc">{{$edit_value->meta_keywords}} </textarea>
                        </div>
    
                        <button type="submit" name="update_category_product" class="btn btn-info">Update</button>
                    </form>
                </div>
                @endforeach

            </div>
        </section>

    </div>
</div>
@endsection