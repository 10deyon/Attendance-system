<?php
    include('db.php');
    include('header.php');
?>

<div class="container">
    <div class="panel panel-default">

        <div class="panel-heading">
            <a class="btn btn-primary" href="add.php">ADD EMPLOYER</a>
            <a class="btn btn-default pull-right" href="index.php">BACK</a>
        </div>

        <?php #Date function to show the day attendance was taken ?>
        <div class="well text-center">
            <h3>DATE: <?php echo date('Y-m-d'); ?> </h3>
        </div>

        <div class="panel-body">
            <form action="index.php" method="post">
                <table class="table table-striped">
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
                                <input type="radio" name="attendance_status[ <?php echo $counter; ?> ]" value="Present"/>PRESENT
                                <input type="radio" name="attendance_status[ <?php echo $counter; ?> ]" value="Absent"/>ABSENT
                            </td>
                        </tr>
                        <?php $counter++;
                    }
                    ?>

                </table>

                <input class="btn btn-primary" type="submit" name="submit" value="Submit"/>
            </form>
        </div>
    </div>
</div>