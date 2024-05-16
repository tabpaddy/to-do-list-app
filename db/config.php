<?php
$con=mysqli_connect('localhost', 'root', '', 'to_do_list_app');
if (!$con) {
    # code...
    die(mysqli_error($con));
}

?>