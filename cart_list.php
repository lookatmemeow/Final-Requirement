 <!-- Masthead-->
<header class="masthead">

</header>

	<section class="page-section" style="border-radius: 10px;">
	<div class="container text-center mb-4" style="border-radius: 10px;">
	<!-- <a class="btn" href="index.php?page=home&#menu-field" type="button" style="height: 2.75rem;"><u>View Products</u></a> -->
	<a class="btn" href="index.php?page=home&#menu-field" type="button" style="height: 3rem; font-weight: bold; font-size: 1.25rem; background-color: #ffbc00; color: #31284E; padding: 0.5rem 1.5rem; border-radius: 8px; border: 2px solid #d19a00; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#d19a00'; this.style.color='#ffffff'; this.style.boxShadow='0 6px 8px rgba(0,0,0,0.2)';" onmouseout="this.style.backgroundColor='#ffbc00'; this.style.color='#31284E'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)';">View Products</a>

	</div>
        <div class="container" style="border-radius: 10px;">
        	<div class="row">
        	<div class="col-lg-8">
        		<div class="sticky" style="border-radius: 10px;">
	        		<div class="card" id="menulist2">
	        			<div class="card-body">							
	        				<div class="row">
		        				<div class="col-md-8"><b>Items</b></div>
		        				<div class="col-md-4 text-right"><b>Total</b></div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
        		<?php 
        		if(isset($_SESSION['login_user_id'])){
					$data = "where c.user_id = '".$_SESSION['login_user_id']."' ";	
				}else{
					$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
					$data = "where c.client_ip = '".$ip."' ";	
				}
				$total = 0;
				$get = $conn->query("SELECT *,c.id as cid FROM cart c inner join product_list p on p.id = c.product_id ".$data);
				while($row= $get->fetch_assoc()):
					$total += ($row['qty'] * $row['price']);
        		?>

        		<div class="card">
	        		<div class="card-body">
		        		<div class="row">
			        		<div class="col-md-4 d-flex align-items-center" style="text-align: -webkit-center">
								<div class="col-auto">	
			        				<a href="admin/ajax.php?action=delete_cart&id=<?php echo $row['cid'] ?>" class="btn btn-sm btn-outline-danger" data-id="<?php echo $row['cid'] ?>"><i class="fa fa-trash"></i></a>
								</div>
									
								<div class="col-auto flex-shrink-1 flex-grow-1 text-center">	
			        				<img src="assets/img/<?php echo $row['img_path'] ?>" alt="">
								</div>	
			        		</div>
			        		<div class="col-md-4">
			        			<p><b><large><?php echo $row['name'] ?></large></b></p>
			        			<p class='truncate'> <b><small>Desc :<?php echo $row['description'] ?></small></b></p>
			        			<p> <b><small>Unit Price : ₱ <?php echo number_format($row['price'],2) ?></small></b></p>
			        			<p><small>QTY :</small></p>
			        			<div class="input-group mb-3">
								  <div class="input-group-prepend">
								    <button class="btn btn-outline-secondary qty-minus" type="button" id="refresh" data-id="<?php echo $row['cid'] ?>"><span class="fa fa-minus" ></button>
								  </div>
								  <input type="number" readonly value="<?php echo $row['qty'] ?>" min = 1 class="form-control text-center" name="qty" >
								  <div class="input-group-prepend">
								    <button class="btn btn-outline-secondary qty-plus" type="button" href="" id="refresh2"  data-id="<?php echo $row['cid'] ?>"><span class="fa fa-plus"></span></button>
								  </div>
								</div>
			        		</div>
			        		<div class="col-md-4 text-right">
			        			<b><large>P <?php echo number_format($row['qty'] * $row['price'],2) ?></large></b>
			        		</div>
		        		</div>
	        		</div>
	        	</div>

	        <?php endwhile; ?>
        	</div>

        	<div class="col-md-4" style="border-radius: 10px;">
        		<div class="sticky" style="border-radius: 10px;">
        			<div class="card" style="border-radius: 10px;">
        				<div class="card-body">
        					<p><large>Total Amount</large></p>
        					<hr>
        					<p class="text-right"> <b>₱ <?php echo number_format($total,2) ?></b></p>
        					<hr>
        					<div class="text-center"></div>
        						<button class="btn btn-block btn-outline-dark" type="button" id="checkout" style="height: 4rem;">Proceed to Checkout</button>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	</div>
        </div>
    </section>
	<!-- <section style="position: absolute;"> -->
		<?php // include('footer.php') ?>
	<!-- </section> -->



    <style>
    	.card p {
    		margin: unset
    	}
    	.card img{
		    max-width: calc(100%);
		    max-height: calc(59%);
    	}
    	div.sticky {
		  position: -webkit-sticky; /* Safari */
		  position: sticky;
		  top: 4.7em;
		  z-index: 10;
		  background: white
		}
		.rem_cart{
		   position: absolute;
    	   left: 0;
		}
		#underline{
    opacity: 0%;
}
    </style>
    <script>
        
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        })
        $('.qty-minus').click(function(){
		var qty = $(this).parent().siblings('input[name="qty"]').val();
		update_qty(parseInt(qty) -1,$(this).attr('data-id'))
		if(qty == 1){
			return false;
		}else{
			 $(this).parent().siblings('input[name="qty"]').val(parseInt(qty) -1);
		}
		})
		$('.qty-plus').click(function(){
			var qty =  $(this).parent().siblings('input[name="qty"]').val();
				 $(this).parent().siblings('input[name="qty"]').val(parseInt(qty) +1);
		update_qty(parseInt(qty) +1,$(this).attr('data-id'))
		})
		function update_qty(qty,id){
			start_load()
			$.ajax({
				url:'admin/ajax.php?action=update_cart_qty',
				method:"POST",
				data:{id:id,qty},
				success:function(resp){
					if(resp == 1){
						load_cart()
						end_load()
					}
				}
			})

		}
		$('#checkout').click(function(){
			if('<?php echo isset($_SESSION['login_user_id']) ?>' == 1){
				location.replace("index.php?page=checkout")
			}else{
				uni_modal("Checkout","login.php?page=checkout")
			}
		})
    </script>
	
<script>

document.addEventListener('DOMContentLoaded', (event) => {
            const refreshButton = document.getElementById('refresh');
            refreshButton.addEventListener('click', () => {
                location.reload(); // This will refresh the entire page
            });

        });
document.addEventListener('DOMContentLoaded', (event) => {
            const refreshButton = document.getElementById('refresh2');
            refreshButton.addEventListener('click', () => {
                location.reload(); // This will refresh the entire page
            });

        });
</script>
