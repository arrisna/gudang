<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Dompdf_gen {

	function __construct() {
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';

		$pdf = new DOMPDF();

		SCI =& get_instance();
		SCI->dompdf = $pdf;
	}

}

