<?php
$item_id =  isset( $itemrecord->part_id) ? $itemrecord->part_id : '' ;
$item_name =  isset( $itemrecord->part_name ) ? $itemrecord->part_name : '' ;
$item_title =  isset( $itemrecord->title ) ? $itemrecord->title : '' ;
$item_desc =  isset( $itemrecord->description ) ? $itemrecord->description : '' ;
$qt_id =  isset( $itemrecord->course_id ) ? $itemrecord->course_id : '' ;
//$distribution_limit =  isset( $itemrecord->qt_id ) ? $itemrecord->distribution_limit : '' ;


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Item Management
		<?php
		
			// print_r($_POST) ;
		
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
                        <h3 class="box-title">Enter Item Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>admin/part/addEditPart" method="post" id="editqty" role="form" enctype="multipart/form-data">
                        <div class="box-body">
						   <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname"> Part </label>
                                        <input type="text" class="form-control" id="item_name" placeholder="Enter part name" name="item_name" value="<?php echo $item_name; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $item_id; ?>" name="item_id" id="item_id" />    
                                    </div>
                                    
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname"> Course </label>
                                        <select name="qt_id" class="form-control">
                                            <option value=""> -- Select Course -- </option>
                                            <?php   
                                                foreach($qtyrecords as $qtyrecord ){  
                                            ?>
                                                <option value="<?php echo $qtyrecord->course_id ;  ?>" <?php  if( $qtyrecord->course_id == $qt_id ) { echo 'selected=selected' ; } ?>> <?php  echo $qtyrecord->course_name ;	 ?> </option>
                                            <?php
                                                }
                                            ?>
                                        </select>		
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Title</label>
                                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="<?php echo $item_title; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="file">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Description</label>
                                        <textarea name="desc" class="form-control"><?php echo $item_desc;?></textarea>
                                    </div>
                                </div>
                            </div>
							
							 <!-- <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname"> Distribution Limit </label>
                                        <input type="text" class="form-control" id="distribution_limit" placeholder="Enter distribution limit" name="distribution_limit" value="<//?php echo $distribution_limit; ?>" > 
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $("#editqty").validate({
        errorClass:'error',
        errorElement:'span',
        successClass:'success',
        rules:{
            item_name: 'required',
            qt_id: 'required',
            title: 'required',
            desc: 'required',
        }
    });
</script>