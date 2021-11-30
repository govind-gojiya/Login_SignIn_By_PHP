<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP - Login In | G.G.</title>

    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Custom CSS Link -->
    <link href="assets/css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    
    <!-- iconify for icon -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</head>

<body>
    <?php

    include 'config.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userQuery = "select * from register where username = '$username'";
        $userExists = mysqli_query($con, $userQuery);

        $userRow = mysqli_num_rows($userExists);
        if($userRow>0){

            $dbRow = mysqli_fetch_assoc($userExists);
            $dbpwd = $dbRow['password'];

            $verifyPwd = password_verify($password, $dbpwd);

            if($verifyPwd){

                $dbuserId = $dbRow['id'];

                $searchQuery = "select * from details where user_id = '$dbuserId' ";
                $runSearchQuery = mysqli_query($con, $searchQuery);
                $detailsRow = mysqli_fetch_assoc($runSearchQuery);

                $_SESSION['userName'] = $username;
                $_SESSION['name'] = $detailsRow['name'];
                $_SESSION['email'] = $detailsRow['email'];
                $_SESSION['enno'] = $detailsRow['enrollment_no'];
                $_SESSION['city'] = $detailsRow['city'];
                $_SESSION['mobile'] = $detailsRow['phone_no'];
                $_SESSION['photo'] = $detailsRow['photo'];

                header('location:home.php');
            } else {
                ?>
                    <script>
                        alert('Password Invalid.🛑');
                    </script>
                <?php
            }
           


        } else {
            ?>
            <script>
                alert('User Not Exists.🧾');
            </script>
            <?php
        }
    }

    ?>

    <div class="row mx-auto my-2 mx-md-1">
        <div class="col-md-5 login-page container">
            <div class="login-title d-flex align-items-center mt-2 mb-4">
                <span class="iconify" data-icon="ic:sharp-login" style="font-size: 30px; color: white"></span>
                <h3 class="mb-0">Login</h3>
            </div>
            <form class="row g-3 login-Form" autocomplete="off" method="POST">
                <div class="col-12 userNameDiv">
                    <input type="text" name="username" class="form-control" id="inputUsername" required placeholder="User Name" />
                </div>
                <div class="col-12 passwordDiv">
                    <input type="password" name="password" class="form-control" id="inputPassword" required placeholder="Password" />
                </div>
                <a href="" class="forgotPassword mb-2">Forgot Password</a>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" required />
                        <label class="form-check-label" for="gridCheck">
                I agree to all statements include in
                <span class="fw-bolder">Terms of Use</span>
              </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" name="submit" class="btn login-btn">Login</button>
                </div>
            </form>
            <div class="haveAccount d-flex my-1 justify-content-center flex-wrap">
                <p>If You are New User</p>
                <a href="register.php">&nbsp; Register Here</a>
            </div>
        </div>
    </div>
    <!-- Bootstrap Bunddle script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>

    <!-- Custom script -->
</body>

</html>