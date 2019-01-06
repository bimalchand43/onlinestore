<!--slider start-->
<?php
function get_theme($count){
    switch ($count) {
        case '1':
            $theme = 'danger';
            break;
        case '2':
            $theme = 'warning';
            break;
        case '3':
            $theme = 'primary';
            break;
        case '4':
            $theme = 'success';
            break;
        default:
            $theme = 'primary';
            break;
    }
    return $theme;
} 
$count = 0;
$this->load->module('homepage_sliders');
$this->load->module('site_settings');
$item_segments = $this->site_settings->_get_item_segments();
$currency_symbol = $this->site_settings->_get_currency_symbol();
foreach ($query->result() as $row) {
$count++;
$block_id = $row->id;
$num_items_on_block = $this->homepage_sliders->count_where('block_id', $block_id);
if($num_items_on_block > 0){ 
        if($count > 4){
            $count = 1;
        }
        $theme = get_theme($count);
        ?>
        <div class="panel panel-<?= $theme ?>">
          <div class="panel-heading">
            <h3 class="panel-title"><?= $row->slider_title ?></h3>
          </div>

          
          <div class="panel-body">
            

                <div class="row">
                    <?php 
                        $block_data['block_id'] = $block_id;
                        $block_data['theme'] = $theme;
                        $block_data['item_segments'] = $item_segments;
                        $block_data['currency_symbol'] = $currency_symbol;
                        $this->homepage_sliders->_draw_sliders($block_data);
                     ?>
                   
                   

                    </div><!--eof row-->
                </div><!--eof panel-body-->
        </div><!-- eof slider -->
<?php } } ?>