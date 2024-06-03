<?php session_start() ?>
<div class="container-fluid">
	<form action="" id="signup-frm">
    <!-- <div class="form-group text-center">
    <label for="" class="control-label ">Firstname</label>
    </div> -->
		<div class="form-group">
			<label for="" class="control-label">Firstname</label>
			<input type="text" name="first_name" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Lastname</label>
			<input type="text" name="last_name" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contact</label>
			<input type="text" name="mobile" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Address</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Email</label>
			<input type="email" name="email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Comfirm Password</label>
			<input type="password" name="confirm_password" required="" class="form-control">
		</div>
		<button class="button btn btn-info btn-sm" id="create" value="create_acc" onclick="myFunction()">Create</button>
		<br>
		<!-- <p>Already have an account? <a href="javascript:void(0)" class="text-dark" id="here">Login Here.</a></p> -->

    
<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>
<script>
	
	// $('#signup-frm').submit(function(e){
	// 	e.preventDefault()
	// 	$('#signup-frm button[type="submit"]').attr('disabled',true).html('Saving...');
	// 	if($(this).find('.alert-danger').length > 0 )
	// 		$(this).find('.alert-danger').remove();
	// 	$.ajax({
	// 		url:'admin/ajax.php?action=signup',
	// 		method:'POST',
	// 		data:$(this).serialize(),
	// 		error:err=>{
	// 			console.log(err)
	// 	$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');

	// 		},
	// 		success:function(resp){
	// 			if(resp == 1){
	// 				location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
	// 			}else{
	// 				$('#signup-frm').prepend('<div class="alert alert-danger">Email already exist.</div>')
	// 				$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
	// 			}
	// 		}
	// 	})
	// })
	$('#signup-frm').submit(function(e){
    e.preventDefault();
    $('#signup-frm button[type="submit"]').attr('disabled', true).html('Saving...');

    // Remove any existing alert messages
    if($(this).find('.alert-danger').length > 0)
        $(this).find('.alert-danger').remove();

    // Check if the password and confirm password match
    var password = $('#signup-frm input[name="password"]').val();
    var confirm_password = $('#signup-frm input[name="confirm_password"]').val();
    if(password !== confirm_password) {
        $('#signup-frm').prepend('<div class="alert alert-danger">Passwords do not match.</div>');
        $('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
        return;
    }

    $.ajax({
        url: 'admin/ajax.php?action=signup',
        method: 'POST',
        data: $(this).serialize(),
        error: function(err) {
            console.log(err);
            $('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
        },
        success: function(resp) {
            if(resp == 1) {
                location.href = '<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
            } else {
                $('#signup-frm').prepend('<div class="alert alert-danger">Email already exists.</div>');
                $('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
            }
        }
    });
});


	const codes = document.querySelectorAll('.code')
 
codes[0].focus()
 
codes.forEach((code, idx) => {
    code.addEventListener('keydown', (e) => {
        if(e.key >= 0 && e.key <=9) {
            codes[idx].value = ''
            setTimeout(() => codes[idx + 1].focus(), 10)
        } else if(e.key === 'Backspace') {
            setTimeout(() => codes[idx - 1].focus(), 10)
        }
    })
})


	$('#here').click(function(){
		uni_modal("Create an Account",'signup.php?redirect=index.php?page=checkout')
	})
	$('#login-frm').submit(function(e){
		e.preventDefault()
		$('#login-frm button[type="submit"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
				}else{
					$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})

</script>


<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>

<script>
	$('#new_account').click(function(){
		// uni_modal("Create an Account",'signup.php?redirect=index.php?page=checkout')
		uni_modal("Create an Account",'signup.php?redirect=index.php?')
	})
	$('#login-frm').submit(function(e){
		e.preventDefault()
		$('#login-frm button[type="submit"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
				}else{
					$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>


<style>

.code-container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 40px 0;
 
}
 
.code {
  border-radius: 5px;
  font-size: 75px;
  height: 120px;
  width: 100px;
  border: 1px solid #eee;
    outline-width: thin;;
    outline-color: #ddd;
  margin: 1%;
  text-align: center;
  font-weight: 300;
  -moz-appearance: textfield;
  margin-left: 10px;
}
 
.code::-webkit-outer-spin-button,
.code::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
 
.code:valid {
  border-color: #1DBF73;
box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
}
 
.info {
  background-color: #eaeaea;
  display: inline-block;
  padding: 10px;
  line-height: 20px;
  max-width: 400px;
  color: #777;
  border-radius: 5px;
}
 
@media (max-width: 600px) {
  .code-container {
    flex-wrap: wrap;
  }
 
  .code {
    font-size: 60px;
    height: 80px;
    max-width: 70px;
  }
}
</style>