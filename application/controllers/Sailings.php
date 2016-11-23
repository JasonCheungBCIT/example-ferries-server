<?php

/**
 * REST server for ferry schedule operations.
 * This one manages sailings.
 * 
 * NOT a good fit ... this should be XML-RPC
 * ------------------------------------------------------------------------
 */
require APPPATH . '/libraries/Rest_controller.php';

class Sailings extends Rest_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ferryschedule');
	}

// Handle an incoming GET ... return a list of ports
	function index_get()
	{
		$from = $this->get('from');
		$from = $this->get('to');
		$this->response($result = $this->ferryschedule->findSailings($from, $to), 200);
	}

// The other REST methods are not handled, since we are not doing maintenance
}
