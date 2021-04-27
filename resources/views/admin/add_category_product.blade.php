@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            Add Product Category
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
                    <form role="form" action="{{URL::to('/save-category-product')}}" method="post" >
                    {{csrf_field()}} 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Ten Danh Muc">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Catalog Description</label>
                            <textarea style=" resize:none" name="category_product_desc" rows=8 class="form-control"   id="exampleInputPassword1" placeholder="Mo ta danh muc"> </textarea>
                        </div>
            
                        
                        <div class="form-group">
                        <label for="exampleInputPassword1">Display</label>
                            <select name="category_product_status" class="form-control input-sm m-bot15">
                                <option value="0" >Show</option>
                                <option value="1" >Hide</option>
                                
                            </select>
                        </div>
                        
                        <button type="submit" name="add_category_product" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection