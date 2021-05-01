+function($) {
  $("#second").hide();
  $("#third").hide();
  $("#fourth").hide();
  $("#firth").hide();
  $(".overlay").hide();
  var input1 = document.getElementsByName("phone")[0];
  var input2 = document.getElementsByName("montant")[0];
  function phonenumberValidation(inputtxt) {
      var phone = /^\(?([0-9]{9})$/;
      
      if(inputtxt.value.match(phone)) {
          return true;
      }
      else {
          return false;
      }
  }

  function priceValidation(inputtxt) {
      var montant = /^(\d*([.,](?=\d{3}))?\d+)+((?!\2)[.,]\d\d)?$/;
      
      if(inputtxt.value.match(montant)) {
          return true;
      }
      else {
          return false;
      }
  }

  $(".update").click(function(){
      var id = $(this).data('id');
      $.ajax({
          method: "get",
          url: "/admin/transactions/edit/" + id,
          data: {id:id},
          dataType: 'json',
          success: function(response){
              $('#userId').val(response.userId);
              $('#type').val(response.type);
              $('#montant').val(response.montant);
              $('#date').val(response.date);
          },
          error: function(error){
              console.log(error);
          }
      });
  });

  $(".delete").click(function(){
      var id = $(this).data('id');
      var Name = $(this).data('name');
      var Numero = $(this).data('name');
      var url = $(this).data('url');
      $('h4 p').html(Name);
      $('#delete-form').attr('action', url + id);
  });
  $(".view").click(function(){
      var id = $(this).data('id');
      var name = $(this).data('name');
      $('h4 small').html(name);
  });

  $('#example1').DataTable({
    'scrollX'     : true,
    'autoWidth'   : false})
  $('#example2').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'scrollX'     : true,
    'autoWidth'   : false
  })

  $("#submit0").click(function(event){
    event.preventDefault();
    $('.montant_error').text("");
    $('.phone_error').text("");
    if(phonenumberValidation(input1) && priceValidation(input2)) {
      $("#second").show();
      $("#first").hide();
    }
    else if(!phonenumberValidation(input1)) {
      $('.phone_error').text("Numéro invalide!");
      if(!priceValidation(input2)) {
        $('.montant_error').text("Montant invalide!");
      }
    }
    else if(!priceValidation(input2)) {
      $('.montant_error').text("Montant invalide!");
    }
  });

  $("#submit1").click(function(event){
    event.preventDefault();
    $('.password_error').text("");
    var tel = input1.value;
    var montant = input2.value;
    var password = document.getElementsByName("password")[0].value;
    $.ajax({
        method: "get",
        url: "/operation/verification",
        data: {
          tel:tel,
          montant:montant,
          password:password
        },
        dataType: 'json',
        success: function(response){
            if(response.status == 0){
              $('.password_error').text(response.error);
            }else if(response.status == 1){
              $("#second").hide();
              $("#third").show();
              $('#h3').text(response.error);
            }else if(response.status == 2){
              $("#second").hide();
              $("#third").show();
              $('#h3').text(response.error);
            }else{
              $("#second").hide();
              $("#fourth").show();
              $('#h4').html(response.name);
              $('#span').html(response.montant);
            }
        },
        error: function(error){
            
        }
    });
  })

  $("#submit2").click(function(event){
    event.preventDefault();
    var tel = input1.value;
    $.ajax({
        method: "get",
        url: "/operation/sendMessage",
        data: {tel:tel},
        dataType: 'json',
        beforeSend:function(){
            $(".overlay").show();
        },
        success: function(response){
            $(".overlay").hide();
            $("#fourth").hide();
            $("#firth").show();
        },
        error: function(error){
            
        }
    });
  })

  $("#submit3").click(function(event){
    event.preventDefault();
    var code = document.getElementsByName("code")[0].value;
    $.ajax({
        method: "get",
        url: "/operation/confirmCode",
        data: {code:code},
        dataType: 'json',
        success: function(response){
          if(response == "success"){
            document.getElementById("operationForm").submit();
          }else{
            $('.code_error').text("Code incorrect!");
          }
        },
        error: function(error){
            
        }
    });
  })

  $(".back").click(function(event){
    event.preventDefault();
    $("#second").hide();
    $("#first").show();
    $("#third").hide();
    $("#fourth").hide();
    $("#firth").hide();
  });

    
}(jQuery);