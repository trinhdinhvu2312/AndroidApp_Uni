<?php
session_start();

if (!isset($_SESSION['admin'])) {
  header('Location: ../');
  die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Admin Page</title>

  <!-- Custom fonts for this template -->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../assets/css/style.css" rel="stylesheet" />

  <!-- Custom styles for this page -->
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include '../components/sidebar.php'; ?>
    <?php include '../components/wrapper.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
        </div>
        <div class="card-body">
          <div class="form-responsive">
            <form action="pr_add_product.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label>Tên sản phẩm</label>
                <input required name="tensanpham" type="text" class="form-control" placeholder="Nhập tên sản phẩm">
              </div>
              <div class="mb-3">
                <label>Giá sản phẩm</label>
                <input required name="giasanpham" type="text" class="form-control" placeholder="Nhập giá sản phẩm">
              </div>
              <div class="mb-3">
                <p><label>Mô tả sản phẩm</label></p>
                <textarea required name="motasanpham" id="" cols="100" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
              </div>
              <div class="mb-3">
                <label >Loại sản phẩm</label>
                <select name="loaisanpham" id="loaisanpham">
                  <?php
                    require_once('../dbhelper.php');
                    $sql_mn = "SELECT * FROM loaisanpham ORDER BY id DESC";
                    $list_mn = queryResult($sql_mn);
                    $index = 0;
                    foreach ($list_mn as $item) { ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['tenloaisanpham']; ?></option>
                  <?php }?>
                </select>
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Hình ảnh sản phẩm</label>
                <input name="fileToUpload" class="form-control" type="file" id="formFile">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->

  <?php include '../components/footer.php'; ?>
  </div>
  <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include '../components/logout_modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/datatables-demo.js"></script>
</body>

</html>