<?php require_once 'includes/headerSocio.php'; ?>

<style>
  

    html {
        width: 100%;
        height: 100%;
    }

    body {
        background-image: url(/assests/recursos/fondo-pacto-2.jpg);
        background-repeat: no-repeat;
        background-size: contain;
        background-size: cover;
        margin: 0;
        width: 100%;
        height: 100%;
        font-family: 'Raleway', sans-serif;
    }

    .container {
        @include center();
    }

    .title {
        padding-top: 20%;
        font-weight: 800;
        color: transparent;
        font-size: 120px;
        background: url(/pacto/assests/recursos/fondo-letras-2.jpg);
        background-position: 40% 50%;
        -webkit-background-clip: text;
        position: relative;
        text-align: center;
        line-height: 90px;
        letter-spacing: -8px;
    }

   
</style>


<div class="container">
    <div class="title">BIENVENIDO A PACTO</div>

</div>

<script>
    $(document).ready(function() {
        var mouseX, mouseY;
        var ww = $(window).width();
        var wh = $(window).height();
        var traX, traY;
        $(document).mousemove(function(e) {
            mouseX = e.pageX;
            mouseY = e.pageY;
            traX = ((4 * mouseX) / 570) + 40;
            traY = ((4 * mouseY) / 570) + 50;
            console.log(traX);
            $(".title").css({
                "background-position": traX + "%" + traY + "%"
            });
        });
    });
</script>