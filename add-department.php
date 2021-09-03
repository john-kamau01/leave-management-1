<?php
require 'top.inc.php';

//Edit Department
$department = '';
$id = '';

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    //get results
    $sql = "SELECT * FROM department WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $department = $row['department_name'];
}

//Add department
if(isset($_POST["department"])){
    $department = mysqli_real_escape_string($conn, $_POST['department']);

    if($id>0){
        $sql = "UPDATE department SET department_name='$department' WHERE id='$id'";
    } else{
        $sql = "INSERT INTO department (department_name) VALUES ('$department')";
    }

    mysqli_query($conn, $sql);
    header('location:index.php');
    die();
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Department</strong><small> Form</small></div>
                    <div class="card-body card-block">
                        <form method="post">
                            <div class="form-group">
                            <label for="department" class=" form-control-label">Department Name</label>
                            <input type="text" value="<?php echo $department?>" name="department" placeholder="Enter department name" class="form-control" required></div>
                            
                            <button  type="submit" class="btn btn-lg btn-info btn-block">
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