<?php
                                $ip = getIPAddress();
                                $complete_query="SELECT * FROM task_table WHERE status='completed' AND ip_address='$ip'";
                                $complete_query_result=mysqli_query($con, $complete_query);
                                $complete_query_result_count=mysqli_num_rows($complete_query_result);
                                ?>
<form action="" method="post">
<div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <?php if($complete_query_result_count>0): ?>
                            <thead>
                                <tr>
                                    <th>sl no</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                    <th>date</th>
                                    <th>Deleted</th>
                                </tr>
                            </thead>
                            <?php
                            $number=0;
                            while($row_data = mysqli_fetch_array($complete_query_result)):
                                $task_id = $row_data['task_id'];
                                $date = $row_data['date'];
                                $task = $row_data['task'];
                                $status = $row_data['status'];
                                $number++;
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $number ?></td>
                                    <td>
                                        <label><?php echo $task ?></label>
                                        
                                    </td>
                                    <td><?php echo $status ?></td>
                                    <td><?php echo $date ?></td>
                                    
                                    <!-- <td>
                                        <input type="submit" class="btn btn-info" value="update" name="update">
                                    </td> -->
                                    
                                    <td><a href="index.php?deleted_task=<?php echo $task_id; ?>" class="text-dark"><i class="uil uil-trash"></i></a></td>
                                    
                                </tr>
                            </tbody>
                            <?php endwhile; ?>
                            <?php else: ?>
                <h2 class='text-danger'>No Active Task To Display</h2>
            <?php endif; ?>
                        </table>
                        </div>
                        </form>

                        <?php
                            if(isset($_GET['deleted_task'])){
                                $deleted_id=$_GET['deleted_task'];
                                $ip=getIPAddress();
                                $delete_sql="DELETE FROM task_table WHERE task_id=$deleted_id AND ip_address='$ip'";
                                $delete_sql_result=mysqli_query($con, $delete_sql);
                                if($delete_sql_result){
                                    echo "<script>alert('Deleted successfully');</script>";
                                    echo "<script>window.open('index.php?view=completed', '_self');</script>";   
                                } else {
                                    echo "<script>alert('Delete failed');</script>";
                                }

                            }
                        ?>