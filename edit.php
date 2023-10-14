<?php
include "db_conn.php";
$id=$_GET['id'];


if (isset($_POST["submit"])) {
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql ="UPDATE `persons` SET `first_name`='$first_name',`email`='$email',`gender`='$gender' WHERE id=$id";

    $result = $con->query($sql);

    if ($result) {
        header("Location: index.php?msg=Data update successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP CRUD Application</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style='background-color: #00ff5573;'>
        PHp Completle CRUD Application
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any information </p>
        </div>
        <?php
        $sql="SELECT * FROM persons WHERE id=$id LIMIT 1";
        $result =$con->query($sql);
        $row= mysqli_fetch_assoc($result);


        ?>
        <div class="conatainer d-flex justify-content-center">
            <form action="" method="post" style="width: 30vw; min-width: 300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name"
                        value="<?php echo $row['first_name'] ?>">
                    </div>
                </div>

                <div class="col">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" 
                    value="<?php echo $row['email'] ?>">
                </div>

                <div class="form-group mb-3">
                    <label>Gender:</label> &nbsp;
                    <input type="radio" class="form-checked-input" name="gender" id="male" value="male"
                    <?php echo ($row['gender']=='male')? "checked":"";?>>
                    <label for="male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-checked-input" name="gender" id="famale"
                     value="famale" <?php echo ($row['gender']=='female')? "checked":"";?>>
                    <label for="famale" class="form-input-label">Famale</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>