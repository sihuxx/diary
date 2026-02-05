<?php
$idx = $_POST["idx"] ?? false;
$emo = null;
if ($idx) {
  $emo = db::fetch("select * from emotion where idx = '$idx'");
}
$isEdit = empty(!$emo);
$url = $isEdit ? "/emoUpdate" : "emoInsert";
$text = $isEdit ? "수정" : "추가";
?>

<main class="form-box">
  <form action="<?= $url ?>" method="post">
   <?php if($idx) {?>
     <input type="hidden" name="idx" value="<?=$emo->idx?>">
   <?php } ?>
    <h3>감정 <?=$text?></h3>
    <div>
      <label for="title">이름</label>
      <input type="text" id="title" name="title" placeholder="감정의 이름을 적어주세요" value="<?= $isEdit ? $emo->title : '' ?>">
    </div>
    <div>
      <label style="<?=$isEdit ? "background-color:<?=$emo->color?>" : ""?>" for="color">색상</label>
      <input type="color" id="color" name="color" placeholder="감정의 이름을 적어주세요" value="<?= $isEdit ? $emo->color : '' ?>">
    </div>
    <button class="btn"><?=$text?></button>
  </form>
</main>