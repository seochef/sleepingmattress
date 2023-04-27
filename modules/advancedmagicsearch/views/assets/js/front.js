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

    function showResume() {
        var html_var = '<div>';

        let lenght_array = list_resume.length;

        for (var key in list_resume) {
            let subarray = list_resume[key];

            html_var += '<div>';

            let domanda = subarray['domanda'];
            let risposta = subarray['risposta'];

            html_var += '<h4>'+domanda+'</h4>';
            html_var += '<p>'+risposta+'</p>';
            html_var += '</div>';
        }

        html_var += '</div>';

        $('#resume_container').html(html_var);
        $('#riepilogo').hide();
        $('#invio').fadeIn();
        $('#indietro').fadeIn();  
    }

    function showForm() {
        $('#resume_container').html('');
        $('#riepilogo').fadeIn();
        $('#invio').hide();
        $('#indietro').hide();
    }

    $('#riepilogo').click(function() {
        showResume();
    });

    $('#indietro').click(function() {
        showForm();
    });

});