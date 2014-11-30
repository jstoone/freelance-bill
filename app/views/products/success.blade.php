@extends('layouts.master')

@section('content')
	<div id="products-success" class="col-md-6 col-md-offset-3">
		<div class="row">
			<div class="col-md-12">
				<h5>Please print this page</h5>
				<h1 class="text-center">Reciept</h1>
				<hr/>
			</div>
			<div class="col-md-12">
				<p>
					<b>{{ $product->customer->name }}</b> <br/>
					{{ $product->customer->email }}
				</p>
			</div>
			<div class="col-md-12">
				<p class="text-right">
					{{ date('jS F Y H:i') }} <br/>
					Reciept #: {{ $product->id }}
				</p>
			</div>
			<div class="col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							</th>
							<th>
								Description
							</th>
							<th>
								Price
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $product->name }}</td>
							<td>{{ $product->description }}</td>
							<td>{{ $product->present()->price }}</td>
						</tr>
						<tr>
							<td></td>
							<td colspan="2">
								<h3 class="text-right">Total: {{ $product->present()->price }}</h3>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop
