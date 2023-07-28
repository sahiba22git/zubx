<?php
require_once("classes/cls-skill.php");

$obj_skill = new skill();

$skill_details = $obj_skill->getskill('*', '', '', '', 0);
$skill_detail  = end($skill_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['skill_id']) && $_GET['skill_id']!="")
{
    $condition = "`skill_id` = '" . base64_decode($_GET['skill_id']) . "' ";

    $getskills = $obj_skill->getskill('*', $condition, '', '', 0);

    $getskills = end($getskills);


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
                <!------------------------Update skill---------->

                <!----------Add skill-------------------->
                <div class="row">
                    <div class="col-lg-12">
                       <?php
                            if(isset( $getskills))
                            {
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Update skill</h3>";
                            }
                            else
                            {                       
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Add skill</h3>";                        
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
                            <li class="active">Manage skill</li>
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
                                            <form role="form" method="POST" enctype="multipart/form-data" action="manage-skill-action.php" name="add-skill" id="add-skill">
                                                <?php
                                                    if(isset( $getskills))
                                                        {
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update skill</h4>"  ;          
                                                        }
                                                        else
                                                        {
                                                           echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Create skill</h4>";
                                                        }
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['skill_id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="skill_id" id="skill_id" value="<?php echo (isset($_GET['skill_id'])) ? $_GET['skill_id'] : ""; ?>">

                                               
                                                <div class="form-group">
                                                    <label>Skill Name <span class="error">*</span></label>

                                                    <input type="text" class="form-control" name="skill" id="skill" value="<?php echo (isset($getskills['skill_name'])) ? $getskills['skill_name'] : ""; ?>" requried>
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
        $("#add-skill").validate({
            rules: {
                skill:{
                    required: true
                }
              
            },
            messages: {
               skill: {
                    required: "*Add skill name is required."
                },
                
            },
            errorElement: "span",
        });
    });
    </script>

</body>

</html>
