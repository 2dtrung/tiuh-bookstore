<?php
	session_start();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: ../login.php");
		exit;
	}
	
	//Check if the user is admin, if not then redirect to homepage
	function isAdmin() {
		if ( isset( $_SESSION['username'] ) && ($_SESSION['user_level'] == '1') ) {
			return true;
		} else {
			return false;
		}
	}
	
	if (!isAdmin()) {
		header("location: ../index.php");
	}




    include('controller/c_user.php');
    $c_user= new C_user();
    $users=$c_user->getUsers();


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>admin</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script src="js/lumino.glyphs.js"></script>
<script type="text/javascript" src="../../editor/ckeditor/ckeditor.js"></script>
<link rel="icon" href="/img/core-img/favicon.ico">
<link rel="stylesheet" href="/css/core-style.css">
<link rel="stylesheet" href="/style.css">


</head>

<body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                            <!-- guest -->
                                <a class="navbar-brand" href='dashboard.php'>TiUh</a>
                            <ul class="user-menu">
                                <li class="dropdown pull-right">
                            
                            <!-- user -->
                            <ul class="user-menu">
                                <li class="dropdown pull-right">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" style='position: relative;font-size: 19px;	top: -13px;' class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <?php echo $_SESSION['username'] ?>  <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item hover" style="color:black;display:block;text-align:center" href="../logout.php">
                                            Logout
                                        </a>
    
                                        <!-- <form id="logout-form" action="../login.php" method="POST" style="display: none;"> -->
                                        </form>
                                    </div>
                                </li>
                        </li>
                    </ul>
                </div>
                                
            </div><!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <li role="presentation" class="divider"></li>
        <li class=""><a href="dashboard.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
        <li class="" ><a href="product.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
        <li class="active"><a href="user.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Người dùng  </a></li>
        <li role="presentation" class="divider"></li>
    </ul>
</div><!--/.sidebar-->
 

<div class="container">
    <div id="navbar" class="row">
    	<div class="col-sm-12">
        	<nav class="navbar navbar-default">
  				<div class="container-fluid">
                	<ul class="nav navbar-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Users</a></li>
                        <li><a href="#">Add user</a></li>
                	</ul>
                    <p id="logout" class="navbar-text navbar-right"><a class="navbar-link" href="#">Logout</a></p>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-6">
        	<div class="alert alert-danger">User exist!</div>
        	<form method="post">
            	<div class="form-group">
                	<label>Fullname</label>
                    <input type="text" name="full" class="form-control" placeholder="Fullname" required />
                </div>
                <div class="form-group">
                	<label>Username</label>
                    <input type="text" name="user" class="form-control" placeholder="Username" required />
                </div>
                <div class="form-group">
                	<label>Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password" required />
                </div>
                <div class="form-group">
                	<label>Email</label>
                    <input type="text" name="mail" class="form-control" placeholder="Email" required />
                </div>
                <div class="form-group">
                	<label>Level</label>
                    <select name="level" class="form-control">
                    	<option value="1">Admin</option>
                        <option value="2">Mod</option>
                        <option value="3" selected="selected">User</option>
                    </select>
                </div>
                <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />
            </form>
        </div>
    </div>
</div>


	


  </div>	<!--/.main-->
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/chart.min.js"></script>
  <script src="js/chart-data.js"></script>
  <script src="js/easypiechart.js"></script>
  <script src="js/easypiechart-data.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script>
    $('#exampleModal').on('show.bs.modal', event => {
    var button = $(event.relatedTarget);
    var modal = $(this);
    // Use above variables to manipulate the DOM

    });
  </script>

 



    <script>
           	$('#calendar').datepicker({
		});
		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);
		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		});
       
    </script>	
    </body>
    </html> 






<!-- <?php

	session_start();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: ../login.php");
		exit;
	}
	
	//Check if the user is admin, if not then redirect to homepage
	function isAdmin() {
		if ( isset( $_SESSION['username'] ) && ($_SESSION['user_level'] == '1') ) {
			return true;
		} else {
			return false;
		}
	}
	
	if (!isAdmin()) {
		header("location: ../index.php");
	}

    include('controller/c_user.php');
    $c_user= new C_user();
    $users=$c_user->getUsers();

