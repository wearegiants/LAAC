$(function(){

var options = {
  selectYears: true,
  selectMonths: true,
  formatSubmit: 'yyyy/mm/dd',
  hiddenName: true
}

var from_$input = $('#input_from').pickadate(options),
    from_picker = from_$input.pickadate('picker')

var to_$input = $('#input_to').pickadate(options),
    to_picker = to_$input.pickadate('picker')

// var submitBtn = $('#submit-room');

// // Check if there’s a “from” or “to” date to start with.
// if ( from_picker.get('value') ) {
//   to_picker.set('min', from_picker.get('select'))
// }
// if ( to_picker.get('value') ) {
//   from_picker.set('max', to_picker.get('select'))
// }

// // When something is selected, update the “from” and “to” limits.
// from_picker.on('set', function(event) {
//   if ( event.select ) {
//     to_picker.set('min', from_picker.get('select'));
//     //$('#submit-room').html(from_picker.get('value'));
//   }
//   else if ( 'clear' in event ) {
//     to_picker.set('min', false)
//     //$('#submit-room').html(from_picker.get('value'));
//   }
// })
// to_picker.on('set', function(event) {
//   if ( event.select ) {
//     from_picker.set('max', to_picker.get('select'))
//   }
//   else if ( 'clear' in event ) {
//     from_picker.set('max', false)
//   }
// })

});