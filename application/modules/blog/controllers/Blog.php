<?php
class Blog extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function _draw_blog_list(){
    $this->load->view('blog');   
}
function article($page_url){
    //echo "blog details";
    //echo $page_url;
    $data['query'] = $this->get_where_custom('page_url', $page_url);
    $data['view_file'] = "blog_detail";
    $this->load->module('templates');
    $this->templates->public_frontend($data);
    
}

function _draw_feed_hp($is_mobile=FALSE){
    $this->load->helper('text');
    $mysql_query = "select * from blog order by date_published desc limit 0,3";
    $data['query'] = $this->_custom_query($mysql_query);
    if($is_mobile == FALSE){
        $view_file = 'feed_hp';
    }else{
        $view_file = 'feed_hp_jqm';
    }
    $this->load->view($view_file, $data);
}

function delete_image($update_id){
    if(!is_numeric($update_id)){
        redirect('site_security/not_allowed');
    }
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $data = $this->fetch_data_from_db($update_id);
    $picture = $data['picture'];

    $big_pic_path = './blog_pics/'.$picture;
    $small_picture = str_replace('.', '_thumb.', $picture);
    $small_pic_path = './blog_pics/'.$small_picture;

    //attempt to remove the images
    if(file_exists($big_pic_path)){
        unlink($big_pic_path);
    }
    if(file_exists($small_pic_path)){
        unlink($small_pic_path);
    }
    //update the database
    unset($data);
    $data['picture'] = "";
    $this->_update($update_id, $data);
    $flash_msg = "The Image was successfully deleted!!";
    $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
    $this->session->set_flashdata('item', $value);
    redirect('blog/create/'.$update_id);
}

function _generate_thumbnail($file_name, $thumbnail_name){
    $config['image_library'] = 'gd2';
    $config['source_image'] = './blog_pics/'.$file_name;
    $config['new_image'] = './blog_pics/'.$thumbnail_name;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;

    $this->load->library('image_lib', $config);
    $this->image_lib->resize();
}

function do_upload($update_id){
    if(!is_numeric($update_id)){
        redirect('site_security/not_allowed');
    }
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
     $submit = $this->input->post('submit', TRUE);
    if($submit=="Cancel"){
        redirect('blog/create/'.$update_id);
    }
    $config['upload_path']          = './blog_pics/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 200;
    $config['max_width']            = 2048;
    $config['max_height']           = 1224;
    $config['file_name']            = $this->site_security->generate_random_string(16);

    $this->load->library('upload', $config);

    if ( !$this->upload->do_upload('userfile'))
    {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));
            $data['headline'] = "Upload Error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin_template($data);
    }else{
            //upload was success
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];

            /*foreach ($upload_data as $key => $value) {
                echo "echo key of $key has value of $value<br>";
            }
            die();*/
            //raw_name, file_ext

            $raw_name = $upload_data['raw_name'];
            $file_ext = $upload_data['file_ext'];
            $thumbnail_name = $raw_name."_thumb".$file_ext;
            $file_name = $upload_data['file_name'];
            $this->_generate_thumbnail($file_name, $thumbnail_name);
            $update_data['picture'] = $file_name;
            $this->_update($update_id, $update_data);
            $data['headline'] = "Upload Success";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            $data['view_file'] = "upload_success";
            $this->load->module('templates');
            $this->templates->admin_template($data);
    }
 }

function upload_image($update_id){
    if(!is_numeric($update_id)){
        redirect('site_security/not_allowed');
    }
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $data['headline'] = "Upload Image";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "upload_image";
    $this->load->module('templates');
    $this->templates->admin_template($data);
}

function test(){
    $this->load->module('timedate');
    $nowtime = time();
    $datepicker_time = $this->timedate->get_nice_date($nowtime, 'datepicker_us');
    echo $datepicker_time;
    echo "<hr>";
    //convert back into unix time stamp
    $timestamp = $this->timedate->make_timestamp_from_datepicker_us($datepicker_time);
    echo $timestamp;

    echo "<hr>";

    $nice_date = $this->timedate->get_nice_date($timestamp, 'cool');
    echo $nice_date;
}

function _process_delete($update_id){
    //Attempt to delete pages
    $this->_delete($update_id);
}

