<?php
if (ss()) {
  $user = ss();
  // $diarys = db::fetchAll("select * from diary where user_idx = '$user->idx'");
  $diarys = db::fetchAll("select diary.* , emotion.title from diary inner join emotion on diary.emotion = emotion.idx");
  }
?>

<main class="index-box">
  <h3>일기 조회</h3>
  <div class="diarys">
    <?php if (ss()) { ?>
      <?php foreach ($diarys as $diary) { ?>
        <div class="diary">
          <div class="diary-img">
            <?php if ($diary->img) { ?>
              <img src="<?= $diary->img ?>" alt="<?= $diary->date ?>">
            <?php } ?>
          </div>
          <div class="diary-content">
            <div class="diary-text">
              <?= $diary->text ?>
            </div>
            <div class="diary-date">
              <?= $diary->date ?>
            </div>
            <div class="diary-emotion">
              <?= $diary->title ?>
            </div>
            <a href="/diary/<?=$diary->idx?>">자세히 보기</a>
          </div>
        </div>
      <?php } ?>
    <?php } else { ?>
      <p>로그인 후 이용해주세요</p>
      <a href="login" class="btn">로그인 하러가기</a>
    <?php } ?>
</main>