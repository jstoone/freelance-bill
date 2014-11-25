<table class="table table-striped table-hover">
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
            <td align="center">
                @if($product->is_paid)
                    <span class="label label-success">Payed</span>
                @else
                    <span class="label label-warning">Pending</span>
                @endif
            </td>
            <td>
				<a class="btn btn-xs btn-primary" href="{{ URL::route('admin.product.edit', $product->slug) }}">Edit</a>
                <a class="btn btn-xs btn-danger" href="{{ URL::route('admin.product.destroy', $product->slug) }}">Delete</a>
            </td>
		</tr>
	@endforeach
	</tbody>
</table>
