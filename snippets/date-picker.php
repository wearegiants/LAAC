<div id="pick-date">
<div class="datepicker clear">
<?php if(is_page('hotel')) { echo '<h3 id="hide-in-footer">Book a Room</h3>';} ?>  
<fieldset>
<button type="submit" class="picker-btn-home arrival" name="date_input_from" value="Start Date">Arrival</button>
<button type="submit" class="picker-btn-home departure" name="date_input_to" value="End Date">Departure</button>
</fieldset>
<input type="button" value="Check Availability" class="white-button" onclick="$('#check_reservations').submit();" />
</div>
</div>