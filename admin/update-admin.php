<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">

            <?php

            // Get the admin to be update
            $id = $_GET['update_id'];

            // Create query to select admin
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            // execute the  query
            $result = mysqli_query($conn, $sql);

            //  Chect whether the query is executed or not
            if($result) {
                // Check whether the data is avariabe or not
                $num = mysqli_num_rows($result);
                if($num > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $fullname = $row['fullname'];
                        $username = $row['username'];
                        $password = $row['password'];
                        
                    }
                }
            }

        ?>

            <form action="" method="post">

                <h2 class="form-title">Update Admin</h2>

                <h3 style="text-align: center; width: 50%;" class="text-danger">
                    <?php
                    if(isset($_SESSION['update'])) {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    ?>
                </h3>

                <br>

                <table class="tbl-30">

                    <tr>
                        <td>
                            <input type="hidden" name="id" value="<?= $id; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Fullname : </td>
                        <td>
                            <input type="text" name="fullname" value="<?= $fullname; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Username : </td>
                        <td>
                            <input type="text" name="username" value="<?= $username; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Password : </td>
                        <td>
                            <input type="password" name="password" value="<?= $password; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Update Admin" class="btn btn-primary">
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </div>

    <?php

    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if(!empty($fullname) && !empty($username) && !empty($password)) {


            // Create the data updated admin or not
            $sql = "UPDATE tbl_admin SET fullname='$fullname', username='$username', password='$password' WHERE id=$id";

            // Execute query 
            $res =mysqli_query($conn, $sql);

            // Check whether the data is updated or not
            if($res) {
                
                //Session update message
                $_SESSION['update'] = 'Admin Updated Successfully';

                // Redricet page
                header('location:manage-admin.php');

            }
        }else {

            //Session update message
            $_SESSION['update'] = 'Admin Updated Failed';

        }
      
    }
    ?>


<?php include('partials/footer.php'); ?>


