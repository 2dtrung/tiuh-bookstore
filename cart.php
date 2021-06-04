<?php
    session_start();

    include 'config.php';

    include 'function.php';

    $status="";
    if (isset($_POST['action']) && $_POST['action']=="remove"){
        if(!empty($_SESSION["shopping_cart"])) {
            foreach($_SESSION["shopping_cart"] as $key => $value) {
		        if($_POST["code"] == $key){
		        unset($_SESSION["shopping_cart"][$key]);
		        $status = "<div class='box' style='color:red;'>
		        1 Sản phẩm vừa được xóa khỏi giỏ hàng!</div>";
		    }
		    if(empty($_SESSION["shopping_cart"])){
		        unset($_SESSION["shopping_cart"]);
            }
		    }
        }
    }

    if (isset($_POST['action']) && $_POST['action']=="change"){
        foreach($_SESSION["shopping_cart"] as &$value){
            if($value['code'] === $_POST["code"]){
                $value['quantity'] = $_POST["quantity"];
                break; // Stop the loop after we've found the product
            }
        }

    }

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!--bootsstrap cdn-->
    <script type="text/javascript">
      function toBottom() {
        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' })
      }
      function showMess() {
        var val = document.getElementById('mail-check');
        if (val.value == '') {
            window.alert('Bạn chưa nhập email!');
        }
        else {
            window.alert('Cảm ơn bạn đã đăng kí, mọi thông tin mới nhất về sản phẩm sẽ được gửi về email của bạn! ♥♥');
        }
      }
    </script>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <title>Assignment1 - Web Programming</title>
