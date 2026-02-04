<?php
extract($_POST);
$diary = db::fetch("select diary.*, emotion.title, emotion.color from diary inner join emotion on diary.emotion = emotion.idx where diary.idx = '$idx'");
?>

<main class="detail-box">
  <a href="/">< 돌아가기</a>
  <div>
    <?php if ($diary->img) { ?>
      <img src="<?= $diary->img ?>" alt="<?= $diary->date ?>">
    <?php } ?>
    <div>
      <div class="diary-date"><?= $diary->date ?></div>
      <div class="diary-emotion" style="background-color:#<?= $diary->color ?>"><?= $diary->title ?></div>
    </div>
    <div class="diary-text"><?= $diary->text ?></div>
    <form method="post" class="btn-box">
      <input type="hidden" name="idx" value="<?= $diary->idx ?>">
      <button formaction="/diaryEdit">수정</button>
      <button formaction="/diaryDelete">삭제</button>
    </form>
  </div>
</main>