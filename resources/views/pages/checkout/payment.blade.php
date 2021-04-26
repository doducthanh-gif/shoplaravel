@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li class="active">Payment Cart</li>
            </ol>
        </div>

        <h2>Review & Payment</h2>
        <div class="table-responsive cart_info">
            <?php
            $content = Cart::content();

            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Product</td>
                        <td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="" width="80" /></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$v_content->name}}</a></h4>
                            <p> ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($v_content->price).'VND'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">

                                <form method="post" action="{{URL::to('update-cart-quantity')}}">
                                    {{csrf_field()}}

                                    <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}">
                                    <input class="form-control" type="hidden" value="{{$v_content->rowId}}" name="rowId_cart">
                                    <input class="btn btn-default btn-sm" type="submit" value="Update" name="update_qty">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php
                                $subtotal = $v_content->price * $v_content->qty;
                                echo number_format($subtotal) . '' . 'VND';
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{ URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <h3>Payments</h3>
    <form action="{{ URL::to('/order-place')}}"method="post" >
        {{csrf_field()}}
        <div class="payment-options--payment">

            <span>
                <label><input name="check_option" value="1" type="checkbox"> Pay by InternetBanking</label>
            </span>
            <span>
                <label><input name="check_option" value="2" type="checkbox"> Pay with cash</label>
            </span>
           
            <input class="btn btn-primary btn-sm" type="submit" value="Order" name="send_order_place">
    </form>

    </div>
    </div>
</section>

@endsection