<?php

$con = mysqli_connect('localhost','root','011114','iz*one');


$sql= "SELECT*FROM topic";
$result= mysqli_query($con,$sql);
$list='';
while ($row= mysqli_fetch_array($result)) {
 $list= $list."<li><a href=\"index.php?id={$row['id']}\">{$row['name']}</a></li>";
}



$article = array(
    'name' =>'IZ*ONE me!',
    'intro'=>'Everyone pays attention to the moment we become one.' 
);

$update_link = '';
$delete_link = '';
if(isset($_GET['id'])){

    $filtered_id = mysqli_real_escape_string($con, $_GET['id']);

    $sql="SELECT*FROM topic WHERE id={$filtered_id}";
    $result= mysqli_query($con,$sql);
    $row= mysqli_fetch_array($result);
    $article['name'] = htmlspecialchars($row['name']);
    $article['intro'] = htmlspecialchars($row['intro']);

    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';

    $delete_link = '
    <form action="delete.php" method="post">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="submit" value="delete">
    </form>
  ';
}


?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>IZ*one</title>
    
</head>
<body>
    <h1><a href="index.php">IZ*ONE</a></h1>
    <ol>
       
      
      <?=$list?> 
       
    
    </ol>
    <a href="create.php">create</a>
    <?=$update_link?>
    <?=$delete_link?>
    <h2><?=$article['name'] ?></h2>
   <?=$article['intro']?>
</body>
</html>