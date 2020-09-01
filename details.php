<?php 

include('config/db_connect.php');


if(isset($_POST['delete'])){

    $id_to_del = mysqli_real_escape_string($conn , $_POST['id_to_delete']);

    $sql = "DELETE FROM donar WHERE id = $id_to_del ";

    if(mysqli_query($conn , $sql)){
        //succes
        header('Location: index.php');
    }else{
        echo "error" . mysqli_error($conn);
    }
}


if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM donar WHERE id=$id ";

    $result = mysqli_query($conn,$sql);

    $donar = mysqli_fetch_assoc($result);
    
    mysqli_free_result($result);
    mysqli_close($conn);

    //print_r($donar);

}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('Templates/header.php');?>

<h2 class="add-head">Details</h2>
<div class="container  ">
    <?php if($donar) : ?>
        <div class="row">
            <div class="col-12 details">
                <h4><?php echo $donar['name']; ?></h4>
                <p><?php echo "Blood group : ".htmlspecialchars($donar['Blood_grp']) ; ?></p>
                <p><?php echo "Medical History : " . htmlspecialchars($donar['history']); ?></p>
                <p><?php echo "Mobile Number : " .htmlspecialchars ($donar['mobile_num']); ?></p>
                <p><?php echo "Email : " . htmlspecialchars($donar['email']); ?></p>

               

                
            </div>
        </div>
        <form action="details.php" method="POST" class="d-flex justify-content-center mt-4">
            <input type="hidden" name="id_to_delete" value="<?php echo $donar['id']; ?>" >
            <input type="submit" name="delete" value="Remove" class="btn add dele-btn">
        </form>
    <?php else:?>

        <h5>No such candidate</h5>

    <?php endif;?>
    
    
</div>

<?php include('Templates/Footer.php');?>

</html>