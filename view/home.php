<?php
if (ss()) {
  $user = ss();
  $diarys = db::fetchAll("select diary.* , emotion.title, emotion.color from diary inner join emotion on diary.emotion = emotion.idx where diary.user_idx = '$user->idx'");
}
?>

<main class="index-box">
  <?php if (!$user) { ?>
    <div>
      <p>로그인 후 이용해주세요</p>
      <a href="login" class="btn">로그인 하러가기</a>
    </div>
  <?php } else if ($user->admin == 1) { ?>
  <img src="/img/logo.png" alt="">
  <p>일기즈앙</p>
  <?php } else { ?>
      <h3>일기 조회</h3>
      <div class="diarys">
      <?php foreach ($diarys as $diary) { ?>
          <div class="diary">
            <form action="/diaryDelete" method="post">
              <input type="hidden" name="idx" value="<?= $diary->idx ?>">
              <button class="del-btn">삭제</button>
            </form>
          <?php if ($diary->img) { ?>
              <div class="diary-img">
                <img src="<?= $diary->img ?>" alt="<?= $diary->date ?>">
              </div>
          <?php } ?>
            <div class="diary-content">
              <div class="diary-text">
              <?= $diary->text ?>
              </div>
              <div class="diary-date">
              <?= $diary->date ?>
              </div>
              <div class="diary-emotion" style="background-color: #<?= $diary->color ?>;">
              <?= $diary->title ?>
              </div>
              <form action="/diaryDetail" method="post">
                <input type="hidden" name="idx" value="<?=$diary->idx?>">
                <button>자세히 보기</button>
              </form>
            </div>
          </div>
      <?php } ?>
      </div>
  <?php } ?>
</main>