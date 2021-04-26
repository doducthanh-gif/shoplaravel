@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
        List the brand of the product
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">

                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span  class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Brand name</th>
                        <th>Display</th>

                        <th style="width:30px;"></th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($all_brand_product as $key => $brand_pro)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$brand_pro->brand_name }}</td>
                        <td><span class="text-ellipsis">
                                <?php
                                if ($brand_pro->brand_status == 0) {
                                ?>
                                    <a href="{{URL::to('/unactive-brand-product/'.$brand_pro->brand_id)}}" class="fa-thumbs-up-stylelink"><span class="  fa fa-thumbs-up"></span> </a>
                                <?php
                                } else {
                                ?>
                                    <a href="{{URL::to('/active-brand-product/'.$brand_pro->brand_id)}}" class="fa-thumbs-down-stylelink"><span class=" fa fa-thumbs-down"></span> </a>

                                <?php
                                }
                                ?>
                            </span></td>
                        <td>
                            <a href="{{URL::to('/edit-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                            <a  onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                
                
            </div>
        </footer>
    </div>
</div>
@endsection