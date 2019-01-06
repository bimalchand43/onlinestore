<li>
    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Manage Orders <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="demo" class="collapse">
        <?php 
        $target_url = base_url().'store_orders/browse/status0';
        echo '<li><a href="'.$target_url.'">Orders Submitted</a></li>';
        foreach ($query_sos->result() as $row) {
            $target_url = base_url().'store_orders/browse/status'.$row->id;
            echo '<li><a href="'.$target_url.'">"'.$row->status_title.'"</a></li>';
        } ?>
        
    </ul>
</li>