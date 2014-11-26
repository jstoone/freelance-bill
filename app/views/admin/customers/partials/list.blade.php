@foreach($customers as $customer)
  <button class="btn btn-default" type="button">
    {{$customer->name}} <span class="badge">{{ $customer->products->count() }}</span>
  </button>
@endforeach
