 <script type='text/javascript' src='/js/fullcalendar.js'></script>
 <link href="/css/fullcalendar.css" type="text/css"  rel="stylesheet"/>

  <script type='text/javascript' src='/js/calendar_init.js'></script>

<div id="main_calendar"></div>

<script type="text/javascript">
var init_event = [

<?php $nAppointment = $appointments->count(); $counter = 0 ?>
<?php foreach( $appointments as $appointment )  : ?>
	{
		<?php ++$counter; ?>
		"id" : <?php echo $appointment->getId() ?>,
		"title" : '<?php echo $appointment->getTitle() ?>',
                "start" : "<?php echo $appointment->getStart() ?>",
                "end" : "<?php echo $appointment->getEnd() ?>",
                "description" : '<?php echo $appointment->getInfo() ?>'
	        <?php echo ( $nAppointment == $counter ) ? "}" : "}," ?>
        <?php endforeach; ?>


];
</script>

<div id="event_wrapper" style="display:none">
<form id="eventform" action="" method="" accept-charset="utf-8" onsubmit="return false;">
	<input type="hidden" id="eventform_id" name="eventform_id" value="" />
	<p><label for="eventform_title">Title</label><input type="text" name="eventform_title" id="eventform_title" /></p>
	<p><label for="eventform_start">Start</label><input type="text" name="eventform_start" id="eventform_start" /></p>
	<p><label for="eventform_end">End</label><input type="text" name="eventform_end" id="eventform_end" /></p>
	<p><label for="eventform_isallday">All day event ?</label><input type="checkbox" name="eventform_isallday" id="eventform_isallday" /></p>
	<p><label for="eventform_description">Content</label></p>
	<p><textarea id="eventform_description" name="eventform_description" rows="5" cols="10"></textarea></p>
</form>
</div>

<style type="text/css">

#event_wrapper{ width:100%; height:100%; }
#event_wrapper p{ width:100%; margin:5px; }
#event_wrapper p label{ display:inline-block; padding:0 0 0 25px; width:100px;  }
#event_wrapper p input{ width:50%; }
#event_wrapper p input[type=checkbox] { width:auto !important; }
#event_wrapper p textarea{ width:85%; margin-left:25px; }
.ui-dialog{ -moz-box-shadow:0 0 10px black; -webkit-box-shadow:0 0 10px black;}


</style>



<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Start</th>
      <th>End</th>
      <th>Title</th>
      <th>Info</th>
      <th>Dog</th>
      <th>User</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($appointments as $appointment): ?>
    <tr>
      <td><a href="<?php echo url_for('appointment/edit?id='.$appointment->getId()) ?>"><?php echo $appointment->getId() ?></a></td>
      <td><?php echo $appointment->getStart() ?></td>
      <td><?php echo $appointment->getEnd() ?></td>
      <td><?php echo $appointment->getTitle() ?></td>
      <td><?php echo $appointment->getInfo() ?></td>
      <td><?php echo $appointment->getDogId() ?></td>
      <td><?php echo $appointment->getUserId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>






  <a href="<?php echo url_for('appointment/new') ?>">New</a>






