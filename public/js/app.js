
$(document).ready(function(){

	var id = $(this).data('id');
    var Name = $(this).data('name');
    var Numero = $(this).data('name');
    var url = $(this).data('url');
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

    $("#edit-vol").click(function(){

        $("#volForm").slideToggle();
        $("#update-vol").show()
        $("#save-vol").hide();
        $("#reserveForm").hide();
        $('#volForm').removeAttr('action');
        $('#volForm').removeAttr('method');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
        	return $(this).text();
        }).get();

        $('#nom').val(data[1]);
        $('#AeroportD').val(data[2]);
        $('#AeroportA').val(data[3]);
        $('#dateD').val(data[4]);
        $('#heureD').val(data[5]);
        $('#dateA').val(data[6]);
        $('#heureA').val(data[7]);
        $('#escale').val(data[8]);
    });

    $("#edit-reserve").click(function(){

        $("#reserveForm").slideToggle();
        $("#update-reserve").show();
        $("#save-reserve").hide();
        $("#volForm").hide();
        $('#reserveForm').removeAttr('action');
        $('#reserveForm').removeAttr('method');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
        	return $(this).text();
        }).get();

        $('#numero').val(data[1]);
        $('#date').val(data[3]);
        $('#vol').val(data[2]);
        $('#passager').val(data[4]);
    });

    $("#update-vol").click(function(){

        $.ajax({
        	type: "PUT",
        	url: "/vol/update/" + id,
        	data: $('#volForm').serialize(),
        	success: function(response){
        		$('#volForm').hide();
        		window.location.reload();
        	},
        	error: function(error){
        		console.log(error);
        	}
        });

    });

    $("#update-reserve").click(function(){

        $.ajax({
        	type: "PUT",
        	url: "/reservation/update/" + id,
        	data: $('#reserveForm').serialize(),
        	success: function(response){
        		$('#reserveForm').hide();
        		window.location.reload();
        	},
        	error: function(error){
        		console.log(error);
        	}
        });

    });

    $(".delete-vol").click(function(){

        $('.question-g-delete-q h3').html(Name);
        $('#delete-form1').attr('action', url + id);
        $('#confirm-delete-vol').show();
        st.scrollTop();

    });

    $(".delete-reserve").click(function(){

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
