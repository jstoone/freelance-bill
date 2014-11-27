<?php namespace JakobSteinn\Products;

use Laracasts\Presenter\Presenter;

class ProductPresenter extends Presenter {

	/**
	 * Present the product price
	 *
	 * @return string
	 */
	public function price()
	{

		$priceInKroner = $this->convertToKroner($this->entity->price);

		return $priceInKroner . ' DKK';
	}

	/**
	 * Present the product price without extension
	 *
	 * @return int
	 */
	public function priceRaw()
	{
		return $this->convertToKroner($this->entity->price);
	}

	/**
	 * Convert price in cents to dollar
	 *
	 * @param $value
	 * @return int
	 */
	private function convertToKroner($value)
	{
		return floor($value / 100);
	}
}
