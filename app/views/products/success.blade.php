@extends('layouts.master')

@section('content')
	<div id="products-success" class="col-md-6 col-md-offset-3">
		<h5>Please print this page</h5>
		<h1 class="text-center">Reciept</h1>
		<hr/>
		<div class="row">
			<div class="col-md-6">
				<p>
					<b>{{ $product->customer->name }}</b> <br/>
					{{ $product->customer->email }}
				</p>
			</div>
			<div class="col-md-6">
				<p class="text-right">
					{{ date('jS F Y H:i') }} <br/>
					Reciept #: {{ $product->id }}
				</p>
			</div>
		</div>
		<div class="row">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>
							Product
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
@stop
