
<form action="" method="post">
    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <?php
                                $ip = getIPAddress();
                                $select_all="SELECT * FROM task_table WHERE ip_address='$ip'";
                                $select_all_result=mysqli_query($con, $select_all);
                                $select_all_result_count=mysqli_num_rows($select_all_result);
                                if($select_all_result_count>0){
                                    echo "<tr>
                                    <th>sl no</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    
                                </tr>
                            </thead>";
                            $number=0;
                            while($row_data=mysqli_fetch_assoc($select_all_result)){
                                $task = $row_data['task'];
                                $status = $row_data['status'];
                                $date = $row_data['date'];
                                $number++;
                                echo "<tbody class='text-center'>
                                <tr>
                                    <td>$number</td>
                                    <td>
                                        <label class=''>$task</label>
                                    </td>
                                    <td>$status</td>
                                    <td>$date</td>
                                    
                                </tr>
                            </tbody>";
                            }
                                }else{
                                    echo"<h2 class='text-danger'>No Task To Display</h2>";
                                }
                                ?>
                                
                            

                        </table>
                        </div>
                        </form>