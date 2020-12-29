$(document).ready(function(){
    patientId = $('#patient_id').val();
    $('#report_patient_id').val(patientId);
});

$(document).on('change','#patient_id', function(){
    patientId = $('#patient_id').val();
    $('#report_patient_id').val(patientId);
});

$(document).on('blur','#initial_date', function(){
    initialDate = $('#initial_date').val();
    $('#report_initial_date').val(initialDate);
});

$(document).on('blur','#final_date', function(){
    finalDate = $('#final_date').val();
    $('#report_final_date').val(finalDate);
});


