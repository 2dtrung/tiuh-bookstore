

<?php
	session_start();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: ../login.php");
		exit;
	}
	
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


</head>

<body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                           
                                <a class="navbar-brand" href='dashboard.php'>TiUh</a>
                            <ul class="user-menu">
                                <li class="dropdown pull-right">
                            
                           
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
    
                                        
                                        </form>
                                    </div>
                                </li>
                        </li>
                    </ul>
                </div>
                                
            </div>
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <li role="presentation" class="divider"></li>
        <li class=""><a href="dashboard.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
        <li class="" ><a href="product.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
        <li class="active"><a href="user.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Người dùng  </a></li>
        <li role="presentation" class="divider"></li>
    </ul>
</div>
 
<div class="container">
    <div class="row"  style="margin-left:150px" >
    	<div class="col-sm-12" style="margin-top:50px">
        	
        	<div class="panel-heading" style="background:#337ab7;color:white">Danh sách người dùng</div>
        	<table class="table table-striped">

            	<tr id="tbl-first-row">
                    <td width="10%">id</td>
                    <td width="20%">Username</td>
                    <td width="20%">Tên</td>
                    <td width="20%">Điện thoại</td>
                    <td width="20%">Địa chỉ</td>
                    <td width="10%" > Delete</td>
                </tr>


              <tbody>
              
              
               <?php foreach ($users as $user):?>
                    <tr id="tbl-first-row" >
											<td> <?php echo $user->id ?> </td>
											<td><?php echo $user->username ?> </td>
											<td><?php echo $user->name ?> </td>
											<td><?php echo $user->phone ?> </td>
											<td><?php echo $user->address ?> </td>
                       <td> 
											<button  class="btn btn-danger" data-id=<?php echo $user->id?> data-name= <?php echo $user->username?> id="btn-del"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
											</td>
										</tr>
                  <?php endforeach?> 
              <tbody>
              
              </tbody>
              
    



			</table>
            
        </div>
    </div>
</div>



		<div class="modal fade" id="modelDel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" style="top:25%" role="document">
					<div class="modal-content">
						<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h5 class="modal-title" style="color:red;font-size: 2rem;">Xóa Sản Phẩm</h5>
						</div>
						<div class="modal-body">
							<h5 class="modal-title" style="color:#000000;font-size: 1.8rem;margin-bottom:3rem">Bạn có chắc muốn xóa</h5>
						 	<h4 id="prod_name" style="font-size:1.7rem"> </h4>
						</div>
						<div class="modal-footer " style="padding:1rem">
							<button type="button" class="btn btn-secondary"  data-dismiss="modal">Hủy</button>
							<button type="button" class="btn btn-primary" id="check_id" >Xóa</button>
						</div>
					</div>
				</div>
			</div>
		
		
		
			<div class="modal fade" id="modelSuccess" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
					<div class="modal-dialog" style="top:30%;left:12.5%;text-align:center;" role="document">
						<div class="modal-content" style="width:50%;padding: 5rem 0;color: red;font-size: 2rem;">
							<div class="modal-body">
								Bạn đã xóa thành công
								<i class="fa fa-check" aria-hidden="true"></i>
							</div>
						</div>
					</div>
			</div>


  </div>	
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
    

    });
  </script>

  <script>
    $(document).ready(function() {
      var id;
      var current;
      $('tbody').on('click','#btn-del',function() {
        console.log('emvuidi')
      id=$(this).attr('data-id');
      console.log(id)
      current= $(this);
      console.log(current)
      $('#prod_name').html($(this).attr('data-name'));
      $('#modelDel').modal('show');

      $('#check_id').click(function() {
        id = parseInt(id);
      	$.ajax({
      		type:"post",
      		data: {
						id:id
					},
      		url:"controller/function/delete_user.php",
      		success:function(data) {
            console.log(typeof(data))
            console.log(data)
      			$(`button[data-id=`+id +`]`).parent().parent().remove();
      			$('#modelDel').modal('hide');
      			$('#modelSuccess').modal('show');
      			setTimeout(() => {
      				$('#modelSuccess').modal('hide');
      			}, 1000);
      		}
      	});
      });
      })
    })




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