</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Gõ từ khoá....">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.php"><img src="img/core-img/logo_1.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="intro.php">Giới thiệu</a></li>
                    <li><a href="product.php">Sản phẩm</a></li>
                    <li><a href="price-list.php">Bảng giá</a></li>
                    <li><a href="contact.php">Liên hệ</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <div class="row">
                    <a href="login.php" class="btn amado-btn mb-15"
                        <?php if (!isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>Đăng nhập</a>
                    <a href="register.php" class="btn amado-btn active"
                        <?php if (!isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>Đăng ký</a>
                </div>
                <div class="row">
                    <div class="col-2">
                        <i class="fa fa-3x fa-user" <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?>></i>
                    </div>
                    <div class="col-10">
                        <a class="dropdown-item" href="reset-password.php"
                            <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>Chào,
                            <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></a>
                        <div class="dropdown" <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>
                            <a class="dropdown-item dropdown-toggle" href="#" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>
                                Tài khoản
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="edit-user.php"
                                    <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>Sửa thông tin</a>
                                <a class="dropdown-item" href="changepw.php"
                                    <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>Đổi mật khẩu</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"
                                    <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?>>Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Giỏ hàng <span></span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Ưa thích</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Tìm kiếm</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Giỏ hàng</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <?php
                            $total_price = 0;
                            if(isset($_SESSION["shopping_cart"])){
                            ?>
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Tên</th>
                                        <th>Tổng giá</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($_SESSION["shopping_cart"] as $product){
                                    ?>
                                    <tr>
                                        <td class="cart_product_img">
                                            <img src='<?php echo $product["image"]; ?>' alt="Product">
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo $product["name"]; ?></h5>
                                            <form method='post' action=''>
                                                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                                <input type='hidden' name='action' value="remove" />
                                                <button type='submit' class='btn btn-danger remove'>Xóa</button>
                                            </form>
                                        </td>
                                        <td class="price">
                                            <span><?php echo $product["price"]*$product["quantity"].".VND"; ?></span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <div class="quantity">
                                                    <form method='post' action=''>
                                                        <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                                        <input type='hidden' name='action' value="change" />
                                                        <select name='quantity' class='quantity' onChange="this.form.submit()">
                                                        <option <?php if($product["quantity"]==1) echo "selected";?>
                                                        value="1">1</option>
                                                        <option <?php if($product["quantity"]==2) echo "selected";?>
                                                        value="2">2</option>
                                                        <option <?php if($product["quantity"]==3) echo "selected";?>
                                                        value="3">3</option>
                                                        <option <?php if($product["quantity"]==4) echo "selected";?>
                                                        value="4">4</option>
                                                        <option <?php if($product["quantity"]==5) echo "selected";?>
                                                        value="5">5</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $total_price += ($product["price"]*$product["quantity"]);
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            }else{
                            echo "<h3>Giỏ hàng của bạn trống!</h3>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Tổng giỏ hàng</h5>
                            <ul class="summary-table">
                                <li><span>Tổng giá:</span> <span><?php echo $total_price.".VND"; ?></span></li>
                                <li><span>Giao hàng:</span> <span>Miễn phí</span></li>
                                <li><span>Tổng cộng:</span> <span><?php echo $total_price.".VND"; ?></span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="cart.php" class="btn amado-btn w-100">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Đăng ký để có cơ hội <span> giảm giá 25%</span></h2>
                        <p>Tất cả việc bạn cần làm là điền email, bấm nút đăng ký để nhận những thông tin mới về sản phẩm và giảm giá cũng như những tin tức mới nhất từ shop!!</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input id="mail-check" type="email" name="email" class="nl-email" placeholder="Điền E-mail dzô">
                            <input type="submit" onclick="showMess()" value="Đăng ký">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
  <footer class="footer_area clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
              <div class="single_widget_area">
                  <!-- Logo -->
                  <div class="footer-logo mr-50">
                      <a href="index.php"><img src="img/core-img/logo_2.png" alt=""></a>
                  </div>
                  <!-- Copywrite Text -->
                  <p class="copywrite">
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      Copyright &copy;
                      <script>
                          document.write(new Date().getFullYear());
                      </script> All rights reserved | Tiuh Corp
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  </p>
              </div>
            </div>
            <div class="col-md-3">
            <div class="row">
              <h5 style="color: white;">Truy cập</h5>
            </div>
            <div class="row mb-4">
            <div class="underline bg-light" style="width: 50px;"></div>
            </div>
  
                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> <a style="color:#777; font-size:100%;" href="index.php">Trang chủ</a></p>
                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> <a style="color:#777; font-size:100%;" href="intro.php">Giới thiệu</a></p>
                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> <a style="color:#777; font-size:100%;" href="product.php">Sản phẩm</a></p>
                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> <a style="color:#777; font-size:100%;" href="price-list.php">Bảng giá</a></p>
                <p><i class="fa fa-chevron-right" aria-hidden="true"></i> <a style="color:#777; font-size:100%;" href="contact.php">Liên hệ</a></p>
  
            </div>
  
            <div class="col-md-3 pl-4">
              <div class="row">
              <h5 style="color: white;">Liên hệ</h5>
            </div>
            <div class="row mb-4">
            <div class="underline bg-light" style="width: 50px;"></div>
            </div>
            <div class="row">
              <p style="color: white;"><span style="color:#777" class="fa fa-map-marker"></span> &nbsp;TIUH - Số xx, phường XX, Quận XX, TP.HCM</p>
              <p style="color: white;"><span style="color:#777" class="fa fa-phone"></span> &nbsp;Hotline: 1800.xxxx (miễn phí)</p>
              <p style="color: white;">Zalo bán lẻ: xxxxxxxxxx</p>
              <p style="color: white;">Zalo bán sỉ: xxxxxxxxxx</p>
            </div>
            </div>
  
            <div class="col-md-3">
              <div class="row">
              <h5 style="color: white;">Tags</h5>
            </div>
            <div class="row mb-4">
            <div class="underline bg-light" style="width: 50px;"></div>
            </div>
            <button class="btn btn-outline-light">Sách</button> <button class="btn btn-outline-light">Truyện tranh</button> <button class="btn btn-outline-light">MBTL</button> <button class="btn btn-outline-light">Sale</button> <button class="btn btn-outline-light">Kim Đồng</button>
            </div>
          </div>
    </div>
  </footer>
  <!-- ##### Footer Area End ##### -->         

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>