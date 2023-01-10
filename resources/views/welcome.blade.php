<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GamerFest</title>

        <link href="{{ asset('css/estilosHome.css') }}" rel="stylesheet">

    </head>
    <body>
        <header>
            <h1 class="title">GAMER FEST</h1>
            <nav>
                <ul>
                    <li><a href="#">Juegos</a></li>
                    <li><a href="#">Galegría</a></li>
                    <li><a href="#">Tienda</a></li>
                    <li><a href="#">Actividades</a></li>
                    <li>
                            @if (Route::has('login'))
                            <button > <a href="{{ route('login') }}" class="link">Iniciar Sesión</a></button>
                            @endif 
                    </li>
                    <li>
                        @if (Route::has('register'))
                        <button> <a href="{{ route('register') }}" class="link">Registrarse</a></button>
                        @endif
                    </li>
                </ul>
               
                <div class="hide">
                    <i class="fa fa-bars" aria-hidden="true"></i> Menu
                </div>
            </nav>  
        </header>
        <hr color="#ffb703" size="6px">
        <br>
        <div>
            <h3 style="color:#ffffff; text-align:center; font-size: 50px">JUEGA, COMPITE, GANA</h3>
            <hr color="#ffb703" size="6px">
            <h1>Juegos Destacados</h1>
            <img style="height: 250px; width: 400px; margin:1.5%" src="{{ asset('imagenes/call.png') }}" alt="call">
            <img style="height: 250px; width: 400px; margin:1.5%" src="{{ asset('imagenes/clash.png') }}" alt="clash">
            <img style="height: 250px; width: 400px; margin:1.5%" src="{{ asset('imagenes/dota.png') }}" alt="dota">
            <img style="height: 250px; width: 400px; margin:1.5%" src="{{ asset('imagenes/fifa.png') }}" alt="fifa">
            <img style="height: 250px; width: 400px; margin:1.5%" src="{{ asset('imagenes/free.png') }}" alt="free">
            <img style="height: 250px; width: 400px; margin:1.5%" src="{{ asset('imagenes/lol.png') }}" alt="lol">
            <img style="height: 250px; width: 400px; margin:1.5%" src="{{ asset('imagenes/mario.png') }}" alt="mario">
        </div>
        <hr color="#ffb703" size="6px">
        <br>
        <div>
            
            <h1 style="color:#ffb703; text-align:center; font-size: 40px">Actividades</h1>
            <table class="default" style="width: 100%; text-align: center; font-size: 30px ">

                <tr>
                    <th style="width: 25%; border: 30px solid #ffb703; background-color: #ffb703 ">Hora</th>
                    <td style="width: 25%; border: 30px solid #fff; background-color: #fff">10:00 am</td>
                    <td style="width: 25%; border: 30px solid #fff; background-color: #fff">10:30 am</td>
                    <td style="width: 25%; border: 30px solid #fff; background-color: #fff">11:00 am</td>
                </tr>

                <tr>
                    <th style="width: 25%; border: 30px solid #ffb703; background-color: #ffb703">Evento</th>
                    <td style="width: 25%; border: 30px solid #c0c0c0; background-color: #c0c0c0">Inauguración</td>
                    <td style="width: 25%; border: 30px solid #c0c0c0; background-color: #c0c0c0">Torneo de Free Fire</td>
                    <td style="width: 25%; border: 30px solid #c0c0c0; background-color: #c0c0c0">Torneo de DOTA</td>
                </tr>

                <tr>
                    <th style="width: 25%; border: 30px solid #ffb703; background-color: #ffb703">Lugar</th>
                    <td style="width: 25%; border: 30px solid #fff; background-color: #fff">Patio Campus Belisario Quevedo</td>
                    <td style="width: 25%; border: 30px solid #fff; background-color: #fff">Aula A410</td>
                    <td style="width: 25%; border: 30px solid #fff; background-color: #fff">Aula A406</td>
                </tr>

            </table>
            <br>

            <button class="mas"> <a href="#" class="mass">Ver más</a></button>


        </div>
        <br>
        <hr color="#ffb703" size="6px">
        <br>
        <div style="text-align:center">
        <h1 style="color:#ffb703; text-align:center; font-size: 40px">Juegos Destacados</h1>
        <br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.2120238450116!2d-78.58828638542768!3d-0.9988702992713577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d4639e3fb9755f%3A0x22fe7f63301b5fee!2sESPE%20-%20Campus%20Belisario%20Quevedo!5e0!3m2!1ses!2sec!4v1673007870391!5m2!1ses!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
            $(".hide").on('click', function() {
            $("nav ul").toggle('slow');
            })
        </script>
    </body>
</html>
