<?php
class Hello extends Controller {
	function Hello() {
		parent::Controller();
	}

	function you() {
		$this->load->view('hello_view');
	}
}
?>