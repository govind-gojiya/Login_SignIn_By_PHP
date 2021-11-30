<?php

session_start();

if(!$_SESSION['userName']){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page | GOVIND</title>

    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Custom CSS Link -->
    <link href="assets/css/home.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <!-- iconify for icon -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</head>

<body>
<div class="card my-3 userCard">
  <div class="row g-0 userInfo">
    <div class="col-md-4 userImg">
      <img src="<?php echo $_SESSION['photo']; ?>" class="img-fluid rounded-start" alt="User Img" width="100%" height="100%">
    </div>
    <div class="col-md-12">
        <div class="card-body">
        <div class="details col-md-12">
                <div class="aboutInfo col-md-7">
                    User 
                </div>
                <div class="userDetails col-md-5">
                    <?php echo $_SESSION['userName']; ?>
                </div>
            </div>
            <div class="details col-md-12">
                <div class="aboutInfo col-md-7">
                    Name
                </div>
                <div class="userDetails col-md-5">
                    <?php echo $_SESSION['name']; ?>
                </div>
            </div>
            <div class="details col-md-12">
                <div class="aboutInfo col-md-7">
                    Enrollment No.
                </div>
                <div class="userDetails col-md-5">
                    <?php echo $_SESSION['enno']; ?>
                </div>
            </div>
            <div class="details col-md-12">
                <div class="aboutInfo col-md-7">
                    Phone No.
                </div>
                <div class="userDetails col-md-5">
                    <?php echo $_SESSION['mobile']; ?>
                </div>
            </div>
            <div class="details col-md-12">
                <div class="aboutInfo col-md-7">
                    Email
                </div>
                <div class="userDetails col-md-5">
                    <?php echo $_SESSION['email']; ?>
                </div>
            </div>
            <div class="details col-md-12">
                <div class="aboutInfo col-md-7">
                    City
                </div>
                <div class="userDetails col-md-5">
                    <?php echo $_SESSION['city']; ?>
                </div>
            </div>
            <div class="button d-flex justify-content-center">
                <button class="logout-btn"><a href="logout.php" style="text-decoration: none;color: white;">Logout</a></button>
            </div>
        </div>
    </div>
  </div>
</div>
    <!-- <div class="userInfo row mx-auto my-sm-3">
        <div class="col-md-6 imgSection">
            <div class="userImg">
                <img src="<?php echo $_SESSION['photo']; ?>" alt="User Img" width="100%" height="100%">
            </div>
        </div>
        <div class="col-md-6 infoSection">
            <div class="details col-md-12">
                <div class="aboutInfo col-md-7">
                    User 
                </div>
                <div class="userDetails col-md-5">
                    <?php echo $_SESSION['userName']; ?>
                </div>
            </div>
            <div class="details col-md-12">
                <div class="aboutInfo col-md-7">
                    Name
                </div>
                <div class="userDetails col-md-5">
                    <?php echo $_SESSION['name']; ?>
                </div>
            </div>
            <div class="details col-md-12">
                <div class="aboutInfo col-md-7">
                    Enrollment No.
                </div>
                <div class="userDetails col-md-5">
                    <?php echo $_SESSION['enno']; ?>
                </div>
            </div>
            <div class="details col-md-12">
                <div class="aboutInfo col-md-7">
                    Phone No.
                </div>
                <div class="userDetails col-md-5">
                    <?php echo $_SESSION['mobile']; ?>
                </div>
            </div>
            <div class="details col-md-12">
                <div class="aboutInfo col-md-7">
                    Email
                </div>
                <div class="userDetails col-md-5">
                    <?php echo $_SESSION['email']; ?>
                </div>
            </div>
            <div class="details col-md-12">
                <div class="aboutInfo col-md-7">
                    City
                </div>
                <div class="userDetails col-md-5">
                    <?php echo $_SESSION['city']; ?>
                </div>
            </div>
            <div class="button d-flex justify-content-center">
                <button class="logout-btn"><a href="logout.php" style="text-decoration: none;color: white;">Logout</a></button>
            </div>
        </div>
    </div> -->

    <!-- Import Particles.js and app.js files -->
    <script src="assets/script/particles.js">
    </script>
    <script src="assets/script/app.js">
    </script>
    <!-- Bootstrap Bunddle script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>
</body>

</html>