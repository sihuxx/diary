<?php
extract($_POST);
$diary = db::fetch("select diary.*, emotion.title, emotion.color from diary inner join emotion on diary.emotion = emotion.idx where diary.idx = '$idx'");
?>

<main class="detail-box">
  <div><?=$diary->text?></div>
  <div><?=$diary->date?></div>
  <div><?=$diary->title?></div>
</main>