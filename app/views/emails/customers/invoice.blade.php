@extends('emails.layouts.master')

@section('content')

<p>
	Hi {{{ $customer['name'] }}}
</p>

<p>
	I'm wrting reguarding the invoice for your project: <br/>
	{{{ $product['name'] }}} <br/>
	{{{ $product['description'] }}}
</p>

<p>
   Please visit the following link: <br/>
   {{{ $link  }}}
</p>

<p>
    And use the following password: <br/>
    {{{ $product['password'] }}}
</p>

@stop
