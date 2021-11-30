<?php

session_start();

if(!$_SESSION['userName']){
    header('location:register.php');
} else {
    include 'config.php';

    $userID = $_SESSION['userId'];
    $returnQuery = "select * from details where user_id = '$userID' ";
    $runreturnQuery = mysqli_query($con, $returnQuery);

    if(mysqli_fetch_assoc($runreturnQuery)) {
        ?>
            <script>
                alert('You Can not go back to Details Page after filling details once.❌');
                location.replace('home.php');
            </script>
        <?php
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP - Add Info | GOVIND</title>

    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Custom CSS Link -->
    <link href="assets/css/addData.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <!-- iconify for icon -->
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</head>

<body>

    <?php

        include 'config.php';

        if(isset($_POST['submit'])){
            $username = $_POST['name'];
            $useremail = $_POST['email'];
            $useren = $_POST['enno'];
            $usercity = $_POST['city'];
            $usermobile = $_POST['mobileno'];
            $userId = $_SESSION['userId'];

            $serachQuery = "select * from details where email = '$useremail' ";
            $runSearchQuery = mysqli_query($con, $serachQuery);
            $emailExists = mysqli_num_rows($runSearchQuery);

            if($emailExists>0){
                ?>
                    <script>
                        alert('Email already registerd.🤨');
                    </script>
                <?php
            } else {

                $filename = $_FILES['file']['name'];
                $tempname = $_FILES['file']['tmp_name'];

                $path = "assets/user_img/".$filename;
                
                if (move_uploaded_file($tempname, $path))  {
                    $_SESSION['photo'] = $path;
                } else {
                        $path = "assets/user_img/default.jpg";
                        $_SESSION['photo'] = $path;
                }

                $insertQuery = "insert into details(user_id, name, email, city, phone_no, enrollment_no, photo) values( '$userId', '$username', '$useremail', '$usercity', '$usermobile', '$useren', '$path')";
                $runInsert = mysqli_query($con, $insertQuery);
    
                if($runInsert){
    
                    $_SESSION['name'] = $username;
                    $_SESSION['email'] = $useremail;
                    $_SESSION['enno'] = $useren;
                    $_SESSION['city'] = $usercity;
                    $_SESSION['mobile'] = $usermobile;
    
                    header('location:home.php');
                } else {
                    ?>
                        <script>
                            alert("Not Inserted Row.😥");
                        </script>
                    <?php
                }
            }
        }

    ?>

<div class="row mx-auto my-2 mx-md-2">
        <div class="col-md-5 addData-Page container p-4">
            <h2 class="title-Details mb-2">Add Your Details</h2>
            <form class="row g-3 addData-Form mt-1" autocomplete="off" method="POST"  enctype="multipart/form-data">
                <div class="col-md-12 d-flex align-items-end p-0 mt-1">
                    <div class="userImg">
                        <img src="assets/images/userImg.jpg" class="img-fluid" id="selected--Img" alt="user img" />
                        <div class="edit">
                            <a id="uploadImg" onclick="javascript:document.getElementById('user--Folder').click();"><span
                                class="iconify"
                                data-icon="fluent:edit-16-filled"
                                style="color: #4caf50"
                            ></span></a>
                            <input id="user--Folder" type="file" name="file" style="display:none;" />
                        </div>
                    </div>
                    <div class="userName ms-auto">
                        <input type="text" name="name" class="form-control" id="inputName" required placeholder="Your Name" />
                    </div>
                </div>
                <div class="col-md-12 enrollmentDiv">
                    <input type="text" name="enno" class="form-control" id="inputEnNo" required placeholder="Enrollment No." />
                </div>
                <div class="col-md-12 tenDigitNumber">
                    <input type="text" name="mobileno" class="form-control" id="inputNumber" required placeholder="Mobile No." />
                </div>
                <div class="col-md-12 city">
                    <input type="text" name="city" class="form-control" id="inputCity" required placeholder="City Name" />
                </div>
                <div class="col-md-12 emailDiv">
                    <input type="email" name="email" class="form-control" id="inputEmail" required placeholder="Email ID" />
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" required />
                        <label class="form-check-label" for="gridCheck"> I agree to all statements include in <span class="fw-bolder">Terms of Use</span>
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="upload-btn mb-2 mt-1" name="submit">
                    <span
                        class="iconify"
                        data-icon="bi:send"
                        style="color: white; font-weight: bolder; font-size: 1.3rem"
                        ></span> Add Details </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap Bunddle script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>

    <!-- Custom script -->
    <script src="assets/script/img-preview-script.js"></script>
</body>

</html>