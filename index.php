<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

        <div class="box1">
            <h2>ALL STUDENTS</h2>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
        </div>
        

        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "select * from `students`";

                    $result = mysqli_query($connection, $query);

                    if(!$result) {
                        die("query failed".mysqli_error());
                    }
                    else {
                        while($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id'];  ?></td>
                                    <td><?php echo $row['first_name'];  ?></td>
                                    <td><?php echo $row['last_name'];  ?></td>
                                    <td><?php echo $row['age'];  ?></td>
                                </tr>
                            <?php 
                        }
                    }
                ?>
            </tbody>
        </table>

        <?php 

            if(isset($_GET['message'])) {
                echo '<h6>' . htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8') . '</h6>';
            }

        ?>

        <?php 

            if(isset($_GET['insert_msg'])) {
                echo '<h6>' . htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8') . '</h6>';
            }

        ?>



        <!-- Modal -->
<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
                <label for="f_name">
                    First Name
                </label>
                <input type="text" name="f_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="l_name">
                    Last Name
                </label>
                <input type="text" name="l_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">
                    Age
                </label>
                <input type="text" name="age" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="add_students" value="ADD">ADD</button>
      </div>
    </div>
  </div>
</div>


<?php include('footer.php'); ?>