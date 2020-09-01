<?php

include('config/db_connect.php');

$Name = $email = $blood = $contact = $ht = '';
$bloodgrp = array("A+" ,"A POSITIVE","A NEGATIVE","B POSITIVE","B NEGATIVE","O POSITIVE","O NEGATIVE","AB POSITIVE","AB NEGATIVE","B+" ,"AB+" ,"O+" ,"A-" ,"B-" ,"AB-" ,"O-" ,"A" , "B" ,"AB" ,"O" );

$errors = array('email' => '', 'name' => '', 'bloodgroup' => '' );
if(isset($_POST['submit'])){

    if(empty($_POST['Name'])){
        $errors['name']= 'A name is required ';
    }else{
        $Name = $_POST['Name'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $Name)){
			$errors['name'] = 'Name must be letters and spaces only';
		}
    }

    if(empty($_POST['email'])){
        $errors['email'] = 'An email is required ';
    }else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email must be a valid email address';
        }
    }

    if(empty($_POST['blood'])){
        $errors['bloodgroup'] = 'Blood group is required';
    }else {
        $blood = $_POST['blood'];
        $blood = strtoupper("$blood");
        if(!in_array($blood , $bloodgrp)){
            $blood = "";
            $errors['bloodgroup'] = 'Enter a valid entry';
        }
        
    }    

    if(array_filter($errors)){

    }else{

        
    $Name = mysqli_real_escape_string($conn , $_POST['Name']);
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $blood = mysqli_real_escape_string($conn , $_POST['blood']);
    $contact = mysqli_real_escape_string($conn , $_POST['contact']);
    $ht = mysqli_real_escape_string($conn , $_POST['ht']);


    $sql = "INSERT INTO donar( name , Blood_grp , history , email , mobile_num) 
            VALUES('$Name' , '$blood' , '$ht' , '$email' , '$contact')";

    if(mysqli_query($conn, $sql)){
        header('Location: index.php');        
    }else{
        echo "error" . mysqli_error($conn);
    }

    }    
        
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('Templates/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-10 offset-lg-2 offset-md-2 offset-1 ">
            <h2 class="add-head">Add a Profile</h2>
            <form action="add.php" method="POST">
                <div class="form-group">
                    <label for="">Your Name:</label>                          
                    <input type="text" class="form-control" name="Name" value="<?php echo htmlspecialchars($Name) ?>"  required autocomplete="off">
                    <div style="color:red;"> <?php echo $errors['name']; ?> </div>
                </div>

                <div class="form-group">  
                    <label for="">Your Email:</label>                        
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($email) ?>" required autocomplete="off">
                    <div style="color:red;"> <?php echo $errors['email']; ?> </div>
                </div>

                <div class="form-group"> 
                    <label for="">Your Bloodgroup:</label>                         
                    <input type="text" class="form-control" name="blood" value="<?php echo htmlspecialchars($blood) ?>"  required autocomplete="off">
                    <div style="color:red;"> <?php echo $errors['bloodgroup']; ?> </div>
                </div>

                <div class="form-group">
                    <label for="num">Contact No:</label>
                    <input type="number" name="contact" value="<?php echo htmlspecialchars($contact) ?>"  id="num"  ></input>
                </div>

                <div class="form-group">
                    <label for="hist">Medical History(Specify if you are having any kind of disease 
                    or have u ever donated blood )</label>
                    <textarea class="form-control" name="ht" value="<?php echo htmlspecialchars($ht) ?>"  id="hist" rows="3"></textarea>
                </div>

                <div class="d-flex justify-content-center form-button">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



<footer class="foot mt-5">
    <div>
        <p>Copyright 2020 Blood Donation</p>
    </div>
</footer>   
    

</html>