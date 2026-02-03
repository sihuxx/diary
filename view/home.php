<?php
if (ss()) {
  $user = ss();
  $diarys = db::fetchAll("select * from diary where user_idx = '$user->idx'");
}

?>
<main>
  <?php if (ss()) { ?>
    <form action="/diaryAdd" method="post" enctype="multipart/form-data">
      <input type="file" name="file">
      <textarea name="text" placeholder="내용을 입력해주세요"></textarea>
      <select name="emotion">
        <option value="기쁨">기쁨</option>
        <option value="슬픔">슬픔</option>
        <option value="화남">화남</option>
        <option value="피곤함">피곤함</option>
      </select>
      <button>일기 작성</button>
    </form>
    <div class="diarys">
      <?php foreach ($diarys as $diary) { ?>
        <div class="diary">
          <div class="diary-img">
            <?php if($diary->img) { ?>
              <img src="<?= $diary->img ?>" alt="<?= $diary->date ?>">
            <?php } ?>
          </div>
          <div class="diary-text"><?= $diary->text ?></div>
          <div class="diary-date"><?= $diary->date ?></div>
        </div>
      <?php } ?>
    <?php } ?>
  </div>
</main>