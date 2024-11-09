<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">

            <form action="" method="post">

                <h2 class="form-title">Add Admin</h2>

                <br>

                <h3 style="text-align: center; width: 50%;" class="text-danger">
                    <?php
                    if(isset($_SESSION['add'])) {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    ?>
                </h3>

                <br>

                <table class="tbl-30">
                    <tr>
                        <td>Fullname : </td>
                        <td>
                            <input type="text" name="fullname" placeholder="Enter Fullname">
                        </td>
                    </tr>

                    <tr>
                        <td>Username : </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter Username">
                        </td>
                    </tr>

                    <tr>
                        <td>Password : </td>
                        <td>
                            <input type="password" name="password" placeholder="Enter Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn btn-success">
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </div>


<?php include('partials/footer.php'); ?>

<?php

//Process the value from form and save it in database

//Check whether the submit button is clicked or not

if(isset($_POST['submit'])) {
    // Button Clicked

    // 1. Get the data from form
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // validation form data
    if(!empty($fullname) && !empty($username) && !empty($password)) {
        // 2. sql query to save the data into database
        $sql = "INSERT INTO tbl_admin(fullname, username, password) VALUES ('$fullname', '$username', '$password')";
        
        // 3. Execute query and save data into database
        $result = mysqli_query($conn, $sql);
        
        if($result) {
            //session message
            $_SESSION['add'] = "Add admin successfully";
            //redriect page
            header('location:manage-admin.php');
        }
    }else {
        $_SESSION['add'] = "Failed to Add Admin";

        // header('location:add-admin.php');
    }

}else {
    // Button Clicked

}
    

?>
