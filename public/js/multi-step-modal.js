+function($) {
    const progressCheck = document.querySelectorAll(".p-step .check");
    const bullet = document.querySelectorAll(".p-step .bullet");
    const progressCheck1 = document.querySelectorAll(".p-step .check1");
    const bullet1 = document.querySelectorAll(".p-step .bullet1");
    let current = 1;

    function validation(e,f){
      var x = document.getElementsByClassName("alert-danger");
      var y = "false";
      var i;
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        url:"/membre/modalValidation",
        method:"post",
        data:(e == 1) ? new FormData(document.getElementById("modal-danger4")) 
        : new FormData(document.getElementById("modal-danger8")),
        processData:false,
        dataType:'json',
        async: false,
        contentType:false,
        beforeSend:function(){
            $(document).find('.alert-danger').text('');
        },
        success:function(data){
            if(data.status == 0){
                $.each(data.error, function(prefix, val){
                    $('.m'+f+' .'+prefix+'_error').text(val[0]);
                });
            }else{
                
            }
            for (i = 0; i < 30; i++) {
                if(x[i].innerHTML){y="true";}
            }
        }
      });
      return y;
    }
    
    function reset() {
      current = 1;
      $(document).find('.alert-danger').text('');
      $(".modal-body.step-1").show();
      $(".modal-body.step-2").hide();
      $(".modal-body.step-3").hide();
      $(".modal-body.step-4").hide();
      $(".step1").hide();
      $(".step2").show();
      $(".step3").hide();
      $(".step4").hide();
      $(".step5").hide();
      $(".step6").hide();
      $(".step7").hide();
    
      [].forEach.call(progressCheck, function(el) {
        el.classList.remove("active");
      });
      [].forEach.call(progressCheck1, function(el) {
        el.classList.remove("active");
      });
      [].forEach.call(bullet, function(el) {
        el.classList.remove("active");
      });
      [].forEach.call(bullet1, function(el) {
        el.classList.remove("active");
      });
    }
    $('#modal-part').click(function(){reset();});
    $('#modal-ent').click(function(){reset();});
    
    $(".step2").click(function(event){
      event.preventDefault();
      var e = $(this).data('step');
      var f = $(this).data('id');
      t = validation(e,f);
      if(t=="true"){
        return false;
      }else if(t=="false"){
        $(".modal-body.step-1").hide();
        $(".modal-body.step-2").show();
        $(".step2").hide();
        $(".step1").show();
        $(".step4").show();
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        bullet1[current - 1].classList.add("active");
        progressCheck1[current - 1].classList.add("active");
        current += 1;
      }
    });
    $(".step4").click(function(event){
      event.preventDefault();
      var e = $(this).data('step');
      var f = $(this).data('id');
      t = validation(e,f);
      if(t=="true"){
        return false;
      }else if(t=="false"){
        $(".modal-body.step-2").hide();
        $(".modal-body.step-3").show();
        $(".step4").hide();
        $(".step1").hide();
        $(".step3").show();
        $(".step6").show();
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        bullet1[current - 1].classList.add("active");
        progressCheck1[current - 1].classList.add("active");
        current += 1;
      }
    });
    $(".step6").click(function(event){
      event.preventDefault();
      var e = $(this).data('step');
      var f = $(this).data('id');
      t = validation(e,f);
      if(t=="true"){
        return false;
      }else if(t=="false"){
        $(".modal-body.step-3").hide();
        $(".modal-body.step-4").show();
        $(".step6").hide();
        $(".step3").hide();
        $(".step5").show();
        $(".step7").show();
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        bullet1[current - 1].classList.add("active");
        progressCheck1[current - 1].classList.add("active");
        current += 1;
      }
    });
    $(".step7").click(function(event){
      event.preventDefault();
      var e = $(this).data('step');
      var f = $(this).data('id');
      t = validation(e,f);
      if(t=="true"){
        return false;
      }else if(t=="false"){
        bullet[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        bullet1[current - 1].classList.add("active");
        progressCheck1[current - 1].classList.add("active");
        document.getElementById("modal-danger"+f).submit();
      }
    });
    
    $(".step1").click(function(event){
      event.preventDefault();
      $(".modal-body.step-2").hide();
      $(".modal-body.step-1").show();
      $(".step4").hide();
      $(".step1").hide();
      $(".step2").show();
      bullet[current - 2].classList.remove("active");
      progressCheck[current - 2].classList.remove("active");
      bullet1[current - 2].classList.remove("active");
      progressCheck1[current - 2].classList.remove("active");
      current -= 1;
    });
    $(".step3").click(function(event){
      event.preventDefault();
      $(".modal-body.step-3").hide();
      $(".modal-body.step-2").show();
      $(".step6").hide();
      $(".step3").hide();
      $(".step1").show();
      $(".step4").show();
      bullet[current - 2].classList.remove("active");
      progressCheck[current - 2].classList.remove("active");
      bullet1[current - 2].classList.remove("active");
      progressCheck1[current - 2].classList.remove("active");
      current -= 1;
    });
    $(".step5").click(function(event){
      event.preventDefault();
      $(".modal-body.step-4").hide();
      $(".modal-body.step-3").show();
      $(".step5").hide();
      $(".step7").hide();
      $(".step3").show();
      $(".step6").show();
      bullet[current - 2].classList.remove("active");
      progressCheck[current - 2].classList.remove("active");
      bullet1[current - 2].classList.remove("active");
      progressCheck1[current - 2].classList.remove("active");
      current -= 1;
    });

    $(".activer").click(function(){
        var id = $(this).data('id');
        var Name = $(this).data('name');
        var url = $(this).data('url');
        $.ajax({
            method: "get",
            url: "/marchand/client/view/" + id,
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('#firstname').val(response.name);
                $('#email').val(response.email);
                $('#phone').val(response.phone);
                $('#date').val(response.date);
                $('#CNI').val(response.CNI);
                $('#dateCNI').val(response.dateCNI);
                $('#placeCNI').val(response.placeCNI);
                $('#job').val(response.job);
                $('#toContactName').val(response.toContactName);
                $('#toContactPhone').val(response.toContactPhone);
            },
            error: function(error){
                console.log(error);
            }
        });
        $('.item').html(Name);
        $('#activer-form').attr('action', url + id);
    });

    $(".activer1").click(function(){
        var id = $(this).data('id');
        var Name = $(this).data('name');
        var url = $(this).data('url');
        $.ajax({
            method: "get",
            url: "/marchand/client_ent/view/" + id,
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('#RS').val(response.RS);
                $('#FJ').val(response.FJ);
                $('#email').val(response.email);
                $('#phone').val(response.phone);
                $('#date').val(response.date);
                $('#NC').val(response.NC);
                $('#dateNC').val(response.dateNC);
                $('#siège').val(response.siège);
                $('#activité').val(response.activité);
                $('#name').val(response.name);
                $('#email1').val(response.email1);
                $('#phone1').val(response.phone1);
                $('#CNI').val(response.CNI);
                $('#dateCNI').val(response.dateCNI);
                $('#placeCNI').val(response.placeCNI);
                $('#job').val(response.job);
            },
            error: function(error){
                console.log(error);
            }
        });
        $('.item').html(Name);
        $('#activer-form1').attr('action', url + id);
    });

    $('#example1').DataTable({
       'scrollX'     : true,
       'autoWidth'   : false})
    $('#example2').DataTable({
       'scrollX'     : true,
       'autoWidth'   : false})
}(jQuery);