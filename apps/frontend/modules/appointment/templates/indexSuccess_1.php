 <script type='text/javascript' src='/js/jquery.weekcalendar.js'></script>
 <link href="/css/jquery.weekcalendar.css" type="text/css"  rel="stylesheet"/>
<?php use_helper('date') ?>
<?php 
    $json = '{';
    $json .= ' events: [';

    foreach ($appointments as $appointment):
        $json .= ' { "id":'. $appointment->getId() .', "start":"'. format_datetime($appointment->getStart(),'yyyy-MM-ddTHH:mm:ss.000+10:00') . '" , "end":"'. format_datetime($appointment->getEnd(),'yyyy-MM-ddTHH:mm:ss.000+10:00') . '", "title":"'. $appointment->getTitle() .'" },';
    endforeach;

    $json .= '] };';

?>
<script type='text/javascript'>

 	var eventi = <?php echo $json; ?>;
        var eventData = eventi;


	$(document).ready(function() {

		$('#calendar').weekCalendar({
			timeslotsPerHour: 4,
                        allowCalEventOverlap : true,
                        overlapEventsSeparate: true,
                        firstDayOfWeek : 1,
                        businessHours :{start: 8, end: 20, limitDisplay: true },
                        daysToShow : 7,

			height: function($calendar){
				return $(window).height() - $("h1").outerHeight();
			},
			eventRender : function(calEvent, $event) {
				if(calEvent.end.getTime() < new Date().getTime()) {
					$event.css("backgroundColor", "#aaa");
					$event.find(".time").css({"backgroundColor": "#999", "border":"1px solid #888"});
				}
			},
			eventNew : function(calEvent, $event) {
				displayMessage("<strong>Added event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
				calendar_new_entry(calEvent,$event); 



			},
			eventDrop : function(calEvent, $event) {
				displayMessage("<strong>Moved Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			eventResize : function(calEvent, $event) {
				displayMessage("<strong>Resized Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			eventClick : function(calEvent, $event) {
				displayMessage("<strong>Clicked Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			eventMouseover : function(calEvent, $event) {
				displayMessage("<strong>Mouseover Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			eventMouseout : function(calEvent, $event) {
				displayMessage("<strong>Mouseout Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			noEvents : function() {
				displayMessage("There are no events for this week");
			},
			data:eventData
		});


               

		$("<div id=\"message\" class=\"ui-corner-all\"></div>").prependTo($("body"));



               function calendar_new_entry(calEvent,$event){
	var ds=calEvent.start, df=calEvent.end;
	var recurbox='<select id="calendar_new_entry_form_recurring"><option value="0">non-recurring</option><option value="1">Daily</option><option value="7">Weekly</option></select>';
	$('<div id="calendar_new_entry_form" title="New Calendar Entry">event name<br /><input value="new event" id="calendar_new_entry_form_title" /><br />body text<br /><textarea style="width:400px;height:200px" id="calendar_new_entry_form_body">event description</textarea>'+recurbox+'</div>')
		.appendTo($('body'));
	$('#calendar_new_entry_form_recurring')
		.change(calendar_new_get_recurring_end);
	$("#calendar_new_entry_form").dialog({
		bgiframe: true,
		autoOpen: false,
		height: 440,
		width: 450,
		modal: true,
		buttons: {
			'Save': function() {
				var $this=$(this);
				$.getJSON('./calendar.php?action=save&id=0&start='+ds.getTime()/1000+'&end='+df.getTime()/1000,{
						'body':$('#calendar_new_entry_form_body').val(),
						'title':$('#calendar_new_entry_form_title').val(),
						'recurring':$('#calendar_new_entry_form_recurring').val(),
						'recurring_end':$('#calendar_new_recurring_end').val()
					},
					function(ret){
						$this.dialog('close');
						$('#calendar_wrapper').weekCalendar('refresh');
						$("#calendar_new_entry_form").remove();
					}
				);
			},
			Cancel: function() {
				$event.remove();
				$(this).dialog('close');
				$("#calendar_new_entry_form").remove();
			}
		},
		close: function() {
			$('#calendar').weekCalendar('removeUnsavedEvents');
			$("#calendar_new_entry_form").remove();
		}
	});
	$("#calendar_new_entry_form").dialog('open');
}



	});

</script>
 <div id="message"></div>
<div id="calendar"></div>

<h1>Appointments List</h1>


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
