@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            Product Brand Updates
              <?php
			$message = Session::get('message');
			if ($message) {
				echo '<span  class="text-alert">'. $message .'</span>';
				Session::put('message', null);
			}
			?>   
            </header>
           
            <div class="panel-body">
               
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-brand-product/'.$edit_brand_product->brand_id)}}" method="post" >
                    {{csrf_field()}} 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text" value="{{$edit_brand_product->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Ten Danh Muc">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Brand Description</label>
                            <textarea style=" resize:none"  name="brand_product_desc" rows=8 class="form-control"   id="exampleInputPassword1" > {{$edit_brand_product->brand_desc}}</textarea>
                        </div>
    
                        <button type="submit" name="update_brand_product" class="btn btn-info">Update</button>
                    </form>
                </div>
               

            </div>
        </section>

    </div>
</div>
@endsection