<?php

$course_name =  isset( $qtyrecord->course_name ) ? $qtyrecord->course_name : '' ;
$course_desc =  isset( $qtyrecord->description ) ? $qtyrecord->description : '' ;

$qt_id =  isset( $qtyrecord->course_id) ? $qtyrecord->course_id : '' ;



?>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-users"></i> Course Management

		<?php

		

			// print_r($qtyrecord) ;

		

		?>

        <small>Add / Edit Course</small>

      </h1>

    </section>

    

    <section class="content">

    

        <div class="row">

            <!-- left column -->

            <div class="col-md-8">

              <!-- general form elements -->

                

                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">Enter Course Details</h3>

                    </div><!-- /.box-header -->

                    <!-- form start -->

                    

                    <form role="form" action="<?php echo base_url() ?>admin/course/addEditCourse" method="post" id="editqty" role="form" enctype="multipart/form-data">

                        <div class="box-body">

                           

						   <div class="row">

                                <div class="col-md-6">                                

                                    <div class="form-group">

                                        <label for="fname"> Course </label>

                                        <input type="text" class="form-control" id="qt_name" placeholder="Enter Course Unit" name="qt_name" value="<?php echo $course_name; ?>" maxlength="128">

                                        <input type="hidden" value="<?php echo $qt_id; ?>" name="qt_id" id="qt_id" />    

                                    </div>

                                    

                                </div>

                                <div class="col-md-6">                                

                                    <div class="form-group">

                                        <label> Image </label>

                                        <input type="file" class="form-control"  name="file">

                                    </div>

                                    

                                </div>

                                <div class="col-md-6">                                

                                    <div class="form-group">

                                        <label for="fname"> Description </label>
                                        <textarea class="form-control" name="desc" id="qt_desc"><?php echo $course_desc; ?></textarea>

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
<script>
    $("#editqty").validate({
        errorClass:'error',
        errorElement:'span',
        successClass:'success',
        rules:{
            qt_name: 'required',
            desc: 'required',
            title: 'required'
        }
    });
</script>