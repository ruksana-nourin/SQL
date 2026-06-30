<?php
require 'config/function.php';

if(isset($_POST['loginBtn'])){

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if($email != '' && $password != '')
    {
        $query = "SELECT * FROM admins WHERE email = '$email' LIMIT 1";
        global $conn;
        $result = mysqli_query($conn, $query);
        if($result){

            if(mysqli_num_rows($result) == 1){

                $row = mysqli_fetch_assoc($result);
                $hashedPassword = $row['password'];
            
                if(!password_verify($password, $hashedPassword)){
                    redirect('login.php', 'Invalid Password.');
                }
                if($row['is_ban']==1){
                    redirect('login.php', 'You account has been banned.contact admin.');
                    
                }

                $_SESSION['loggedIn'] = true;
                $_SESSION['logggedInUser'] = [
                    'user_id' => $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                ];

                redirect('admin/index.php', 'Login successfully.');
                

            }else{
                redirect('login.php', 'Invalid Email.');
            }

        }else{
            redirect('login.php', 'Something went wrong.');
        }

        
    }
    else
    {
        redirect('login.php', 'All fe=ilds are mandatory.');
    }
}

?>