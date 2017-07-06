<?php
/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-07-06
 * Time: 12:30 PM
 */
include "../DataClasses/user.php";
include "../DatabaseConnection/DBConnect.php";
$dbOne = new DBConnect();
$userOne = new user();
$email=$_POST['inputEmail'];
$password =$_POST['inputPassword'];

if($dbOne->connectToDatabase()){

    $sqlSelect = "SELECT * FROM user WHERE userEmail= '" . $email . "' && userPassword= '" . $password . "'" ;
    $res = mysqli_query($dbOne->myconn, $sqlSelect);

    if($res){
        $count=mysqli_num_rows($res) ;
        $resArray = mysqli_fetch_array($res, MYSQL_ASSOC);


        if($count==1){

            $userOne->userID = $resArray["id_user"];
            $userOne->userName= $resArray["userName"];
            $userOne->userSurname= $resArray["userSurname"];
            $userOne->userContact= $resArray["userContact"];
            $userOne->userEmail= $resArray["userEmail"];
            $userOne->userPassword= $resArray["userPassword"];
            $userOne->activated= $resArray["activated"];
            $userOne->admin= $resArray["admin"];

            if($userOne->activated && $userOne->admin){


                $cookie_name = "account";
                $cookie_value = $userOne;
                setcookie($cookie_name, serialize($cookie_value), 0, "/");
                header('Location: '. '../AdminPages/Home.php'); /* Redirect browser */
                die();

            }
            else if($userOne->activated ==true && $userOne->admin==false){


                $cookie_name = "account";
                $cookie_value = $userOne;
                setcookie($cookie_name, $cookie_value, 0, "/");
                header('Location: '. '../UserPages/Home.php'); /* Redirect browser */
                die();
            }
            else{
                
            }



        }
        else{


        }
    }

}



?>