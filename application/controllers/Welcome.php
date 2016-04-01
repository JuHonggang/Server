<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function testlibevent()
	{
		static $i;

		$i++;

		if ($i == 10) {
			event_base_loopexit(-1);
		}
		//var_dump($buf);
		//var_dump(event_buffer_read(array(), 10));
	}

	public function index()
	{
		$this->load->view('test');
		echo 'Hello World';
		phpinfo();
		testlibevent();
	}

	public function printfHello()
	{
		echo 'Hello World';
	}

}
