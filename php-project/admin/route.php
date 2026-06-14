<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];

    if($page == 'dashboard'){
        include_once('views/pages/dashboard.php');
    }elseif($page == 'form'){
        include_once('views/pages/form.php');
    }elseif($page == 'users'){
        include_once('views/pages/users/manage.php');
    }elseif($page == 'create-user'){
        include_once('views/pages/users/create.php');
    }elseif($page == 'edit-user'){
        include_once('views/pages/users/edit.php');
    }
    else{
        include_once('views/pages/dashboard.php');
    }
}

?>