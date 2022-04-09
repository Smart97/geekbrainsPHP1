<?php
// 
function dbUpload() // функция автоматической загрузки данных в базу из папки, без проверки на уникальность, для изначальной загрузки
{
    $images = scandir("images"); // сканирование папки с картинками
    $link = mysqli_connect('localhost', 'root', '', 'geekbrains_php'); //установка соеденения с базой
    if ($link) { //если соеденение есть
        for ($i = 2; $i < count($images); $i++) { // цикл загрузки, с пропуском служебных файлов
            $views = rand(0, 150); // случайное кол-во просмотров
            $sql = "INSERT INTO gallery (title, views) VALUES ('$images[$i]', '$views')"; //строка загрузки в базу
            if (mysqli_query($link, $sql)) { //загрузка
                echo "New record created successfully";
            } else { // если что-то пошло не так
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }
    } else { //если соеденения нет
        die('mysql connection error: ' . mysqli_connect_error());
    }
    mysqli_close($link); // закрываем соеденение
}
function getImages()
{
    $link = mysqli_connect('localhost', 'root', '', 'geekbrains_php'); //установка соеденения с базой
    if ($link) {
        $sql = "SELECT * FROM gallery ORDER BY views DESC";
        $res = mysqli_query($link, $sql);
        $images = [];
        while ($data = mysqli_fetch_assoc($res)) {
            array_push($images, ['title' => $data['title'], 'id' => $data['id'], 'views' => $data['views']]);
        }
    } else { //если соеденения нет
        die('mysql connection error: ' . mysqli_connect_error());
    }
    mysqli_close($link); // закрываем соеденение
    return $images;
}
function updateViews() {
    $link = mysqli_connect('localhost', 'root', '', 'geekbrains_php'); //установка соеденения с базой
    $id = $_GET['id'];

    if ($link) {
        $sql = "UPDATE gallery SET views=views+1 WHERE id=$id";
        mysqli_query($link, $sql);
    } else { //если соеденения нет
        die('mysql connection error: ' . mysqli_connect_error());
    }
    mysqli_close($link); // закрываем соеденение
}

//рендер на страницу

$images = getImages();
if ($_GET['title']) { 
    updateViews();
    ?>
    <img src="images/<?=$_GET['title'] ?>" alt="">
    <br>
    <p>Количество просмотров: <?=++$_GET['views']?></p>
    <a href="<?= $_SERVER['HTTP_REFERER']?>">Вернуться</a>
    <?php } else {

    foreach ($images as $image) { ?>
        <a href="?title=<?= $image['title'] ?>&views=<?= $image['views'] ?>&id=<?= $image['id'] ?>"><img src="images/<?= $image['title'] ?>" height="200" width="250"></a>
<?php }
}
