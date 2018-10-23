@extends('layouts.client.app')
@section('content')
<section id="topic-header">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h1>Cart</h1>
        <p>A Bunch Of Products</p>
      </div>	<!-- End of /.col-md-4 -->
      <div class="col-md-8 hidden-xs">
        <ol class="breadcrumb pull-right">
            <li><a href="#">Home</a></li>
            <li class="active">Cart</li>
        </ol>
      </div>	<!-- End of /.col-md-8 -->
    </div>	<!-- End of /.row -->
  </div>	<!-- End of /.container -->
</section>	<!-- End of /#Topic-header -->



<!-- PRODUCTS Start
  ================================================== -->

<section id="shop">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="table-responsive cart_info">

				<table class="table table-condensed" id="cart_table">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price_title">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>

            @if(count($orders))
					<tbody>
            <?php $row_index = -1;
                  $total_price = 0;
            ?>
            @foreach($orders as $order)
            <?php $product = $order->Product;
                  $image = $product->Image;
                  $row_index++;
                  $total_price += ($product->price * $order->quantity);
            ?>
              {{Form::open(array('id'=>'formProduct'))}}
						<tr id="cart_row_{{$row_index}}">
							<td class="cart_product">
								<a href=""><img src="{{$image->url}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$product->name}} </a></h4>
                <p>Web ID: 1089772</p>

							</td>
							<td class="cart_price">
								<p>${{$product->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">

									<a class="cart_quantity_up" id="addProduct" onclick="javascript:return addProduct({{$order->id}},{{$product->price}})"> + </a>
                  {{Form::text('quantity',$order->quantity,array('class'=>'cart_quantity_input','autocomplete'=>'off','size'=>'2','id'=>'quantity'.$order->id))}}

									<a class="cart_quantity_down" id="subProduct" onclick="javascript:return subProduct({{$order->id}},{{$row_index}},{{$product->price}})"> - </a>

								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price" id="cart_total_price_{{$order->id}}"><?php echo '$'.($product->price * $order->quantity); ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" id="delProduct" onclick="javascript: return delProduct({{$order->id}},{{$row_index}},{{($product->price * $order->quantity)}})">X</a>
							</td>
						</tr>
              {{Form::close()}}
            @endforeach
            <tr>
							<td colspan="2">&nbsp;</td>
							<td colspan="4">
								<table class="table table-condensed total-result">
									<tbody><tr>
										<td>Cart Sub Total</td>
										<td><span id="text_total_result_price">${{$total_price}}</td>
									</tr>

									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>
									</tr>
									<tr>

										<td rowspan="2">
                        <a class="btn btn-primary button_checkout" href="/checkout">Check Out</a>
                        <input type="hidden" id="total_result_price" value="{{$total_price}}">
                    </td>
									</tr>
								</tbody></table>
							</td>
						</tr>
					</tbody>
            @endif

				</table>

			</div>
      </div>	<!-- End of /.col-md-9 -->
      @include('inc.sitebar')
@endsection
