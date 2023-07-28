

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>





<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <i class="fa fa-thumb-tack"></i> Approved

        <small></small>

      </h1>

    </section>

    <section class="content">

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

          <div class="col-xs-12">
                <?php $get_msg = $this->message->get_message() ?>
                <?php if(!empty($get_msg)):?>
                    <?php echo $get_msg;?>
                <?php endif; ?>
              <div class="box">
                <div class="box-body table-responsive no-padding">
                <table id="example" class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Transaction Id</th>
                      <th>Status</th>
                      <th class="text-center">Actions</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $x = 1;
                        foreach($details as $detail){
                    ?>
                    <tr>
                        <td><?php echo $x ?></td>
                        <td><?php echo $detail['name']; ?></td>
                        <td><?php echo $detail['email']; ?></td>
                        <td><?php echo date('d-m-Y H:i',strtotime($detail['date'])); ?></td>
                        <td><?php echo $detail['trasaction_id']; ?></td>
                        <td>
                          <?php if($detail['status'] == 0){echo 'Pending';}else if($detail['status'] == 1){echo 'Approved';}else{echo 'Disapproved';}; ?>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/course-status/'.$detail['id'].'/1'; ?>">Approved</a>
                            <a class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/course-status/'.$detail['id'].'/2'; ?>">Disapproved</a>
                        </td>
                    </tr>
                    <?php
                        $x++;}
                    ?>
                  </tbody>
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

