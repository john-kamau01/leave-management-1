<?php
require 'top.inc.php';

//Edit Leave
$name = '';
$email = '';
$mobile = '';
$password = '';
$department_id = '';
$address = '';
$birthday = '';
$id = '';

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $department_id = $row['department_id'];
    $address = $row['address'];
    $birthday = $row['birthday'];
}

//Add leave type
if(isset($_POST["submit"])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $department_id = mysqli_real_escape_string($conn, $_POST['department_id']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);

    if($id>0){
        $sql = "UPDATE employee SET name='$name', email='$email', mobile='$mobile', password='$password', department_id='$department_id', address='$address', birthday='$birthday' WHERE id='$id'";
    } else{
        $sql = "INSERT INTO employee (name, email, mobile, password, department_id, address, birthday, role) VALUES ('$name', '$email', '$mobile', '$password', '$department_id', '$address', '$birthday', '2')";
    }

    mysqli_query($conn, $sql);
    header('location:employee.php');
    die();
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Add Employee</strong><small> Form</small></div>
                    <div class="card-body card-block">
                        <form method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="name" class="form-control-label">Name</label>
                                <input type="text" value="<?php echo $name?>" name="name" placeholder="Enter employee's name" class="form-control" autocomplete="false" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input type="email" value="<?php echo $email?>" name="email" placeholder="Enter employee's email" class="form-control" autocomplete="false" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="form-control-label">Mobile</label>
                                <input type="text" value="<?php echo $mobile?>" name="mobile" placeholder="Enter employee's mobile" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Password</label>
                                <input type="password" name="password" placeholder="Enter employee's password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="department_id" class="form-control-label">Department</label>
                                <select name="department_id" class="form-control" required>
                                    <option value="">Select Department</option>
                                    <?php
                                    $sql = "SELECT * FROM department";
                                    $res = mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_assoc($res)){
                                        echo "<option value=".$row['id'].">". $row['department_name'] ."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-control-label">Address</label>
                                <input type="text" value="<?php echo $address?>" name="address" placeholder="Enter employee's address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="birthday" class="form-control-label">Birthday</label>
                                <input type="date" value="<?php echo $birthday?>" name="birthday" placeholder="Enter employee's birthday" class="form-control" required>
                            </div>
                            
                            <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                            <span id="payment-button-amount">Submit</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require 'footer.inc.php';
?>