<?php namespace JakobSteinn\Listeners;

use JakobSteinn\Core\Mailers\CustomerMailer;
use JakobSteinn\Products\Events\ProductHasBeenAdded;
use JakobSteinn\Products\Product;
use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener {

	/**
	 * @var CustomerMailer
	 */
	private $customerMailer;

	function __construct(CustomerMailer $customerMailer)
	{
		$this->customerMailer = $customerMailer;
	}

	public function whenProductHasBeenAdded(ProductHasBeenAdded $event)
	{
		$this->customerMailer->invoice($event->product);
	}
}
