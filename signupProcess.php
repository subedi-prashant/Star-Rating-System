<?php
$con=mysqli_connect("localhost","root","","rating_system"); //parameters : servername,username,password,db
//check if connection failure 
if(!$con){
    die(mysqli_error($con));
}

//accessing data and storing to variable
$username=$_POST['username'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$image=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];

//checking if confirmation password matched and if not matched redirecting to registration page
if($password!=$cpassword){
    echo'<script>
        alert("Password did not match");
        window.location="register.php"
    </script>';
}
else{
    //Basically image inside db goes to uploads floder
    move_uploaded_file($tmp_name,"image/userpics/$image"); 
    //Encrypting Password
    $passwordMd5 = md5($password);
    $sql="insert into item_users (username,password,avatar) values ('$username','$passwordMd5','$image')";

    //Executing the above query and checking if sucessful
    $result=mysqli_query($con,$sql);
    if($result){
        echo'<script>
            alert("Registration Sucessful!!");
            window.location="index.php";
        </script>';
    }
}
?>