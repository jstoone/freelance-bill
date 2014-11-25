<?php namespace JakobSteinn\Products;

use Laracasts\Presenter\Presenter;

class ProductPresenter extends Presenter {

	public function price() {

		$priceInKroner = $this->entity->price / 100;

		return  $priceInKroner . ',-';
	}
}
