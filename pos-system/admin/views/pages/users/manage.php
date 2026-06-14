<div class="card mb-4">
    <div class="card-header">
        <!-- <svg class="svg-inline--fa fa-table me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
            <path fill="currentColor" d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"></path>
        </svg><i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
        <i class="fas fa-user-shield"></i>
        Users
    </div>
    <div class="card-body">

        <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">


            <div class="datatable-container">
                <div class="card-header">
                    <a class="btn btn-primary mb-3" href="create-user">Create user</a>
                </div>
                <table id="datatablesSimple" class="datatable-table">
                    <thead>
                        <tr>
                            <th data-sortable="true" style="width:5%;"><a href="#" class="datatable-sorter">ID.</a></th>
                            <th data-sortable="true" style="width:20%;"><a href="#" class="datatable-sorter">Name</a></th>
                            <th data-sortable="true" style="width: 30%;"><a href="#" class="datatable-sorter">E-mail</a></th>
                            <th data-sortable="true" style="width: 15%;"><a href="#" class="datatable-sorter">Position</a></th>
                            <th data-sortable="true" style="width: 10%;"><a href="#" class="datatable-sorter">Status</a></th>
                            <th data-sortable="true" style="width: 20%;"><a href="#" class="datatable-sorter">Action</a></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr data-index="0">
                            <td>1.</td>
                            <td>Tiger Nixon</td>
                            <td>tigernixon@gmail.com</td>
                            <td>Admin</td>
                            <td>Active</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-default"> <i class="fa fa-eye text-primary"></i></button>
                                    <button type="button" class="btn btn-sm btn-default"> <i class="fa fa-edit text-success"></i></button>
                                    <button type="button" class="btn btn-sm btn-default"> <i class="fa fa-trash text-danger"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr data-index="1">
                            <td>2.</td>
                            <td>Sonya Frost</td>
                            <td>sonyafrost@gmail.com</td>
                            <td>Manager</td>
                            <td>Active</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-default"> <i class="fa fa-eye text-primary"></i></button>
                                    <button type="button" class="btn btn-sm btn-default"> <i class="fa fa-edit text-success"></i></button>
                                    <button type="button" class="btn btn-sm btn-default"> <i class="fa fa-trash text-danger"></i></button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>