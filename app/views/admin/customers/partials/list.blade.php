<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Customer name</th>
            <th>Num paid products</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
@foreach($customers as $index => $customer)
    <tr>
        <td>{{{ $customer->id }}}</td>
        <td>{{{ $customer->name }}}</td>
        <td>
            {{{ $customer->products()->paid()->count() }}} / {{{ $customer->products->count() }}}
        </td>
        <td>
            <a class="btn btn-xs btn-primary" href="{{ URL::route('admin.customers.edit', $customer->id) }}">
                Edit
            </a>
            <a class="btn btn-xs btn-danger" href="{{ URL::route('admin.customers.destroy', $customer->id) }}">
                Delete
            </a>
        </td>
    </tr>
@endforeach
</tbody>
</table>
