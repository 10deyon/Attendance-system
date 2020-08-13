<?php
    include('db.php');
    include('header.php');

    $flag = 0;
    if (isset($_POST['submit'])){
        foreach($_POST['attendance_status'] as $id=>$attendance_status){
            $student_name = $_POST['student_name'][$id];
            $roll_number = $_POST['roll_number'][$id];
            $date = date('Y-m-d H:i:s');

            $result = mysqli_query($conn, "insert into attendance_records (student_name, roll_number, attendance_status, date) values ('$student_name', '$roll_number', '$attendance_status', '$date')");
            if($result){
                $flag = 1;
            }
        }
    }
?>

<div class="container">
    <div class="card">

        <div class="card-header">
            <a class="btn btn-primary" href="add.php">ADD EMPLOYER</a>
            <a class="btn btn-info pull-right" href="viewall.php">VIEW ALL</a>
        </div>

        <?php if($flag) { ?>
            <div class="alert alert-success">
                Attendance data successfully inserted!
            </div>
        <?php } ?>

        <?php #Date function to show the day attendance was taken ?>
        <div class="well text-center">
            <h4>DATE: <?php echo date('Y-m-d'); ?> </h4>
        </div>

        <div class="card-body">
            <form action="index.php" method="post">
                <table class="table table-bordered table-hover thead-dark">
                    <th>Serial Number</th>
                    <th>Student name</th>
                    <th>Roll Number</th>
                    <th>Attendance status</th>

                    <?php $result = mysqli_query($conn, 'select * from attendance');
                        $serialnumber = 0;
                        $counter = 0;
                        while($row = mysqli_fetch_array($result)){
                            $serialnumber ++;
                    ?>

                    <tr>
                        <td> <?php echo $serialnumber; ?> </td>
                        
                        <td> <?php echo $row['student_name']; ?>
                            <input type="hidden" value="<?php echo $row['student_name']; ?>" name="student_name[]"/>
                        </td>
                        
                        <td> <?php echo $row['roll_number']; ?>
                            <input type="hidden" value="<?php echo $row['roll_number']; ?>" name="roll_number[]"/>
                        </td>
                        
                        <td>
                            <input type="radio" name="attendance_status[ <?php echo $counter; ?> ]" value="Present"
                            <?php
                                if(isset($_POST['$attendance_status'][$counter]) && $_POST['attendance_status'][$counter]=="Present"){
                                    echo "checked-checked";
                                }
                            ?>
                            required/>PRESENT
                            
                            <input type="radio" name="attendance_status[ <?php echo $counter; ?> ]" value="Absent"
                            <?php
                                if(isset($_POST['$attendance_status'][$counter]) && $_POST['attendance_status'][$counter]=="Absent"){
                                    echo "checked-checked";
                                }
                            ?>
                            required/>ABSENT
                        </td>
                    </tr>
                    <?php $counter++;
                        }
                    ?>

                </table>

                <input class="btn btn-primary" type="submit" name="submit" value="Submit"/>
            </form>
        </div>
        <?php
            include('footer.php');
        ?>
    </div>
</div>