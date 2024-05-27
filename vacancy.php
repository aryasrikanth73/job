<?php
include('connection.php');

if (isset($_POST['submit'])) {
    $cname = $_POST['cname'];
    $role = $_POST['role'];
    $location = $_POST['location'];
    $platform = $_POST['platform'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $exp = $_POST['exp'];
    $date = $_POST['date'];
    $applystatus = $_POST['applystatus'];
    $finalstatus = $_POST['finalstatus'];

    if (mysqli_query($con, "INSERT INTO `vacancy`(cname, role, location, platform, mobile, email, exp, date, applystatus, finalstatus) VALUES('$cname', '$role', '$location', '$platform', '$mobile', '$email', '$exp', '$date', '$applystatus', '$finalstatus')")) {
        echo "<script>alert('Stored successfully');</script>";
        header('Location: vacancy.php');
        exit();
    } else {
        die("<script>alert('Not stored successfully');</script>" . mysqli_connect_error());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Vacancy Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this record?')) {
                window.location.href = 'delete.php?deleteid=' + id;
            }
        }
    </script>
</head>
<body>
    <div class="container-fluid">
        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#addVacancyModal">
            Add Vacancy
        </button>

        <!-- Add Vacancy Modal -->
        <div class="modal fade" id="addVacancyModal" tabindex="-1" aria-labelledby="addVacancyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addVacancyModalLabel">Add Vacancy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cname" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="cname" name="cname" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="role" class="form-label">Job Role</label>
                                    <input type="text" class="form-control" id="role" name="role" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="platform" class="form-label">Platform</label>
                                    <input type="text" class="form-control" id="platform" name="platform" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="mobile" class="form-label">Mobile Number</label>
                                    <input type="number" class="form-control" id="mobile" name="mobile" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exp" class="form-label">Experience</label>
                                    <input type="text" class="form-control" id="exp" name="exp" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="applystatus" class="form-label">Apply Status</label>
                                    <input type="text" class="form-control" id="applystatus" name="applystatus" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="finalstatus" class="form-label">Final Status</label>
                                    <input type="text" class="form-control" id="finalstatus" name="finalstatus" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-container table-responsive mt-4">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No.</th>
                        <th>Company Name</th>
                        <th>Job Role</th>
                        <th>Location</th>
                        <th>Platform</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Experience</th>
                        <th>Apply Status</th>
                        <th>Date</th>
                        <th>Final Status</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM `vacancy`");
                    if ($result) {
                        $sequence = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $cname = $row['cname'];
                            $role = $row['role'];
                            $location = $row['location'];
                            $platform = $row['platform'];
                            $mobile = $row['mobile'];
                            $email = $row['email'];
                            $exp = $row['exp'];
                            $date = $row['date'];
                            $applystatus = $row['applystatus'];
                            $finalstatus = $row['finalstatus'];
                            echo '
                            <tr>
                                <td>' . $sequence++ . '</td>
                                <td>' . $cname . '</td>
                                <td>' . $role . '</td>
                                <td>' . $location . '</td>
                                <td>' . $platform . '</td>
                                <td>' . $mobile . '</td>
                                <td>' . $email . '</td>
                                <td>' . $exp . '</td>
                                <td>' . $date . '</td>
                                <td>' . $applystatus . '</td>
                                <td>' . $finalstatus . '</td>
                                <td class="operations-btn">
                                    <button class="btn btn-info btn-sm"><a href="update.php?updateid='. $id .'">Edit</a></button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(' . $id . ')">Delete</button>
                                </td>
                            </tr>
                            ';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
