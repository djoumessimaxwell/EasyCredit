
$(document).ready(function(){

	var id = $(this).data('id');
    var Name = $(this).data('name');
    var Numero = $(this).data('name');
    var url = $(this).data('url');
    var oVol = $("#volbtn").clone(true);
	var oReserve = $("#reservebtn").clone(true);

    $("#simuler").click(function(){
        var result = {};
        var montant = $('input #montant').value();
        var durée = $('input #durée').value();
        var somme = $('input #somme').value();
        var all = $('<div>',{class: 'row'});
        var score = $('<div>',{id: 'question',class: 'col-md-8'});
        var level = $('<div>',{class: 'col-md-4'});

        var numCorrect = 0;

        if(durée != ''){
            somme = (montant*(2/100))/(1-(1+(2/100))^(-durée));
        }
        else if(somme != ''){
            durée = -(Math.log(1-((montant*2/100)/somme))/Math.log(1+(2/100)));
        }
        console.log(somme , durée)
        document.write("somme = " + somme + "durée = " + durée);
    });

    $(".delete").click(function(){

        $('.item h4').html(Name);
        $('#delete-form').attr('action', url + id);

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