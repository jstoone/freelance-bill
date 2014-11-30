<?php namespace JakobSteinn\Listeners;

use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener {

	public function whenProductHasBeenAdded()
	{
		dd("product added");
	}
}
