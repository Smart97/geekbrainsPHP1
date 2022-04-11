<?php
require_once 'config.php';
$userName = (string)$_POST['userName'];
$userEmail = (string)$_POST['userEmail'];
$text = (string)$_POST['text'];
$avatar = (string)'';

if($_FILES['avatar']) {
    $extention = explode('.',$_FILES['avatar']['name']);
    $extention = $extention[count($extention)-1];
    $fileTmpName = $_FILES['avatar']['tmp_name'];
    $name = md5_file($_FILES['avatar']['tmp_name']);
    //$name .='.'.$extention;

    if (!move_uploaded_file($fileTmpName, __DIR__ . '/data/userAvatars/' . $name .'.'. $extention)) {
        die('При записи изображения на диск произошла ошибка.');
      }
       
      echo 'Картинка успешно загружена!';
      $avatar = $name.'.'.$extention;

}

function sendFeedback($userName, $userEmail, $text, $avatar, $link)
{
    /* $link = mysqli_connect('localhost', 'root', '', 'geekbrains_php'); */
    if ($link) {
        $sql = "INSERT INTO `feedback` (`userName`, `userEmail`, `text`, `avatar`) VALUES ('$userName', '$userEmail', '$text', '$avatar');";
        if ($link->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $link->error;
          }
          mysqli_close($link);
    } else { //если соеденения нет
        die('mysql connection error: ' . mysqli_connect_error());
    }
}

function deleteFeedback($id, $link) 
{
    /* $link = mysqli_connect('localhost', 'root', '', 'geekbrains_php'); */
    if ($link) {
        $sql = "DELETE FROM `feedback` WHERE id=$id";
        if ($link->query($sql) === TRUE) {
            echo "Record deleted successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $link->error;
          }
          mysqli_close($link);
    } else { //если соеденения нет
        die('mysql connection error: ' . mysqli_connect_error());
    }
}
if($_POST && !$_POST['DELETE']) {
    sendFeedback($userName, $userEmail, $text, $avatar, $link);
} 

if($_POST['DELETE'])
    deleteFeedback($_POST['id'], $link);
?> 


<a href="<?= $_SERVER['HTTP_REFERER']?>">Вернуться</a>