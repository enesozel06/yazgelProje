<?php
include_once("../config.php");
?>
<?php
session_start();
$db = new Db();
session_start();
$user = $_SESSION["login_user"];
$uid = $user["id"];
if (!$user) {
    header("location: ../logout.php");
    exit;
}
?>

<input type="hidden" value="<?php  echo $uid?>" id="userid">

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2</title>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">LK Admin <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php

            include('navmenu.php');
            ?>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>




                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "asdas" ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->




                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php
                                        $sqlmes = "SELECT * FROM dev_message";
                                        $result = $db->query($sqlmes);


                                        ?>
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th>Mesaj</th>
                                                    <th>Token</th>
                                                    <th>Kısayol</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($rows = $result->fetch_array(MYSQLI_ASSOC)) {
                                                ?>
                                                        <tr class="odd">
                                                            <td class="sorting_1"><?php echo substr($rows['message'], 0, 20) ?></td>
                                                            <td><?php echo $rows['token'] ?></td>
                                                            <?php
                                                            //$uid 
                                                            $token = $rows['token'];
                                                            $sqldegisen = "SELECT * FROM url where token = '$token' and uid = '$uid' limit 1";
                                                            $resurl = $db->query($sqldegisen);
                                                            if (mysqli_num_rows($resurl) > 0) {
                                                                while ($rowsurl = $resurl->fetch_array(MYSQLI_ASSOC)) {
                                                            ?>
                                                                    <td><input tpye="text" value="<?php echo $rowsurl["shorten_url"] ?>" id="short<?php echo $rowsurl["id"] ?>"></td>
                                                                    <td><input type="submit" id="<?php echo $rowsurl["id"] ?>" class="btn btn-primary btn-user btn-block update" value="Güncelle"></td>

                                                                <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <td><input tpye="text" id="shortadd<?php echo $rows["token"] ?>"></td>
                                                                <td><input type="submit" id="<?php echo $rows["token"] ?>" class="btn btn-primary btn-user btn-block add" value="Kaydet" /></td>

                                                            <?php

                                                            }
                                                            ?>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>





                </div>




            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; LinkKısaltma</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Çıkış Yapılsın mı ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Çıkış Yapılacak</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</body>

</html>


<script type="text/javascript">
    $(document).ready(function() {
        //btn btn-primary btn-user btn-block update
        $(".btn.btn-primary.btn-user.btn-block.update").click(function() {
            var token = $(this).attr("id");            
            var shorturl = $("#short"+token).val();
            var userid = $("#userid").val();   
            

            if (shorturl.length<5) {
                alert("Lütfen Geçerli adres giriniz")
            } else {
                $.ajax({
                    type: 'POST',
                    url: '../controller.php',
                    data: {
                        cmd: 'shorturlupdate',
                        token: token,
                        shorturl: shorturl,
                        userid:userid

                    },
                    dataType: "text",
                    success: function(result) {

                        if (result == 1) {
                            alert("Kayit Güncellendi");
                            location.reload();
                        } else if (result == 0) {
                            alert('Hata!, tekrar deneyin.');

                        } else if (result == 3) {
                            alert('daha öncede eklenmiş');

                        } else {
                            alert(result);
                        }

                    }
                });
            }
        });

        $(".btn.btn-primary.btn-user.btn-block.add").click(function() {
            var token = $(this).attr("id");            
            var shorturl = $("#shortadd"+token).val();
            var userid = $("#userid").val();   
            

            if (shorturl.length<5) {
                alert("Lütfen Geçerli adres giriniz")
            } else {
                $.ajax({
                    type: 'POST',
                    url: '../controller.php',
                    data: {
                        cmd: 'shorturladd',
                        token: token,
                        shorturl: shorturl,
                        userid:userid

                    },
                    dataType: "text",
                    success: function(result) {

                        if (result == 1) {
                            alert("Kayit Eklendi");
                            location.reload();
                        } else if (result == 0) {
                            alert('Hata!, tekrar deneyin.');

                        } else if (result == 3) {
                            alert('daha öncede eklenmiş');

                        } else {
                            alert(result);
                        }

                    }
                });
            }
        });

    });
</script>