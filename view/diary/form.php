<?php
if (ss()) {
  $user = ss();
  $diarys = db::fetchAll("select * from diary where user_idx = '$user->idx'");
}
$year = date("Y");
$month = date("m");
$day = date("d");
$emotion = db::fetchAll("select * from emotion");

?>
<main class="diary-box">
  <?php if (ss()) { ?>
  <form action="/diaryAdd" method="post" enctype="multipart/form-data">
      <h3><?=$year?>년 <?=$month?>월 <?=$day?>일</h3>
      <input type="file" name="file">
      <textarea name="text" placeholder="내용을 입력해주세요"></textarea>
      <select name="emotion">
        <?php foreach($emotion as $emo) { ?>
          <option value="<?=$emo->idx?>"><?=$emo->title?></option>
        <?php } ?>
      </select>
      <button class="btn">일기 작성</button>
    </form>
    <?php } ?>
  </div>
</main>