<?php
// include('database.inc');
// $msg ="";
// if(isset($_POST['submit'])){
//     $name = mysqli_real_escape_string($con,$_POST['name']);
//     $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
//     $gender = mysqli_real_escape_string($con,$_POST['gender']);
//     $email = mysqli_real_escape_string($con,$_POST['email']);
//     $type = mysqli_real_escape_string($con,$_POST['type']);
//     $location = mysqli_real_escape_string($con,$_POST['location']);
//     $description = mysqli_real_escape_string($con,$_POST['description']);
//     $file = mysqli_real_escape_string($con,$_POST['file']);   
//     mysqli_query($con,"insert into trash(name,mobile,gender,email,type,location,description,file) values('$name','$mobile','$gender','$email','$type','$location','$description','$file')");
//     $msg = "Thank you $name  for your Report!";
    

// }
?>
<?php 
$_server ="localhost" ;
$username ="root" ;
$password ="" ;
$dbname ="wms" ;
$msg ="";
$conn = mysqli_connect($_server , $username , $password , $dbname);
if(isset($_POST['submit'])) { 
    if (!empty($_POST['name']) && !empty($_POST['mobile']) && !empty($_POST['gender']) && !empty($_POST['email']) && !empty($_POST['type']) && !empty($_POST['location']) && !empty($_POST['description']) && !empty($_POST['file'])) {
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $file = $_POST['file'];

        $query = "insert into trash(name,mobile,gender,email,type,location,description,file) values('$name','$mobile','$gender','$email','$type','$location','$description','$file') " ;
        $run = mysqli_query($conn,$query) or die(mysqli_error());
        
        if($run) {
            echo "form submitted successfully!";
            $msg = "Thank you $name  for your Report!";
        }else {
            echo "form not submitted!";
        }


    }else {
        echo "all fileds required";
    }
}

?>