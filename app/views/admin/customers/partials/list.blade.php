@foreach($customers as $customer)
  <button class="btn btn-default" type="button">
    {{$customer->name}} <span class="badge">#</span>
  </button>
@endforeach
