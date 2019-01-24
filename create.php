<?php

$con = mysqli_connect('localhost','root','011114','iz*one');


$sql= "SELECT*FROM topic";
$result= mysqli_query($con,$sql);
$list='';
while ($row= mysqli_fetch_array($result)) {
    $escaped_name = htmlspecialchars($row['name']);
 $list= $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_name}</a></li>";
}



$article = array(
    'name' =>'IZ*ONE me!',
    'intro'=>'Everyone pays attention to the moment we become one.' 
);

if(isset($_GET['id'])){
    
    $filtered_id = mysqli_real_escape_string($con, $_GET['id']);
    
    $sql="SELECT*FROM topic WHERE id={$_GET['id']}";
    $result= mysqli_query($con,$sql);
    $row= mysqli_fetch_array($result);
    $article['name'] = $row['name'] ;
    $article['intro'] = $row['intro'];
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

    <form action="create_back.php" method="POST">
      <p><input type="text"name="name"placeholder="Name"></p>
      <p><textarea name="intro" placeholder="Introduce" cols="30" rows="10"></textarea></p>
      <p><input type="submit"value="IZ*ONE!"></p>
    </form>
</body>
</html>