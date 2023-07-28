<?php

 $inv_id =  isset( $invrecord->inv_id) ? $invrecord->inv_id : '' ;
 $item_id =  isset( $invrecord->item_name ) ? $invrecord->item_id : '' ;
 $farm_id =  isset( $invrecord->farm_id ) ? $invrecord->farm_id : '' ;
 $item_name =  isset( $invrecord->item_name ) ? $invrecord->item_name : '' ;
 $quantity =  isset( $invrecord->quantity ) ? $invrecord->quantity : '' ;
 
// $distribution_limit =  isset( $itemrecord->qt_id ) ? $itemrecord->distribution_limit : '' ;


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Inventory Management
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
                        <h3 class="box-title">Enter Inventory Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>inventory/addEditInventory" method="post" id="editqty" role="form">
                        <div class="box-body">
                           
						   <div class="row">
						   
						   	 <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"> Item name </label>
										
											<select name="item_id" class="form-control">
												<option value=""> -- Select Item name -- </option>
									<?php   
											foreach($itemrecords as $itemrecord ){ 
											
									?>
												<option value="<?php echo $itemrecord->item_id ;  ?>" <?php echo ( $itemrecord->item_id == $item_id ) ? 'selected'  : '' ;  ?>> <?php  echo $itemrecord->item_name ;	 ?> </option>
									<?php
											}
										?>	
			
											</select>		
                                    </div>
                                     <input type="hidden" value="<?php echo $inv_id; ?>" name="inv_id" id="inv_id" />     
                                </div>
								
                                <div class="col-md-6">     

									
                                    <div class="form-group">
                                        <label for="fname"> Quantity </label>
                                        <input type="text" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity" value="<?php echo $quantity; ?>" >
                                      
                                    </div>
                                    
                                </div>
								
							 </div>
						
							 
						   <div class="row">
						   
						   	 <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"> Farm  </label>
										
											<select name="farm_id" class="form-control">
												<option value=""> -- Select Farm  -- </option>
									<?php   
											foreach($farmrecords as $farmrecord ){ 
											
									?>
												<option value="<?php echo $farmrecord->farm_id ;  ?>" <?php echo ( $farmrecord->farm_id == $farm_id ) ? 'selected'  : '' ;  ?>> <?php  echo $farmrecord->farm_name ;	 ?> </option>
									<?php
											}
										?>	
			
											</select>		
                                    </div>
                                     <input type="hidden" value="<?php echo $inv_id; ?>" name="inv_id" id="inv_id" />     
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