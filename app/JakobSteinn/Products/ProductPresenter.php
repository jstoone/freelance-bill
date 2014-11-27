<?php namespace JakobSteinn\Products;

use Laracasts\Presenter\Presenter;

class ProductPresenter extends Presenter {

	public function price()
	{

		$priceInKroner = $this->convertToKroner($this->entity->price);

		return $priceInKroner . ' DKK';
	}

	public function priceRaw()
	{
		return $this->convertToKroner($this->entity->price);
	}

	private function convertToKroner($value)
	{
		return $value / 100;
	}
}
