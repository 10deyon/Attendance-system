<?php
    include("header.php");
    include("db.php");

    $flag = 0;
    if (isset($_POST['submit'])){
        $name = $_POST['name'];
        $roll = $_POST['roll'];

        $result = mysqli_query($conn, "insert into attendance(student_name, roll_number) values ('$name', '$roll')");

        if ($result){
            $flag = 1;
        }
    }
?>

<div class="container">
    <div class="card">
        <?php if ($flag){ ?>
        <div class="alert alert-success">
            <strong>!Success: </strong> Attendance data successfully inserted.
        </div>
        <?php }?>

        <div class="card-header">
            <a class="btn btn-primary" href="addEmployer.php">ADD EMPLOYER</a>
            <a class="btn btn-dark pull-right" href="index.php">BACK</a>
        </div>

        <div class="card-body">
            <div class="jumbotron">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Student Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Student Name" required>
                    </div>

                    <div class="form-group">
                        <label for="roll">Student Roll:</label>
                        <input type="text" class="form-control" id="roll" name="roll" placeholder="Student Roll" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" value="ADD STUDENT" name="submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
            include('footer.php');
        ?>
</div>
