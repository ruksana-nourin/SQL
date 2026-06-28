<?php
require_once 'user.class.php';
class Auth extends User
{


    static public function login($email, $password)
    {
        global $db;
        $sql = "SELECT * FROM users where email = '$email'";
        $result = $db->query($sql);
        $user = $result->fetch_assoc();
        if (!$user) {
            return ['error' => 'Email not found'];
        } else {
            $pass = password_verify($password, $user['password']);
            if ($pass) {
                return $user;
            } else {
                return ['error' => 'Password Incorrect'];
            }
        }

    }

}
?>