$("div.alert").not(".alert-important").delay(3e3).fadeOut(350);
$(document).on("blur",".cep",function(){return this.value&&$.ajax({url:"http://api.postmon.com.br/v1/cep/"+this.value.replace(".","").replace("-",""),dataType:"json",crossDomain:!0,statusCode:{200:function(a){$(".street").val(a.logradouro),$(".neighborhood").val(a.bairro),$(".city").val(a.cidade),$(".state").val(a.estado)}}}),!1});
$(document).ready(function(){$(".phone").mask("(99) 9999-9999"),$(".mobile_phone").mask("(99) 99999-9999"),$(".cep").mask("99.999-999"),$(".cpf").mask("999.999.999-99"),$(".rg").mask("99.999.999-9")});
$(document).ready(function(){patientId=$("#patient_id").val(),$("#report_patient_id").val(patientId)}),$(document).on("change","#patient_id",function(){patientId=$("#patient_id").val(),$("#report_patient_id").val(patientId)}),$(document).on("blur","#initial_date",function(){initialDate=$("#initial_date").val(),$("#report_initial_date").val(initialDate)}),$(document).on("blur","#final_date",function(){finalDate=$("#final_date").val(),$("#report_final_date").val(finalDate)});