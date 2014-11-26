<?php 

class PagesController {

	public function show($page)
	{
		return View::make('pages.'$page);
	}

}
