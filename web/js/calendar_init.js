jQuery(document).ready(function(){

	jQuery('#main_calendar').fullCalendar({

		//core config
		//jQueryUi theme
		theme : false,
		//first day is monday
		firstDay : 1,
		defaultView : 'agendaWeek',
		selectable : true,
		selectHelper : true,
		slotMinutes : 30,
		firstHour : 6,
                minTime: 8,
                maxTime:20,
		weekMode : 'variable',
                height: 570,
		//keep the event sticky to the calendar
		unselectAuto : false,
		//Event are not allDays
		allDayDefault : false,
                editable:true,
		//time format, frenchy friendly, sorry
		timeFormat: 'H(:mm)',
		columnFormat : {
			month: 'ddd',
			agendaWeek:'ddd d MMM',
			agendaDay:'dddd d MMMM'
		},
		titleFormat : {
			month: 'MMMM yyyy',
			agendaWeek:"MMMM yyyy",
			agendaDay:'dddd d MMMM yyyy'
		},
		axisFormat : 'H(:mm)',

		//apparence, buttons
	        header : {
			left: 'title',
	    	        center: '',
	    	        right: 'month,agendaWeek,agendaDay prevYear  prev today next nextYear'
		},
		allDaySlot : false,

		//callback
		//called when you click'n'drag on the calendar, to create a new event
		select : function( startDate, endDate, allDay, jsEvent, view ){

			cal_manager.displayEventEditor({ start : startDate, end : endDate, is_allday : allDay });
		},

		//to edit an existing event
		//return false because we want to prevent default (visiting the event url, see FullCalendar doc)
		eventClick : function( event, jsEvent, view ) {

			cal_manager.displayEventEditor({ event_object : event });

			return false;
		},

		//json feed, see the template
	        events: init_event
	});

	jQuery("#event_wrapper").dialog({
		autoOpen: false,
		buttons: {
			"Save": cal_manager.handle_save_button_click,
			"Cancel": function() {
				jQuery(this).dialog( "close" );
			}
		},
		hide: 'slide',
		show: 'slide',
		title : "Edit form",
		beforeclose: function(event, ui) {
		     //reset the form at closing
	             jQuery("#eventform").data("current_event","").find(":input").each( function(index) {

				 // From jquery.form, http://jquery.malsup.com/form/
				 var t = this.type, tag = this.tagName.toLowerCase();
				 if (t == 'text' || t == 'password' || tag == 'textarea' || t == 'hidden' ) {
				      this.value = '';
				 }
				 else if (t == 'checkbox' || t == 'radio') {
				      this.checked = false;
				 }
				 else if (tag == 'select') {
				      this.selectedIndex = -1;
				 }
			});

		}
	});

});
/**
 * Calendar Helper object
 */
var cal_manager  = {

	displayEventEditor : function( o ){

		if( typeof o.event_object === "undefined" )
		{
			//create
			cal_manager.populateEventForm_new( o );
		}
		else
		{
			//edit
			cal_manager.populateEventForm_update( o );
			//keep a reference to the event with jQuery.data
			jQuery("#eventform").data( "current_event", o.event_object );
		}

		jQuery("#event_wrapper").dialog("open");
	},

	populateEventForm_new: function( o ){

		jQuery("#eventform_start").val( cal_manager.date_to_mysqlfriendlystring( o.start ) );
		jQuery("#eventform_end").val( cal_manager.date_to_mysqlfriendlystring( o.end ) );
	},

	handle_save_button_click : function(){

		//if there is no id, it is a new Event
		if( jQuery("#eventform_id").val() === "" )
		{
			var param = {
				"start" : jQuery("#eventform_start").val(),
				"end" : jQuery("#eventform_end").val(),
				"title" : jQuery("#eventform_title").val(),
				"description" : jQuery("#eventform_description").val()
			};

			RPCTEST.event.directNew( param, function(result, e){

				console.debug(result);

				if( isNaN( parseInt( result ) ) )
				{
					alert( "Error : "+result );
				}
				else
				{
					console.log('called');

					var date_start = cal_manager.mysql_date_string_to_js_date( jQuery("#eventform_start").val() );
					var date_end = cal_manager.mysql_date_string_to_js_date( jQuery("#eventform_end").val() );

					//Create the new event
					jQuery('#main_calendar').fullCalendar('renderEvent', {
							id : result,
							title: jQuery("#eventform_title").val(),
							start: date_start,
							end: date_end,
							allDay: jQuery("#eventform_isallday").attr('checked'),
							description : jQuery("#eventform_description").val()
						}, true // make the event "stick"
					);

					jQuery("#event_wrapper").dialog("close");
				}
			});
		}
		else
		{
			//update
		}

	}

        // some helpers functions ...
};
