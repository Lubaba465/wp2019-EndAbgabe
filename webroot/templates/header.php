<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/components/headera.css">
    <link rel="stylesheet" href="css/components/footerr.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <script src="js/headere.js"></script>
    <?php
    require_once("usermodul.php");

    ?>
</head>
<header id ='header-container' class="header-container">
    <div class="top-nav" id="topNav">
        <a class="logo" href="index.php"><img src="img/logotrans.png" alt="Logo"></a>
        <div class="dropdown">
            <button class="dropbtn"><a href="">Schlossfinder
                    <i class="fa fa-caret-down"></i></a>
            </button>
            <div class="dropdown-content" >
                <a  href="castleSearch.php?location=<?php  echo 'N'; ?>">Norden</a>
                <a href="castleSearch.php?location=<?php  echo 'S'; ?>">Süden</a>
                <a href="castleSearch.php?location=<?php echo 'W'; ?> ">Westen</a>
                <a href="castleSearch.php?location=<?php echo'E';?>">Osten</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn"><a href="">Magazin
                    <i class="fa fa-caret-down"> </i></a>
            </button>
            <div class="dropdown-content">
                <a href="magazin.php?magazintype=<?php echo'N'; ?>">News</a>
                <a href="magazin.php?magazintype=<?php echo 'E';?>">Events</a>
                <a href="magazin.php#top10">Top 10</a>
            </div>
        </div>
        <a class="nav-item" >
   <form method="get" action="castleSearch.php" >
            <input type="text" id="search_text" name="search" class="form-control" ">
            <input type="submit"  id="result" value="Suchen" name="result" class="button">


        </form>
            <script>

                var navbar = document.getElementById('header-container');

                window.onscroll = function() {
                    // pageYOffset or scrollY
                    if (window.pageYOffset > 0) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }
                }

            </script>

            <script>
                $( function() {
                    function log( message ) {
                        $( "<div>" ).text( message ).prependTo( "#log" );
                        $( "#result" ).scrollTop( 0 );
                    }

                    $( "#search_text" ).autocomplete({
                        source: "searchauto.php",
                        minLength: 2,
                        select: function( event, ui ) {
                            log( "Selected: " + ui.item.value + " aka " + ui.item.id );
                        }
                    });
                } );
            </script>





        <?php
        if(isteingeloggt()){
         ?> <a class="right nav-item"href="Logout.php"><i class="fa fa-fw fa-user"></i> Logout</a>
            <a class="right nav-item"href="admin.php"><i ></i> Admin</a>
        <?php   }    else{
            ?>
            <a class="right nav-item" href="signUp.php"><i class="fa fa-fw fa-sign-in"></i> Registrieren</a>
        <a class="right nav-item" href="login.php"><i class="fa fa-fw fa-user"></i> Anmelden</a>
        <?php } ?>

        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="headerAccordion()">&#9776;</a>
    </div>
</header>
