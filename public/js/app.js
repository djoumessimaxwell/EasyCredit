
$(document).ready(function(){

    var oVol = $("#volbtn").clone(true);
	var oReserve = $("#reservebtn").clone(true);

    $("#volbtn").click(function(){


        $("#volForm").slideToggle();
        $("#hidevol").toggle();
        $("#showvol").toggle();
        $("#reservebtn").replaceWith(oReserve.clone(true));
        $("#reserveForm").hide();

    });

    $("#reservebtn").click(function(){


        $("#reserveForm").slideToggle();
        $("#hidereserve").toggle();
        $("#showreserve").toggle();
        $("#volbtn").replaceWith(oVol.clone(true));
        $("#volForm").hide();

    });

    $(".delete-vol").click(function(){

        var id = $(this).data('id');
        var Name = $(this).data('name');
        var url = $(this).data('url'); 

        $('.question-g-delete-q h3').html(Name);
        $('#delete-form1').attr('action', url + id);
        $('#confirm-delete-vol').show();
        st.scrollTop();

    });

    $(".delete-reserve").click(function(){

        var id = $(this).data('id');
        var Numero = $(this).data('name');
        var url = $(this).data('url'); 

        $('.question-g-delete-q h3').html(Numero);
        $('#delete-form2').attr('action', url + id);
        $('#confirm-delete-reserve').show();
        st.scrollTop();

    });

    // cancel delete in message
    $(".cancel-delete").click(function(){

        $('#confirm-delete-vol').hide();
        $('#confirm-delete-reserve').hide();

    });


});
