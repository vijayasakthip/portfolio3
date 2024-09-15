<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Portfolio</title>
</head>
<body>
    <?php
    if(isset($_GET["id"])){
        $id=$_GET["id"];
       
    }
    else{
        echo'<div class="alert alert-danger"> task not provided </div>';
    }
    $sql="SELECT * FROM task where id=$id";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            ?>
            <h1>Edit Task</h1>
            <hr>
            <form action="update.php" method="post" style="width: 400px; margin-left: auto; margin-right: auto;">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <label class="form-label" for="task">Task Name:</label>
    <input class="form-control" type="text" name="taskname" id="task" value="<?php echo $row['taskname'] ?>">
    <br>
    <label class="form-label" for="assignto">Assigned to:</label>
    <input class="form-control" type="text" name="assignto" id="assignto" value="<?php echo $row['assignedto'] ?>">
    <br>
    <label class="form-label" for="completed">Status:</label>
    <select name="completed" id="completed" class="form-control">
        <option value="completed" <?php echo $row['status'] === 'completed' ? 'selected' : ''; ?>>Completed</option>
        <option value="incompleted" <?php echo $row['status'] === 'incompleted' ? 'selected' : ''; ?>>Incompleted</option>
    </select>
    <br>
    <input type="submit" class="btn btn-success" name="submit" value="Update">
</form>

            <?php
        }
    }

    ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>