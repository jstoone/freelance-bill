<?php namespace JakobSteinn\Billing;

interface BillingInterface {
	public function charge(array $data);
}
