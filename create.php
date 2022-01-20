<?php
    require 'config/db.php';
  if($_POST){
    $title=$_POST['name'];
    $desc=$_POST['des'];
 
    $sql="INSERT INTO users (title, description, created_at) VALUES (:title,:desc, now())";
    $stmt=$pdo->prepare($sql);
     $result= $stmt->execute(
        array(
            ':title'=> $title,
            ':desc'=> $desc
        )
     );
     if($result){
         echo "<script>alert('New todo is Add'),window.location.href='index.php?add=true';</script>";
     };
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Create</title>
  </head>
  <body>
   <div class="container">
       
      
       <h1>CREATE</h1>
       <form action="create.php" method="post">
           <div class="mb-3">
               <label for="name">Name</label>
               <input type="text" name="name" class="form-control" required>               
            </div>
            <div class="mb-3">
                <label for="name">Desc</label>
               <input type="text" name="des" class="form-control" required>
            </div>
            
               <input type="submit" value="Submit" class="btn btn-primary">
            </form>
            <br>
            <a href="index.php" class="btn btn-primary">BACK</a>

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