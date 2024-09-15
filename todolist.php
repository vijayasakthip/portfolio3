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
    <div class="container mt-3">
    <a href="project.html">
        <button class="btn btn-light mb-3">
            <img width="25" height="25" src="https://img.icons8.com/ios/50/circled-left--v1.png" alt="Go back icon"/> Go back
        </button>
    </a>
    <h1>To-Do list</h1>
    <hr>
    <a href="addtask.html">
    <button class="btn btn-light">Add Task
    </button>
    </a>
    <table class="table table-striped">
        <tr>
            <th>SNO</th>
            <th>TASK NAME</th>
            <th>ASSIGNED TO</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
        
           
            <?php
            $sql="SELECT * FROM task where action='0'";
            $result=mysqli_query($conn,$sql);
            
            if(mysqli_num_rows($result)>0){
                $i=1;
                while($row=mysqli_fetch_assoc($result)){
                    $status=($row["status"]==="completed")?"text-success":"text-danger";
                    ?>
                    <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row["taskname"]; ?></td>
                    <td><?php echo $row["assignedto"]; ?></td>
                    <td class="<?php echo $status; ?>"><?php echo $row["status"]; ?></td>
                    <td>
                    <a href="edit.php?id=<?php echo $row["id"] ?>"><div class="edit btn btn-info">EDIT</div></a>
                    <a href="delete.php?id=<?php echo $row["id"] ?>"><div class="delete btn btn-danger" id="delete">DELETE</div></a>
                    </td>
                    </tr>
                   <?php
                    $i++; }
                }
            ?>
           
           
        
    </table>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>