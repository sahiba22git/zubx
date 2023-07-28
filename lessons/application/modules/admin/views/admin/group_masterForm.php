<?php

 $gp_id =  isset( $grouprecord->gp_id) ? $grouprecord->gp_id : '' ;
 $gp_name =  isset( $grouprecord->gp_name ) ? $grouprecord->gp_name : '' ;
 $gp_location =  isset( $grouprecord->gp_location ) ? $grouprecord->gp_location : '' ;



?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Group Management
		<?php
		
			// print_r($qtyrecord) ;
		
		?>
        <small>Add / Edit Item</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Group Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>group_master/addEditGroup" method="post" id="editqty" role="form">
                        <div class="box-body">
                           
						   <div class="row">
						   
								<div class="col-md-6">     
									<div class="form-group">
                                        <label for="fname"> Group Name </label>
                                        <input type="text" class="form-control" id="gp_name" placeholder="Enter Group Name" name="gp_name" value="<?php echo $gp_name; ?>" maxlength="128">
                                      
                                    </div>
                                    
									<input type="hidden" value="<?php echo $gp_id; ?>" name="gp_id" id="gp_id" />     
								</div>
								
								<div class="col-md-6">     
									<div class="form-group">
                                        <label for="fname"> Group Location </label>
                                        <input type="text" class="form-control" id="gp_location" placeholder="Enter Group Location" name="gp_location" value="<?php echo $gp_location; ?>" maxlength="128">
                                      
                                    </div>
                                    
								</div>
								
								
							</div>
						
							

                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>