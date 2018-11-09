<?php require_once 'partials/header.php';?>
<?php require_once 'partials/navbar.php';?>
<?php require_once 'partials/dbcon.php';?>

<?php
    $sql = "SELECT * FROM tbl_users";
    $result = mysqli_query($con, $sql);
?>

    <div class="container">
      <div class="row">
        <div class="col-3"></div>
         <div class="col-6">
         	<div class="card">
         		<div class="card-header text-center">Users</div>
         		<div class="card-body">
         			<table class="table table-bordered">
                        
                        <!-- the objective of users.php is to display all the data that were saved in our database. PHP Should display the users, not the database*/ -->

                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th colspan="2">Actions</th>
                        </tr>

                        <!-- 
                        hangga't may nakikitang data sa $result, ipapasa kay $row
                        note that $result = select * from tbl_users
                        assoc because the row now becomes an associative array 
                        { is for opening
                        -->
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <!-- 
                            row now holds keys for each column in tbl_users 
                            ?=   is a shorthand for display result/echoing
                            -->
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['password'] ?></td>
                            <td>
                                <!-- last ? indicates that you are going to use GET variable -->
                                <a href="edit_user.php?id=<?= $row['id']?>">Edit</a>
                            </td>
                            <td>
                                <a onclick="return confirm('You sure?')"
                                href="delete_user.php?id=<?= $row['id']?>">Delete</a>
                            </td>
                        </tr>
                        
                        <!-- } is for closing so we don't have to echo each enclosed lines-->

                        <?php } ?>
                    </table>
         		</div>
         	</div>
         </div>
      </div>
    </div>

<?php require_once 'partials/footer.php';?>