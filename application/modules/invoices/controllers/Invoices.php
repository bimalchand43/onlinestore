<?php
class Invoices extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function test(){
    // Load all views as normal
        $data['name'] = 'Bimal Chand';
        $this->load->view('test', $data);
        // Get output html
        $html = $this->output->get_output();
        
        // Load library
        $this->load->library('dompdf_gen');
        
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $data['Attachment'] = FALSE;
        $this->dompdf->stream("", $data);
}

}