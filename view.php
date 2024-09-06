<?php 
include('connection.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="table-responsive">
    <table class="table table-primary">
        <thead>

        <tr>

        <th scope="col">Name</th>
        <th scope="col">Math</th>
        <th scope="col">Englisg</th>
        <th scope="col">Urdu</th>
        <th scope="col">Biology</th>
        <th scope="col">Physics</th>
        <th scope="col">Totalmarks</th>
        <th scope="col">Obtainmark</th>
        <th scope="col">Percentage</th>
        <th scope="col">Grade</th>
        <th scope="col">Remark</th>
        </tr>
        </thead>
    <tbody>

        <?php
        $query=$pdo->query("select * from marksheet");
        $row=$query->fetchAll(PDO::FETCH_ASSOC);
        foreach($row as $value){
            ?>
        <tr class="">
            <td><?php echo $value['Name'];?></td>
            <td><?php echo $value['math']?></td>
            <td><?php echo $value['physics']?></td>
            <td><?php echo $value['biology']?></td>
            <td><?php echo $value['urdu']?></td>
            <td><?php echo $value['english']?></td>
            <td><?php echo $value['totalmarks']?></td>
            <td><?php echo $value['obtain']?></td>
            <td><?php echo $value['percentage']?></td>
            <td><?php echo $value['grade']?></td>
            <td><?php echo $value['remark']?></td>
            <td>
                <a href="update.php?id=<?php echo $value["id"]?>" class="btn btn-success">edit</a> </td>
            <td> <a href="?deleteId=<?php echo $value['id']?> "  class="btn btn-danger">delete</a> </td>
        </tr>
        <?php
        }
        if(isset($_GET['deleteId'])){
            $id=$_GET['deleteId'];
            $query=$pdo->prepare("delete from marksheet where id =:pid");
            $query ->bindparam("pid",$id);
            $query ->execute();
            echo "<script> alter('')</script>";
        }
        ?>
    </tbody>
</body>
</html>