?> -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>admin</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script src="js/lumino.glyphs.js"></script>
<script type="text/javascript" src="../../editor/ckeditor/ckeditor.js"></script>
<link rel="icon" href="/img/core-img/favicon.ico">
<link rel="stylesheet" href="/css/core-style.css">
<link rel="stylesheet" href="/style.css">


</head>







    <body>
        <!-- Search Wrapper Area Start -->
        <!-- Search Wrapper Area End -->
        <div class="main-content-wrapper d-flex clearfix">
            <!-- ##### Main Content Wrapper Start ##### -->
            <header class="header-area clearfix" style="padding-top: 0px;">
                <!-- Close Icon -->
                <div class="nav-close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </div>
                <!-- Logo -->
                <div class="logo">
                    <a href="index.html"><img src="/img/core-img/logo_1.png" alt=""></a>
                </div>
                <!-- Amado Nav -->
                <nav class="amado-nav">
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
    
                        <li class="active"><a href="product.html">Sản phẩm</a></li>
    
                        <li><a href="intro.html">Người dùng</a></li>
                    </ul>
                </nav>
                <!-- Button Group -->
                <!-- <div class="amado-btn-group mt-30 mb-100">
                    <a href="product.html" class="btn amado-btn mb-15">%Khuyến mãi%</a>
                    <a href="product.html" class="btn amado-btn active">Sản phẩm mới</a>
                </div> -->
            </header>
    
            <div class="single-product-area section clearfix">
                <div class="container-fluid">
                    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <!-- guest -->
                                <ul class="user-menu">
                                    <li class="dropdown pull-right">
                                        <!-- user -->
                                        <ul class="user-menu">
                                            <li class="dropdown pull-right">
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown"
                                                    style='position: relative;font-size: 19px;	top: -13px; '
                                                    class="nav-link dropdown-toggle" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    <?php echo $_SESSION['username'] ?></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item hover"
                                                        style="color:black;display:block;text-align:center"
                                                        href="../logout.php">
                                                        Logout
                                                    </a>
                                                    <!-- <form id="logout-form" action="../login.php" method="POST" style="display: none;"> -->
                                                    </form>
                                                </div>
                                            </li>
                                    </li>
                                </ul>
                            </div><!-- /.container-fluid -->
                    </nav>
                    <style>
                        .fade {
                            opacity: 1;
                            -webkit-transition: opacity .15s linear;
                            -o-transition: opacity .15s linear;
                            transition: opacity .15s linear;
                            background: #000000b0;
                        }
    
                        a:hover {
                            color: #fbb710;
                        }
                    </style>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header"><strong>Sản phẩm</strong></h1>
                            </div>
                        </div>
                        <!--/.row-->
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="msgSuccess">
                                    <?php if (isset($_SESSION['success'])):?>
                                    <div class="alert alert-primary" style="background:#30a5ff;color:white;" role="alert">
                                        <strong>Bạn đã thêm sản phẩm thành công</strong>
                                    </div>
                                    <?php endif?>
                                    <?php if (isset($_SESSION['error_name'])):?>
                                    <div class="alert alert-danger style=" margin-top:1rem>
                                        <strong>Tên sản phẩm đã tồn tại</strong>
                                    </div>
                                    <?php endif?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="background:#fbb710; border-color:#00000000; ">Thêm sản
                                        phẩm</div>
                                    <div class="panel-body">
                                        <form method="post" enctype="multipart/form-data" action="">
    
                                            <div class="row" style="margin-bottom:40px">
                                                <div class="col-xs-8">
                                                    <div class="form-group">
                                                        <label>Tên sản phẩm</label>
                                                        <input type="text" name="name" class="form-control" required>
                                                        <!-- @if($errors->has('name'))
                                                <div class="alert alert-danger" style="margin-top:1rem">
                                                        <h5 class="color:red">{{ $errors->first('name') }}</h5>
                                                </div>
                                            @endif -->
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Giá sản phẩm</label>
                                                        <input type="number" name="price" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Giá nhâp</label>
                                                        <input type="number" name="imported_price" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ảnh sản phẩm</label>
                                                        <input required id="img" type="file" name="img"
                                                            class="form-control hidden" onchange="changeImg(this)">
                                                        <img id="avatar" class="thumbnail" width="300px"
                                                            src="img/unname.png">
                                                        <!-- @if($errors->has('img'))
                                             <div class="alert alert-danger style="margin-top:1rem>
                                                     <h5 class="color:red">{{ $errors->first('img') }}</h5>
                                             </div>
                                             @endif -->
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Thương hiệu</label>
                                                        <input type="text" name="brand" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Danh Mục</label>
                                                        <input type="text" name="category" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mã code</label>
                                                        <input type="text" name="code" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Trạng Thái</label>
                                                        <input type="text" name="status" class="form-control" required>
                                                    </div>
                                                    <!-- <div class="form-group" >
                                            <label>Trạng thái</label>
                                            <select  name="status" class="form-control" required>
                                                <option   value="1" >Còn hàng</option>
                                                <option    value="0">Hết hàng</option>
                                            </select>
                                        </div> -->
                                                    <!-- <div class="form-group" >
                                            <label>Miêu tả</label>
                                            <textarea class="ckeditor"  name="description" ></textarea>
                                            <script type="text/javascript">
                        language:'vi',
                                                var editor = CKEDITOR.replace('description',{
                                                    filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
                                                    filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
                                                    filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                    filebrowserFlashUploadUrl: '../../editor/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                });
                                            </script>										
                                        </div> -->
                                                    <!-- <div class="form-group" >
                                            <label>Danh mục</label>value
                                            <select  name="cate" class="form-control">
                                                @foreach ($cates as $cate)
                                                    <option  value="{{ $cate->cate_id}}">{{ $cate->cate_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" >
                                            <label>Sản phẩm nổi bật</label><br>
                                            Có: <input type="radio"  name="featured"  value="1">
                                            Không: <input type="radio" checked name="featured"  value="0">
                                        </div> -->
                                                    <input type="submit" name="submit" value="Thêm"
                                                        class="btn amado-btn mb-15">
                                                    <a href="addproduct.php" class="btn amado-btn mb-15"
                                                        style="background:black;">Hủy bỏ</a>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.row-->
                    </div>
                </div>
            </div>
        </div>
     
    
                                <div class="container">
                                    <div id="navbar" class="row">
                                        <div class="col-sm-12">
                                            <nav class="navbar navbar-default">
                                                <div class="container-fluid">
                                                    <ul class="nav navbar-nav">
                                                        <li><a href="#">Home</a></li>
                                                        <li><a href="#">Users</a></li>
                                                        <li><a href="#">Add user</a></li>
                                                    </ul>
                                                    <p id="logout" class="navbar-text navbar-right"><a class="navbar-link" href="#">Logout</a></p>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="alert alert-danger">User exist!</div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label>Fullname</label>
                                                    <input type="text" name="full" class="form-control" placeholder="Fullname" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="user" class="form-control" placeholder="Username" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="pass" class="form-control" placeholder="Password" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" name="mail" class="form-control" placeholder="Email" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Level</label>
                                                    <select name="level" class="form-control">
                                                        <option value="1">Admin</option>
                                                        <option value="2">Mod</option>
                                                        <option value="3" selected="selected">User</option>
                                                    </select>
                                                </div>
                                                <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
    
    
        
    
    
      </div>	<!--/.main-->
      <script src="js/jquery-1.11.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/chart.min.js"></script>
      <script src="js/chart-data.js"></script>
      <script src="js/easypiechart.js"></script>
      <script src="js/easypiechart-data.js"></script>
      <script src="js/bootstrap-datepicker.js"></script>
      <script>
        $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        });
      </script>
    
    
    
        <script>
                   $('#calendar').datepicker({
            });
            !function ($) {
                $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
                    $(this).find('em:first').toggleClass("glyphicon-minus");      
                }); 
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);
            $(window).on('resize', function () {
              if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function () {
              if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
            });
           
        </script>	
        </body>
        </html> 
    