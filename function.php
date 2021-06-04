<?php    
  $status="";

  if (isset($_POST['code']) && $_POST['code']!=""){
    $code = $_POST['code'];
    $result = mysqli_query(
    $con,
    "SELECT * FROM `products` WHERE `code`='$code'"
    );
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $code = $row['code'];
    $price = $row['price'];
    $image = $row['image'];

    $cartArray = array(
      $code=>array(
      'name'=>$name,
      'code'=>$code,
      'price'=>$price,
      'quantity'=>1,
      'image'=>$image)
    );

    if(empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div class='box'>Product is added to your cart!</div>";
    }else{
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if(in_array($code,$array_keys)) {
    $status = "<div class='box' style='color:red;'>
    Product is already added to your cart!</div>";
        } else {
        $_SESSION["shopping_cart"] = array_merge(
        $_SESSION["shopping_cart"],
        $cartArray
        );
        $status = "<div class='box'>Product is added to your cart!</div>";
    }

    }
  }

  function isAdmin() {
    if ( isset( $_SESSION['username'] ) && $_SESSION['username'] && '1' == $_SESSION['user_level']) {
        return true;
    } else {
        return false;
    }
  }
  function isNotLoggedIn() {
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      return true;
    } else {
      return false;
    }
  }
?>