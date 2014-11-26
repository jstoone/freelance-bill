@foreach($customers as $customer)
  <a href="{{ URL::route('admin.customers.destroy', $customer->id) }}" class="btn btn-default" type="button">
    {{$customer->name}} <span class="badge">{{ $customer->products->count() }}</span>
  </a>
@endforeach
