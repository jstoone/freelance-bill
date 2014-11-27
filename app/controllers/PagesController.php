<?php 

class PagesController extends BaseController {

	/**
	 * Show a desired page
	 *
	 * @param $page
	 * @return mixed
	 */
	public function show($page)
	{
		return View::make('pages.'.$page);
	}

}
