

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>





<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-thumb-tack"></i> Sentence Listing

        <small></small>

      </h1>

    </section>

    <section class="content">

	 <!--  		<div class="row">

            <div class="col-xs-12 text-right">

                 <div class="form-group">

                   <a class="btn btn-primary" href="<?php echo base_url(); ?>addNew"><i class="fa fa-plus"></i> Add New</a> 

                </div>

				

            </div>

        </div> -->

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

        <div class="row">

            <div class="col-xs-12">

              <div class="box">

                <div class="box-header">

                    <h3 class="box-title">Sentence </h3>



                </div><!-- /.box-header -->

				

                <div class="box-body table-responsive no-padding">

                 

 				  <table id="example" class="table table-hover">

				   <thead>

                    <tr>

                        <th>#</th>

                        <th>Sentence</th>

                        <th>Part</th>                       

                        <th>Created On</th>

                      <th class="text-center">Actions</th> 

                    </tr>

					  </thead>

					    <tbody>

			<?php

			$x = 1 ;

				foreach($sentencerecords as $record)

                  {

            ?>

					<tr>	

						 <td><?php echo $x ?></td>

						 <td><?php echo $record->sentence_name ?></td>

						 <td><?php echo $record->part_name ?></td>

						 <td><?php echo $record->created_at ?></td>

						  

						<td class="text-center">

                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/sentence/sentenceForm/'.$record->sentence_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a>

                            <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url().'admin/sentence/deleteSentence/'.$record->sentence_id; ?>" data-qt_id="<?php echo $record->part_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>

                        </td> 

					</tr>

			<?php

              $x++ ;  }

            ?>

						</tbody>

			  <tfoot>

            <tr>

                 <th>#</th>

                        <th>Sentence</th>

                        <th>Part</th>                       

                        <th>Created On</th>

                      <th class="text-center">Actions</th> 

				</tfoot>

                  </table>		

                  

                  

                </div><!-- /.box-body -->

                <div class="box-footer clearfix">

                   

                </div>

              </div><!-- /.box -->

            </div>

        </div>

    </section>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>	

<script>

// $(document).ready(function() {

    $('#example').DataTable();

// } );

</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

