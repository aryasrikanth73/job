<?php
include('connection.php');
$id =  $_GET['updateid'];
$result = mysqli_query($con, "SELECT * FROM `vacancy` WHERE id=$id");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $ccname = $row['cname'];
    $crole = $row['role'];
    $clocation = $row['location'];
    $cplatform = $row['platform'];
    $cmobile = $row['mobile'];
    $cemail = $row['email'];
    $cexp = $row['exp'];
    $cdate = $row['date'];
    $capplystatus = $row['applystatus'];
    $cfinalstatus = $row['finalstatus'];
}
if(isset($_POST['submit'])){
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

    if(mysqli_query($con, "UPDATE `vacancy` SET cname='$cname', role='$role', location='$location', platform='$platform', mobile='$mobile', email='$email', exp='$exp', date='$date', applystatus='$applystatus', finalstatus='$finalstatus' WHERE id=$id")){
        echo "<script>alert('Stored successfully');</script>";
        header('Location: vacancy.php');
        exit();
    }else{
        die("<script>alert('Not stored successfully');</script>". mysqli_connect_error());
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
        <form method="post" enctype="multipart/form-data" class="mt-4">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cname" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="cname" name="cname" required value="<?php echo $ccname ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="role" class="form-label">Job Role</label>
                    <input type="text" class="form-control" id="role" name="role" required value="<?php echo $crole ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" required value="<?php echo $clocation ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="platform" class="form-label">Platform</label>
                    <input type="text" class="form-control" id="platform" name="platform" required value="<?php echo $cplatform ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="number" class="form-control" id="mobile" name="mobile" required value="<?php echo $cmobile ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="<?php echo $cemail ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="exp" class="form-label">Experience</label>
                    <input type="text" class="form-control" id="exp" name="exp" required value="<?php echo $cexp ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required value="<?php echo $cdate ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="applystatus" class="form-label">Apply Status</label>
                    <input type="text" class="form-control" id="applystatus" name="applystatus" required value="<?php echo $capplystatus ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="finalstatus" class="form-label">Final Status</label>
                    <input type="text" class="form-control" id="finalstatus" name="finalstatus" required value="<?php echo $cfinalstatus ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
        </form>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
