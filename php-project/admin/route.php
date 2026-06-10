<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];

    if($page == 'dashboard'){
        include_once('views/pages/dashboard.php');
    }elseif($page == 'form'){
        include_once('views/pages/form.php');
    }elseif($page == 'table'){
        include_once('views/pages/table.php');
    }
    else{
        include_once('views/pages/dashboard.php');
    }
}

?>