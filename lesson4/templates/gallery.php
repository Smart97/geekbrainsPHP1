<?php
$gallery = scandir('images');
print_r($gallery);
echo count($gallery);
$galleryBlock='';
for ($i = 2; $i < count($gallery);  $i++) { 
 $galleryBlock .=  "<a href='images/$gallery[$i]'><img src='images/$gallery[$i]' alt='$gallery[$i]' width='200'></a>";
 if(($i-1)%3 == 0) $galleryBlock .= '<br>'; // перенос строки после каждого 3го файла
}
?>



<div>
    <?= $galleryBlock; ?>
</div>