<?php
include 'admin/db_connect.php';
// var_dump($_SESSION);
$chk = $conn->query("SELECT * FROM cart where user_id = {$_SESSION['login_user_id']} ")->num_rows;
if ($chk <= 0) {
    echo "<script>alert('You don\'t have an Item in your cart yet.'); location.replace('./#menu')</script>";
}
?>
<!-- <header class="masthead"> -->
<!-- <div class="container h-100"> -->
<!-- <div class="row h-100 align-items-center justify-content-center text-center"> -->
<div class="col-lg-10 align-self-center mb-4 page-title" style="margin-top: 10%;margin-bottom: 10%;">

    <!-- <hr class="divider my-4 bg-dark" id="underline" /> -->
</div>

</div>
</div>
</header>
<div class="container" style="margin-top: 10%;margin-bottom: 10%;">
    <div class="card">
        <div class="card-body">
            <form id="checkout-frm" method=POST action="sms_sent.php">
                <h4>Checkout Information</h4>
                <div class="form-group">
                    <label for="" class="control-label">Firstname</label>
                    <input type="text" name="userid" value="<?php echo $_SESSION['login_user_id'] ?>" hidden>
                    <input type="text" name="first_name" required="" class="form-control" value="<?php echo $_SESSION['login_first_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Lastname</label></label>
                    <input type="text" name="last_name" required="" class="form-control" value="<?php echo $_SESSION['login_last_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Contact <span style="color:red;"> (please enter your number)</span></label>
                    <!-- <input type="text" name="mobile" required="" class="form-control" id="mobile" value="+63"> -->
                    <input type="text" name="mobile" required="" class="form-control" id="mobile" value="<?php echo $_SESSION['login_mobile'] ?>">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Address (Please include landmark is possible)</label>
                    <textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo $_SESSION['login_address'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Email</label>
                    <input type="email" name="email" required="" class="form-control" value="<?php echo $_SESSION['login_email'] ?>">
                </div>


                <!-- PAYMENT METHOD -->
                <div>
                    <label for="" class="control-label"><b>Payment Method</b></label>
                </div>
                <div>        
                    <input type="radio" name="paymentmethod" id="" value="Pickup" onclick="myFunction()" checked>
                    <label for="myCheck">Pick-up</label>
                </div>
                <div>
                   
                    <input type="radio" name="paymentmethod" id="myCheck" value="Gcash" onclick="myFunction()" style="margin-left:0;">
                    <label for="myCheck">GCASH : </label>
                    <!-- <hr class="divider my-4 bg-dark" id="underline" /> -->
                        <h2 class="responsive-img"id="img" style="display: none; margin-left:auto; height:50px;"><img src="assets/img/.png"></h2>
                    <h2 class="text-center" id="gcash" style="display:none"><b>09363692717 - Reccon Jhack T. Tinoy</b></h2>

                    <p id="reciept" style="display:none" >
                        Please attached the Screenshot of the reciept:
                        <input class="gcashinputs" type="file" name="filename" id="fileToUpload" value="" style="height: 50%;">
                    </p>
<!-- 
                    <hr class="divider my-4 bg-dark" id="underline" /> -->
                    <p id="text" style="display:none;">Please upload the reciept and enter the Reference #</p>
                    <input type="" id="box" name="ref" class="gcashinputs form-control" value="" style="display:none;margin-left:0;width: 90%;background-color:white;color:black;"> </p>
                    <p class="text-center" id="text2" style="display:none; color: red;">(Reference # must match with the file that you uploaded)</p>


                </div>

                <div class="tacbox text-center" style="border-radius: 10px;margin:auto;">
                    <input id="checkbox" type="checkbox" required="" style="width: auto;
            width: 20px; 
            height: 20px;"/>
                    <label for="checkbox"> By confirming, I agree to the  <a href="" data-toggle="modal" data-target="#terms">Terms and Conditions</a></label>
                </div>

                <div class="modal fade" id="terms" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
                                <div class="modal-content">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                <h4 class="modal-title">Terms & Condition</h4>
                            </div>
                            <div class="modal-body">
                                <!-- <p ><?php echo html_entity_decode($_SESSION['setting_terms']) ?></p> -->
                                <h5>Effective Date: (July 2023)</h5>
                                <p>Acceptance of Terms By accessing and using our food delivery service, you agree to comply with these terms and conditions. If you do not agree, please do not use our service.</p>
                                <p>User Eligibility You must be at least 13 years old and above to use our service. By using our service, you represent and warrant that you meet this eligibility requirement.
</p>
                                <h5>Ordering and Delivery</h5>
                                    <p>• Users can place orders through our website. </p>
                                    <p>• Delivery times may vary, and users are responsible for providing accurate delivery information. </p>
                                    <p>• Delivery fees, if applicable, will be communicated during the order process.</p>
                                <h5>Payments</h5>
                                    <p>• Users agree to pay for orders as specified during the order process.</p>
                                    <p>• We accept payments through Gcash. </p>
                                    <p>• All prices include applicable taxes.</p>
                                <h5>Cancellations and Refunds</h5>
                                    <p>• Users can cancel orders but they can’t cancel after the order was confirmed.</p>
                                    <p>• No Refund policies are available on our website.</p>
                                    <p class="text-center mt-2" style="color:white;background-color:red;"> All personal details that submitted are protected by <br><a href="https://privacy.gov.ph/data-privacy-act/" target="_blank" style="color: white;"> DATA PRIVACY ACT OF 2012 </a><br>( Republic Act No. 10173 )</p>
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default text center" data-dismiss="modal" style="background-color: #ffbc00;left:10px;" >I accept</button>
                            </div>
                        </div>

							</div>
				</div>
                
                <div class="modal fade" id="myModal" role="dialog">

                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                <h4 class="modal-title">Lady's 1st Terms & Condition</h4>
                            </div>
                            <div class="modal-body">
                                <p ><?php echo html_entity_decode($_SESSION['setting_terms']) ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default text center" data-dismiss="modal" style="background-color: #ffbc00;left:10px;" >I accept</button>
                            </div>
                        </div>

                    </div>
                </div>
                <hr class="divider my-4 bg-dark" id="underline" />

                <!-- <hr class="divider my-4 bg-dark" id="underline" /> -->
                <div class="text-center">
                    <button class="btn" href="index.php?page=home&#menu-field" type="submit" style="height: 2.75rem; font-weight: bold; font-size: 1rem; background-color: #ffbc00; color: #31284E; padding: 0.5rem 1rem; border-radius: 5px; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">PLACE ORDER</button>

                    <!-- <button class="btn btn-block btn-outline-dark text-center" type="submit" style="width: 10em;height: 3.5rem; border-radius: 20px;border-color:#ffbc00" id="place">PLACE ORDER</button> -->
                  
                    <!-- <button class="btn btn-block btn-outline-dark" type="submit" style="" id="place">PLACE ORDER</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .responsive-img {
    width: 100%;
    height: auto;
    max-width: 100px; /* Adjust this value based on your layout */
    display: block;
    margin: 0 auto;
}

    #underline {
        opacity: 0%;
    }

    .tacbox {
        left: 50%;
        /* transform: translateX(-50%); */
        display: block;
        padding: 1em;
        /* margin: 2em; */
        border: 3px solid #ddd;
        background-color: #eee;
        max-width: 500px;
    }

    input {
        height: 2em;
        width: 4em;
        vertical-align: middle;
    }
    
    #checkbox{
        accent-color: red;
    }
   
    #radio{
        left: 50%;
        position: relative;
        transform: translateX(-50%);
        accent-color: red;
    }
    #place{
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        margin-top: 0;
        margin-bottom: 5%;
        color: white;
        font-size: 1.2rem;
        background-color: #ffbc00;
    }
    #place:hover{
        background-color: transparent;
        color:#ffbc00;
        border: solid 4px #ffbc00;
        box-shadow: 0px 0px 10px #ffbc00;
        font-weight: bold;
    }

