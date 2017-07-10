<?php
/**
 * Created by PhpStorm.
 * User: Margo
 * Date: 2017-06-29
 * Time: 03:17 PM
 */

class DBConnect //create a class for make connection
{
    var $host="localhost";
    var $username="root";    // specify the sever details for mysql
    var $password="Sharktale";
    var $database="beauty";
    var $myconn;

    function connectToDatabase() // create a function for connect database
    {
        $url = getenv('JAWSDB_URL');
        if($url==true)
        {
            $dbparts = parse_url($url);

            $this->host = $dbparts['host'];
            $this->username = $dbparts['user'];
            $this->password = $dbparts['pass'];
            $this->database = ltrim($dbparts['path'],'/');
        }
        $conn= mysqli_connect($this->host,$this->username,$this->password);

        if(!$conn)// testing the connection
        {
            return false;
        }
        else
        {

            $this->myconn = $conn;


            $dbselect = mysqli_select_db($this->myconn,$this->database);
            if($dbselect){
               return true;
            }
            else{
                return false;
            }

        }



    }



    function closeConnection() // close the connection
    {
        mysqli_close($this->myconn);

        echo "Connection closed";
    }

    //insert
    function insertUser(user $user){
     $sqlInsert = "INSERT INTO user (userName, userSurname,userContact, userEmail, userPassword, activated, admin ) 
          VALUES('".$user->userName."','".$user->userSurname."','".$user->userContact."','".$user->userEmail."','".$user->userPassword."','".$user->activated."','".$user->admin."')";
     $res = mysqli_query($this->myconn, $sqlInsert);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function insertShoppingCart(shoppingcart $shoppingcart){
        $sqlInsert = "INSERT INTO shoppingcart (id_user) VALUES('".$shoppingcart->userID."')";
        $res = mysqli_query($this->myconn, $sqlInsert);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function insertShoppingCartItem(shoppingcartitem $sci){
        $sqlInsert = "INSERT INTO shoppingcartitem (id_item, id_shoppingcart,quantity) 
          VALUES('".$sci->itemID."','".$sci->shoppingcartID."','".$sci->quantity."')";
        $res = mysqli_query($this->myconn, $sqlInsert);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function insertItem(item $item){
        $sqlInsert = "INSERT INTO item (itemName, itemDescription,itemPrice, id_category, id_itembrand, itemImage) 
          VALUES('".$item->itemName."','".$item->itemDescription."','".$item->itemPrice."','".$item->categoryID."','".$item->itembrandID."','".$item->itemImage."')";
        $res = mysqli_query($this->myconn, $sqlInsert);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function insertItemBrand(itembrand $itembrand){
        $sqlInsert = "INSERT INTO itembrand (itembrandName) VALUES('".$itembrand->itembrandName."')";
        $res = mysqli_query($this->myconn, $sqlInsert);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function insertCategory(category $category){
        $sqlInsert = "INSERT INTO category (categoryName) 
          VALUES('".$category->categoryName."')";
        $res = mysqli_query($this->myconn, $sqlInsert);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function insertInvoiceItem(invoiceitem $ii){
        $sqlInsert = "INSERT INTO invoiceitem (id_order, id_item, quantity, price) 
          VALUES('".$ii->orderID."','".$ii->itemID."','".$ii->quantity."','". $ii->price."')";
        $res = mysqli_query($this->myconn, $sqlInsert);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function insertOrder(order $order){
        $sqlInsert = "INSERT INTO order (id_user, statusCompleted,orderDate) 
          VALUES('".$order->userID."','".$order->statusCompleted."','".$order->orderDate."')";
        $res = mysqli_query($this->myconn, $sqlInsert);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function insertPayment(payment $payment){
        $sqlInsert = "INSERT INTO payment (id_order, paymentType,paymentAccount, completed) 
          VALUES('".$payment->orderID."','".$payment->paymentType."','".$payment->paymentAccount."','". $payment->completed."')";
        $res = mysqli_query($this->myconn, $sqlInsert);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function insertService(service $service){
        $sqlInsert = "INSERT INTO service (serviceName, serviceDescription,servicePrice, id_category) 
          VALUES('".$service->serviceName."','".$service->serviceDescription."','".$service->servicePrice."','". $service->categoryID."')";
        $res = mysqli_query($this->myconn, $sqlInsert);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function insertLogintimestamp(logintimestamp $lits){
        $sqlInsert = "INSERT INTO logintimestamp (timestamp, id_user) 
          VALUES('".$lits->timestamp."','".$lits->userID."')";
        $res = mysqli_query($this->myconn, $sqlInsert);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }



    //update
    function updateUser(user $user){
        $sqlUpdate = "UPDATE user 
        SET userName = $user->userName,
            userSurname= $user->userSurname,
            userContact= $user->userContact,
            userEmail= $user->userEmail,
            userPassword= $user->userPassword,
            activated= $user->activated,
            admin = $user->admin
        WHERE id_user = $user->userID";

        $res = mysqli_query($this->myconn, $sqlUpdate);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function updateShoppingCart(shoppingcart $shoppingcart){
        $sqlUpdate = "UPDATE shoppingcart 
        SET id_user =$shoppingcart->userID
        WHERE id_shoppingcart = $shoppingcart->shoppingcartID";
        $res = mysqli_query($this->myconn, $sqlUpdate);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function updateShoppingCartItem(shoppingcartitem $sci){
        $sqlUpdate = "UPDATE shoppingcartitem 
        SET id_item = $sci->itemID, 
        id_shoppingcart =$sci->shoppingcartID,
        quantity = $sci->quantity
        WHERE id_shoppingcartitem = $sci->shoppingcartitemID";
        $res = mysqli_query($this->myconn, $sqlUpdate);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function updateItem(item $item){
        $sqlUpdate = "UPDATE item 
        SET itemName = $item->itemName , 
        itemDescription =$item->itemDescription,
        itemPrice = $item->itemPrice, 
        id_category =$item->categoryID , 
        id_itembrand = $item->itembrandID, 
        itemImage =$item->itemImage 
        WHERE id_item = $item->itemID";
        $res = mysqli_query($this->myconn, $sqlUpdate);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function updateItemBrand(itembrand $itembrand){
        $sqlUpdate = "UPDATE itembrand 
        SET itembrandName = $itembrand->itembrandName
        WHERE id_itembrand = $itembrand->itembrandID";
        $res = mysqli_query($this->myconn, $sqlUpdate);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function updateCategory(category $category){
        $sqlUpdate = "UPDATE category 
        SET categoryName =$category->categoryName
        WHERE id_category= $category->categoryID";
        $res = mysqli_query($this->myconn, $sqlUpdate);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function updateInvoiceItem(invoiceitem $ii){
        $sqlUpdate = "UPDATE invoiceitem 
        SET id_order= $ii->orderID, 
        id_item =$ii->itemID, 
        quantity=$ii->quantity, 
        price= $ii->price
        WHERE id_invoiceitem = $ii->invoiceitemID";
        $res = mysqli_query($this->myconn, $sqlUpdate);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function updateOrder(order $order){
        $sqlUpdate = "UPDATE order 
        SET id_user =$order->userID, 
        statusCompleted =$order->statusCompleted,
        orderDate =$order->orderDate
        WHERE id_order= $order->orderID";
        $res = mysqli_query($this->myconn, $sqlUpdate);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function updatePayment(payment $payment){
        $sqlUpdate = "UPDATE payment 
        SET id_order= $payment->orderID, 
        paymentType =$payment->paymentType,
        paymentAccount =$payment->paymentAccount, 
        completed = $payment->completed
        WHERE id_payment= $payment->paymentID";
        $res = mysqli_query($this->myconn, $sqlUpdate);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function updateService(service $service){
        $sqlUpdate = "UPDATE service 
        SET serviceName=$service->serviceName , 
        serviceDescription=$service->serviceDescription ,
        servicePrice=$service->servicePrice , 
        id_category= $service->categoryID
       WHERE id_service= $service->serviceID";
        $res = mysqli_query($this->myconn, $sqlUpdate);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }


    //delete
    function deleteUser($user){
        $sqlDelete = "DELETE FROM user 
        WHERE id_user = $user";

        $res = mysqli_query($this->myconn, $sqlDelete);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function deleteShoppingCart($shoppingcart){
        $sqlDelete = "DELETE FROM shoppingcart 
        WHERE id_shoppingcart = $shoppingcart";
        $res = mysqli_query($this->myconn, $sqlDelete);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function deleteShoppingCartItem($sci){
        $sqlDelete = "DELETE FROM shoppingcartitem 
        WHERE id_shoppingcartitem = $sci";
        $res = mysqli_query($this->myconn, $sqlDelete);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function deleteItem($item){
        $sqlDelete = "DELETE FROM item 
        WHERE id_item = $item";
        $res = mysqli_query($this->myconn, $sqlDelete);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function deleteItemBrand($itembrand){
        $sqlDelete = "DELETE FROM itembrand 
        WHERE id_itembrand = $itembrand";
        $res = mysqli_query($this->myconn, $sqlDelete);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function deleteCategory($category){
        $sqlDelete = "DELETE FROM category 
        WHERE id_category= $category";
        $res = mysqli_query($this->myconn, $sqlDelete);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function deleteInvoiceItem($ii){
        $sqlDelete = "DELETE FROM invoiceitem 
        WHERE id_invoiceitem = $ii";
        $res = mysqli_query($this->myconn, $sqlDelete);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function deleteOrder($order){
        $sqlDelete = "DELETE FROM order 
        WHERE id_order= $order";
        $res = mysqli_query($this->myconn, $sqlDelete);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function deletePayment($payment){
        $sqlDelete = "DELETE FROM payment 
        WHERE id_payment= $payment";
        $res = mysqli_query($this->myconn, $sqlDelete);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function deleteService($service){
        $sqlDelete = "DELETE FROM service 
        WHERE id_service= $service";
        $res = mysqli_query($this->myconn, $sqlDelete);
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

}
?>