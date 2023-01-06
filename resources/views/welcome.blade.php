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
            <h1>GAMER FEST</h1>
            <nav>
                <ul>
                    <li><a href="#">Juegos</a></li>
                    <li><a href="#">Galegría</a></li>
                    <li><a href="#">Tienda</a></li>
                    <li><a href="#">Actividades</a></li>
                    <li class="access" style="background-color: #ffb703;">
                            @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                    <a href="{{ url('/dashboard') }}" style="color: #000000; text-decoration: none">Dashboard</a>
                                @else
                                <button > <a href="{{ route('login') }}" class="link">Iniciar Sesión</a></button>
                                @endauth
                                </div>
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
        <div>
            <h3 style="color:#ffffff; text-align:center; font-size: 50px">JUEGA, COMPITE, GANA</h3>
            <hr color="#ffb703" size="6px">
            <h1 style="color:#ffb703; text-align:center; font-size: 40px">Juegos Destacados</h1>
            <img style="height: 250px; width: 400px; margin:1.5%" src="../../marioKart.jpg" alt="mario">
            <img style="height: 250px; width: 400px; margin:1.5%" src="https://img.redbull.com/images/c_limit,w_1500,h_1000,f_auto,q_auto/redbullcom/2015/02/15/1331705372408_2/dota-22">
            <img style="height: 250px; width: 400px; margin:1.5%" src="https://img.redbull.com/images/c_limit,w_1500,h_1000,f_auto,q_auto/redbullcom/2022/8/1/ksfga6rlx2ugfhjd9vnk/league-of-legends">
            <img style="height: 250px; width: 400px; margin:1.5%" src="https://www.memuplay.com/blog/wp-content/uploads/2021/04/cj0.jpg">
            <img style="height: 250px; width: 400px; margin:1.5%" src="https://as01.epimg.net/meristation/imagenes/2021/10/01/guias/1633081476_163721_1633081863_noticia_normal.jpg">
            <img style="height: 250px; width: 400px; margin:1.5%" src="https://i.ytimg.com/vi/nPTUaEIdlOo/maxresdefault.jpg">
            <hr color="#ffb703" size="6px">
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

            <button style=" margin-left: 60em; font-size: 19px; background-color: #ffb703; border-radius: 20px; padding: 10px 25px; font-weight: bold; border-color: #ffb703;  "> <a href="#" style=" color: #000000; text-decoration: none; margin: 5px 25px " class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Ver más</a></button>


        </div>
        <hr color="#ffb703" size="6px">
        <div style="text-align:center">
        <h1 style="color:#ffb703; text-align:center; font-size: 40px">Juegos Destacados</h1>
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
