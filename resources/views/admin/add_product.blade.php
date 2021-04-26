@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            Add Products
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span  class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
            </header>

            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product's name</label>
                            <input data-validation="length" data-validation-length="min5" data-validation-erro-msg="Sai roi" type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Ten Danh Muc">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product price</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Gia san pham">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Pictures</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Hinh anh san pham">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description of product</label>
                            <textarea style=" resize:none" name="product_desc" rows=8 class="form-control" id="ckeditor1" placeholder="Mo ta san Pham"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Content</label>
                            <textarea style=" resize:none" name="product_content" rows=8 class="form-control" id="ckeditor2" placeholder="Noi dung san pham"> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Product Category</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key => $cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach


                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Brand</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">

                                @foreach($brand_product as $key => $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Display</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Show</option>
                                <option value="1">Hide</option>

                            </select>
                        </div>

                        <button type="submit" name="add_product" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection

