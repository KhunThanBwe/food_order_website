<?php include 'partials/menu.php'; ?>

<!-- main content section strat -->
<div class="main-content">
    <div class="wrapper">

        <h1>Manage Admin</h1>

        <br>
        
        <h3 style="text-align: center;width: 40%;" class="text-success">
            <?php

            // Admin Add message 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            // Admin delete message 
            if(isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            // Display Admin update meassage
            if(isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            ?>
        </h3>
        
        
        <h3 style="text-align: center;width: 40%;" class="text-success">
            <?php
            
            ?>
        </h3>

        <br><br><br>

        <a class="btn-success" href="add-admin.php"> + Add Admin </a>

        <br><br><br>

        <table class="tbl-full">
            <tr>
                <th>Id</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
            <?php
            // Query to get all admin
            $sql = "SELECT * FROM tbl_admin";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            if($result) {
                $num = mysqli_num_rows($result);

                if($num > 0 ) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $fullname = $row['fullname'];
                        $username = $row['username'];
                        $password = $row['password'];
                        ?>

                        <tr>
                            <td><?= $id; ?></td>
                            <td><?= $row['fullname']; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['password']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="update-admin.php?update_id=<?= $row['id']; ?>">Edit</a>
                                <a class="btn btn-danger" href="delete-admin.php?delete_id=<?= $row['id']; ?>">Delete</a>
                            </td>
                        </tr> 

                        <?php
                    }
                }
            }
            ?>  
            
        </table>

    </div>
</div>
<!-- main content section end -->

<?php include 'partials/footer.php'; ?>
