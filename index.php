<?php
include("./db/config.php");
include("./function/common_function.php");

if(isset($_POST['submit'])) {
    $insert_task = $_POST['task'];
    $ip_address = getIPAddress();
    $status = 'active';

    $sql = "INSERT INTO task_table (ip_address, task, date, status) VALUES ('$ip_address', '$insert_task', NOW(), '$status')";
    $result = mysqli_query($con, $sql);
    if($result) {
        echo "<script>alert('Inserted successfully');</script>";
        echo "<script>window.open('index.php?view=all', '_self');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do app</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <style>
        @media (max-width: 767.98px) {
            .card {
                width: 100vw;
                height: 100vh;
                margin: 0;
                border: none;
                border-radius: 0;
            }
            .card-body {
                height: 100%;
                padding: 1rem;
                display: flex;
                flex-direction: column;
                justify-content: center;
                object-fit: contain;
                overflow-x: hidden;
            }
            .gradient-custom{
                background: none;
                overflow-x: hidden;
            }
        }
    </style>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card">
                        <div class="card-body p-5">
                            <h3 class="text-success mt-2 mb-4 text-center">My to do list app</h3>
                            <form action="index.php" method="post" class="d-flex justify-content-center align-items-center mb-4">
                                <div data-mdb-input-init class="form-outline flex-fill">
                                    <label class="form-label" for="form2">New task...</label>
                                    <input type="text" id="form2" class="form-control" name="task"/>  
                                </div>
                                <div>
                                    <input type="submit" class="btn btn-info ms-2 mt-4" name="submit" value="Add">
                                </div>
                            </form>
                            <ul class="nav nav-tabs mb-4 pb-2">
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="index.php?view=all">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="index.php?view=active">Active</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="index.php?view=completed">Completed</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <?php
                                if (isset($_GET['view'])) {
                                    $view = $_GET['view'];
                                    if ($view == 'all') {
                                        include("include/all.php");
                                    } elseif ($view == 'active') {
                                        include("include/active.php");
                                    } elseif ($view == 'completed') {
                                        include("include/completed.php");
                                    }
                                }
                                if(isset($_GET['update_task'])) {
                                    include("include/active.php");
                                }
                                if(isset($_GET['delete_task'])) {
                                    include("include/active.php");
                                }
                                if(isset($_GET['deleted_task'])) {
                                    include("include/completed.php");
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
