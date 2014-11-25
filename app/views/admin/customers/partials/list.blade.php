@foreach($customers as $customer)
  <button class="btn btn-default btn-lg" type="button">
    {{$customer->name}} <span class="badge">#</span>
  </button>
@endforeach
