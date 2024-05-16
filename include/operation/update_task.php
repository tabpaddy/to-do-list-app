<?php
// include("./db/config.php");


if (isset($_GET['update_task'])) {
    if (isset($_POST['check']) && is_array($_POST['check'])) {
        foreach ($_POST['check'] as $check_id) {
            $task_id = intval($check_id);
            $ip = getIPAddress();
            $update_query = "UPDATE task_table SET status='completed' WHERE ip_address='$ip' AND task_id=$task_id";
            $update_query_result = mysqli_query($con, $update_query);
            if ($update_query_result) {
                echo "<script>alert('Updated successfully');</script>";
                echo "<script>window.open('index.php?view=active', '_self');</script>";   
            } else {
                echo "<script>alert('Update failed');</script>";
            }
        }
    }
}

?>
