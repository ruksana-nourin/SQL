<?php
require_once("models/user.class.php");
$rows = User::readAll();
// echo '<pre>';
// print_r( $rows );
// echo '</pre>';
?>

<!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Users</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <a class="btn btn-sm btn-dark" href="create-user">Create user</a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">

                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th style="width: 10px">ID</th>
                              <th>Name</th>
                              <th>E-mail</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($rows as $item){ ?>
                            
                            
                          <tr class="align-middle">
                              <td><?= $item['id']?></td>
                              <td><?= $item['name']?></td>
                              <td><?= $item['email']?></td>
                              <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-default"> <i class="fa fa-eye text-primary"></i></button>
                                    <button type="button" class="btn btn-sm btn-default"> <i class="fa fa-edit text-success"></i></button>
                                    <button type="button" class="btn btn-sm btn-default"> <i class="fa fa-trash text-danger"></i></button>
                                </div>
                              </td>
                            </tr>
                            <?php }?>
                          </tbody>
                          
                        </table>
                    </div>
                  </div>
                  <!-- /.card-body -->
                 
                </div>
               
              
              
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->