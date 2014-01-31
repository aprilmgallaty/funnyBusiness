<?php

/*
 * Dispatch calendar actions
 */
if (isset($_GET['calendar_action'])) {
	switch ($_GET['calendar_action']) {
		case 'loadData':
			fb_fullcalendar_load_data($_GET['clown_id'], $_GET['start'], $_GET['end'], true);
			die();
			break;
		case 'loadClownData':
			fb_fullcalendar_load_data($_GET['clown_id'], $_GET['start'], $_GET['end'], false);
			die();
			break;
	}
}

if (isset($_POST['calendar_action'])) {
	switch ($_POST['calendar_action']) {
		case 'saveData':
			fb_fullcalendar_save_data($_POST['clown_id'], $_POST['customer_id'], $_POST['numEvents']);
			break;
		case 'saveClownData':
			fb_fullcalendar_save_data($_POST['clown_id'], null, $_POST['numEvents']);
			break;
	}
}

function fb_fullcalendar_load_data($clown_id, $start, $end, $is_customer) {
	global $wpdb;

	if ($is_customer) {
		$query = "SELECT start, end FROM wp_fb_schedule WHERE clown_id = " . $clown_id;
		$query .= " AND customer_id IS NOT NULL";
		$title = 'Booked';
		$color = 'red';

		$events = $wpdb->get_results( $query );

		$eventArray = array();
		foreach ($events as $event) {
			$start = date_create_from_format('Y-m-d H:i:s', $event->start);
			$end = date_create_from_format('Y-m-d H:i:s', $event->end);
			$eventArray[] = array(
				'id' => $clown_id,
				'title' => $title,
				'allDay' => false,
				'start' => $start->format('Y-m-d\TH:i:s\Z'),
				'end' => $end->format('Y-m-d\TH:i:s\Z'),
				'editable' => false,
				'color' => $color
			);
		}
	}
	
	$query = "SELECT start, end FROM wp_fb_schedule WHERE clown_id = " . $clown_id;
	$query .= " AND customer_id IS NULL";
	$title = 'Working';
	$color = 'blue';
	$events = $wpdb->get_results( $query );

	$eventArray = array();
	foreach ($events as $event) {
		$start = date_create_from_format('Y-m-d H:i:s', $event->start);
		$end = date_create_from_format('Y-m-d H:i:s', $event->end);
		$eventArray[] = array(
			'id' => $clown_id,
			'title' => $title,
			'allDay' => false,
			'start' => $start->format('Y-m-d\TH:i:s\Z'),
			'end' => $end->format('Y-m-d\TH:i:s\Z'),
			'editable' => false,
			'color' => $color
		);
	}
	
	echo json_encode($eventArray);
}

function fb_fullcalendar_save_data($clown_id, $customer_id, $num_events) {
	global $wpdb;
	
	if ($customer_id != null) {
		$details = array(
			'location' => $_POST['location'],
			'street' => $_POST['street'],
			'city' => $_POST['city'],
			'state' => $_POST['state'],
			'zip' => $_POST['zip'],
			'type' => $_POST['type'],
			'magic' => $_POST['magic'],
			'juggling' => $_POST['juggling'],
			'animal' => $_POST['animal'],
			'balloon' => $_POST['balloon'],
			'character' => $_POST['character'],
			'special' => $_POST['special']
		);
	}
	
	for ($i=0; $i<$num_events; $i++) {
		$values = array(
			'clown_id' => $clown_id,
			'start' => $_POST['eventStart' . $i],
			'end' => $_POST['eventEnd' . $i]
		);
		if ($customer_id != null) {
			$values['customer_id'] = $customer_id;
			$values['details'] = serialize($details);
		}

		$wpdb->insert( 'wp_fb_schedule', $values );
	}
}

