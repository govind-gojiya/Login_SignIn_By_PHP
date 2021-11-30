<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP - Register | G.G.</title>

    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Custom CSS Link -->
    <link href="assets/css/register.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <!-- iconify for icon -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</head>

<body>

    <?php

        include 'config.php';

        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            $pwd = password_hash($password, PASSWORD_BCRYPT);
            $cpwd = password_hash($cpassword, PASSWORD_BCRYPT);

            $searchQuery = "select * from register where username = '$username'";
            $resultQuery = mysqli_query($con, $searchQuery);
            $noRow = mysqli_num_rows($resultQuery);

            if($noRow>0){
                ?>
                <script>
                    alert('User Already Exists.😕');
                </script>
                <?php
            } else {
                if($password === $cpassword) {

                    $insertQuery = "insert into register(username, password) values('$username','$pwd')";
                    $runInsert = mysqli_query($con, $insertQuery);

                    if($runInsert) {
                        $idSearch = "select * from register where username = '$username'";
                        $resultSearch = mysqli_query($con, $idSearch);
                        $addRow = mysqli_fetch_assoc($resultSearch);
                        $userId = $addRow['id'];
                        
                        $_SESSION['userId'] = $userId;
                        $_SESSION['userName'] = $username;
                        header('location:addData.php');
                    }

                } else {
                    ?>
                    <script>
                        alert('Password are not matching.😑');
                    </script>
                    <?php
                }
            }
        }

    ?>

    <div class="row mx-auto my-2 p-4 mx-md-2">
        <div class="col-md-5 register-page container">
            <div class="login-title d-flex align-items-center mt-2 mb-4">
                <span class="iconify" data-icon="ic:sharp-login" style="font-size: 30px; color: white"></span>
                <h3 class="mb-0 titleRegister">Register</h3>
            </div>
            <form class="row g-3 signin-Form" autocomplete="off" method="POST">
                <div class="col-12 userNameDiv">
                    <input type="text" name="username" class="form-control" id="inputUsername" required placeholder="Enter User Name" />
                </div>
                <div class="col-12 passwordDiv">
                    <input type="password" name="password" class="form-control" id="inputPassword" required placeholder="Create Password" />
                </div>
                <div class="col-12 passwordDiv">
                    <input type="password" name="cpassword" class="form-control" id="inputCpassword" required placeholder="Confirm Password" />
                </div>
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
                    <button type="submit" name="submit" class="btn register-btn">Register</button>
                </div>
            </form>
            <div class="haveAccount d-flex mt-3 my-1 justify-content-center flex-wrap">
                <p>Do you have Already an account?</p>
                <a href="login.php">&nbsp; Login</a>
            </div>
        </div>
    </div>
    <!-- Bootstrap Bunddle script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>

    <!-- Custom script -->
</body>

</html>