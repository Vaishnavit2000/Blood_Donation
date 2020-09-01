
<?php

include('config/db_connect.php');


//Query for all donars list
$sql = 'SELECT id, name, Blood_grp FROM donar';
//Get the data using query
$result = mysqli_query($conn, $sql);
//fetch result
$donars = mysqli_fetch_all($result , MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('Templates/header.php');?>

<form action="search.php" method="POST">
    <div class="d-flex flex-row justify-content-end  mt-2 mr-3">
        <input class="btn btn-light search" type="text" name="bg" placeholder="Search by Blood group ">
        <i class="fa fa-3 fa-search align-self-center ml-1 mr-1"></i>
        <input class="btn btn-primary" type="submit" name="submit" value="Submit">
    </div>    
</form>

<div class="container">
<h4 class="sub-head">Helping hands</h4>
    <div class="row">
        
        <?php foreach($donars as $donar): ?>
        <div class="col-12 col-sm-4 mb-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body ">
                    <h5 class="card-header"><?php echo htmlspecialchars($donar['name']); ?></h5>                
                    <p class="card-body text-align-center"><?php echo htmlspecialchars($donar['Blood_grp']); ?></p>                
                </div>
                <a href="details.php?id=<?php echo $donar['id']?>" class="card-link p-3">More Info</a>
            </div>
        </div>            
        <?php endforeach; ?>
        
    </div>
</div>

<footer class="foot">
    <div>
        <p>Copyright 2020 Blood Donation</p>
    </div>
</footer>    

</html>