<?php
include_once 'config/base.php';
?>

<!--begin::header-->
<?php include_once __DIR__ . '/views/layouts/header.php'; ?>
<!--end::header-->

<!--begin::navbar-->
<?php include_once __DIR__ . '/views/layouts/nav.php'; ?>
<!--end::navbar-->

<div id="layoutSidenav">

    <!--begin::Sidebar-->
    <?php include_once __DIR__ . '/views/layouts/aside.php'; ?>
    <!--end::Sidebar-->

    <div id="layoutSidenav_content">

        <!--begin::App Main-->
        <?php //echo "<h1>".$_GET['page']."</h1>"
        include('route.php');
        ?>
        <!--end::App Main-->

        <!--begin::Footer-->
        <?php include_once __DIR__ . '/views/layouts/footer.php'; ?>
        <!--end::Footer-->

    </div>
</div>

<?php include_once __DIR__ . '/views/layouts/foot.php'; ?>