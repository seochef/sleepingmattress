$(document).ready(function() {
    var form_element = $('#survey_form');
    var input_radio_elements = $(form_element).find('input[type="radio"]:checked');
    console.log(input_radio_elements);
});