$(document).ready(function() {
    var list_resume = [];
    var form_element = $('#survey_form');
    var input_radio_elements = $(form_element).find('input[type="radio"]:checked');

    $(input_radio_elements).each(function() {
        initResumeArray(this);
    });

    function initResumeArray(e) {
        var current_id_label = $(e).attr('data_label_id');
        var risposta_str = $('#'+current_id_label).text();
        var id_domanda = $(e).attr('data_label_question_id');
        var domanda_str = $("#"+id_domanda).text();

        let subarray = [];

        subarray['domanda'] = domanda_str;
        subarray['risposta'] = risposta_str;

        list_resume[id_domanda] = [];
        list_resume[id_domanda] = subarray;
    }

    function showResume(event) {
		event.preventDefault(); 
        var intestazione = '<h3>Riepilogo Risposte</h3>';
        var html_var = '<div>' + intestazione;

        let lenght_array = list_resume.length;

        for (var key in list_resume) {
            let subarray = list_resume[key];

            html_var += '<div>';

            let domanda = subarray['domanda'];
            let risposta = subarray['risposta'];
			risposta = risposta.replace(/(?:\r\n|\r|\n)/g, '');
			risposta = risposta.trim();
            html_var += '<h4>'+domanda+'</h4>';
            html_var += '<p class="answer_resume_p" style="color:black;">'+risposta+'</p>';
            html_var += '</div>';
        }

        html_var += '</div>';

        $('#resume_container').html(html_var);
        $('#riepilogo').hide();
        $('#invio').fadeIn();
        $('#indietro').fadeIn();
        $('#input-container').hide();
    }

    function showForm(event) {
		event.preventDefault();
        $('#resume_container').html('');
        $('#riepilogo').fadeIn();
        $('#invio').hide();
        $('#indietro').hide();
        $('#input-container').fadeIn();
    }

    $('.checkclass').change(function() {
        initResumeArray(this);
    });

    $('#riepilogo').click(function() {
        showResume(event);
    });

    $('#indietro').click(function() {
        showForm(event);
    });

});