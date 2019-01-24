<?php
$con = mysqli_connect(
  'localhost',
  'root',
  '011114',
  'iz*one');
settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($con, $_POST['id']),
  'name'=>mysqli_real_escape_string($con, $_POST['name']),
  'intro'=>mysqli_real_escape_string($con, $_POST['intro'])
);
$sql = "
  UPDATE topic
    SET
      name = '{$filtered['name']}',
      intro = '{$filtered['intro']}'
    WHERE
      id = {$filtered['id']}
";
$result = mysqli_query($con, $sql);
if($result === false){
  echo '저장 과정에서 문제 발생! 위즈원에게 문의바람.';
  error_log(mysqli_error($con));
} else {
  echo '저장 완료!!<br><a href="index.php">iz*one한테 돌아가기</a>';
}
?>