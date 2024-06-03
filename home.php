 <!-- Masthead-->
 
 <header class="masthead">
 	
 </header>


 <body>
 	


<section class="page-section" id="menu">
 	<h1 class="text-center" style="font-size:3em;font-family: sans-serif"><b>PRODUCTS</b></h1>
 	<div class="d-flex justify-content-center">
 			<hr class="border-dark" width="50%">
 	</div>
 		<div id="menu-field" class="card-deck mt-5 wow fadeIn" style="background-color: white;">
 			<?php
				include 'admin/db_connect.php';
				$limit = 6;
				$page = (isset($_GET['_page']) && $_GET['_page'] > 0) ? $_GET['_page'] - 1 : 0;
				$offset = $page > 0 ? $page * $limit : 0;
				// $offset = $page > 0 ? $page * $limit : 0;
				$all_menu = $conn->query("SELECT id FROM  product_list")->num_rows;
				$page_btn_count = ceil($all_menu / $limit);
				$qry = $conn->query("SELECT * FROM  product_list order by `name` asc Limit $limit OFFSET $offset ");
	// CHEAPEST
				// $qry = $conn->query("SELECT * FROM  product_list order by `price` asc Limit $limit OFFSET $offset ");
	// BY CATEGORY 1 to 99
				// $qry = $conn->query("SELECT * FROM  product_list order by `category_id` asc Limit $limit OFFSET $offset ");
				$qry = $conn->query("SELECT * FROM  product_list order by `category_id` asc Limit $limit OFFSET $offset ");
				while ($row = $qry->fetch_assoc()) :
				?>
	<!-- HOW MANY PRODUCTS TO DISPLAY -->
 				<div class="col-lg-2 mb-2">
 					<div class="card menu-item text-center view_prod" style="border-color:white;" data-id=<?php echo $row['id'] ?>>
 						<div class="position-relative overflow-hidden" id="item-img-holder" >
 							<!-- card -->
 							<img src="assets/img/<?php echo $row['img_path'] ?> " class="card-img-top " alt="..." >
 						</div>
 						<div class="card-body rounded text-left">
 							<!-- Product Name       -->
 							<h5 class="card-title"><?php echo $row['name'] ?></h5>
							<!-- Product Name       -->
							<!-- <h5 class="card-title"><?php echo $row['name'] ?></h5> -->
 							<!-- Price -->
 							<h5 class="card-title" style="color:#be4d25;"> ₱ <?php echo $row['price'] ?></h5>
 							<!-- discription  -->
 							<p class="card-text truncate"><?php echo $row['description'] ?></p>
 							<div class="text-center box-1" style="background-color: white;">
				<!-- VIEW BUTTON  -->
 								<!-- <button class="btn btn-sm view_prod btn-one" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button> -->
 								<!-- <button class="btn btn-sm btn-outline-dark view_prod btn-block wrapper" id="view" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye" ></i> View</button> -->

 							</div>
 						</div>

 					</div>
 				</div>
 			<?php endwhile; ?>
			 <!-- $page_btn_count = 10;exit;  -->
 		</div>
 		<?php //$page_btn_count = 10;exit; 
			?>
 		<!-- Pagination Buttons Block -->
 		<div class="mx-4 d-flex justify-content-center mt-4" style="position:relative;">
 			<div class="btn-group paginate-btns">
 				<!-- Previous Page Button -->
 				<a class="btn btn-default border border-dark" <?php echo ($page == 0) ? 'disabled' : '' ?> href="./?_page=<?php echo ($page) ?>">Prev.</a>
 				<!-- End of Previous Page Button -->
 				<!-- Pages Page Button -->

 				<!-- looping page buttons  -->
 				<?php for ($i = 1; $i <= $page_btn_count; $i++) : ?>
 					<!-- Display button blocks  -->

 					<!-- Limiting Page Buttons  -->
 					<?php if ($page_btn_count > 20) : ?>
 						<!-- Show ellipisis button before the last Page Button  -->
 						<?php if ($i = $page_btn_count && !in_array($i, range(($page - 3), ($page + 3)))) : ?>
 							<a class="btn btn-default border border-dark ellipsis">...</a>
 						<?php endif; ?>

 						<!-- Show ellipisis button after the First Page Button  -->
 						<?php if ($i == 1 || $i == $page_btn_count || (in_array($i, range(($page - 3), ($page + 3))))) : ?>
 							<a class="btn btn-default border border-dark <?php echo ($i == ($page + 1)) ? 'active' : '';  ?>" href="./?_page=<?php echo $i ?>"><?php echo $i; ?></a>
 							<?php if ($i == 1 && !in_array($i, range(($page - 3), ($page + 3)))) : ?>
 								<a class="btn btn-default border border-dark ellipsis">...</a>
 							<?php endif; ?>
 						<?php endif; ?>
 					<?php else : ?>
 						<!-- <a class="btn btn-default border border-dark <?php echo ($i == ($page + 1)) ? 'active' : '';  ?>" href="./?_page=<?php echo $i ?>"><?php echo $i; ?></a> -->
 					<?php endif; ?>
 					<!-- Display button blocks  -->
 				<?php endfor; ?>
 				<!-- End of looping page buttons  -->

 				<!-- End of Pages Page Button -->
 				<!-- Next Page Button -->
 				<a class="btn btn-default border border-dark" <?php echo (($page + 1) == $page_btn_count) ? 'disabled' : '' ?> href="./?_page=<?php echo ($page + 2) ?>">Next</a>
 				<!-- End of Next Page Button -->
 			</div>
 		</div>
 		<!-- End Pagination Buttons Block -->
