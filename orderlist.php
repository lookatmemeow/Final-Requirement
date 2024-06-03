<?php ob_start(); ?>


 <?php 
 include 'db_connect.php';
 ?>


 <!-- Masthead-->
 <header class="masthead">
 	
 </header>

 <div class="container-fluid" style="margin-top: 1.5%;margin-bottom: 1.5%">
 	<div class="card" id="order_list">
 		<div class="card-body table-responsive">
 			<table class="table table-bordered">
 				<thead>
 					<tr>
 						<th>Name</th>
 						<th>Address</th>
 						<th>Email</th>
 						<th>Contact #</th>
 						<th>Date Ordered</th>
						<th>Order #</th>
 						<th>Status</th>
						<th>Order Details</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php
						$i = 1;
						// include 'db_connect.php';
						// $qry = $conn->query("SELECT * FROM orders ");

						// $qry = $conn->query("SELECT a.*, sum(c.price * b.qty) as totals FROM orders a
						// join order_list b On b.order_id = a.id
						// JOIN product_list c ON c.id = b.product_id
						// GROUP by a.id
						// order by FIELD(a.status, 1,0), a.dateordered asc ");
						// $qry = $conn->query("SELECT * FROM orders WHERE userid=".$_SESSION['login_user_id']);
						// while ($row = $qry->fetch_assoc()) :

							// include 'db_connect.php';
							$qry = $conn->query("SELECT a.*, sum(c.price * b.qty) as totals FROM orders a join order_list b On b.order_id= a.id JOIN product_list c ON c.id = b.product_id GROUP by a.id order by FIELD(a.status, 1,0), a.dateordered asc");
							$qry = $conn->query("SELECT * FROM orders WHERE userid=".$_SESSION['login_user_id']);
							while($row=$qry->fetch_assoc()):
						?>


<tr>
                             <td><?php echo $row['name'] ?></td>
                             <td><?php echo $row['address'] ?></td>
                             <td><?php echo $row['email'] ?></td>
                             <td><?php echo $row['mobile'] ?></td>
                             <!-- <td>₱ <?php echo number_format($row['totals'], 2, '.', ',') ?></td> -->

                             <td> <?php echo date_format(date_create($row['dateordered']), 'F d, Y h:i A') ?></td>
							 <td><?php echo $row['id']?></td>
                             <?php if ($row['status'] == 1) : ?>
                                 <td class="text-center"><span class="badge badge-success">Confirmed</span></td>
                                 <td class="text-center">
                                     <span class="btn"><button data-toggle="modal" data-target="#exampleModal_orderlist_<?php echo $row['id'] ?>">View Order Details</button></span>
                                     <div class="modal fade" id="exampleModal_orderlist_<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                                 <div class="modal-body">
                                                    <div>
                                                        <!-- <h2>Thank you for Ordering</h2> -->
														<h5 class="modal-title" id="exampleModalLabel"><p>Thank you <span style="color: green;"><?php echo $_SESSION['login_first_name']?></span> for ordering!</p></h5>
												
														<h5> Order#: <?php echo $row['id']?></h5>
                                                    </div>
                                                     <table class="table table-bordered mb-0">
                                                         <thead style="background-color:#ffbc00;">
                                                             <tr>
                                                                 <th>Orders</th>
                                                                 <th>Price</th>
                                                                 <th>Qty</th>
                                                                 <th>Amount</th>
                                                               
                                                             </tr>
                                                         </thead>
                                                         <tbody>
                                                             <?php
                                                                $total = 0;
                                                                $qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =" . $row['id']);
                                                                while ($rowxx = $qry->fetch_assoc()) :
                                                                    $total += $rowxx['qty'] * $rowxx['price'];
                                                                ?>
                                                                 <tr>
                                                                     <td><?php echo $rowxx['name'] ?></td>
                                                                     <td>P <?php echo number_format($rowxx['price'], 2, '.', ',') ?></td>
                                                                     <td>x<?php echo $rowxx['qty'] ?></td>
                                                                     <td><?php echo number_format($rowxx['qty'] * $rowxx['price'], 2) ?></td>
                                                                 </tr>
                                                             <?php endwhile; ?>
                                                         </tbody>
                                                         <tfoot>
                                                             <tr>
                                                                 <th colspan="3" class="text-right">TOTAL</th>
                                                                 <th>P <?php echo number_format($total, 2) ?></th>
                                                             </tr>

                                                         </tfoot>
                                                     </table>
                                                 </div>
                                                 <!-- <div class="modal-footer">
                                                     <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                 </div> -->
                                             </div>
                                         </div>
                                     </div>
                                 </td>

                             <?php else : ?>
                                 <td class="text-center"><span class="badge badge-secondary">For Verification</span></td>
                                 <td class="text-center"></td>
                             <?php endif; ?>


                         </tr>
 					<?php endwhile; ?>
 				</tbody>
 			</table>
 		</div>
 	</div>



	 <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <h5 class="modal-title" id="exampleModalLabel"><?php echo $_SESSION['login_first_name']?>'s ORDER DETAILS</h5> -->
					<h5 class="modal-title" id="exampleModalLabel"><p>Thank you <span style="color: green;"><?php echo $_SESSION['login_first_name']?></span> for ordering!</p></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<!-- RESERVATION -->
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>
	 

 </div>


 <script>
 	$('.view_order').click(function() {
 		uni_modal('Order', 'view_order.php?id=' + $(this).attr('data-id'))
 	})

 	$('.void_order').click(function() {
 		uni_modal('Order', 'confirmation_void.php?id=' + $(this).attr('data-id'))
 	})
 	$('.remarks').click(function() {
 		uni_modal('remarks', 'remarks.php?id=' + $(this).attr('data-id'))
 	})
 </script>

<style>
 	#underline {
 		opacity: 0%;
 	}
 </style>