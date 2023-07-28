<?php
require_once("classes/cls-cell.php");
$obj_cell = new Cell();

$cell_details = $obj_cell->getUsercell('*', '', '', '', 0);
$cell_detail  = end($cell_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['id']) && $_GET['id']!="")
{
    $condition = "`id` = '" . base64_decode($_GET['id']) . "' ";

    $getcells = $obj_cell->getUsercell('*', $condition, '', '', 0);

    $getcells = end($getcells);


}

if(isset($_REQUEST['submit'])){
    
    $condition = "`id` = '" . base64_decode($_POST['id']) . "'";
    $update_data['place_name']=$_POST['place_name'];
    $update_data['lat']=$_POST['lat'];
    $update_data['lng']=$_POST['lng'];
     //$update_data['updated_date'] = date('Y-m-d'); 
     $updateuser = $obj_cell->updateUsercell($update_data, $condition, 0);
    

     header("location:view_usercell.php");
        exit();
         
}
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
                            if(isset( $getcells))
                            {
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Update Cell</h3>";
                            }
                            else
                            {                       
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Add Cell</h3>";                        
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
                            <li class="active">Manage User Cell</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                General Form
                            </div>
                            <div class="table-responsive">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-lg-offset-1">
                                        <!-- add-user-action.php -->
                                            <form role="form" method="POST" enctype="multipart/form-data" action="update-usercell.php" name="add-cell" id="add-cell">
                                                <?php
                                                    
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update Cell</h4>"  ;          
                                                        
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="id" id="id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : ""; ?>">


                                                <div class="form-group">
                                                    <label>Place Name <span class="error">*</span></label>

                                                    <input type="text" class="form-control" name="place_name" id="place_name" value="<?php echo (isset($getcells['place_name'])) ? $getcells['place_name'] : ""; ?>" requried>
                                                </div>
                                                <div class="form-group">
                                                    <label>Latitude <span class="error">*</span></label>

                                                    <input type="text" class="form-control" name="lat" id="lat" value="<?php echo (isset($getcells['lat'])) ? $getcells['lat'] : ""; ?>" requried>
                                                </div>
                                                <div class="form-group">
                                                    <label>Longitude <span class="error">*</span></label>

                                                    <input type="text" class="form-control" name="lng" id="lng" value="<?php echo (isset($getcells['lng'])) ? $getcells['lng'] : ""; ?>" requried>
                                                </div>
                                                <hr>
                                                

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
    <script type="text/javascript">
    $(document).ready(function () {
        // validate signup form on keyup and submit
        // $("#add-cell").validate({
        //     rules: {
        //         cell:{
        //             required: true
        //         }
              
        //     },
        //     messages: {
        //        cell: {
        //             required: "*Add Cell name is required."
        //         },
                
        //     },
        //     errorElement: "span",
        // });
    });
    </script>

</body>

</html>
