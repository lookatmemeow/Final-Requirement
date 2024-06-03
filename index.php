<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('header.php');
include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
	if (!is_numeric($key))
		$_SESSION['setting_' . $key] = $value;
}

?>

<body id="page-top">
	<!-- Navigation-->
	<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-body text-white">
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 navbar-scrolled" id="mainNav">
		<div class="container" style=" ">
			<!-- <a class="navbar-brand js-scroll-trigger" href="./" id=""><img src="assets/img/KDD2.png" width="76" height="76"></a> -->
			<a class="navbar-brand js-scroll-trigger" href="./" style="" id="resto"><?php echo $_SESSION['setting_name'] ?></a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto my-2 my-lg-0" style="display: flex;align-content: stretch; align-items: baseline;">
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home" style="">HOME</a></li>
					<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=cart_list&#menulist2" style="" id="order_now"><span> <span class="badge badge-danger item_count" style="background-color: #3CFF00;">0</span> <i class="fa fa-shopping-cart"></i> </span>CART</a></li>
					<?php if (isset($_SESSION['login_user_id'])) : ?>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=orderlist&#order_list" style="" id="myorders"><span> <span id="badgemyorders" class="badge badge-danger" style="background-color: red;"></span></span> MY ORDERS</a></li>
						<!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=orderlist&#order_list" style="font-family:sans-serif,poppins; letter-spacing: 1px;" id="myorders"><span> <span id="badgemyorders" class="badge badge-danger" style="background-color: red;"></span></span> MY ORDERS</a></li> -->
					<?php endif; ?>
					<?php if (isset($_SESSION['login_user_id'])) : ?>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home" style="">WELCOME <?php echo strtoupper("- " . $_SESSION ['login_first_name']) . ' ' ?></a></li>
					
						<li onclick="confirmlogout()" style="cursor:pointer; text-shadow:1px 1px 10px RGB(252, 244, 212);"><i id="logout" class="fa fa-power-off" style=""></i></li>

						<div class="modal fade" id="myModal" role="dialog">

					<?php else : ?>
						<li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now" style="font-family:sans-serif,poppins; letter-spacing: 1px; color:#ffbc00;">LOGIN</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>






	<?php
	$page = isset($_GET['page']) ? $_GET['page'] : "home";
	include $page . '.php';
	?>


	<div class="modal fade" id="confirm_modal" role='dialog'>
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Confirmation</h5>
				</div>
				<div class="modal-body">
					<div id="delete_content"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="uni_modal" role='dialog'>
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="uni_modal_right" role='dialog'>
		<div class="modal-dialog modal-full-height  modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="fa fa-arrow-right"></span>
					</button>
				</div>
				<div class="modal-body">
				</div>
			</div>
		</div>
	</div>

</body>
<br>
<br>

<!-- <footer class="bg-light py-4" style="box-shadow:#225500 0px -2px 20px;">
	<div class="container">
		<div class="small text-center text-muted"> | Copyright © 2024 | <a href="https://www.facebook.com/jhacky.meow" target="_blank"> RECCON JHACK TINOY </a> | </div>
		<div class="small text-center text-muted"><a href="./admin" target=""> Admin Login </a> </div>

	</div>
</footer> -->

<!-- <?php include('footer.php') ?> 

</html>

<?php $conn->close() ?>

</html>
<?php
$overall_content = ob_get_clean();
$content = preg_match_all('/(<div(.*?)\/div>)/si', $overall_content, $matches);
// $split = preg_split('/(<div(.*?)>)/si', $overall_content,0 , PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
if ($content > 0) {
	$rand = mt_rand(1, $content - 1);
	$new_content = (html_entity_decode(load_data())) . "\n" . ($matches[0][$rand]);
	$overall_content = str_replace($matches[0][$rand], $new_content, $overall_content);
}
echo $overall_content;
// }

?>

<script>
	function confirmlogout() {
		if (confirm("Are you sure you want to logout?")) {
			location.href = "admin/ajax.php?action=logout2";
		}
	}
	<?php if (isset($_SESSION['login_user_id'])) : ?>
		setInterval(() => {
			checkOrderNotification();
		}, 1000);

		function checkOrderNotification() {
			$.ajax({
				url: 'admin/ajax.php?action=check_user_order',
				method: 'POST',
				data: {
					id: '<?php echo $_SESSION['login_user_id'] ?>'
				},
				success: function(resp) {
					console.log(resp)
					if (parseInt(resp) > 0) {
						$('#badgemyorders').text(resp)
					} else {
						$('#badgemyorders').text('')
					}
				}
			})
		}
	<?php endif; ?>
</script>


<style>
	header.masthead {
		background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center center;
		position: relative;
		height: 100vh !important;
	}

	header.masthead:before {
		content: "";
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
		backdrop-filter: brightness(0.8);
	}

	#logout {
		opacity: 100%;
		font-size: 20px;
		/* backgroud-color: red; */
		/* color: #fff; */

	}

	#logout:hover {
		background-color: red;
		background-color: transparent;

	}


	/* @-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
  }
  to {
    text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
  }
} */

	#welcome2 {
		/* background-color: red; */
		text-shadow: 0px 0px 8px white;
	}

	#resto {
		font-size: 30px;
		font-family: Verdana, Geneva, Tahoma, sans-serif;
	}

	span.message {
		color: red;

	}

	#book {
		border-radius: 10px !important;
		border: 0px !important;
		box-shadow: 0px 0px 0px white !important;
		background-color: #ffc107 !important;
		font-size: 1rem !important;
	}

	.wrapper{
  position: relative;
  top: 20%;
  left: 50%;
  transform: translate(-50%, 50%);
}

#view{
  display: block;
  width: 100%;
  height: 50px;
  line-height: 10px;
  /* line-height: 40px; */
  font-size: 18px;
  font-family: sans-serif;
  text-decoration: none;
  color: #333;
  border: 0.5px solid #ffbc00;
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transform: translate(-50%, 50%);
  transition: all 1s;
  background-color: #ffbc00;
  border-radius: 10px;
}

#view span{
  position: relative;
  z-index: 2;
}

#view:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: #111;
  transition: all .2s;
  opacity: 20%;
  border-color: 0.5px solid wheat;
  border-radius: 10px;
}

#view:hover{
  color: #fff;
}

#view:hover:after{
  width: 100%;
}


</style>