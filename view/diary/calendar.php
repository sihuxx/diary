<?php
  $year = isset($_GET["year"]) ? $_GET["year"] : date("Y");
  $month = isset($_GET["month"]) ? $_GET["month"] : date("m");

  $date = "$year-$month-01";
  $time = strtotime($date);
  $start_week = date("w", $time);
  $total_day = date("t", $time);
  $total_week = ceil(($total_day + $start_week) / 7);

  $user = ss();

  $diarys = db::fetchAll("select d.*, e.title, e.color from diary d inner join emotion e on d.emotion = e.idx where d.date like '$year-$month-%' and d.user_idx = '$user->idx'")
?>
<main>
  <?php if($month == 1) { ?>
    <a href="?year=<?=$year - 1?>&month=12">&lt;</a>
  <?php } else { ?>
    <a href="?year=<?= $year ?>&month=<?=$month - 1?>">&lt;</a>
  <?php }?>
  <?= "$year 년 $month 월" ?>
  <?php if($month == 12) {?>
    <a href="?year=<?=$year + 1?>&month=1">&gt;</a>
  <?php } else {?>
    <a href="?year=<?=$year?>&month=<?=$month + 1?>">&gt;</a>
  <?php } ?>
</main>