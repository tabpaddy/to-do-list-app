<?php
include("./db/config.php");


$ip = getIPAddress();
$select_active = "SELECT * FROM task_table WHERE status='active' AND ip_address='$ip'";
$select_active_result = mysqli_query($con, $select_active);
$select_active_result_count = mysqli_num_rows($select_active_result);
?>
<form action="index.php?view=active" method="post">
<div class="table-responsive">
    <table class="table table-bordered text-center">
        <thead>
            <?php if($select_active_result_count > 0): ?>
                <tr>
                    <th>sl no</th>
                    <th>Task</th>
                    <th>Date</th>
                    <th>Checked</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $number = 0;
                while($row_data = mysqli_fetch_assoc($select_active_result)):
                    $task_id = $row_data['task_id'];
                    $task = $row_data['task'];
                    $date = $row_data['date'];
                    $number++;
                ?>
                <tr>
                    <td><?php echo $number; ?></td>
                    <td>
                    <label><?php echo $task ?></label>
                    </td>
                    <td><?php echo $date; ?></td>
                    <td>
                        <input type="checkbox" class="form-check-input" value="<?php echo $task_id; ?>" name="check[]">
                    </td>
                    <td>
                        <a href="index.php?update_task=<?php echo $task_id; ?>" class="text-dark" name="update_task"><i class="uil uil-sync"></i></a>
                        <!-- <input type="submit" class="btn btn-info"> -->
                
                </td>
                    <!-- <td><a href="index.php?delete_task=<?php echo $task_id; ?>" class="text-dark"><i class="uil uil-trash"></i></a></td> -->
                    <td><input type="submit" class="btn btn-danger" value="delete task" name="delete_task" ></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
            <?php else: ?>
                <h2 class='text-danger'>No Active Task To Display</h2>
            <?php endif; ?>
    </table>
    </div>
</form>

<?php
// include("./db/config.php");


if (isset($_GET['update_task'])) {
    
            $task_id = $_GET['update_task'];
            $ip = getIPAddress();
            $status = 'completed';
            $update_query = "UPDATE task_table SET status= '$status' WHERE ip_address='$ip' AND task_id=$task_id";
            $update_query_result = mysqli_query($con, $update_query);
            if ($update_query_result) {
                echo "<script>alert('Updated successfully');</script>";
                echo "<script>window.open('index.php?view=active', '_self');</script>";   
            } else {
                echo "<script>alert('Update failed');</script>";
            }
        }


        if (isset($_POST['delete_task'])) {
            if (isset($_POST['check']) && is_array($_POST['check'])) {
                foreach ($_POST['check'] as $check_id) {
            $task_id = intval($check_id);
            $ip = getIPAddress();
            $delete_query = "DELETE FROM task_table WHERE ip_address='$ip' AND task_id=$task_id";
            $delete_query_result = mysqli_query($con, $delete_query);
            if ($delete_query_result) {
                echo "<script>alert('Deleted successfully');</script>";
                echo "<script>window.open('index.php?view=active', '_self');</script>";   
            } else {
                echo "<script>alert('Delete failed');</script>";
            }
        }
    }
}

?>