</section>

 </body>

 <script>
 	$('.view_prod').click(function() {
 		uni_modal_right('Product Details', 'view_prod.php?id=' + $(this).attr('data-id'))
 	})

	$('#order').click(function(){
		// uni_modal($login)
		uni_modal("Create an Account",'signup.php?redirect=index.php?page=checkout')
	})

 </script>
 <?php if (isset($_GET['_page'])) : ?>
 	<script>
 		$(function() {
 			document.querySelector('html').scrollTop = $('#menu').offset().top - 100
 		})

 	</script>
 <?php endif; ?>



 <style>
 	@font-face {
 		font-family: myFirstFont;
 		src: url(ArianaVioleta-dz2K.ttf);
 	}

 	#welcome {

 		position: relative;
 		opacity: 100%;
 		text-transform: uppercase;
 		font-family: Montana;
 		color: rgb(255, 188, 0);
 		top: -5%;
 	}

 	/* #welcome:hover{ */
 	/* border-image: 0px 0px 5px linear-gradient(90deg, rgba(255, 188, 0, 1) 0%, rgba(253, 213, 29, 1) 50%, rgba(252, 176, 69, 1) 100%); */

 	/* background: linear-gradient(90deg, rgba(255, 188, 0, 1) 0%, rgba(253, 213, 29, 1) 50%, rgba(252, 176, 69, 1) 100%); */
 	/* } */

 	/* Lady's 1st */
 	/* #welcome2 {

         position: absolute;
         opacity: 100%;
         text-transform: uppercase;
         font-style: 'Montserrat';
         color: white;
         top: -80px;
         text-shadow: none;
         font-size: 80px;
     } */

	.glow-on-hover {
    width: 220px;
    height: 60px;
    border: none;
    outline: none;
    /* color: #fff; */
    /* background: #111; */
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 0px;
	/* background: #111; */
}

.glow-on-hover:before {
    content: '';
	background: rgb(255,148,82);
    /* background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 20%, rgba(252,176,69,1) 40%, rgba(131,58,180,1) 60%, rgba(253,29,29,1) 800%, rgba(252,176,69,1) 100%); */
    background: linear-gradient(90deg, #ff9452,#fc466b,#3f5efb,#eeaeca);
    /* background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000); */
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(10px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 5s linear infinite;
    opacity: 0;
    transition: opacity .1s ease-in-out;
    border-radius: 15px;
}

.glow-on-hover:active {
    color: #000
}

.glow-on-hover:active:after {
    background: transparent;
}

.glow-on-hover:hover:before {
    opacity: 1;
}

.glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #ff9800;
	color:wheat;
    left: 0;
    top: 0;
    border-radius: 15px;

}

@keyframes glowing {
    0% { background-position: 0 0; }
    50% { background-position: 400% 0; }
    100% { background-position: 0 0; }
}

 	#order {
		background-color: red;
 		font-size: 20px;
		color: #111;
 		/* font-family: ; */
 		border-width: 0px;
 		border-color: rgb(255, 188, 0);
 		border-radius: 15px;
 		/* background: rgb(255, 188, 0); */
 		/* background: linear-gradient(90deg, rgba(255,188,0,1) 0%, rgba(253,213,29,1) 50%, rgba(252,176,69,1) 100%); */
 		text-transform: uppercase;


 	}

 	#order:hover {
 		/* background: linear-gradient(90deg, rgba(255, 188, 0, 1) 0%, rgba(253, 213, 29, 1) 50%, rgba(252, 176, 69, 1) 100%); */
 		/* color: #111; */
 		/* color: black; */
 		/* border-color:#ff9800; */
 		/* border-color: white; */
 		/* border-width: 0px; */
 		/* box-shadow: 0px 0px 8px rgb(255, 188, 0); */
 	}


 	#marq1 {
 		/* position: absolute; */
 		top: 1000px;
 		/* background: rgb(255,188,0); */
 		background-color: #ffe96b;
 		font-style: Impact;
 		line-height: 10px;
 	}

 	/* 
     #marq2 {
         background: rgb(255,188,0);
         background-color: #ffe96b;
         top: 1px;
         font-style: Impact;
         opacity: 0%;
         max-height: 10px; */
 	/* } */

 	.btn {
 		/* border: 2px solid gray; */
 		background-color: white;
 		color: black;
 		padding: 14px 28px;
 		font-size: 16px;
 		cursor: pointer;
 	}

 	#underline {
 		opacity: 0%;
 	}

 	/* CAROUSEL CSS */

 	/*------------------------------------*\
    $SHARED
\*------------------------------------*/
 	/* h1.car,p,
.carousel{
    margin-bottom:24px;
    margin-bottom:2rem;
} */

 	/*------------------------------------*\
    $MAIN
\*------------------------------------*/
 	/* html{
    font:0.75em/1.5 "Helvetica Neue", Arial, sans-serif;
    color:#333;
    background-color:#fff;
    padding:5% 25%; */
 	/* } */
 	small {
 		color: #999;
 	}

 	a {
 		color: #09f;
 	}

 	/*------------------------------------*\
    $CAROUSEL
\*------------------------------------*/

 	/* SLIDES */


 	#view_menu {
 		border-color: white;

 	}

 	#menu {
 		background-color: white;
 	}

 	#map {
 		background-color: white;
 	}

 	#tour {
 		width: 50%;
 		background-color: #ffbc00;
 		border-radius: 10px;
 		border: 0px;
 	}

 	#tour:hover {
 		background-color: white;
 		box-shadow: 0px 0px 5px #ffbc00;
 		border-color: 0px #ffbc00;
 		color: #ffbc00;
 	}
	#card_slider{
		border-radius: 100%;

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