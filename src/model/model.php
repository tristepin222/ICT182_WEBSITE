<?php
/**
 * Author   : nicolas.glassey@cpnv.ch
 * Project  : 151_2019_ForStudents
 * Created  : 05.02.2019 - 18:40
 *
 * Last update :    [01.12.2018 author]
 *                  [add $logName in function setFullPath]
 * Git source  :    [link]
 */

function checkPassword($username, $password)
{
    require_once "userManagement.php";
    $data= getUser($username);


    $username2 = "";
    $password2 = "";
    $pseudo ="";
    $vendor = "";
    $bool = FALSE;

    if(!$data == null) {
        foreach ($data as $elements) {

            if($username == $elements["userEmailAddress"]) {

                $username2 = $elements["userEmailAddress"];
                $password2 = $elements["userHashPsw"];
                $vendor = $elements["seller"];
            }

        }
    }else{

        $bool = 1;
    }

    if (password_verify($password, $password2) && ($username == $username2 || $username == $pseudo)){
    if($vendor == 1){
        $bool = 2;
    }else {
        $bool = 1;
    }
    }else{

        $bool = 0;
    }




    return $bool;
}
function checkPassword2($username, $password)
{
    require_once "userManagement.php";
    $data= getUser($username);


    $username2 = "";
    $password2 = "";
    $pseudo ="";
    $vendor = "";
    $bool = FALSE;

    if(!$data == null) {
        foreach ($data as $elements) {

            if($username == $elements["userEmailAddress"]) {

                $username2 = $elements["userEmailAddress"];
                $password2 = $elements["userPsw"];
                $vendor = $elements["seller"];
            }

        }
    }else{

        $bool = 1;
    }

    if ($password == $password2 && ($username == $username2 || $username == $pseudo)){
        if($vendor == 1){
            $bool = 2;
        }else {
            $bool = 1;
        }
    }else{

        $bool = 0;
    }




    return $bool;
}
function checkEmail($username){
    require_once "userManagement.php";
   $data =  getUser($username);

   if(isset($data[0]["userEmailAddress"])) {
       return TRUE;
   }else{
       return FALSE;
   }

}

?>