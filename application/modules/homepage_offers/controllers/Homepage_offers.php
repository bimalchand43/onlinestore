<?php
class Homepage_offers extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function _draw_offers($data, $is_mobile=FALSE){ 
    $block_id = $data['block_id'];
    if($is_mobile == FALSE){
        $theme = $data['theme'];
    } 
    $item_segments = $data['item_segments'];
    
    //$query = $this->get_where_custom('block_id', $block_id);
    $mysql_query = "SELECT store_items.* FROM homepage_offers INNER JOIN homepage_blocks ON homepage_offers.block_id = homepage_blocks.id INNER JOIN store_items ON homepage_offers.item_id = store_items.id WHERE homepage_offers.block_id = $block_id";
    $query = $this->_custom_query($mysql_query);
    $num_rows = $query->num_rows();
    if($num_rows>0){
        $data['query'] = $query;
        if($is_mobile == FALSE){
            $data['theme'] = $theme;
        }
        $data['item_segments'] = $item_segments;
        if($is_mobile == FALSE){
            $view_file = 'offers';
        }else{
            $view_file = 'offers_jqm';
        }
        $this->load->view($view_file, $data); 
    }
}

function _delete_for_item($block_id){
    $mysql_query = "delete from Store_item_colors where block_id = $block_id";
    $query = $this->_custom_query($mysql_query);
}

function delete($update_id){
 if(!is_numeric($update_id)){
        redirect('site_security/not_allowed');
    }
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    //fetch the block_id
    $query = $this->get_where($update_id);
    foreach ($query->result() as $row) {
        $block_id = $row->block_id;
    }
    $this->_delete($update_id);
    $flash_msg = "The Option was successfully Deleted!!";
    $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
    $this->session->set_flashdata('item', $value);
    redirect('homepage_offers/update/'.$block_id);
}

function _is_valid_item($item_id){
    //is this valid item id
    if(!is_numeric($item_id)){
        return FALSE;
    }
    $this->load->module('store_items');
    $query = $this->store_items->get_where($item_id);
    $num_rows = $query->num_rows();
    if($num_rows > 0){
        return TRUE;
    }else{
        return FALSE;
    }
}

function submit($update_id){
    if(!is_numeric($update_id)){
        redirect('site_security/not_allowed');
    }
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $submit = $this->input->post('submit', TRUE);
    $item_id = trim($this->input->post('item_id', TRUE));
    if($submit == "Finished"){
        redirect("store_items/create/".$update_id);
    }elseif($submit == "Submit"){
        $is_valid_item = $this->_is_valid_item($item_id);
        if($is_valid_item == FALSE){
            $flash_msg = "The Item ID that you submitted was not valid!!";
            $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('homepage_offers/update/'.$update_id);
        }
        //attempt an insert
        if($item_id != ""){
            $data['block_id'] = $update_id;
            $data['item_id'] = $item_id;
            $this->_insert($data);
            $flash_msg = "The New Offers Option was successfully added!!";
            $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
           
        }
    }
     redirect('homepage_offers/update/'.$update_id);
}

function update($update_id){
    if(!is_numeric($update_id)){
        redirect('site_security/not_allowed');
    }
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    //fetch existing option for this Item
    $data['query'] = $this->get_where_custom('block_id', $update_id);
    $data['num_rows'] = $data['query']->num_rows();


    $data['headline'] = "Update Homepage Offers";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "update";
    $this->load->module('templates');
    $this->templates->admin_template($data);
}


function manage(){
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['view_module'] = "store_iteams";
    $data['view_file'] = "manage_store";
    $this->load->module('templates');
    $this->templates->admin_template($data);
}

function get($order_by)
{
    $this->load->model('Mdl_homepage_offers');
    $query = $this->Mdl_homepage_offers->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_homepage_offers');
    $query = $this->Mdl_homepage_offers->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_homepage_offers');
    $query = $this->Mdl_homepage_offers->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('Mdl_homepage_offers');
    $query = $this->Mdl_homepage_offers->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_homepage_offers');
    $this->Mdl_homepage_offers->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_homepage_offers');
    $this->Mdl_homepage_offers->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_homepage_offers');
    $this->Mdl_homepage_offers->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('Mdl_homepage_offers');
    $count = $this->Mdl_homepage_offers->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('Mdl_homepage_offers');
    $max_id = $this->Mdl_homepage_offers->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('Mdl_homepage_offers');
    $query = $this->Mdl_homepage_offers->_custom_query($mysql_query);
    return $query;
}

}