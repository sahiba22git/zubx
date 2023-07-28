
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-thumb-tack"></i> Distributed Inventory Listing
	<?php 
			// echo $outgoing_challan_no ;
	?>	
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
                    <h3 class="box-title">Inventory</h3>

                </div><!-- /.box-header -->
				
                <div class="box-body table-responsive no-padding">
                 
 				  <table id="example" class="table table-hover">
				   <thead>
                    <tr>
                        <th>#</th>
                        <th>Farm Name</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Quantity Unit</th>
                        <th>Distribution Limit</th>
                        <th>Created On</th>
                    </tr>
					  </thead>
					    <tbody>
			<?php
				$x = 1 ;
				foreach($inventoryrecords as $record)
                  {
            ?>
					<tr>	
						 <td><?php echo $x ?></td>
						 <td><?php echo $record->farm_name ?></td>
						 <td><?php echo $record->item_name ?></td>
						 <td><?php echo $record->quantity ?></td>
						 <td><?php echo $record->qt_name ?></td>
						 <td><?php echo $record->distribution_limit ?></td>
						 <td><?php echo date("d-m-Y H:i",strtotime($record->created)); ?></td>
						  
						
					</tr>
			<?php
                 $x++ ; }
            ?>
						</tbody>
			  <tfoot>
            <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
						<th>Quantity Unit</th>
                        <th>Distribution</th>
                        <th>Created On</th>
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
  
  $(document).on('click', '#del', function(){
	  
	  // alert('http://localhost/ngo/itemDistribAutomatic') ;
	  
	   $.ajax({
		    url : '<?php echo base_url()  ?>delChallan',
			type: 'post',
			data:{
				action : 'delChallan',
			},
			success: function( resp ){
				alert("Challan is Deleted Successfully") ;
				location.reload() ;
			}
		   
	   })
  })
  
  $(document).on('click', '#dist', function(){
	  
	  // alert('http://localhost/ngo/itemDistribAutomatic') ;
	  
	  	   $.ajax({
		    url : '<?php echo base_url()  ?>Admin/itemDistribAutomatic',
			type: 'post',
			data:{
				action : 'itemDistribAutomatic',
			},
			success: function( resp ){
                //console.log(resp);
				alert("Items Distributed Successfully") ;
				location.reload() ;
			}
		   
	   })
	   
  })

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
