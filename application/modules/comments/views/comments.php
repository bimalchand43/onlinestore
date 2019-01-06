<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Comments</h3>
  </div>       
  <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
               <div class="box-content" style="margin-bottom: 15px;">

               		<table class="table table-striped table-bordered">
                   <?php
                        $this->load->module('timedate');
                        foreach ($query->result() as $row) { ?>
                    <tr>
                      <td>
                       
                       <?php 
                          $date_created = $this->timedate->get_nice_date($row->date_created, 'full');
                          echo "<i>Date Submitted: ".$date_created."</i><br><br>";
                          echo nl2br($row->comment); 
                       ?>
                        
                      </td>
                    </tr>
               		 <?php } ?>
               			
               		</table>

                </div>
              </div>
          </div>
      </div>
</div>