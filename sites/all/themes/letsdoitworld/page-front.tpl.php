<?php
include ("header.inc");
?>
<?php
if ($language -> language == 'ru') {
  include ("front_header_ru.inc");
} else {
  include ("front_header.inc");
}
?>
<div id="wrap-inner">
    <div id="wrap" class="content">
        <div class="three-cols">
            <div class="col">
                <?php echo $front_1
                ?>
            </div>
            <div class="col">
                <?php echo $front_2
                ?>
            </div>
            <div class="col">
                <?php echo $front_3
                ?>
            </div>
        </div>
    </div>
</div>
<?php include("footer.inc");
?>