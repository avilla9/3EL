gstruct = [["", "0-1-2|0-3-6|0-4-8"],
["", "1-0-2|1-4-7"],
["", "2-1-0|2-4-6|2-5-8"],
["", "3-0-6|3-4-5"],
["", "4-1-7|4-3-5|4-0-8|4-2-6"],
["", "5-4-3|5-2-8"],
["", "6-7-8|6-3-0|6-4-2"],
["", "7-4-1|7-6-8"],
["", "8-4-0|8-5-2|8-7-6"]]
var counter = 0;
var vagainst = "friend";
$(document).ready(function () {

    $("." + vagainst).css("background", "#ddd");

    $(".box").click(function () {
        var selectedid = $(this).attr("id");
        gamestatus = gamearea.executeStep(selectedid);
        if (gamestatus == "cont" && vagainst == "computer") {
            moveid = gamearea.intelligentMove(selectedid);
            setTimeout(function () { gamearea.executeStep(moveid); }, 300);
        }
    });


    $(".computer").click(function () {
        if (vagainst == "computer") {
            return;
        }
        $(this).css("background", "#ddd");
        $(".friend").css("background", "#ccc");
        vagainst = "computer";
        gamearea.clearBoard();
    });
    $(".friend").click(function () {
        if (vagainst == "friend") {
            return;
        }
        $(this).css("background", "#ddd");
        $(".computer").css("background", "#ccc");
        vagainst = "friend";
        gamearea.clearBoard();
    });
});

gamearea = {
    executeStep: function (selectedid) {
        /*clear board if game is over and reset counter to 0*/
        if (counter === -1) {
            gamearea.clearBoard();
            return;
        }

        var isValue = $("#" + selectedid).html();
        if (!isValue) {
            var setvalue = "";
            if (counter % 2 === 0) {
                var player = "1";
                $("#" + selectedid).html("<i class='fa fa-times' aria-hidden='true'></i>");
                setvalue = "X";
            } else {
                var player = "2";
                $("#" + selectedid).html("<i class='fa fa-circle-thin' aria-hidden='true'></i>");
                setvalue = "0";
            }
            gamearea.chgTurn(player);
            var gamestatus = gamearea.gameLogic(selectedid, setvalue);
            if (gamestatus == "stopgame") return gamestatus;
        } else {
            return;
        }
        counter++;
        /*gamearea.fInOutEffect(selectedid);*/

        if (counter == 9) {
            gamestatus = gamearea.stopGame(counter);
        }
        return gamestatus;

    },
    intelligentMove: function (selectedid) {

        availableboxes = new Array();
        v = 0;
        $.each(gstruct, function (index, value) {
            if (value[0] == "") {
                availableboxes[v++] = index;
            }
        });

        var moveid = "";
        /*find intelligent box from available boxes*/
        bestmove = gamearea.getIntersection(availableboxes, selectedid);
        if (bestmove.length > 0) {
            moveid = bestmove[0];
        } else {
            /*find random box if all intelligent available boxes are filled*/
            randomboxid = Math.floor(Math.random() * availableboxes.length);
            moveid = availableboxes[randomboxid];
        }
        return moveid;
    },
    getIntersection: function (availableboxes, selectedid) {
        var intell_arr = gstruct[selectedid][1].split("|");
        var bestmove = Array(); var i = 0;
        $.each(availableboxes, function (index, value) {

            $.each(intell_arr, function (nindex, nvalue) {
                var tra_arr = nvalue.split("-");
                $.each(tra_arr, function (nnindex, nnvalue) {
                    if (nnindex == 0) return true;
                    if (value == nnvalue) {
                        bestmove[i++] = value;
                    }
                })

            })
        });
        return bestmove;
    },
    stopGame: function (player) {
        $("#turn").addClass("bg-info");
        if (player == 9) {
            $("#turn").text("TABLAS!");
            gamearea.saveGame("TABLAS");
        } else {
            playername = (player == "X") ? "Player 1" : (vagainst == "computer") ? "Computer" : "Player 2";
            $("#turn").text("(" + player + ") GANADOR! - " + playername);
            var gameresult = "(" + player + ") " + playername;
            gamearea.saveGame(gameresult);
        }
        $("#turn").fadeIn("slow");
        counter = -1;
        $("#turn").animate({
            fontSize: '+120%'
        });

        return "stopgame";
    },
    saveGame: function (gameresult) {

        $.ajax({
            method: 'POST',
            url: base_url + '/Tictactoe/create',
            data: {
                against: vagainst,
                winner: gameresult
            },
            success: function (data) {
                gamearea.renderScores(data);
            }
            ,
            error: function () {

            },
            progress: function (e) {
                $("#scores").html('<div class="text-center"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>');
            }
        });
        $.post("scores/create",
            {
                against: vagainst,
                winner: gameresult
            },
            gamearea.renderScores
        );
    },
    renderScores: function (data) {
        var dataarray = $.parseJSON(data);
        var strcontent = "";
        $.each(dataarray, function (index, value) {
            strcontent += '<div class="row">';
            strcontent += '<div class="col-md-3">' + value.against + '</div>';
            strcontent += '<div class="col-md-3">' + value.winner + '</div>';
            strcontent += '<div class="col-md-6">' + value.created_at + '</div>';
            strcontent += '</div>';
        });
        $("#scores").html(strcontent);
    },
    fInOutEffect: function (selectedid) {
        $("#" + selectedid).fadeOut("slow");
    },
    chgColor: function (selectedid) {
        $("#" + selectedid).addClass("text-info");
    },
    chgTurn: function (player) {
        var playervalue = (player == 1) ? "0" : "X";
        /*player=(player==1)?"2":"1";*/
        $("#turn").text("(" + playervalue + ") Turno ");
    },
    clearBoard: function () {
        for (i = 0; i < 9; i++) {
            $("#" + i).text("");
            gstruct[i][0] = "";
            $("#" + i).removeClass("text-info");
        }
        counter = 0;
        $("#turn").text("Turno (X)");
        $("#turn").css("font-size", "14px");
        $("#turn").addClass("text-info");
        $("#turn").removeClass("bg-info");
    },
    gameLogic: function (selectedid, setvalue) {
        gstruct[selectedid][0] = setvalue;
        var vcombinations = gstruct[selectedid][1];
        var lvar = vcombinations.split("|");
        var gamestopstatus = "cont";
        $.each(lvar, function () {
            var indexvalue = this.split("-");
            var a = gstruct[indexvalue[0]][0];
            var b = gstruct[indexvalue[1]][0];
            var c = gstruct[indexvalue[2]][0];
            if (a === b && a === c && b === c) {
                gamearea.chgColor(indexvalue[0]); gamearea.chgColor(indexvalue[1]); gamearea.chgColor(indexvalue[2]);
                gamestopstatus = gamearea.stopGame(setvalue);
                return;
            }
        });
        return gamestopstatus;
    }
}
