<?php
$idx = $_POST["idx"] ?? false;
$diary = null;
if ($idx) {
  $diary = db::fetch("select d.*, e.title, e.color from diary d inner join emotion e on d.emotion = e.idx where d.idx = '$idx'");
}
$year = date("Y");
$month = date("m");
$day = date("d");

$isEdit = empty(!$diary);
$url = $isEdit ? "/diaryUpdate" : "/diaryInsert";

$emotion = db::fetchAll("select * from emotion");
?>

<main class="diary-box">
  <form action="<?= $url ?>" method="post" enctype="multipart/form-data">
    <h3>
      <?php if ($isEdit) { ?>
      <input required type="hidden" value="<?=$diary->idx?>" name="idx">
        <?= $diary->date ?>
      <?php } else { ?>
        <?= $year ?>-<?= $month ?>-<?= $day ?>
      <?php } ?>
    </h3>
    <?php if ($isEdit && $diary->img) { ?>
      <img src="<?= $diary->img ?>" alt="<?= $diary->date ?>">
    <?php } ?>
    <input type="file" name="file">
    <textarea name="text" placeholder="내용을 입력해주세요" required>
      <?= $isEdit ? $diary->text : '' ?>
    </textarea>
    <select name="emotion" required>
      <?php foreach ($emotion as $emo) { ?>
        <?php if($diary) { ?>
        <option <?= $diary->title == $emo->title ? "selected" : "" ?> value="<?= $emo->idx ?>"><?= $emo->title ?></option>
        <?php } else { ?>
        <option value="<?= $emo->idx ?>"><?= $emo->title ?></option>
        <?php } ?>
      <?php } ?>
    </select>
    <button class="btn">일기 작성</button>
  </form>
  </div>
</main>