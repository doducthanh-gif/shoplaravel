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
		<div class="register-req">
			<p>Please use Register Or Login to easily get access to your order history, or use Checkout as Guest</p>
		</div>
		<!--/register-req-->

		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-10 clearfix">
					<div class="bill-to">
						<p>Bill Information</p>
						<div class="form-one">
							<form action="{{URL::to('/save-checkout-customer')}}" method="post">
								{{csrf_field()}}
								<input type="text" name="shipping_email" placeholder="Email">
								<input type="text" name="shipping_name" placeholder="Full Name">
								<input type="text" name="shipping_address" placeholder="Address">
								<input type="text" name="shipping_phone" placeholder="Numberphone">
								<div class="order-message">
									<p>Shipping Note</p>
									<textarea name="shipping_notes" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
								</div>
								<input class="btn btn-primary btn-sm" type="submit" value="Send" name="send_order">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section>
<!--/#cart_items-->
@endsection