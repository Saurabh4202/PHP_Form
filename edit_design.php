<?php include("connect.php"); 
$id = $_GET['id'];

$query = "SELECT * FROM FORM where id= '$id'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="#" method="POST">
        <div class="title">
            EDIT RECORD DETAILS
        </div>    

        <div class="form">
        <div class="input_field">
            <label>First name</label>
            <input type="text" value="<?php echo $result['fname']; ?>" class="input" name="fname" required>
        </div>

        <div class="input_field">
            <label>Last name</label>
            <input type="text" value="<?php echo $result['lname']; ?>" class="input" name="lname" required>
        </div>

        <div class="input_field">
            <label>Gender</label>
            <div class="custom_select">
            <select name="gender" required>
                <option value="">Select</option>
                <option value="male"
                <?php
                    if($result['gender'] == 'male')
                    {
                        echo "selected";
                    }
                ?>
                >
                Male</option>
                <option value="female"
                <?php
                    if($result['gender'] == 'female')
                    {
                        echo "selected";
                    }
                ?>
                >
                Female</option>
            </select>
        </div>
    </div>
        <div class="input_field">
            <label>Email Address</label>
            <input type="text" value="<?php echo $result['email']; ?>" class="input" name="email" required>
        </div>

        <div class="input_field">
            <label>Mobile Number</label>
            <input type="text" value="<?php echo $result['phone']; ?>" class="input" name="phone" required>
        </div>

        <div class="input_field">
            <label>Address</label>
            <textarea class="textarea" name="address" required><?php echo $result['address']; ?></textarea>
        </div>

        <div class="input_field">
            <input type="submit" value="Edit Details" class="btn" name="update">
        </div>
    </div>
</form>
    </div>
</body>
</html>


<?php 
    if($_POST['update'])
    {
        $fname =   $_POST['fname'];
        $lname =   $_POST['lname'];
        $gender =  $_POST['gender'];
        $email  =  $_POST['email'];
        $phone  =  $_POST['phone'];
        $address = $_POST['address'];


        if($fname !="" && $lname != "" && $gender != "" && $email != "" && $email != "" && $phone != "" && $address != "")
        {

        $query = "INSERT INTO FORM (fname,lname,gender,email,phone,address) VALUES('$fname','$lname','$gender','$email','$phone','$address')";

        $query = "UPDATE FORM set fname='$fname',lname='$lname',gender='$gender',email='$email',phone='$phone',address='$address' WHERE id='$id'"; 
        $data = mysqli_query($conn,$query);
        
        if($data)
        {
            echo "<script>alert('Record Updated')</script>";
            
        }
        else
        {
            echo "<script>alert('Failed')</script>";
        }
    }
    else
    {
        echo "<script>alert('Please fill the form first');</script>";
    }
}
?>

<?php
include("show.php");
?>

