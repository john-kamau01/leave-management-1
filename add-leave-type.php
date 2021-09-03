<?php
require 'top.inc.php';

//Edit Leave
$leave_type = '';
$id = '';

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    //get results
    $sql = "SELECT * FROM leave_type WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $leave_type = $row['leave_type'];
}

//Add leave type
if(isset($_POST["leave_type"])){
    $leave_type = mysqli_real_escape_string($conn, $_POST['leave_type']);

    if($id>0){
        $sql = "UPDATE leave_type SET leave_type='$leave_type' WHERE id='$id'";
    } else{
        $sql = "INSERT INTO leave_type (leave_type) VALUES ('$leave_type')";
    }

    mysqli_query($conn, $sql);
    header('location:leave-type.php');
    die();
}

?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Leave Type</strong><small> Form</small></div>
                    <div class="card-body card-block">
                        <form method="post">
                            <div class="form-group">
                            <label for="leave_type" class="form-control-label">Leave Type</label>
                            <input type="text" value="<?php echo $leave_type?>" name="leave_type" placeholder="Enter leave type" class="form-control" required></div>
                            
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