function delete($update_id){
 if(!is_numeric($update_id)){
        redirect('site_security/not_allowed');
    }
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
     $submit = $this->input->post('submit', TRUE);
    if($submit=="Cancel"){
        redirect('blog/create/'.$update_id);
    }elseif($submit == "Yes Delete Page"){
        $this->_process_delete($update_id);
        $flash_msg = "The Blog Entry was successfully deleted!!";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('blog/manage');
    }

    
}

function deleteconf($update_id){
    if(!is_numeric($update_id)){
        redirect('site_security/not_allowed');
    }
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['headline'] = "Delete Page";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "deleteconf";
    $this->load->module('templates');
    $this->templates->admin_template($data);
}

function create(){
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit', TRUE);
    $this->load->module('timedate');

    if($submit == "Cancel" ){
        redirect("blog/manage");
    }

    if($submit == "Submit"){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date_published', 'Date Published', 'required');
        $this->form_validation->set_rules('page_title', 'Blog Title', 'required');
        $this->form_validation->set_rules('page_content', 'Blog Content', 'required');

        if($this->form_validation->run()==TRUE){
            $data = $this->fetch_data_from_post();
            $data['page_url'] = url_title($data['page_title']);
            $data['date_published'] = $this->timedate->make_timestamp_from_datepicker_us($data['date_published']);
            //echo $data['iteam_url']; die();
            if(is_numeric($update_id)){
                $this->_update($update_id, $data);
                $flash_msg = "The Blog Entry was successfully Updated!!";
                $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('blog/create/'.$update_id); 
            }else{
                $this->_insert($data);
                $update_id = $this->get_max(); //get the ID of the new page
                $flash_msg = "The Blog Entry was successfully Created!!";
                $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('blog/create/'.$update_id); 
                
            }
        }
    }
   

    if((is_numeric($update_id)) && ($submit!="submit")){
        $data = $this->fetch_data_from_db($update_id);
    }else{
        $data = $this->fetch_data_from_post();
        $data['picture'] = "";
    }
     if(!is_numeric($update_id)){
        $data['headline'] = "Add New Blog";
    }else{
        $data['headline'] = "Update New Blog";
    }
    if($data['date_published'] > 0){
        //it must be a unix timestamp format, so we convert datepicker format
        $data['date_published'] = $this->timedate->get_nice_date($data['date_published'], 'datepicker_us');
    }
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin_template($data);
}

function fetch_data_from_post(){
    $data['page_title'] = $this->input->post('page_title', TRUE);
    $data['page_keywords'] = $this->input->post('page_keywords', TRUE);
    $data['page_description'] = $this->input->post('page_description', TRUE);
    $data['page_content'] = $this->input->post('page_content', TRUE);
    $data['date_published'] = $this->input->post('date_published', TRUE);
    $data['author'] = $this->input->post('author', TRUE);
    //$data['picture'] = $this->input->post('picture', TRUE);
    return $data;
}
function fetch_data_from_db($update_id){

    if(!is_numeric($update_id)){
        redirect('site_security/not_allowed');
    }

    $query = $this->get_where($update_id);
    foreach($query->result() as $row){
        $data['page_url'] = $row->page_url;
        $data['page_title'] = $row->page_title;
        $data['page_keywords'] = $row->page_keywords;
        $data['page_description'] = $row->page_description;
        $data['page_content'] = $row->page_content;
        $data['date_published'] = $row->date_published;
        $data['author'] = $row->author;
        $data['picture'] = $row->picture;
    }
    if(!isset($data)){
        $data = "";
    }
    return $data;
}

function manage(){
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    $data['query'] = $this->get('date_published desc');
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin_template($data);
}

function get($order_by)
{
    $this->load->model('Mdl_blog');
    $query = $this->Mdl_blog->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_blog');
    $query = $this->Mdl_blog->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_blog');
    $query = $this->Mdl_blog->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('Mdl_blog');
    $query = $this->Mdl_blog->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_blog');
    $this->Mdl_blog->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_blog');
    $this->Mdl_blog->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_blog');
    $this->Mdl_blog->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('Mdl_blog');
    $count = $this->Mdl_blog->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('Mdl_blog');
    $max_id = $this->Mdl_blog->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('Mdl_blog');
    $query = $this->Mdl_blog->_custom_query($mysql_query);
    return $query;
}

}