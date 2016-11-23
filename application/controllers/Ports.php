<?php

/**
 * REST server for ferry schedule operations.
 * This one manages ports.
 *
 * ------------------------------------------------------------------------
 */
require APPPATH . '/libraries/Rest_controller.php';

class Ports extends Rest_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ferryschedule');
	}

	// Handle an incoming GET ... return a list of ports
	function index_get()
	{
		$this->response($this->ferryschedule->getPorts(), 200);
	}

	// The other REST methods are not handled, since we are not doing maintenance

}
