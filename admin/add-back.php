<?php
require_once("classes/cls-back.php");
$obj_back = new Back();

$back_details = $obj_back->getBackDetails('*', "`bid` = '1'", '', '', 0);
$back_detail  = end($back_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
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
                <div class="row">


                    <div class="col-lg-12">

                        <h3 class="page-header text-primary"><i class="fa fa-user"></i> Manage Site Background</h3>

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
                            <li class="active">Manage Site Background</li>
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
                                            <form role="form" method="POST" enctype="multipart/form-data" action="manage-back-action.php" name="add-form" id="add-form">
                                                                                      
                                                
                                                <h4 class="page-header text-primary"><i class="fa fa-user"></i> Background Details</h4>
                                                
                                                <div class="form-group">
                                                    <label>Choose Multipal Images <span class="error">*</span></label>

                                                    <input type="file" class="form-control" name="logo[]" id="logo"  multiple="" >
                                                </div>
                                                <?php /*
                                                <hr>
                                                
                                                <div class="form-group">
                                                    <label>Old Site Background<span class="error"></span></label>
                                                    <br>
                                                    <center><img src="<?php echo  SITEPATH."".$back_detail['back_path']; ?>" width="300" height="300" style="border: 1px solid black; padding:2px;" ></center>
                                                </div>
                                                */?>
                                                <div class="form-group">
                                                    <div id="status-div"></div>
                                                </div>	

                                                <hr>
                                                <button type="submit" name="submit" class="btn btn-default">Update Background</button>
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
        $("#add-form").validate({
            rules: {
                logo:{
                    required: true
                }
            },
            messages: {
                logo: {
                    required: "*Site Background is required."
                }
            },
            errorElement: "span",
        });
    });
    </script>

</body>

</html>
