$(document).ready(function() {
    var list_resume = [];
    var form_element = $('#survey_form');
    var input_radio_elements = $(form_element).find('input[type="radio"]:checked');

    $(input_radio_elements).each(function() {
        var current_id_label = $(this).attr('data_label_id');
        var risposta_str = $('#'+current_id_label).text();
        var id_domanda = $(this).attr('data_label_question_id');
        var domanda_str = $("#"+id_domanda).text();

        let subarray = [];

        subarray['domanda'] = domanda_str;
        subarray['risposta'] = risposta_str;

        list_resume[id_domanda] = [];
        list_resume[id_domanda] = subarray;

    });

});