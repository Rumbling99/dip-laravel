<?php

class UserController extends BaseController {

	public function getIndex()
	{
		return View::make('hello');
	}

}
