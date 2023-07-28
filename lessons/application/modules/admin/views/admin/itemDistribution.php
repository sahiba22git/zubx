
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
<?php $this->load->model('Admin_model');?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-thumb-tack"></i> Distributed Item List
        <small></small>
        <small> <a href="" class="createxsl"> Create Excel </a> </small>
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
                    <h3 class="box-title">Distributed Items</h3>

                </div><!-- /.box-header -->
				
                <div class="box-body table-responsive no-padding">
                 Filter BY: <br>
                 Challan No: <input type="text" id="column3_search">
 				  <table id="example" class="table table-hover">
				   <thead>
                    <tr><th style="text-align:center;">#</th>
                        <th style="text-align:center;">Sr.no</th>

                        <th style="text-align:center;">Distribution Date</th>
                        <th style="text-align:center; width:8%;">Challan number</th>  
                        <th style="text-align:center;">Client</th>                      
                        <th style="text-align:center; width:8%;">Item code</th>
                        <th style="text-align:center;">Item Name</th>
                        <th style="text-align:center; width:8%;">Qt Distributed</th>
                        <th style="text-align:center; width:8%;">Quantity Unit</th>


                      <!-- <th class="text-center">Actions</th>  -->
                    </tr>
					  </thead>
					    <tbody>
                           <!--  <tr>
                                <td>Outer Challan:</td>
                                <td><input type="text" id="outerchallan" name="outerchallan"></td>
                            </tr> -->
                           <!--  <tr>
                                <td>Challan Number:</td>
                                <td><input type="text" id="outchallan" name="outchallan"></td>
                            </tr> -->
			<?php
            $i=1;
           // echo "<pre>"; print_r($itemDistributionrecords); die;
				foreach($itemDistributionrecords as $record)
                  {
                     // echo "<pre>"; print_r($record); die;
            ?>
					<tr>	
						 <td style="text-align:center;"><?php echo $i; ?></td>
						 <?php $get_serial=	$this->Admin_model->getSerial($record->user_id) ;?>
                        <td style="text-align:center;"><?php echo $get_serial; ?></td>
                         <td style="text-align:center;"><?php echo date("d-m-Y H:i",strtotime($record->created)); ?></td>
                         <td style="text-align:center; width:8%;"><?php echo $record->outgoing_challan_no; ?></td>
						 <td style="text-align:center;"><?php echo $record->email; ?></td>
						 <!-- <td><?php //echo $record->qt_distributed ?></td> -->
                         <td style="text-align:center; width:8%;"><?php echo $record->item_id; ?></td>                         
                         <td style="text-align:center;"><?php echo $record->item_name; ?></td>

                          <td style="text-align:center; width:8%;"><?php echo $record->total_quantity ;?></td>                         
                         <td style="text-align:center; width:8%;"><?php echo $record->qt_name ;?></td>
						  
						<!-- <td class="text-center"> -->
                            <!-- <a class="btn btn-sm btn-info" href="<?php //echo base_url().'item_distribution/itemDistributionForm/'.$record->itm_dist_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a> -->
                            <!-- <a class="btn btn-sm btn-danger deleteUser" href="<?php // echo base_url().'item_distribution/deleteitemDistribution/'.$record->itm_dist_id; ?>" data-itm_dist_id="<?php //echo $record->itm_dist_id; ?>" title="Delete"><i class="fa fa-trash"></i></a> -->
                        <!-- </td>  -->
					</tr>
			<?php
            $i++;
                }
            ?>
						</tbody>
			  <tfoot>
            <tr><th style="text-align:center;">#</th>
                        <th style="text-align:center;">Sr.no</th>
                       
                        <th style="text-align:center;">Distribution Date</th>
                        <th style="text-align:center; width:8%;">Challan number</th>  
                        <th style="text-align:center;">Client</th>                      
                        <th style="text-align:center; width:8%;">Item code</th>
                        <th style="text-align:center;">Item Name</th>
                        <th style="text-align:center; width:8%;">Qt Distributed</th>
                        <th style="text-align:center; width:8%;">Quantity Unit</th>
                      <!-- <th class="text-center">Actions</th>  -->
                    </tr>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>	
<script>

  
// $.fn.dataTable.ext.search.push(
//     function( settings, data, dataIndex ) {
//         var outerchallan = parseInt( $('#outerchallan').val(), 10 );
//         var outerchallanTabl = parseInt( data[4] ); // use data for the age column
 
//         if (outerchallanTabl== outerchallan)
//         {
//             return true;
//         }
//         return false;
//     }
// );
//  $(document).ready(function() {
//     var table =$('#example').DataTable();
//      $('#outerchallan').keyup( function() {
//         table.draw();
//     } );
//  } );
var table=$('#example').DataTable();
$('#column3_search').on( 'keyup', function () {
    table.columns(3).search( this.value ).draw();
} );
$('.createxsl').on("click",function(e){
    e.preventDefault();
    var challan=$("#column3_search").val();
    if(challan=='' || challan==0){ alert("Please Fill challan number First;")}
    else{
        var myWindow = window.open("<?php echo base_url().'createExcel?c=';?>"+challan, "_self");
    }
    
})
</script>


