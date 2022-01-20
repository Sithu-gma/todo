<?php
    require 'config/db.php';
   
  if($_POST){
    $id=$_POST['id'];
    $title=$_POST['name'];
    $desc=$_POST['des'];
 
    $sql="UPDATE users SET title='$title', description='$desc', modified_at=now() WHERE id='$id'";
    $stmt=$pdo->prepare($sql);
     $result= $stmt->execute();
     if($result){
         echo "<script>alert('New todo is Edit'),window.location.href='index.php?update=true';</script>";
     };
  }else{
    $id=$_GET['id'];
    $stmt=$pdo->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(
        [':id'=>$id]
    );
    $row=$stmt->fetch();
  };
  ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit</title>
  </head>
  <body>
   <div class="container">
       
      
       <h1> Edit </h1>
       <form action="" method="post">
             <input type="hidden" name="id" value="<?=$row->id?>">
           <div class="mb-3">            

               <label for="name">Name</label>
               <input type="text" name="name" class="form-control" required value="<?=$row->title;?>">               
            </div>
            <div class="mb-3">
                <label for="name">Desc</label>
               <input type="text" name="des" class="form-control" required value="<?=$row->description;?>">
            </div>
            
               <input type="submit" value="Submit" class="btn btn-primary">
               <a href="index.php" class="btn btn-primary">BACK</a>
        </form>

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