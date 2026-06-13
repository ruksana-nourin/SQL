<?php
include_once 'config/base.php';
include_once 'config/db.php';
?>
<!--begin::header-->
<?php include_once __DIR__ . '/views/layouts/header.php'; ?>
<!--end::header-->
<!--begin::App Wrapper-->
<div class="app-wrapper">
  <!--begin::navbar-->
  <?php include_once __DIR__ . '/views/layouts/nav.php'; ?>
  <!--end::navbar-->
  <!--begin::Sidebar-->
  <?php include_once __DIR__ . '/views/layouts/aside.php'; ?>
  <!--end::Sidebar-->
  <!--begin::App Main-->
  <?php //echo "<h1>".$_GET['page']."</h1>"
  include('route.php') ;
  ?>
  
  <!--end::App Main-->
  <!--begin::Footer-->
  <?php include_once __DIR__ . '/views/layouts/footer.php'; ?>
  <!--end::Footer-->
</div>
<!--end::App Wrapper-->
<?php include_once __DIR__.'/views/layouts/foot.php';?>