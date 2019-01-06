<?php
class Youraccount extends MX_Controller 
{

function __construct() {
parent::__construct();
$this->load->library('form_validation');
$this->form_validation->CI =& $this;
}

function logout(){
    unset($_SESSION['user_id']);
    $this->load->module('site_cookies');
    $this->site_cookies->_destroy_cookie();
    redirect(base_url());
}

function welcome(){
    $this->load->module('site_security');
    $this->load->module('site_settings');
    $this->site_security->_make_sure_logged_in();

    $is_mobile = $this->site_settings->is_mobile();
    if($is_mobile == TRUE){
        $template = 'public_jqm';
    }else{
        $template = 'public_frontend';
    }
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "welcome";
    $this->load->module('templates');
    $this->templates->$template($data);    
}

function login(){
	$data['username'] = $this->input->post('username', TRUE);
	//$data['view_file'] = "view";
	$this->load->module('templates');
	$this->templates->login($data);
}

function submit_login(){
    $submit = $this->input->post('submit', TRUE);
    if($submit == "Submit"){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[60]|callback_username_check');
        $this->form_validation->set_rules('pword', 'Password', 'required|min_length[5]|max_length[35]');
        

        if($this->form_validation->run()==TRUE){
            //figure out user id
            $col1 = 'username';
            $value1 = $this->input->post('username', TRUE);
            $col2 = 'email';
            $value2 = $this->input->post('username', TRUE);
            $query = $this->store_accounts->get_with_double_condition($col1, $value1, $col2, $value2);
            foreach ($query->result() as $row) {
                $user_id = $row->id;
            }
            $remember = $this->input->post('remember', TRUE);
            if($remember == "remember-me"){
                $login_type = "longterm";
            }else{
                $login_type = "shortterm";
            }

            $data['last_login'] = time();
            $this->store_accounts->_update($user_id, $data);
            //send them to private page
            $this->_in_you_go($user_id, $login_type);
        }else{
            echo validation_errors();
        }
    }
   
}

function _in_you_go($user_id, $login_type){
    //Note: the login_type can be longterm or shortterm
    if($login_type == "longterm"){
        //set a cookie
        $this->load->module('site_cookies');
        $this->site_cookies->_set_cookie($user_id);

    }else{
        //set a session variable
        $this->session->set_userdata('user_id', $user_id);
    }
    //attempt to update cart and divert to cart
    $this->_attempt_cart_divert($user_id);

    //send the user to the private page
    redirect('youraccount/welcome');
}

function _attempt_cart_divert($user_id){
    $this->load->module('store_basket');
    $customer_session_id = $this->session->session_id;

    $col1 = 'session_id';
    $value1 = $customer_session_id;
    $col2 = 'shopper_id';
    $value2 = 0;
    $query = $this->store_basket->get_with_double_condition($col1, $value1, $col2, $value2);
    $num_rows = $query->num_rows();
    if($num_rows>0){
        //There are records that need corected
        $mysql_query = "update store_basket set shopper_id = $user_id where session_id='$customer_session_id'";
        $query = $this->store_basket->_custom_query($mysql_query); 
        redirect('cart');
    }
}

function submit(){
	$submit = $this->input->post('submit', TRUE);
	if($submit == "Submit"){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[60]|is_unique[store_accounts.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[120]');
        $this->form_validation->set_rules('pword', 'Password', 'required|min_length[5]|max_length[35]');
        $this->form_validation->set_rules('repeat_pword', 'Repeat Password', 'required|matches[pword]');
        

        if($this->form_validation->run()==TRUE){
        	$this->_process_create_account();
        	redirect('youraccount/login');
        }else{
        	$this->start();
        }
    }
   
}

function _process_create_account(){
	$this->load->module('store_accounts');
	$data = $this->fetch_data_from_post();
	unset($data['repeat_pword']);
	$pword = $data['pword'];
    $this->load->module('site_security');
    $data['pword'] = $this->site_security->_hash_string($pword);
    $this->store_accounts->_insert($data);	
}

function start(){
	$data = $this->fetch_data_from_post();
	$data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "start";
    $this->load->module('templates');
    $this->templates->public_frontend($data);
}

function fetch_data_from_post(){
	$data['username'] = $this->input->post('username', TRUE);
	$data['email'] = $this->input->post('email', TRUE);
	$data['pword'] = $this->input->post('pword', TRUE);
	$data['repeat_pword'] = $this->input->post('repeat_pword', TRUE);
	return $data;
}

function username_check($str){

    $this->load->module('store_accounts');
    $this->load->module('site_security');

    $error_msg = "You didnot enter a correct username and/or password";

    $col1 = 'username';
    $value1 = $str;
    $col2 = 'email';
    $value2 = $str;
    $query = $this->store_accounts->get_with_double_condition($col1, $value1, $col2, $value2);
    $num_rows = $query->num_rows();

    if($num_rows<1){
        $this->form_validation->set_message('username_check', $error_msg);
        return FALSE;   
    }

    foreach ($query->result() as $row) {
        $pword_on_table = $row->pword;
    }
    $pword = $this->input->post('pword', TRUE);
    $result = $this->site_security->_verify_hash($pword, $pword_on_table);

    if($result == TRUE){
        return TRUE;
    }else{
        $this->form_validation->set_message('username_check', $error_msg);
        return FALSE;    
    }
 }

}