<?php
require_once("classes/cls-sitemap.php");
$obj_event = new Sitemap();

$event_details = $obj_event->getevent('*', '', '', '', 0);
$event_detail  = end($event_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}


if(isset($_GET['id']) && $_GET['id']!="")
{
    $condition = "`id` = '" . $_GET['id'] . "' ";
    $getevent = $obj_event->getevent('*', $condition, '', '', 0);
    $getevent = end($getevent);
}

/*-----------------ADD-UPDATE--------*/
if ($_POST['update_type'] == "add") 
{ 
if (isset($_POST['submit']))
    {
        
         
         $event=$_POST['place_location'];
         $lat_location=$_POST['lat_location'];
         $long_location=$_POST['long_location'];

         $d=explode(' ',$_POST['datetime']);
         $date=$d[0];
         $time=$d[1];
         $discription=$_POST['eventcontent'];
         $img_path ="0";
         if (isset($_FILES['sectionImgF']['name']) && $_FILES['sectionImgF']['size'] > 0) {

			$uploaddir = '../uploads/site_map/';
            $savedir = 'uploads/site_map/';

			$name           = $_FILES['sectionImgF']['name'];
			$nameArr        = explode(".", basename($name));
			$ext            = end($nameArr);
			$filename       = time() . mt_rand().".".$ext;
			$uploadfile     = $uploaddir . $filename;
			  
			if(move_uploaded_file($_FILES['sectionImgF']['tmp_name'], $uploadfile))
			{ 
				$img_path = $uploaddir.$filename;
                $savedirr = $savedir.$filename;
			}
			else
			{
				$response['msg'] = $_FILES['sectionImgF']['error'];
				echo json_encode($response);
				exit();
			}

         }

        $obj_event->insertevent(array("img_path"=>$savedirr,"place_location"=>$event,"long_location"=>$long_location,"lat_location"=>$lat_location,"event_category_id"=>$_GET['activity_id'],"content"=>$discription,"date"=>$date,"time"=>$time,"add_date"=>date("Y-m-d H:i:s")));
        
           $_SESSION['success'] = "Add Event successfully.";
          
            header("location:activity.php?activity_id=".$_GET['activity_id']."&c=".$_GET['c']."&event=".$_GET['event']);
           
            exit();
    }
}
if($_POST['update_type']=="edit")
{
    if(isset($_POST['submit']))
    {
         $condition = "`id` = '" .$_POST['id']."'";
        $update_data['place_location']=$_POST['place_location'];
        $update_data['long_location']=$_POST['long_location'];
        $update_data['lat_location']=$_POST['lat_location'];
        $update_data['content']=$_POST['eventcontent'];
        $d=explode(' ',$_POST['datetime']);
        $date=$d[0];
        $time=$d[1];
        $update_data['date']= $date;
        $update_data['time']= $time;

        
        $update_data['add_date'] = date('Y-m-d H:i:s'); 
        $obj_event->updateevent($update_data, $condition, 0);

        $_SESSION['success'] = "Update Event successfully.";
        header("location:activity.php?activity_id=".$_GET['activity_id']."&c=".$_GET['c']."&event=".$_GET['event']);
         exit();
    }
}

/*-----------------------------------*/


