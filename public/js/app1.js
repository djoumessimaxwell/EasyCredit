
$(document).ready(function(){
    $(".sidebar a").each(function() {
        //console.log($(this).attr('href'));
        if ((window.location.pathname.indexOf($(this).attr('href'))) > -1) {
            $(this).parent().addClass('active');
        }
    });

	var id = $(this).data('id');
    var Name = $(this).data('name');
    var Numero = $(this).data('name');
    var url = $(this).data('url');
    var oVol = $("#volbtn").clone(true);
	var oReserve = $("#reservebtn").clone(true);

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

function displayScore() {

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

            for (var i = 0; i < selections.length; i++) {

                if(allquestions[i].type == 'type1' || allquestions[i].type == 'Single choice'){
                    if (selections[i] === allquestions[i].correctAnswer[0]) {
                        numCorrect++;
                        testScore++;
                        allquestions[i].result = "Passed";
                    }
                }

                if(allquestions[i].type == 'type2' || allquestions[i].type == 'Multiple choice'){
                    var qcorrect = 0;

                    if(allquestions[i].correctAnswer.length === allquestions[i].totalchoices) {
                        for (var j = 0; j < allquestions[i].totalchoices; j++) {
                            for (var k = 0; k < allquestions[i].correctAnswer.length; k++) {

                                if (Number(selections[i][j]) == allquestions[i].correctAnswer[k]) {
                                    qcorrect++;
                                }
                            }
                        }
                        if(qcorrect === allquestions[i].totalchoices) {
                            numCorrect++;
                            testScore++;
                            allquestions[i].result = "Passed";
                        }
                    }
                }

                if(allquestions[i].type == 'type3' || allquestions[i].type == 'Fill in the gap'){
                    var qcorrect = 0;

                    for (var j = 0; j < allquestions[i].choices.length; j++) {
                        if (selections[i][j] === allquestions[i].choices[j]) {
                            qcorrect++;
                        }
                    }
                    if(qcorrect === allquestions[i].choices.length) {
                        numCorrect++;
                        testScore++;
                        allquestions[i].result = "Passed";
                    }
                }

                if(allquestions[i].type == 'type4' || allquestions[i].type == 'Text'){
                    if (selections[i] === allquestions[i].choices[0]) {
                        numCorrect++;
                        testScore++;
                        allquestions[i].result = "Passed";
                    }
                }

            }

            score.append('You got ' + numCorrect + ' question(s) right, out of ' +
                    allquestions.length + ' question(s)!!!');
            //initializeClock('clockdiv', deadline, "stop");
            result.score = (numCorrect/allquestions.length)*100;
            if (Math.round(result.score) < 86) {
                var r = $('<div>',{id: 'failed'}).append("Sorry you have Failed");
            } else {
                var r = $('<div>',{id: 'passed'}).append("Congratulations you have Passed");
            }

            if(Math.round(result.score) <= 40){
                var l = $('<div>',{id: 'beginner'}).append("Your level : Beginner");
            }else if((40 < (Math.round(result.score))) && ((Math.round(result.score)) < 80)){
                var l = $('<div>',{id: 'intermediate'}).append("Your level : Intermediate");
            }else if(Math.round(result.score) >= 80){
                var l = $('<div>',{id: 'advanced'}).append("Your level : Advanced");
            }
            level.append(l);

            var s = $('<div>',{id: 'score'}).append('Your score: '+Math.round(result.score)+'%');
            var passmark = $('<div>',{id: 'passmark'}).append('The pass mark is 86%');

            score.append(s);
            score.append(r);
            score.append(passmark);

            all.append(score);
            all.append(level);

            var authuser = document.getElementById("end");
            var attr = $(authuser).attr('isAuthuser');

            if (typeof attr !== typeof undefined && attr !== false) {
                testSubmitter (numCorrect);
            }

            console.log("All questions after result calc..",allquestions);

            return all;
        }