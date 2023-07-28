<?php
require_once("classes/cls-about.php");
$obj_about = new About();

$about_details = $obj_about->getabout('*', '', '', '', 0);

$about_detail  = end($about_details);

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
            
                        
            <h3 class="page-header text-primary"><i class="fa fa-th-list"></i> Manage Abouts</h3>
            <ol class="breadcrumb">
                <li><a href="index.php">Dashboard</a></li>
                <li class="active">Manage About</li>
            </ol>
            <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
                <?php } ?>
            </div>
                    <!-- /.col-lg-12 -->
            </div>
                <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                General About
            </div>
            <div class="table-responsive">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Main Content</th>
                                                                     
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                <?php
                                    
                                 foreach ($about_details as $rows) { ?>
                                    <tr class="odd gradeX">                                    
                                        
                                        <td>
                                        <a title="View Attendance" href="#"><?php echo ucfirst($rows['main_containt']); ?></a>
                                        </td>  
                                         

                                        <td class="center">
                                     
                                            <div class="">                                       
                                                <!--<a class="btn btn-success btn-circle" title="View Employee" href="view-employee.php?emp_id=<?php echo base64_encode($employee_detail['emp_id']); ?>"><i class="fa fa-eye"></i></a>-->
                                                <a class="btn btn-default btn-circle" title="Edit About" href="add-containt.php?id=<?php echo base64_encode($rows['id']); ?>"><i class="fa fa-edit"></i></a>
                                                <!--<a class="btn btn-danger btn-circle"  data-toggle="confirmation" data-placement="top" data-original-title="" title="" href="delete-cell.php?cell_id=<?php echo base64_encode($cell_details['cell_id']); ?>"><i class="fa fa-trash"></i></a> &nbsp;&nbsp;-->
                                               
                                            </div>
                                        </td>
                                    </tr>
                                <?php 
                                    $i=$i+1;
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
<script src="bower_components/jquery-validation/additional-methods.js"></script>


</body>

</html>
