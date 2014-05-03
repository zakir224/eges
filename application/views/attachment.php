<html>
<body>
    <?php for($i=0;$i<count($images);$i++) { if($images[$i]) {?>
    <img src="<?php echo base_url(''); ?>/images/<?php echo $id."/".$images[$i];?>" width="800" alt="image not found">
     <p><?php echo $images[$i];?></p>
    <?php }} ?>
</body>
</html>