<?php
/*
 * Template Name: FunnyBusiness Clown Work Days
 *
 * @package FunnyBusiness
 * @subpackage BuddyPress
 * @since 1.0
 */

get_header(); ?>

<div id="workingContainer">

	<div id="calendarContainer">
	
		<p id="calendarTitle">Work Days</p>
		
		<!-- 
			Do not change the id of the div below. It needs to be "calendar" in order for
			the calendar to show up. However, you can change the size by setting the
			width and height on #calendar using CSS.
		-->
		<div id="calendar"></div>
		
	</div> <!-- end calendarContainer -->
	
	<div id="instructions">
	
		<p>Select the days and times that you are able to work.</p>
		
	</div> <!-- end instructions -->
	
	<form id="workingForm" method="post" action="<?php echo bp_core_get_user_domain(get_current_user_id()); ?>/appointments/">

		<input type="hidden" name="clown_id" value="<?php echo $_POST['clown_id']; ?>" />
		<input type="hidden" name="calendar_action" value="saveClownData" />
		
		<p>
			<input id="saveWork" type="button" value="Submit" onclick="fb_fullcalendar_submit('#workingForm');" />
		</p>
		
	</form> <!-- end workingForm -->
	
</div> <!-- end workingContainer -->

<?php get_footer(); ?>