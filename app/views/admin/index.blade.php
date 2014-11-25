@extends('layouts.master')

@section('content')
	<div id="admin-index" class="col-md-12">
		<h1>Admin area!</h1>

		<h2>Products</h2>
		<table class="table table-striped table-hover">
		<colgroup>
			<col width="5%"/>
			<col width="25%"/>
			<col width="10%"/>
			<col width="50%"/>
			<col width="10%"/>
		</colgroup>
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Price</th>
				<th>Description</th>
				<th>Paid?</th>
			</tr>
		</thead>
		<tbody>
		@foreach( $products as $product )
			<tr>
				<td>{{$product->id}}</td>
				<td>
					{{$product->name}} <br/>
					<a href="{{ URL::route('admin.product.edit', $product->slug) }}"></a>
				</td>
				<td>
					{{ $product->present()->price }}
                </td>
                <td>
                    {{$product->description}}
                </td>
                <td>
                    @if($product->is_paid)
                        <button class="btn btn-success btn-sm">Payed!</button>
                    @else
						<button class="btn btn-warning btn-sm">Not payed</button>
                    @endif
                </td>
			</tr>
		@endforeach
		</tbody>
		</table>
	</div>
@stop
