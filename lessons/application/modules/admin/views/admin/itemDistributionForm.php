<?php
// $qt_name =  isset( $qtyrecord->qt_name ) ? $qtyrecord->qt_name : '' ;
// $qt_id =  isset( $qtyrecord->qt_id) ? $qtyrecord->qt_id : '' ;

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Item Distribution
		<?php
		
			// print_r($qtyrecord) ;
		
		?>
        <small>Add / Edit Quantity</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Item Distribution Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>item_distribution/addEditItemDistribution" method="post" id="editqty" role="form">
                        <div class="box-body">
                           
						<div class="row">
						    <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"> Users </label>
											<select name="user_id" class="form-control">
												<option value=""> -- Select user -- </option>
									<?php   
										foreach( $userrecords as $userrecord ){ 
									?>
											<option value="<?php echo $userrecord->userId ;  ?>" <?php  //echo ( $qtyrecord->qt_id == $qt_id ) ? 'selected'  : '' ;  ?>> 
									<?php  echo $userrecord->name .' --- '. $userrecord->email;	 ?> </option>
									<?php
										}
									?>	
										</select>		
                                    </div>
									
								<input type="hidden" value="<?php //echo $itm_dist_id; ?>" name="itm_dist_id" id="itm_dist_id" />    

                            </div>
							
							<div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"> Inventory </label>
											<select name="inv_id" class="form-control">
												<option value=""> -- Select Inventory -- </option>
									<?php   
										foreach( $inventoryrecords as $invrecord ){ 
									?>
									<option value="<?php echo $invrecord->inv_id ;  ?>" <?php  //echo ( $qtyrecord->qt_id == $qt_id ) ? 'selected'  : '' ;  ?>> 
								<?php  echo $invrecord->inv_id ;	 ?> </option>
									<?php
										}
									?>	
										</select>		
                                    </div>
                            </div>
						</div>
						
						<div class="row">
						    <div class="col-md-6">                                
                                 
									<div class="form-group">
                                        <label for="fname"> Quantity Distributed </label>
                                        <input type="number" class="form-control" id="qt_distributed" placeholder="Enter quantity" name="qt_distributed" value="<?php // echo $qt_distributed; ?>" maxlength="128">
                                      
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