include("header.php");
?>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <?php include("top-bar.php"); ?>
            <!-- /.navbar-top-links -->

            <?php include("side-bar.php"); ?>

            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">

            <div class="container-fluid">
                <!------------------------Update cell---------->

                <!----------Add Cell-------------------->
                <div class="row">
                    <div class="col-lg-12">
                       <?php
                       $clr="#fff";
                            if(isset( $getevent))
                            {
                                if($_GET['c']=='yellow'){ $clr="black";}
                                echo "<h3 class='page-header text-primary' style='color:".$clr."!important;background:".$_GET['c']."'><i class='fa fa-user'></i> Update ".$_GET['event']."</h3>";
                            }
                            else
                            {                  
                                if($_GET['c']=='yellow'){ $clr="black";}     
                                echo "<h3 class='page-header text-primary' style='color:".$clr."!important;background:".$_GET['c']."'><i class='fa fa-user'></i> Add ".$_GET['event']."</h3>";                        
                            }                         



                        ?>

                        <?php 
                            if(isset($_SESSION['success']) && $_SESSION['success']!= "")
                            {
                                ?>
                                <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $_SESSION['success']; ?>
                                <?php unset($_SESSION['success']);?>
                                </div>
                                <?php 
                            }

                            if(isset($_SESSION['error']) && $_SESSION['error']!= "")
                            {
                                ?>
                                <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $_SESSION['error']; ?>
                                <?php unset($_SESSION['error']);?>
                                </div>
                                <?php 
                            }
                        ?>
    
    
                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active">Manage <?php echo $_GET['event'];?></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <?php echo $_GET['event']." ";?> Form
                            </div>
                            <div class="table-responsive">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-lg-offset-1">
                                        <!-- add-user-action.php -->
                                            <form role="form" method="POST" enctype="multipart/form-data" action="#" name="add-aboutevent" id="add-aboutevent">
                                                <?php
                                                    if(isset( $_GET['id']))
                                                        {
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update ".$_GET['event']."</h4>"  ;          
                                                        }
                                                        else
                                                        {
                                                           echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Create ".$_GET['event']." </h4>";
                                                        }
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="id" id="id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : ""; ?>">


                                                <div class="form-group">
                                                    <label>Event Location <span class="error">*</span></label>          
                                                    <input type="text" class="form-control" name="eventLocation" id="eventLocation" value="<?php echo (isset($getevent['place_location'])) ? $getevent['place_location'] : ""; ?>">
                                                    
                        <input type="hidden" class="form-control" name="place_location" id="place_location" value="<?php echo (isset($getevent['place_location'])) ? $getevent['place_location'] : ""; ?>">

                        <input type="hidden" class="form-control" name="lat_location" id="lat_location" value="<?php echo (isset($getevent['lat_location'])) ? $getevent['lat_location'] : ""; ?>">

                        <input type="hidden" class="form-control" name="long_location" id="long_location" value="<?php echo (isset($getevent['long_location'])) ? $getevent['long_location'] : ""; ?>">

                                                </div>   
                                                <hr>
                                                <div class="form-group">
                                                    <label>Event Description <span class="error">*</span></label>              

                                                    <textarea class="form-control" rows="3" id="eventcontent" name="eventcontent" ><?php echo (isset($getevent['content'])) ? $getevent['content'] : ""; ?></textarea>                                 
                                                  
                                                </div>


                                                <hr>
                                                <!-- <div class="form-group">
                                                    <label>Event Priority <span class="error">*</span></label>
                                                
                                                <select class="form-control" id="priority" name="priority" >
                                                    <option value="high">High</option>
                                                    <option value="medium">Medium</option>
                                                    <option value="low" >Low</option>
                                                    
                                                </select>

                                                </div>    
                                                <hr> -->

                                                <div class="form-group">
                                                    <label>Date Time <span class="error">*</span></label>
                                                    <div class='input-group date' id='datetimepicker'>
                                                       <input type='text' class="form-control" name="datetime" id="datetime" value="<?php echo (isset($getevent['date'])) ? $getevent['date'] .$getevent['time'] : ""; ?>">
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label">Uploads</label>
                                                    <input type="file" class="form-control" name="sectionImgF" id="sectionImgF" >
                                                </div> 

                                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-6">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                               <?php echo $_GET['event'];?> List
                            </div>
                            <div class="table-responsive">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <!-- <th>Id</th> -->
                                                    <th><?php echo $_GET['event'];?> </th>
                                                    <th>Location</th>
                                                    <th>Description</th>
                                                    <th>DateTime</th>                              
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>                              
                                                <?php
                                                    $x=1;
                                                    if(isset($_GET['activity_id']) && $_GET['activity_id']!="")
                                                    { 
                                                        $condition = "`event_category_id` = '" .$_GET['activity_id']. "' ";
                                                        $getallevents = $obj_event->getevent('*', $condition, '', '', 0);                                                        
                                                        
                                                    }
                                                foreach ($getallevents as $getallevent) { ?>

                                                    <tr class="odd gradeX">                                    
                                                         <td>
                                                        <?php echo $x?>
                                                        </td> 

                                                        <td>
                                                        <a title="View Attendance" href="#"><?php echo ucfirst($getallevent['place_location']); ?></a>
                                                        </td>

                                                        <td>
                                                        <a title="View Attendance" href="#"><?php echo $getallevent['content']; ?></a>
                                                        </td>                                                      
                                                        <td>
                                                        <a title="View Attendance" href="#"><?php echo $getallevent['date']." ". $getallevent['time']; ?></a>
                                                        </td>      
                                                        
                                                        <td class="center">
                                                    
                                                            <div class="">                                                               
                                                            <a class="btn btn-danger" href="activity.php?activity_id=<?php echo $_GET['activity_id']."&event=".$_GET['event']."&c=".$_GET['c']."&id=".$getallevent['id']; ?>">Edit</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php 
                                                    
                                            $x++;
                                            } ?>
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                            </div>
            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include("footer.php"); ?>
    
    <script src="bower_components/jquery-validation/jquery.validate.js"></script>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc0-x85CWwIhB3O9laBR_DIR--uPjCyJY&libraries=places&callback=initMapp">
</script> 
    <script type="text/javascript">
        function initMapp() {

            var input = document.getElementById('eventLocation');
                var autocomplete = new google.maps.places.Autocomplete(input);

                  google.maps.event.addListener(autocomplete, 'place_changed', function () {
                        var place = autocomplete.getPlace();
                        document.getElementById('place_location').value = place.name;
                        document.getElementById('lat_location').value = place.geometry.location.lat();
                        document.getElementById('long_location').value = place.geometry.location.lng();

                    });
        }
    $(document).ready(function () {
        // validate signup form on keyup and submit
        $("#add-aboutevent").validate({
            rules: {
                eventLocation:{
                    required: true
                },
                eventcontent:{
                    required: true
                },
                datetime:{
                    required: true
                }
            },
            messages: {
                eventLocation: {
                    required: "*Add event is required."
                },
                eventcontent: {
                    required: "*Add discription is required."
                },
                datetime: {
                    required: "*Add datetime is required."
                }
            },
            errorElement: "span",
        });
    });
    </script>
    


     <script type="text/javascript">
       $("#datetime").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
    </script>
    
    <script src="bower_components/jquery-validation/jquery.validate.js"></script>
    
</body>

</html>
