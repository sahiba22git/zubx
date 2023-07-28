<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/addNew"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                       
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)    
                        {
                    ?>
                    <tr>
                        <td><?php echo $record->name ?></td>
                        <td><?php echo $record->email ?></td>
                        <td><?php echo $record->mobile ?></td>
                        <td><?php echo ( $record->is_active == 1 ) ? 'Active' : 'Deactive' ;?></td>
                        <td><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></td>
                        <td class="text-center">
                       <!--     <a class="btn btn-sm btn-primary" href="<?php // base_url().'login-history/'.$record->userId; ?>" title="Login history"><i class="fa fa-history"></i></a> | -->
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'admin/editOld/'.$record->userId; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                              
                            <?php if($record->is_active == 1) { ?>
                              <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url().'admin/deactivateuser/'.$record->userId; ?>" data-userid="<?php echo $record->userId; ?>" title="Deactivate"><i class="fa fa-trash"></i></a> <?php } else{ ?>
                            <a class="btn btn-sm btn-success activeUser" href="<?php echo base_url().'admin/activateuser/'.$record->userId; ?>" data-userid="<?php echo $record->userId; ?>" title="Activate"><i class="fa fa-user-plus"></i></a> <?php }?>
                      
					  </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontent/js/common.js" charset="utf-8"></script>
<script type="text/javascript">


	jQuery(document).on("click", ".activeUser", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "activeUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to activate this user ?");
		
		if(confirmation)
		{
			
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				console.log(data);
				if(data.status = true) { alert("User successfully activated"); }
				else if(data.status = false) { alert("User activating failed"); }
				else { alert("Access denied..!"); }
				location.reload() ;
			});
		}
	});
	
	
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
