<?php

/**
 * XML-RPC server for ferry schedule operations.
 * This one manages sailings.
 * 
 * ------------------------------------------------------------------------
 */
class Sailings extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// get ready for XML-RPC ***
		$this->load->library(['xmlrpc', 'xmlrpcs']);

		$this->load->model('ferryschedule');
	}

	// Entry point to the XML-RPC server
	function index()
	{
		$config['functions']['lookup'] = array('function' => 'Sailings.find_sailings');
		$config['object'] = $this;

		$this->xmlrpcs->initialize($config);
		$this->xmlrpcs->serve();
	}

	// Find all the sailings between two ports
	function find_sailings($request)
	{
		// get the origin & destination parameters
		$parms = $request->output_parameters();
		$from = $parms[0];
		$to = $parms[1];

		// extract data from the real model
		$result = $this->ferryschedule->findSailings($from, $to);

		// we have to wrap each result row properly
		foreach ($result as $sailing)
		{
			$sailings[] = array($sailing, 'struct');
		}
		
		// display an error if there are no sailings
		// NOTE: This would be the proper way to handle this, with the client handling the error
		// I have left the client assuming that an empty set of sailings is how they tell that you can't get from A to B
		if (empty($sailings))
		{
			return $this->xmlrpc->send_error_message(1, "Sorry, but you can't get there from here!");
		}

		// and then wrap the whole thing!
		$response = array($sailings, 'struct');
		return $this->xmlrpc->send_response($response);
	}

}
