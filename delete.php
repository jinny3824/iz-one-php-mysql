<?php
$con = mysqli_connect(
  'localhost',
  'root',
  '011114',
  'iz*one');
settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($con, $_POST['id'])
);
$sql = "
  DELETE
    FROM topic
    WHERE id = {$filtered['id']}
";
$result = mysqli_query($con, $sql);
if($result === false){
  echo '저장 과정에서 문제 발생! 위즈원에게 문의바람.';
  error_log(mysqli_error($con));
} else {
  echo '삭제 성공! <br><a href="index.php">iz*one한테 돌아가기</a>';
}
?>