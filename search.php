<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">    
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    
    <title>Blood Donation</title>
    <style type="text/css">

        *{ margin:0; padding:0; box-sizing: "border-box";font-family: 'Poppins', sans-serif; }


        .navbar{
            background: #d8d3cd!important;
            margin-top: 10px;
        }

        .heading {
            color: #776d8a;            
            /* left: 200px; */
            font-weight: bold;
            border-color: #776d8a;
            font-family: 'Open Sans', sans-serif;
        }    

        .foot{
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
        }       

        .sub-head{
            text-align: center;
            color: #393b44;
            padding-top: 50px;
            padding-bottom: 20px;
            font-size: 1.9rem;
            font-weight: 400;
            font-family: 'Open Sans', sans-serif;

        }

        .card{
            text-align: center;
            color: #393b44;
        }

        .card a{
            text-align: right;
            padding: 5px;
        }                
    </style>
    
</head>
<body>    
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">        
        <a class="navbar-brand " href="#"><img src="https://img.icons8.com/color/48/000000/drop-of-blood.png"/></a>
        <h1 class="heading ">BLOOD DONATION</h1>                
    </nav>       

<?php

include('config/db_connect.php');

if(isset($_POST['submit'])){
    $bgrp = mysqli_real_escape_string($conn, $_POST['bg']);
    //echo "$bgrp";

    if($bgrp == " " ||  empty($_POST['bg'])){
        header('Location: index.php');        
        
    }else{
        $sqql = " SELECT id, name, Blood_grp FROM donar WHERE Blood_grp='$bgrp' ";

        $ret = mysqli_query($conn , $sqql);
        $bgdonars = mysqli_fetch_all($ret , MYSQLI_ASSOC);
        mysqli_close($conn);
        
        if(!empty($bgdonars)) { ?>

            <div class="container">
                <h4 class="sub-head">Searched Blood Group</h4>
                <div class="row">
                    
                    <?php foreach($bgdonars as $bgdonar): ?>
                    <div class="col-12 col-sm-4 mb-5">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body ">
                                <h5 class="card-header"><?php echo htmlspecialchars($bgdonar['name']); ?></h5>                
                                <p class="card-body text-align-center"><?php echo htmlspecialchars($bgdonar['Blood_grp']); ?></p>                
                            </div>
                            <a href="details.php?id=<?php echo $bgdonar['id']?>" class="card-link p-3">More Info</a>
                        </div>
                    </div>            
                    <?php endforeach; ?>                    
                </div>
            </div>

        <?php } else{?>
            <h4 class="sub-head">Blood Group Not Available</h4>
        <?php } ?>       

<?php    }  
}
?>

</body>
<footer class="foot">
    <div>
        <p>Copyright 2020 Blood Donation</p>
    </div>
</footer> 



