<?php

	$farm_id =  isset( $farmrecords->farm_id) ? $farmrecords->farm_id : '' ;
	$farm_name =  isset( $farmrecords->farm_name ) ? $farmrecords->farm_name : '' ;
	// $gp_location =  isset( $grouprecord->gp_location ) ? $grouprecord->gp_location : '' ;



?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Farm Management
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
                        <h3 class="box-title">Enter Farm Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>farm/addEditFarm" method="post" id="editqty" role="form">
                        <div class="box-body">
                           
						   <div class="row">
						   
								<div class="col-md-6">     
									<div class="form-group">
                                        <label for="fname"> Farm Name </label>
                                        <input type="text" class="form-control" id="farm_name" placeholder="Enter Farm Name" name="farm_name" value="<?php echo $farm_name; ?>" maxlength="128">
                                      
                                    </div>
                                    
									<input type="hidden" value="<?php echo $farm_id; ?>" name="farm_id" id="farm_id" />     
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