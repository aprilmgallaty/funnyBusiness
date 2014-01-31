<?php
/*
 * Template Name: FunnyBusiness Book Clown
 *
 * @package FunnyBusiness
 * @subpackage BuddyPress
 * @since 1.0
 */

get_header(); ?>

<div id="bookingContainer">

	<div id="calendarContainer">
	
		<p id="calendarTitle">Availability</p>
		
		<!-- 
			Do not change the id of the div below. It needs to be "calendar" in order for
			the calendar to show up. However, you can change the size by setting the
			width and height on #calendar using CSS.
		-->
		<div id="calendar"></div>
		
	</div> <!-- end calendarContainer -->
	
	<div id="instructions">
	
		<p>Look for available times on the calendar, then click and drag the time you would like to book this clown. Once you've selected a valid time, fill in the details of the event below.</p>
		
	</div> <!-- end instructions -->
	
	<form id="bookingForm" method="post" action="<?php echo bp_core_get_user_domain(get_current_user_id()); ?>/appointments/">

		<p>
			<label for="eventLocation">Name of location:</label>
			<input id="eventLocation" type="text" name="location" placeholder="Business name or Residence name" />
		</p>
		
		<p>
			<label for="eventStreet">Street address:</label>
			<input id="eventStreet" type="text" name="street" />
		</p>
		
		<p>
			<label for="eventCity">City:</label>
			<input id="eventCity" type="text" name="city" />
		</p>
		
		<p>
			<label for="eventState">State:</label>
			<input id="eventState" type="text" name="state" />
		</p>
		
		<p>
			<label for="eventZip">ZIP code:</label>
			<input id="eventZip" type="text" name="zip" />
		</p>
		
		<p>
			<label for="eventType">Type of event:</label>
			<select id="eventType" name="type">
				<option value="child">Child party</option>
				<option value="adult">Adult party</option>
				<option value="charity">Charity / Fundraiser</option>
				<option value="promo">Business promotion</option>
			</select>
		</p>

		<p>Skills required (check all that apply):</p>
		<p><label><input type="checkbox" name="magic" />Magic tricks</label></p>
		<p><label><input type="checkbox" name="juggling" />Juggling</label></p>
		<p><label><input type="checkbox" name="animal" />Animal handling</label></p>
		<p><label><input type="checkbox" name="balloon" />Balloon animals</label></p>
		<p><label><input type="checkbox" name="character" />Character acting</label></p>
		
		<p>
			<label for="eventRequest">Special requests:</label>
			<input id="eventRequest" type="textarea" rows="4" cols="50" name="special" />
		</p>
		
		<input type="hidden" name="clown_id" value="<?php echo $_POST['clown_id']; ?>" />
		<input type="hidden" name="customer_id" value="<?php echo get_current_user_id(); ?>" />
		<input type="hidden" name="calendar_action" value="saveData" />
		
		<p>
			<input id="bookIt" type="button" value="Submit" onclick="fb_fullcalendar_submit('#bookingForm');" />
		</p>
		
	</form> <!-- end bookingForm -->
	
</div> <!-- end bookingContainer -->

<?php get_footer(); ?>