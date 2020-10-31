
  $(document).on("blur", ".cep", function(){
    if(this.value){
      $.ajax({
        url: 'http://api.postmon.com.br/v1/cep/'+this.value,
        dataType:'json',
        crossDomain: true,
        statusCode:{
          200:function(data){
            $('.street').val(data.logradouro);
            $('.neighborhood').val(data.bairro);
            $('.city').val(data.cidade);
            $('.state').val(data.estado);
          }
        }
      });
    }
    return false
  })
