<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];

    if($page == 'dashboard'){
        include_once('views/pages/dashboard.php');
    
    }elseif($page == 'users'){
        include_once('views/pages/users/manage.php');
    }elseif($page == 'create-user'){
        include_once('views/pages/users/create.php');
    }elseif($page == 'categories'){
        include_once('views/pages/categories/manage.php');
    }elseif($page == 'add-categorie'){
        include_once('views/pages/categories/create.php');
    }
    else{
        include_once('views/pages/dashboard.php');
        
    }
}

?>