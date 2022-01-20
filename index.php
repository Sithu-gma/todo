<?php
  require 'config/db.php';
  $sql="SELECT * FROM users";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();
  $result=$stmt->fetchAll();
   $i=1;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   <div class="container">
       <h1>TO DO HOMPAGE</h1>
       <?php if(isset($_GET['update'])): ?>           
        <div class="alert alert-success" role="alert">
          UPDATED   One Row.......... !
        </div>
       <?php endif; ?>

       <?php if(isset($_GET['add'])): ?>           
        <div class="alert alert-primary" role="alert">
          ADDED  One Row.......... !
        </div>
       <?php endif; ?>

       <?php if(isset($_GET['del'])): ?>           
        <div class="alert alert-warning" role="alert">
          Deleted One Row !
        </div>
       <?php endif; ?>
       <a href="create.php" class="btn btn-primary">Create New</a>
   <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php forEach($result as $row) :?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$row->title ?></td>
                    <td><?=$row->description?></td>
                    <td><?=date('Y-m-d',strtotime($row->created_at))?></td>
                <td>
                    <a href="edit.php?id=<?=$row->id?>" class="btn btn-primary">Edit</a>
                    <a href="del.php?id=<?=$row->id?>" class="btn btn-danger">DEL</a>
                </td>
               
            </tr>

            <?php 
             $i++;
            endforeach;
           
            ?>
           
        </tbody>
        </table>
   </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>