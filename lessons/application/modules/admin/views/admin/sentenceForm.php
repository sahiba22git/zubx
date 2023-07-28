<?php
//echo "<pre>"; print_r($itemrecord);echo "</pre>"; 
$item_id =  isset( $itemrecord->sentence_id) ? $itemrecord->sentence_id : '' ;
$item_name =  isset( $itemrecord->sentence_name ) ? $itemrecord->sentence_name : '' ;
$qt_id =  isset( $itemrecord->part_id ) ? $itemrecord->part_id : '' ;
//$distribution_limit =  isset( $itemrecord->qt_id ) ? $itemrecord->distribution_limit : '' ;


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Sentence Management
		<?php
		
			// print_r($_POST) ;
		
		?>
        <small>Add / Edit Sentence</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Sentence Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>admin/sentence/addEditSentence" method="post" id="editqty" role="form">
                        <div class="box-body">
                           
						   <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"> Sentence </label>
                                        <input type="text" class="form-control" id="item_name" placeholder="Enter part name" name="item_name" value="<?php echo $item_name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $item_id; ?>" name="item_id" id="item_id" />    
                                    </div>
                                    
                                </div>
								
								 <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"> Part </label>
										
											<select name="qt_id" class="form-control">
												<option value=""> -- Select part -- </option>
									<?php   
											foreach($qtyrecords as $qtyrecord ){ 
											
									?>
												<option value="<?php echo $qtyrecord->part_id ;  ?>" <?php  if( $qtyrecord->part_id == $qt_id ) { echo 'selected=selected' ; } ?>> <?php  echo $qtyrecord->part_name ;	 ?> </option>
									<?php
											}
										?>	
			
											</select>		
                                    </div>
                                    
                                </div>
								
								
                            </div>
							
							 <!-- <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"> Distribution Limit </label>
                                        <input type="text" class="form-control" id="distribution_limit" placeholder="Enter distribution limit" name="distribution_limit" value="<?php echo $distribution_limit; ?>" > 
                                    </div>
                                    
                                </div>
								
								
							</div> -->
							

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