function fb_add_fullcalendar_load() {
	if (!isset($_POST['fb_fullcalendar'])) {
		return;
	}
	
	?>

<script type='text/javascript'>

	jQuery(document).ready(function($) {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		var calendar = $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'agendaWeek,agendaDay'
			},
			selectable: true,
			selectHelper: true,
			defaultView: 'agendaWeek',
			allDaySlot: false,
			minTime: '8:00',
			maxTime: '24:00',
			select: function(start, end, allDay) {
				calendar.fullCalendar('renderEvent',
					{
						id: 'mine',
						title: '<?php echo $_POST['calendar_event_title']; ?>',
						start: start,
						end: end,
						allDay: allDay,
						color: 'green'
					},
					true // make the event "stick"
				);
				calendar.fullCalendar('unselect');
			},
			editable: true,
			eventSources: [
				{
					url: '<?php if (isset($_POST['calendar_slug'])) echo bp_get_root_domain() . '/' . $_POST['calendar_slug']; ?>',
					type: 'GET',
					data: {
						calendar_action: '<?php echo $_POST['calendar_load_action']; ?>',
						clown_id: '<?php echo $_POST['clown_id']; ?>'
					},
					textColor: 'white'
				}
			]
		});
		
	});

	function fb_fullcalendar_submit(form_id) {
		var events = jQuery('#calendar').fullCalendar('clientEvents', 'mine');

		var numField = jQuery('<input></input>');
		numField.attr('type', 'hidden');
		numField.attr('name', 'numEvents');
		numField.attr('value', events.length);
		jQuery(form_id).append(numField);

		jQuery.each(events, function(index, event) {
			var startField = jQuery('<input></input>');
			startField.attr('type', 'hidden');
			startField.attr('name', 'eventStart' + index);
			startField.attr('value', jQuery.fullCalendar.formatDate(event.start, 'u'));
			jQuery(form_id).append(startField);

			var endField = jQuery('<input></input>');
			endField.attr('type', 'hidden');
			endField.attr('name', 'eventEnd' + index);
			endField.attr('value', jQuery.fullCalendar.formatDate(event.end, 'u'));
			jQuery(form_id).append(endField);
		});
		
		jQuery(form_id).submit();
	}
	
</script>
	
	<?php
}

function fb_fullcalendar_show_appts() {
	global $wpdb;

	$usertype = buatp_get_user_type(get_current_user_id());
	if ($usertype == 'Customer') {
		$events = $wpdb->get_results( "SELECT clown_id, start, end FROM wp_fb_schedule WHERE customer_id = " . get_current_user_id() );
	} else if ($usertype == 'Clown') {
		$events = $wpdb->get_results( "SELECT customer_id, start, end FROM wp_fb_schedule WHERE clown_id = " . get_current_user_id() . " AND customer_id IS NOT NULL" );
	}	

	?>
	<style type="text/css">
		div.item-list-tabs#subnav {
			display:none;
		}
	</style>
	
	<div id="appointmentList">
		<?php
		foreach ($events as $event) {
			$start = date_create_from_format('Y-m-d H:i:s', $event->start);
			$end = date_create_from_format('Y-m-d H:i:s', $event->end);
			if ($usertype == 'Customer') {
				$appt_user_id = $event->clown_id;
			} else if ($usertype == 'Clown') {
				$appt_user_id = $event->customer_id;
			}	
			?>
			<p class="appointmentEntry">
				<a class="appointmentLink" href="<?php echo bp_core_get_user_domain( $appt_user_id ) ?>">
					<?php echo bp_core_get_username( $appt_user_id, true, false ); ?>
				</a>
				on <span class="appointmentDate"><?php echo $start->format('l F m, Y'); ?></span>
				from <span class="appointmentTime"><?php echo $start->format('h:i a'); ?></span>
				to <span class="appointmentTime"><?php echo $end->format('h:i a'); ?></span>
			</p>
			<?php
		}
		?>
	</div> <!-- end appointmentList -->

	<?php
	if ($usertype == 'Clown') {
		?>
		<form id="setWorkForm" method="post" action="<?php echo bp_core_get_root_domain(); ?>/work">
			<input type="hidden" name="fb_fullcalendar" value="true" />
			<input type="hidden" name="clown_id" value="<?php echo get_current_user_id() ?>" />
			<input type="hidden" name="calendar_slug" value="work" />
			<input type="hidden" name="calendar_event_title" value="Working" />
			<input type="hidden" name="calendar_load_action" value="loadClownData" />
			<input class="setWorkButton" type="submit" value="Set Working Days" />
		</form>
		<?php
	}
}

?>