<div class="box" ><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->

<center>

<h1>Login
<br>
<br>Already our Customer</br>
</h1>

</center>


</div><!-- box-header Ends -->

<style>
    .form-container{
        min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background-color:rgba(0,0,0,.5);
    }
    .form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background:rgba(40,57,101,.6);
   text-align: center;
   width: 500px;
}
.form-container form input{
    width: 100%;
	padding:10px 15px;
	border-radius:25px;
    margin:8px 0;
	background:rgba(0,0,0,.1);
    color: #fff;
	
}
.form-container form .btn1{
   background: #fbd0d9;
   color:crimson;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .btn1:hover{
   background: crimson;
   color:#fff;
}
h3{
    color: crimson;
}
h1{
    padding-top: 14px;
    padding-bottom: 14px;
    background-color: #381828;
    color:#fff;
}

</style>
<div class="form-container">
<form action="checkout.php" method="post" ><!--form Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label>Email</label>

<input type="text" class="form-control" name="c_email" required >



<label>Password</label>

<input type="password" class="form-control" name="c_pass" required >

<h4 align="center">

<a href="forgot_pass.php"> Forgot Password </a>

</h4>

</div><!-- form-group Ends -->

<div class="text-center" ><!-- text-center Starts -->

<button name="login" value="Login" class="btn1" >

<i class="fa fa-sign-in" ></i> Log in


</button>
<center><!-- center Starts -->

<a href="customer_register.php" >

<h3>New ? Register Here</h3>

</a>


</center><!-- center Ends -->
</div><!-- text-center Ends -->


</form><!--form Ends -->


</div>



</div><!-- box Ends -->

<?php

if(isset($_POST['login'])){

$customer_email = $_POST['c_email'];

$customer_pass = $_POST['c_pass'];

$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

$run_customer = mysqli_query($con,$select_customer);

$get_ip = getRealUserIp();

$check_customer = mysqli_num_rows($run_customer);

$select_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($con,$select_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer==0){

echo "<script>alert('password or email is wrong')</script>";

exit();

}

if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

}
else {

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

} 


}

?>