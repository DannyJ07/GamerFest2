<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="background-color: #240046">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">



        <title>GamerFest</title>

        <link rel="stylesheet" href="styles.css">
    </head>
    <body class="antialiased" style="font-family:'Nunito', sans-serif">

    <header class="header" style="background-color: #ffb703; display: flex; align-items:center; heigth:85px; padding:5px; justify-content: flex-end">
        <h1 style="font-size: 35px; margin-right:auto; padding:0 20px;  ">GamerFest</h1>

        <h2 style="size: 16px;  display: flex; margin: 20px"><a href="#" style="color: #000000; text-decoration: none">Juegos</a></h2>
        <h2 style="size: 16px;  display: flex; margin: 20px"><a href="#" style="color: #000000; text-decoration: none">Galería</a></h2>
        <h2 style="size: 16px;  display: flex; margin: 20px"><a href="#" style="color: #000000; text-decoration: none">Tienda</a></h2>
        <h2 style="size: 16px;  display: flex; margin: 20px"><a href="#" style="color: #000000; text-decoration: none">Actividades</a></h2>

        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" style="color: #000000; text-decoration: none" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                    <button style="font-size: 15px; background-color: #10002b; border-radius: 20px; padding: 10px; font-weight: bold;"> <a href="{{ route('login') }}" style="color: #ffffff; text-decoration: none; margin: 20px" class="text-sm text-gray-700 dark:text-gray-500 underline">Iniciar Sesión</a></button>

                        @if (Route::has('register'))
                        <button style="font-size: 15px; background-color: #10002b; border-radius: 20px; padding: 10px; font-weight: bold;"> <a href="{{ route('register') }}" style="color: #ffffff; text-decoration: none; margin: 20px" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrarse</a></button>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>
        <div>
            <h3 style="color:#ffffff; text-align:center; font-size: 50px">JUEGA, COMPITE, GANA</h3>
            <hr color="#ffb703" size="6px">
            <h1 style="color:#ffb703; text-align:center; font-size: 40px">Juegos Destacados</h1>
            <img style="height: 250px; width: 400px; margin:1.5%" src="https://cdn.fansshare.com/image/supermariokart/mario-kart-double-dash-logo-wallpaper-super-mario-kart-1196751759.jpg">
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
    </body>
</html>
