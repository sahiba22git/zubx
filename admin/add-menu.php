<?php
require_once("classes/cls-menu.php");
$obj_menu = new Menu();

$menu_details = $obj_menu->getmenu('*', '', '', '', 0);
$menu_detail  = end($menu_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['menu_id']) && $_GET['menu_id']!="")
{
    $condition = "`menu_id` = '" . base64_decode($_GET['menu_id']) . "' ";

    $getmenu = $obj_menu->getmenu('*', $condition, '', '', 0);

    $getmenu = end($getmenu);
}

/*---------------Add-Update--------------*/
if ($_POST['update_type'] == "add") 
{
if (isset($_POST['submit']))
{
     $menu=$_POST['menu'];

     $obj_menu->insertmenu(array("menu_name"=>$menu,"add_date"=>date("Y-m-d H:i:s")));

           $_SESSION['success'] = "Add menu successfully.";
            header("location:manage-menu.php");
            exit();
}
}
if($_POST['update_type']=="edit")
{
    if(isset($_POST['submit']))
    {
            $condition = "`menu_id` = '" . base64_decode($_POST['menu_id']) . "'";
            $update_data['menu_name']=$_POST['menu'];
            $update_data['add_date'] = date('Y-m-d H:i:s'); 
            $obj_menu->updatemenu($update_data, $condition, 0);

            $_SESSION['success'] = "Update menu successfully.";
            header("location:manage-menu.php");
            exit();
    }   
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
                       <?php
                            if(isset( $getmenu))
                            {
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Update Menu</h3>";
                            }
                            else
                            {                       
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Add Menu</h3>";                        
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
                            <li class="active">Manage Menu</li>
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
                                            <form role="form" method="POST" enctype="multipart/form-data" action="" name="add-form" id="add-form">
                                                <?php
                                                    if(isset( $getmenu))
                                                        {
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update Menu</h4>"  ;          
                                                        }
                                                        else
                                                        {
                                                           echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Create Menu</h4>";
                                                        }
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['menu_id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="menu_id" id="menu_id" value="<?php echo (isset($_GET['menu_id'])) ? $_GET['menu_id'] : ""; ?>">


                                                <div class="form-group">
                                                    <label>Menu Name <span class="error">*</span></label>

                                                    <input type="text" class="form-control" name="menu" id="menu" value="<?php echo (isset($getmenu['menu_name'])) ? $getmenu['menu_name'] : ""; ?>" >
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
        $("#add-form").validate({
            rules: {
                menu:{
                    required: true
                }
            },
            messages: {
                menu: {
                    required: "*Add menu is required."
                }
            },
            errorElement: "span",
        });
    });
    </script>

</body>

</html>
