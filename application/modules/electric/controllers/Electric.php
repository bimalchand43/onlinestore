<?php
class Electric extends MX_Controller 
{

	function __construct() {
	parent::__construct();
	}

	function instruments(){
	    //figure out what the category id is
	    $cat_url = $this->uri->segment(3);
	    $this->load->module('store_categories');
	    $cat_id = $this->store_categories->_get_cat_id_from_cat_url($cat_url);
	    //echo $cat_id; die();
	    $this->store_categories->view($cat_id);
	}
	

}