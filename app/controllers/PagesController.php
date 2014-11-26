<?php 

class PagesController extends BaseController {

	public function show($page)
	{
		return View::make('pages.'.$page);
	}

}
