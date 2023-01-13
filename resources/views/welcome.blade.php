<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GamerFest</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="{{ asset('css/estilosHome.css') }}" rel="stylesheet">

    </head>
    <body>
    <i class="fa fa-bars bars-button" aria-hidden="true" id="bars-button"></i>
	<div class="navbar">
        <div >
                <a href=""></a><img src="{{ asset('imagenes/logo.png') }}" alt="logo" class="title">
        </div>
        <div class="contenido">
            
            <nav class="bars">
                <ul>
                    <li><a href="{{ asset('pagesHome/JuegosHome.php') }}">Juegos</a></li>
                    <li><a href="{{ asset('pagesHome/JuegosHome.php') }}">Galería</a></li>
                    <li><a href="#">Tienda</a></li>
                    <li><a href="#">Actividades</a></li>
                    
                </ul>
            </nav> 
            <nav class="ingreso">
                <ul>
                    <li><button><a href="{{ route('login') }}" class="link">Iniciar Sesión</a></button></li>
                    <li><button><a href="{{ route('register') }}" class="link">Registrarse</a></button></li>
                </ul>
            </nav>   
        </div> 
    </div>
    <script>
    	const limit_size_screen = window.matchMedia('screen and (max-width: 1300px)');
		const bars = document.querySelector('.bars');
		const barsButton = document.querySelector('#bars-button');

		function validation(event) {
			if (event.matches) {
				barsButton.addEventListener('click', hideShow);
			} else {
				barsButton.removeEventListener('click', hideShow);
			}
		}
		validation(limit_size_screen);

		function hideShow() {
			if (bars.classList.contains('is-active')) {
				bars.classList.remove('is-active');
			} else {
				bars.classList.add('is-active');
			}
		}
    </script>
        <br>
        <h3 style="color:#ffffff; text-align:center; font-size: 50px">JUEGA, COMPITE, GANA</h3>
        <br>
        <hr color="#ffb703" size="6px">
        <br>
        <h1>Juegos Destacados</h1>
        <br><br><br><br><br><br>
        <div class="content-all">
            <div class="content-carrousel">
                <figure ><img src="{{ asset('imagenes/call.png') }}"></figure>
                <figure ><img src="{{ asset('imagenes/clash.png')}}"></figure>
                <figure ><img src="{{ asset('imagenes/dota.png') }}"></figure>
                <figure ><img src="{{ asset('imagenes/fifa.png') }}"></figure>
                <figure ><img src="{{ asset('imagenes/free.png') }}"></figure>
                <figure ><img src="{{ asset('imagenes/lol.png')  }}"></figure>
                <figure ><img src="{{ asset('imagenes/mario.png')}}"></figure>
                <figure ><img src="{{ asset('imagenes/parchis.png')}}"></figure>
            </div>
        </div>
        
        <hr color="#ffb703" size="6px">
        <br>
        <div style="padding: 10px;">
            
            <h1 style="color:#ffb703; text-align:center; font-size: 40px">Actividades</h1>
            <table class="tableActi" >

                <tr class="Hora">
                    <th style="width: 25%; border: 30px solid #ffb703; background-color: #ffb703 ">Hora</th>
                    <td style="width: 25%; border: 30px solid #fff; background-color: #fff">10:00 am</td>
                    <td style="width: 25%; border: 30px solid #fff; background-color: #fff">10:30 am</td>
                    <td style="width: 25%; border: 30px solid #fff; background-color: #fff">11:00 am</td>
                </tr>

                <tr class="Evento">
                    <th style="width: 25%; border: 30px solid #ffb703; background-color: #ffb703">Evento</th>
                    <td style="width: 25%; border: 30px solid #c0c0c0; background-color: #c0c0c0">Inauguración</td>
                    <td style="width: 25%; border: 30px solid #c0c0c0; background-color: #c0c0c0">Torneo de Free Fire</td>
                    <td style="width: 25%; border: 30px solid #c0c0c0; background-color: #c0c0c0">Torneo de DOTA</td>
                </tr>

                <tr class="Lugar">
                    <th style="width: 25%; border: 30px solid #ffb703; background-color: #ffb703">Lugar</th>
                    <td style="width: 25%; border: 30px solid #fff; background-color: #fff">Patio Campus Belisario Quevedo</td>
                    <td style="width: 25%; border: 30px solid #fff; background-color: #fff">Aula A410</td>
                    <td style="width: 25%; border: 30px solid #fff; background-color: #fff">Aula A406</td>
                </tr>

            </table>
            <br>

        </div>
        <br>
        <hr color="#ffb703" size="6px">
        <br>
        <div style="text-align:center">
            <h1 style="color:#ffb703; text-align:center; font-size: 40px">Mapa de Evento</h1>
            <br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.2120238450116!2d-78.58828638542768!3d-0.9988702992713577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d4639e3fb9755f%3A0x22fe7f63301b5fee!2sESPE%20-%20Campus%20Belisario%20Quevedo!5e0!3m2!1ses!2sec!4v1673007870391!5m2!1ses!2sec" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><br><br>
    <footer class="footer-distributed">

        <div class="footer-left">

        <h3>Gamer<span>Fest</span></h3>


        <p class="footer-company-name">ESPE - L</p>

        <div class="footer-icons">

            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-github"></i></a>

        </div>

        </div>

        <div class="footer-right">

        <p>Sugerencias</p>

        <form action="#" method="post">

            <input type="text" name="email" placeholder="E-mail">
            <textarea name="message" placeholder="Sugerencia"></textarea>
            <button>Enviar</button>

        </form>

        </div>

        </footer>
    </body>
</html>
