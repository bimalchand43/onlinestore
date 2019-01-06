<?php
class Site_settings extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function is_mobile(){
    $this->load->library('user_agent');
    $is_mobile = $this->agent->is_mobile();
    //$is_mobile = TRUE; //Just for Testing
    return $is_mobile; //TRUE or FALSE
}

function _get_map_code(){
    $code = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3306.744994973191!2d151.12574241530103!3d-34.0247560346016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12b80f0d4731cf%3A0x1d00b314579431c6!2s2%2F1+Box+Rd%2C+Caringbah+NSW+2229%2C+Australia!5e0!3m2!1sen!2snp!4v1496479380298" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
    return $code;
}

function _get_our_company_name(){
    $name = 'Coolness Inc.';
    return $name;
}

function _get_our_address(){
    $address = '775 Folsom Ave, suite 680<br>';
    $address.= 'San Francisco, CA 94907';
    return $address;
}

function _get_our_telnum(){
    $telnum = '(999) 999-9999';
    return $telnum;
}

function _get_paypal_email(){
    $email = 'bimalchand43-facilitator@gmail.com';
    return $email;
}

function _get_support_team_name(){
    $name = "Customer Support";
    return $name;
}

function _get_welcome_msg(){
    $this->load->module('store_accounts');
    $customer_name = $this->store_accounts->_get_customer_name($customer_id);

    $msg = "Hello ".$customer_name.",<br><br>";
    $msg.= "Thank you for creating an account with Online Shop. If you have any questions ";
    $msg.= "about any of our products and services then please do get in touch. we are here ";
    $msg.= "seven days a week and would be happy to help you.<br><br>";
    $msg.= "Regards, <br><br>";
    $msg.= "Bimal Chand (founder)";
    return $msg;
}

function _get_cookie_name(){
    //every other site change $cookie_name as per require
    $cookie_name = 'htelbhz';
    return $cookie_name;
}

function _get_currency_symbol(){
	$symbol = "&pound";
	return $symbol;
}

function _get_currency_code(){
    $code = "GBP";
    return $code;
}

function _get_item_segments(){
    //return the segments for the store_item page (product page)
    $segments = "electrical/instrument/";
    return $segments;
}

function _get_items_segments(){
    //return the segments for the category page 
    $segments = "electric/instruments/";
    return $segments;
}

function _get_page_not_found_msg(){
	$msg = "<h1>It's a webpage Jim but not as we know it!</h1>";
	$msg.= "<p>Please check Your vibe and try again.</p>";
	return $msg;
}

}