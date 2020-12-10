<?php
/**
 * Created by PhpStorm
 * Project's name :
 * Use :
 * User : Jessy.BORCARD
 * Date : 07.02.2020
 * Time : 11:31
 *
 *
 */

function createUser($username, $password){


    $pseudo = substr($username, 0, strpos($username, "@"));
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (id,userEmailAddress, userHashPsw,userPsw, seller) VALUES (null,'{$username}' , '{$encrypted_password}', '{$password}', 0)";

    require_once "dbConnector.php";
    executeQuery($query);






}






function getUser($username){



    $query = "SELECT * from users where userEmailAddress = '{$username}' " ;
    require_once "dbConnector.php";
    $queryResult = executeQuery($query);
    return $queryResult;
}
?>