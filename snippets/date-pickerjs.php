<script type="text/javascript">

// Date Picker
$( document ).ready(function() {
  $('.datepicker .picker-btn-home').pickadate({
    onSet: function(context) {
        var short_date = this.get('select','mm/dd/yyyy');
        var formatted_date = this.get('select','mmm d, yyyy');
        var src=$(this.$node).attr('class');
        if( src.indexOf( "arrival") !== -1 ) {
            $(".arrival").html( "Arrive: " + formatted_date ) ;
            $("input[name=DateIn]").val(short_date);
        } else if( src.indexOf( "departure") !== -1 ) {
            $(".departure").html( "Depart: " + formatted_date ) ;
            $("input[name=DateOut]").val(short_date);
        }
    }
  });
});

</script>

<form method="get" name="check_reservations" id='check_reservations' action="https://reservations.ihotelier.com/istay.cfm" target="blank">
<input type="hidden" name="DateIn" value="" />
<input type="hidden" name="DateOut" value="" />
<input type="hidden" name="Adults" value="1" />
<input type="hidden" name="Children" value="1" />
<input type="hidden" name="Rooms" value="1" />
<input type="hidden" name="HotelID" value="2996" />
<input type="hidden" name="LanguageID" value="1" />
</form>