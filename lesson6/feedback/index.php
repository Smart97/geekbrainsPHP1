<?php
require_once 'config.php';
function getFeedback($link)
{
    /* $link = mysqli_connect('localhost', 'root', '', 'geekbrains_php'); */
    if ($link) {
        $sql = 'SELECT * FROM feedback';
        $res = mysqli_query($link, $sql);

        $feedback = [];
        while ($data = mysqli_fetch_assoc($res)) {
            array_push($feedback, $data);
        }
        mysqli_close($link);
        return $feedback;
    } else { //если соеденения нет
        die('mysql connection error: ' . mysqli_connect_error());
    }
}
$feedback = getFeedback($link);
//print_r($feedback);

foreach ($feedback as $item) {
    if ($item['avatar']) {
        $avatar = $item['avatar'];
    } else {
        $avatar = 'default.jpg';
    }
?>
    <div class="feedback">
        <img src="data/userAvatars/<?= $avatar ?>" width="50" height="50" alt="">
        <p><?= $item['userName'] ?></p>
        <p><?= $item['text'] ?></p>
        <p><?= $item['time'] ?></p>
        <form action="server.php" method="post">
            <input type="hidden" name="id" value="<?=$item['id']?>">
            <input type="hidden" name="DELETE" value="1">
            <button type="submit">delete</button>
        </form>
    </div>
<?
}
?>

<form action="server.php" method="POST" enctype="multipart/form-data" >
    <h2>Оставьте ваш отзыв здесь!</h2>
    <p>Ваше имя</p>
    <input type="text" name="userName">
    <p>Ваша почта</p>
    <input type="email" name="userEmail">
    <p>отзыв</p>
    <input type="text" name="text">
    <p>Ваш аватар</p>
    <input name="avatar" type="file"><br>
    <button type="submit">ок!</button>
</form>