<?php
    include('db.php');
    include('header.php');

?>

<div class="container">
    <div class="card">

        <div class="card-header">
            <a class="btn btn-primary" href="add.php">ADD EMPLOYER</a>
            <a class="btn btn-secondary pull-right" href="#">BACK</a>
        </div>

        <div class="card-body">
            <form action="index.php" method="post">
                <table class="table table-striped">
                    <tr>
                        <th>Serial Number</th>
                        <th>Date</th>
                        <th>Show Attendance</th>
                    </tr>

                    <?php $result = mysqli_query($conn, 'select distinct date from attendance_records');
                        $serialnumber = 0;
                        while($row = mysqli_fetch_array($result)){
                            $serialnumber ++;
                    ?>

                        <tr>
                            <td> <?php echo $serialnumber; ?> </td>
                            <td> <?php echo $row['date']; ?> </td>
                            <td>
                                <form action="show_attendance.php">
                                    <input type="hidden" value="<?php echo $row['date'] ?>" name="date"/>
                                    <input type="submit" class="btn btn-primary" value="Show Attendance"/>
                                </form>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>

                </table>
            </form>
        </div>
    </div>

    <?php
        include('footer.php');
    ?>
</div>