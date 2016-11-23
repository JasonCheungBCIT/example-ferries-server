<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ferryschedule');
		$this->data['pagetitle'] = 'Ferry Trip Planner (Server)';
	}

	/**
	 * Sets up the form and renders it.
	 */
	function index()
	{
		$this->load->helper('formfields');
		$this->data['title'] = 'Ferry Trip Planner (Server)';
		$this->data['pagebody'] = 'welcome_message';

		$this->render();
	}

}
