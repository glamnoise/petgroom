{ events :[
<?php $nb = count($appointments); $i = 0; foreach ($appointments as $appointment): ++$i ?>
{
 
<?php $nb1 = count($appointment); $j = 0; foreach ($appointment as $key => $value): ++$j ?>
  "<?php echo $key ?>": <?php echo json_encode($value).($nb1 == $j ? '' : ',') ?>

<?php endforeach ?>
}<?php echo $nb == $i ? '' : ',' ?>

<?php endforeach ?>
]

}