</style>

<script>
    $(document).ready(function() {
        $('#checkout-frm').submit(function(e) {
            e.preventDefault()
            // alert();
            
            start_load()
            $.ajax({
                url: "admin/ajax.php?action=save_order",

                // url: 'sms_sent.php',

                method: 'POST',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast("Order successfully Placed.")
                        setTimeout(function() {
                            location.replace('index.php?page=home')
                        }, 1500)
                    }
                }
            })
        })
    })

    function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("text");
        if (checkBox.checked == true) {
            img.style.display = "block";
            gcash.style.display = "block";
            text.style.display = "block";
            reciept.style.display = "block";
            text2.style.display = "block";
            box.style.display = "block";
            // $('input[name="paymentmethod"]:checked').val()
            $('.gcashinputs').prop('required', true);
        } else {
            img.style.display = "none";
            gcash.style.display = "none"
            text.style.display = "none";
            reciept.style.display = "none";
            text2.style.display = "none";
            box.style.display = "none";
            $('.gcashinputs').prop('required', false);
        }
    }
</script>


<style>
    input {
        border: none;
        outline: none !important;
        padding: 10px 20px;
        width: 300px;
    }

    input[type=text] {
        color: #1a1a1a;
        /* border-bottom: 4px solid #1a1a1a; */
        font-size: 20x;
        font-weight: 900;
    }

    input[type=text]:focus {
        /* box-shadow: 0x 0x 2px red; */
        border-color: yellow;
        /* background-color:red; */
        border-bottom: 2px solid #178926;


    }
</style>