<table class="table table-hover">
	<colgroup>
		<col width="5%"/>
		<col width="20%"/>
		<col width="5%"/>
		<col width="50%"/>
		<col width="10%"/>
		<col width="10%"/>
	</colgroup>
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Price</th>
			<th>Description</th>
			<th>Paid?</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	@foreach( $products as $product )
		<tr>
			<td>{{ $product->id }}</td>
			<td>
				{{ $product->name }}
			</td>
			<td>
				{{ $product->present()->price }}
            </td>
            <td>
                {{ $product->description }}
            </td>
            <td>
                @if($product->is_paid)
                    <span class="label label-success" style="display: block;">Payed</span>
                @else
                    <span class="label label-warning" style="display: block;">Pending</span>
                    <a class="btn btn-default btn-xs btn-block"
                        href="{{ URL::route('email.customer.reminder', $product->id) }}">
						Re-send invoice
                    </a>
                @endif
            </td>
            <td>
				<a class="btn btn-xs btn-primary" href="{{ URL::route('admin.products.edit', $product->id) }}">
					Edit
				</a>
                <a class="btn btn-xs btn-danger" href="{{ URL::route('admin.products.destroy', $product->id) }}">
                    Delete
                </a>
            </td>
		</tr>
		<tr>
			<td></td>
			<td colspan="6">
				<em><span class="glyphicon glyphicon-share"></span>:
				<a href="{{ URL::route('products.auth', $product->slug) }}">
					{{ URL::route('products.auth', $product->slug) }}
				</a>
				</em>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
