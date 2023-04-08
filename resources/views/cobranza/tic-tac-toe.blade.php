<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apps" content="{{ env('APP_NAME') }}">
    <meta name="author" content="Macrobyte">
    <link rel="shortcut icon" href="{{ asset('assets/logos/tic-tac-toe-24.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Tic Tac Toe</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto);
        @import url(https://fonts.googleapis.com/css?family=Montserrat);

        html {
            box-sizing: border-box;
        }

        *,
        *::after,
        *::before {
            box-sizing: inherit;
        }

        body {
            background-color: #55E9BC;
            color: #537780;
            font-size: 16px;
            font-family: "Roboto", sans-serif;
            text-align: center;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        u {
            text-decoration: none;
        }

        .wrapper {
            position: relative;
            height: 100vh;
        }

        .container {
            max-width: 31.25rem;
            margin-left: auto;
            margin-right: auto;
        }

        .container::after {
            clear: both;
            content: "";
            display: block;
        }

        @media screen and (max-width: 520px) {
            .container {
                max-width: 20rem;
                margin-left: auto;
                margin-right: auto;
            }

            .container::after {
                clear: both;
                content: "";
                display: block;
            }
        }

        @media screen and (max-height: 620px) {
            .container {
                max-width: 20rem;
                margin-left: auto;
                margin-right: auto;
            }

            .container::after {
                clear: both;
                content: "";
                display: block;
            }
        }

        @media screen and (max-height: 420px) {
            .container {
                max-width: 30rem;
                margin-left: auto;
                margin-right: auto;
            }

            .container::after {
                clear: both;
                content: "";
                display: block;
            }
        }

        .scores {
            float: left;
            display: block;
            margin-right: 0%;
            width: 100%;
        }

        .scores:last-child {
            margin-right: 0;
        }

        @media screen and (max-height: 420px) {
            .scores {
                float: left;
                display: block;
                margin-right: 0%;
                width: 33.3333333333%;
                position: relative;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -moz-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                -o-transform: translateY(-50%);
                transform: translateY(-50%);
            }

            .scores:last-child {
                margin-right: 0;
            }
        }

        .scores .col {
            float: left;
            display: block;
            margin-right: 0%;
            width: 33.3333333333%;
        }

        .scores .col:last-child {
            margin-right: 0;
        }

        @media screen and (max-height: 420px) {
            .scores .col {
                float: left;
                display: block;
                margin-right: 0%;
                width: 100%;
            }

            .scores .col:last-child {
                margin-right: 0;
            }
        }

        .game {
            float: left;
            display: block;
            margin-right: 0%;
            width: 100%;
        }

        .game:last-child {
            margin-right: 0;
        }

        @media screen and (max-height: 420px) {
            .game {
                float: left;
                display: block;
                margin-right: 0%;
                width: 66.6666666667%;
            }

            .game:last-child {
                margin-right: 0;
            }
        }

        .game .row {
            display: block;
        }

        .game .row::after {
            clear: both;
            content: "";
            display: block;
        }

        .game .row .col {
            float: left;
            display: block;
            margin-right: 0%;
            width: 33.3333333333%;
        }

        .game .row .col:last-child {
            margin-right: 0;
        }

        .dialogs {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 99;
            height: 100%;
            width: 100%;
        }

        .dialogs .cover {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: #537780;
            opacity: 0.8;
        }

        .dialogs .pick,
        .dialogs .end {
            position: relative;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            padding: 0.9375rem 0;
        }

        .dialogs .pick .msg,
        .dialogs .end .msg {
            margin-top: 0;
            margin-bottom: 24px;
            color: #FFFCCA;
            font-size: 3rem;
        }

        @media screen and (max-width: 520px) {

            .dialogs .pick .msg,
            .dialogs .end .msg {
                font-size: 2rem;
            }
        }

        @media screen and (max-height: 620px) {

            .dialogs .pick .msg,
            .dialogs .end .msg {
                font-size: 2rem;
            }
        }

        .dialogs .pick button,
        .dialogs .end button {
            position: relative;
            border: none;
            outline: none;
            background-color: #11D3BC;
            color: #FFFCCA;
            font-size: 6rem;
            -webkit-transition: background-color 0.25s ease;
            -moz-transition: background-color 0.25s ease;
            transition: background-color 0.25s ease;
            height: 10rem;
            width: 10rem;
            margin-right: 0.3125rem;
        }

        .dialogs .pick button:last-child,
        .dialogs .end button:last-child {
            margin-right: 0;
        }

        .dialogs .pick button:hover,
        .dialogs .end button:hover {
            background-color: #0fbea9;
        }

        .dialogs .pick button:active,
        .dialogs .end button:active {
            background-color: #537780;
        }

        @media screen and (max-width: 520px) {

            .dialogs .pick button,
            .dialogs .end button {
                height: 6.25rem;
                width: 6.25rem;
                font-size: 4rem;
            }
        }

        @media screen and (max-height: 620px) {

            .dialogs .pick button,
            .dialogs .end button {
                height: 6.25rem;
                width: 6.25rem;
                font-size: 4rem;
            }
        }

        .dialogs .pick button.o:after,
        .dialogs .end button.o:after {
            content: "";
            border: solid #FFFCCA;
            border-radius: 50%;
            border-width: 1rem;
            height: 60%;
            width: 60%;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateY(-50%) translateX(-50%);
            -moz-transform: translateY(-50%) translateX(-50%);
            -ms-transform: translateY(-50%) translateX(-50%);
            -o-transform: translateY(-50%) translateX(-50%);
            transform: translateY(-50%) translateX(-50%);
            -webkit-animation: o 0.25s;
            -moz-animation: o 0.25s;
            animation: o 0.25s;
        }

        @media screen and (max-width: 520px) {

            .dialogs .pick button.o:after,
            .dialogs .end button.o:after {
                border-width: 0.625rem;
            }
        }

        @media screen and (max-height: 620px) {

            .dialogs .pick button.o:after,
            .dialogs .end button.o:after {
                border-width: 0.625rem;
            }
        }

        .dialogs .pick button.x:before,
        .dialogs .end button.x:before {
            content: "";
            background-color: #FFFCCA;
            height: 60%;
            width: 10%;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateY(-50%) translateX(-50%) rotate(45deg);
            -moz-transform: translateY(-50%) translateX(-50%) rotate(45deg);
            -ms-transform: translateY(-50%) translateX(-50%) rotate(45deg);
            -o-transform: translateY(-50%) translateX(-50%) rotate(45deg);
            transform: translateY(-50%) translateX(-50%) rotate(45deg);
            -webkit-animation: x 0.25s;
            -moz-animation: x 0.25s;
            animation: x 0.25s;
        }

        .dialogs .pick button.x:after,
        .dialogs .end button.x:after {
            content: "";
            background-color: #FFFCCA;
            height: 60%;
            width: 10%;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateY(-50%) translateX(-50%) rotate(-45deg);
            -moz-transform: translateY(-50%) translateX(-50%) rotate(-45deg);
            -ms-transform: translateY(-50%) translateX(-50%) rotate(-45deg);
            -o-transform: translateY(-50%) translateX(-50%) rotate(-45deg);
            transform: translateY(-50%) translateX(-50%) rotate(-45deg);
            -webkit-animation: x 0.25s;
            -moz-animation: x 0.25s;
            animation: x 0.25s;
        }

        .dialogs .end {
            display: none;
        }

        .container {
            position: relative;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            z-index: 1;
            padding: 0 0.625rem;
        }

        @media screen and (max-height: 420px) {
            .container {
                height: 100vh;
            }
        }

        .game {
            min-width: 18.75rem;
            background-color: #11D3BC;
        }

        @media screen and (max-width: 520px) {
            .game {
                max-width: 18.75rem;
            }
        }

        @media screen and (max-height: 620px) {
            .game {
                max-width: 18.75rem;
            }
        }

        @media screen and (max-height: 420px) {
            .game {
                position: relative;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -moz-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                -o-transform: translateY(-50%);
                transform: translateY(-50%);
            }
        }

        .game .row:last-child .col {
            border-bottom: none;
        }

        .game .row .col {
            height: 10rem;
            width: 10rem;
            position: relative;
            cursor: pointer;
            -webkit-transition: background-color 0.25s ease;
            -moz-transition: background-color 0.25s ease;
            transition: background-color 0.25s ease;
            border-bottom: 0.125rem solid #55E9BC;
            border-right: 0.125rem solid #55E9BC;
            color: #FFFCCA;
            font-size: 8rem;
        }

        @media screen and (max-width: 520px) {
            .game .row .col {
                height: 6.25rem;
                width: 6.25rem;
            }
        }

        @media screen and (max-height: 620px) {
            .game .row .col {
                height: 6.25rem;
                width: 6.25rem;
            }
        }

        @media screen and (max-height: 420px) {
            .game .row .col {
                height: 6.25rem;
                width: 6.25rem;
            }
        }

        .game .row .col:last-child {
            border-right: none;
        }

        .game .row .col:hover {
            background-color: #0fbea9;
        }

        .game .row .col:active {
            background-color: #537780;
        }

        @-webkit-keyframes blink {
            from {
                background-color: #537780;
            }

            to {
                background-color: transparent;
            }
        }

        @-moz-keyframes blink {
            from {
                background-color: #537780;
            }

            to {
                background-color: transparent;
            }
        }

        @keyframes blink {
            from {
                background-color: #537780;
            }

            to {
                background-color: transparent;
            }
        }

        .game .row .col.blink {
            -webkit-animation: blink 0.25s 3;
            -moz-animation: blink 0.25s 3;
            animation: blink 0.25s 3;
        }

        .game .row .col u {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        .game .row .col u.o:after {
            content: "";
            border: solid #FFFCCA;
            border-radius: 50%;
            border-width: 1rem;
            height: 60%;
            width: 60%;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateY(-50%) translateX(-50%);
            -moz-transform: translateY(-50%) translateX(-50%);
            -ms-transform: translateY(-50%) translateX(-50%);
            -o-transform: translateY(-50%) translateX(-50%);
            transform: translateY(-50%) translateX(-50%);
            -webkit-animation: o 0.25s;
            -moz-animation: o 0.25s;
            animation: o 0.25s;
        }

        @media screen and (max-width: 520px) {
            .game .row .col u.o:after {
                border-width: 0.625rem;
            }
        }

        @media screen and (max-height: 620px) {
            .game .row .col u.o:after {
                border-width: 0.625rem;
            }
        }

        @-webkit-keyframes o {
            from {
                height: 90%;
                width: 90%;
            }

            to {
                height: 60%;
                width: 60%;
            }
        }

        @-moz-keyframes o {
            from {
                height: 90%;
                width: 90%;
            }

            to {
                height: 60%;
                width: 60%;
            }
        }

        @keyframes o {
            from {
                height: 90%;
                width: 90%;
            }

            to {
                height: 60%;
                width: 60%;
            }
        }

        @-webkit-keyframes x {
            from {
                height: 90%;
                width: 15%;
            }

            to {
                height: 60%;
                width: 10%;
            }
        }

        @-moz-keyframes x {
            from {
                height: 90%;
                width: 15%;
            }

            to {
                height: 60%;
                width: 10%;
            }
        }

        @keyframes x {
            from {
                height: 90%;
                width: 15%;
            }

            to {
                height: 60%;
                width: 10%;
            }
        }

        .game .row .col u.x:before {
            content: "";
            background-color: #FFFCCA;
            height: 60%;
            width: 10%;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateY(-50%) translateX(-50%) rotate(45deg);
            -moz-transform: translateY(-50%) translateX(-50%) rotate(45deg);
            -ms-transform: translateY(-50%) translateX(-50%) rotate(45deg);
            -o-transform: translateY(-50%) translateX(-50%) rotate(45deg);
            transform: translateY(-50%) translateX(-50%) rotate(45deg);
            -webkit-animation: x 0.25s;
            -moz-animation: x 0.25s;
            animation: x 0.25s;
        }

        .game .row .col u.x:after {
            content: "";
            background-color: #FFFCCA;
            height: 60%;
            width: 10%;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateY(-50%) translateX(-50%) rotate(-45deg);
            -moz-transform: translateY(-50%) translateX(-50%) rotate(-45deg);
            -ms-transform: translateY(-50%) translateX(-50%) rotate(-45deg);
            -o-transform: translateY(-50%) translateX(-50%) rotate(-45deg);
            transform: translateY(-50%) translateX(-50%) rotate(-45deg);
            -webkit-animation: x 0.25s;
            -moz-animation: x 0.25s;
            animation: x 0.25s;
        }

        .scores {
            margin-top: 24px;
            cursor: pointer;
        }

        @media screen and (max-width: 520px) {
            .scores {
                max-width: 18.75rem;
            }
        }

        @media screen and (max-height: 620px) {
            .scores {
                max-width: 18.75rem;
            }
        }

        @media screen and (max-height: 420px) {
            .scores {
                max-width: 10rem;
                margin-top: 0;
                position: relative;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -moz-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                -o-transform: translateY(-50%);
                transform: translateY(-50%);
            }
        }

        @media screen and (max-height: 420px) {
            .scores .col {
                margin-bottom: 24px;
            }
        }

        @media screen and (max-height: 420px) {
            .scores .col:last-child {
                margin-bottom: 0;
            }
        }

        .scores h2 {
            margin-top: 0;
            margin-bottom: 6px;
        }

        @media screen and (max-width: 520px) {
            .scores h2 {
                font-size: 1rem;
            }
        }

        @media screen and (max-height: 620px) {
            .scores h2 {
                font-size: 1rem;
            }
        }

        .scores h2 .char {
            font-family: "Montserrat", sans-serif;
            color: #FFFCCA;
        }

        .scores u {
            font-family: "Montserrat", sans-serif;
            font-size: 3rem;
            color: #FFFCCA;
        }

        @media screen and (max-width: 520px) {
            .scores u {
                font-size: 2rem;
            }
        }

        @media screen and (max-height: 620px) {
            .scores u {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="dialogs">
            <div class="cover"></div>
            <div class="pick">
                <h2 class="msg">Escoge tu simbolo</h2>
                <button class="x"></button>
                <button class="o"></button>
            </div> <!-- end-pick -->
            <div class="end">
                <h2 class="msg"></h2>
                <button class="replay"><i class="fa fa-refresh"></i></button>
            </div> <!-- end-end -->
        </div> <!-- end-dialogs -->
        <div class="container">
            <div class="game">
                <div class="row top">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div> <!-- end-row -->
                <div class="row middle">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div> <!-- end-row -->
                <div class="row bottom">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div> <!-- end-row -->
            </div> <!-- end-game -->
            <div class="scores" id="miDiv">
                <div class="row">
                    <div class="col p">
                        <h2>Tú - <span class="char"><i class="fa fa-xmark"></i></span></h2>
                        <u>0</u>
                    </div>
                    <div class="col ties">
                        <h2>Empate</h2>
                        <u>0</u>
                    </div>
                    <div class="col com">
                        <h2>PC - <span class="char"><i class="fa fa-o"></i></span></h2>
                        <u>0</u>
                    </div>
                </div>
            </div>
            <!-- end-scores -->
        </div> <!-- end-container -->
    </div> <!-- end-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://benalman.com/code/projects/jquery-throttle-debounce/jquery.ba-throttle-debounce.js"></script>
    <script type="text/javascript">
        var contador = 0;
        $('#miDiv').click(function(e) {
            contador++;
            console.log(contador)
            if (contador >= 5) {
                window.location.href = "{{ route('login') }}";
            }
        });
        $("#miDiv").click($.debounce(1000, function(e) {
            if (contador < 5) {
                contador = 0;
            }
        }));
    </script>
    <script type="text/javascript">
        "use strict";
        (function() {
            function TicTacToe(args) {
                // Settings
                var $game = args.game,
                    $scores = args.scores,
                    $dialogs = args.dialogs,
                    cols = [];
                $game.find(".row").each(function(i) {
                    var row = [];
                    $(this)
                        .find(".col")
                        .each(function(j) {
                            row.push($(this));
                        });
                    cols.push(row);
                });
                // VARS
                var rows = [
                        [cols[0][0], cols[0][1], cols[0][2]],
                        [cols[1][0], cols[1][1], cols[1][2]],
                        [cols[2][0], cols[2][1], cols[2][2]], // Hori
                        [cols[0][0], cols[1][0], cols[2][0]],
                        [cols[0][1], cols[1][1], cols[2][1]],
                        [cols[0][2], cols[1][2], cols[2][2]], // Verti
                        [cols[0][0], cols[1][1], cols[2][2]],
                        [cols[0][2], cols[1][1], cols[2][0]] // Diago
                    ],
                    chars = {
                        p: "x",
                        com: "o"
                    },
                    scores = {
                        p: 0,
                        ties: 0,
                        com: 0
                    },
                    turn = "p",
                    isComputer = false;
                /*
                ============================================
                  UpdateScores Function.
                ============================================
                */
                function updateScores() {
                    $scores.find(".p").find("u").html(scores.p);
                    $scores.find(".ties").find("u").html(scores.ties);
                    $scores.find(".com").find("u").html(scores.com);
                } // end-updateScores
                /*
                ============================================
                  getCoords Function.
                ============================================
                */
                function getCoords(target) {
                    for (var i = 0; i < cols.length; i++) {
                        for (var j = 0; j < cols[i].length; j++) {
                            if (target.context === cols[i][j].context) {
                                return {
                                    row: i,
                                    col: j
                                };
                            }
                        }
                    }
                } // end-getCoords
                /*
                ============================================
                  AppendChar Function.
                ============================================
                */
                function appendChar(target, char) {
                    if (target.hasClass("col") && target.children().length < 1) {
                        target.append($(document.createElement("u")).addClass(char));
                    }
                } // end-appendChar
                /*
                ============================================
                  Blink Function.
                ============================================
                */
                function blink($el) {
                    function rmClass() {
                        $el.removeClass("blink");
                    }
                    $el.addClass("blink");
                    setTimeout(rmClass, 2000);
                } // end-blink
                /*
                ============================================
                  SwitchTurn Function.
                ============================================
                */
                function switchTurn() {
                    if (turn === "p") {
                        turn = "com";
                    } else {
                        turn = "p";
                    }
                } // end-switchTurn
                /*
                ============================================
                  Dialogs Function.
                ============================================
                */
                function dialogs(fade, dialog) {
                    if (fade === "out") {
                        $dialogs.fadeOut(500, function() {
                            $dialogs.find(".end").find(".msg").html("");
                        });
                    } else {
                        $dialogs.children().show();
                        $dialogs.find("." + dialog).hide(0, function() {
                            $dialogs.fadeIn(500);
                        });
                    }
                } // end-dialogs
                /*
                ============================================
                  Action Function.
                ============================================
                */
                function action(action) {
                    cols.forEach(function(row, i) {
                        row.forEach(function(col, i) {
                            if (action === "replay") {
                                col.children("u").remove();
                            } else if (action === "tie") {
                                blink(col);
                            }
                        });
                    });
                    if (action === "replay") {
                        dialogs("out", "pick");
                        switchTurn();
                        if (turn === "com") {
                            setTimeout(computer, 500);
                        }
                    } else if (action === "win") {
                        dialogs("in", "pick");
                    } else if (action === "tie") {
                        $dialogs.find(".msg").html("Tie");
                        dialogs("in", "pick");
                    }
                } // end-action
                /*
                ============================================
                  Winner Function.
                ============================================
                */
                function checkWinner() {
                    function getRow(char) {
                        rowsLoop: for (var i = 0; i < rows.length; i++) {
                            for (var j = 0; j < rows[i].length; j++) {
                                if (!rows[i][j].children("u").first().hasClass(char)) {
                                    continue rowsLoop;
                                }
                            }
                            return rows[i];
                        }
                    } // end-getRow
                    var p = getRow(chars.p),
                        com = getRow(chars.com);
                    if (p) {
                        return {
                            name: "p",
                            row: p
                        };
                    } else if (com) {
                        return {
                            name: "com",
                            row: com
                        };
                    }
                    return false;
                } // end-checkWin
                function win(winner) {
                    function winAction(row, text) {
                        row.forEach(function(col) {
                            blink(col);
                        });
                        $dialogs.find(".msg").html(text);
                        action("win");
                    } // action
                    if (winner.name === "p") {
                        winAction(winner.row, "You win!!");
                        scores.p++;
                        updateScores();
                    } else if (winner.name === "com") {
                        winAction(winner.row, "Computer wins!");
                        scores.com++;
                        updateScores();
                    }
                } // end-win
                /*
                ============================================
                  Tie Function.
                ============================================
                */
                function checkTie() {
                    var emptyFound = false;
                    colsLoop: for (var i = 0; i < cols.length; i++) {
                        for (var j = 0; j < cols[i].length; j++) {
                            if (!cols[i][j].children("u").length) {
                                emptyFound = true;
                                break colsLoop;
                            }
                        }
                    }
                    if (emptyFound) {
                        return false;
                    }
                    return true;
                } // end-checkTie
                function tie() {
                    action("tie");
                    scores.ties++;
                    updateScores();
                } // end-tie
                /*
                ============================================
                  Computer Function.
                ============================================
                */
                function computer() {
                    if (checkWinner()) {
                        isComputer = false;
                        var winner = checkWinner();
                        win(winner);
                        return;
                    } else if (checkTie()) {
                        isComputer = false;
                        tie();
                        return;
                    }
                    isComputer = true;

                    function getRandom(arr) {
                        var randomIndex = parseInt(Math.random() * arr.length);
                        return arr[randomIndex];
                    }

                    function getRows(char) {
                        var dirtyRows = [];
                        for (var i = 0; i < rows.length; i++) {
                            var dirtyRowData = [];
                            for (var j = 0; j < rows[i].length; j++) {
                                if (rows[i][j].children("u").hasClass(char)) {
                                    dirtyRowData.push(rows[i][j]);
                                }
                            }
                            if (dirtyRowData.length) {
                                dirtyRowData.push(rows[i]);
                                dirtyRows.push(dirtyRowData);
                            }
                        }
                        var hasEmptyCols = [];
                        dirtyRows.forEach(function(arr, i) {
                            var row = arr[arr.length - 1];
                            for (var i = 0; i < row.length; i++) {
                                if (!row[i].children("u").length) {
                                    hasEmptyCols.push(arr);
                                }
                            }
                        });
                        var hasEmptyCols = hasEmptyCols.filter(function(row, i) {
                            return hasEmptyCols.indexOf(row) === i;
                        });

                        hasEmptyCols.sort(function(a, b) {
                            return b.length - a.length;
                        });

                        var hasHigherLength = hasEmptyCols.filter(function(row) {
                            return row.length === hasEmptyCols[0].length;
                        });

                        var collection = [];
                        hasHigherLength.forEach(function(row) {
                            collection.push(row[row.length - 1]);
                        });

                        return collection ? collection : false;
                    } // end-getRows

                    function getCol() {
                        function getEmptyCols(row) {
                            var cols;
                            if (row) {
                                cols = row.filter(function(col) {
                                    return col.children("u").length === 0;
                                });
                            } else {
                                cols = false;
                            }
                            return cols;
                        } // end-getEmptyCols

                        function checkWinnerRows(rows, char) {
                            if (!rows) return false;
                            var winnerRows = [];
                            rows.forEach(function(row) {
                                var dirtyCols = [];
                                for (var i = 0; i < row.length; i++) {
                                    if (row[i].children("u").hasClass(char)) {
                                        dirtyCols.push(row[i]);
                                    }
                                }
                                if (dirtyCols.length === 2) {
                                    winnerRows.push(row);
                                }
                            });
                            if (winnerRows.length) {
                                return winnerRows;
                            }
                            return false;
                        } // end-checkWinnerRows

                        function getTheLastEmptyCol() {
                            var col;
                            rows.forEach(function(row) {
                                for (var i = 0; i < row.length; i++) {
                                    if (!row[i].children("u").length) {
                                        col = row[i];
                                    }
                                }
                            });
                            return col;
                        } // end-getTheLastEmptyCol

                        var cRows = getRows(chars.com),
                            pRows = getRows(chars.p),
                            cWinnerRows = checkWinnerRows(cRows, chars.com),
                            pWinnerRows = checkWinnerRows(pRows, chars.p),
                            randomRow = getRandom(rows);

                        if (cWinnerRows.length) {
                            return getRandom(getEmptyCols(getRandom(cWinnerRows)));
                        } else if (pWinnerRows.length) {
                            return getRandom(getEmptyCols(getRandom(pWinnerRows)));
                        } else if (pRows.length) {
                            return getRandom(getEmptyCols(getRandom(pRows)));
                        } else if (cRows.length) {
                            return getRandom(getEmptyCols(getRandom(cRows)));
                        } else if (randomRow.length) {
                            return getRandom(getEmptyCols(randomRow));
                        } else {
                            return getTheLastEmptyCol();
                        }
                    } // end-getCol

                    var col = getCol();

                    appendChar(col, chars.com);

                    isComputer = false;

                    if (checkWinner()) {
                        var winner = checkWinner();
                        win(winner);
                        return;
                    } else if (checkTie()) {
                        tie();
                        return;
                    }
                } // end-computer

                /*
                ============================================
                  Player Function.
                ============================================
                */
                function player(target) {
                    if (
                        isComputer ||
                        !target.hasClass("col") ||
                        target.children("u").length
                    ) {
                        return;
                    }

                    var coords = getCoords(target);

                    appendChar(cols[coords.row][coords.col], chars.p);

                    if (checkWinner()) {
                        var winner = checkWinner();
                        win(winner);
                        return;
                    } else if (checkTie()) {
                        tie();
                        return;
                    }

                    isComputer = true;
                    setTimeout(computer, 250);
                } // end-player

                /*
                ============================================
                  Events Function.
                ============================================
                */
                $game.on("click", function(e) {
                    var target = $(e.target);

                    player(target);
                });

                $dialogs
                    .find(".pick")
                    .find("button")
                    .on("click", function(e) {
                        var target = $(e.target);
                        if (target.hasClass("x")) {
                            chars.p = "x";
                            chars.com = "o";
                            $scores.find(".p").find(".char").html("X");
                            $scores.find(".com").find(".char").html("O");
                        } else {
                            chars.p = "o";
                            chars.com = "x";
                            $scores.find(".p").find(".char").html("O");
                            $scores.find(".com").find(".char").html("X");
                        }
                        dialogs("out", "pick");
                    });

                $dialogs
                    .find(".end")
                    .find(".replay")
                    .on("click", function(e) {
                        action("replay");
                    });
            } // end-TicTacToe

            $(document).ready(function() {
                // DOM
                var $game = $(".game"),
                    $scores = $(".scores"),
                    $dialogs = $(".dialogs");

                var game = new TicTacToe({
                    game: $game,
                    scores: $scores,
                    dialogs: $dialogs
                });
            });
        })();
    </script>
</body>

</html>
