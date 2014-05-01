<html>


<body>


    <?php print_r($images);
    for($i=0;$i<count($images);$i++) { ?>
    <img src="<?php echo base_url(''); ?>/images/201404001/<?php echo $images[$i];?>" width="800">
    <?php } ?>
</form>
</body>
</html>