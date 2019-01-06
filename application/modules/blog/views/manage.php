<?php 
if(isset($flash)) 
echo $flash;
?>
<div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Custom Blog</h3></div>
        <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?php echo base_url(); ?>blog/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create New Blog Entry</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Date Published</th>
                                        <th>Author</th>
                                        <th>Blog URL</th>
                                        <th>Blog Headline</th>
                                        <th class="col-sm-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $this->load->module('timedate');
                                	foreach($query->result() as $row){
                                		$edit_page_url = base_url()."blog/create/".$row->id;
                                        $view_page_url = base_url().$row->page_url;
                                        $date_published = $this->timedate->get_nice_date($row->date_published, 'mini');
                                        $picture = $row->picture;
                                        $thumbnail_name = str_replace('.', '_thumb.', $picture);
                                        $thumbnail_path = base_url().'blog_pics/'.$thumbnail_name;
                                 ?>
                                    <tr>
                                        <td><img src="<?= $thumbnail_path ?>"/></td>
                                        <td><?php echo $date_published; ?></td>
                                        <td><?php echo $row->author; ?></td>
                                        <td><?php echo $view_page_url; ?></td>
                                        <td><?php echo $row->page_title; ?></td>
                                        <td>
                                        	<a href="<?php echo $edit_page_url; ?>" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                        	<a href="<?php echo $view_page_url; ?>" class="btn btn-primary" aria-label="Left Align"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div><!--panel-body-->
</div><!--panel-->