<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panaderia Leos</title>
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        <link rel="stylesheet" href="{{ asset('welcome/css/style.css') }} ">

    </head>
    <body>
        {{--   @if (Route::has('login'))

                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth

        @endif --}}

        <header>
            <a href="#" class="logo"><img class="imgLogo" src="{{ asset('vendor/adminlte/dist/img/logo.png') }}" alt=""></a>
            <div class="menuToggle" onclick="toggleMenu();"></div>
            <ul class="navigation">
                <li><a href="#inicio" onclick="toggleMenu();">Inicio</a></li>
                <li><a href="#nosotros" onclick="toggleMenu();">Nosotros</a></li>
                <li><a href="#panes" onclick="toggleMenu();">Panes</a></li>
                <li><a href="#dulces" onclick="toggleMenu();">Dulces</a></li>
                <li><a href="#equipo" onclick="toggleMenu();">Equipo</a></li>
                <li><a href="#contacto" onclick="toggleMenu();">Contacto</a></li>
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/home') }}">Home</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endauth

                @endif

            </ul>
        </header>
        <section class="banner" id="inicio">
            <div class="content">
                <h2>Bienvenidos a Panadería Leos</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero nesciunt veritatis numquam doloribus sed illo molestias quam earum mollitia. Commodi modi quae amet alias numquam aliquam minima optio! Nihil, expedita!</p>
             
            </div>
        </section>
        <section class="about" id="nosotros">
            <div class="row">
                <div class="col50">
                    <h2 class="titleText">Sobre Nosotros</h2>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore nesciunt perspiciatis, vel est repudiandae reprehenderit exercitationem deserunt velit? Nostrum ea beatae atque blanditiis iure facere quod rerum unde quisquam exercitationem!. <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, odio? Odio nam ex beatae illo error possimus voluptate maxime quae animi distinctio deserunt debitis nulla nihil dignissimos, magni, adipisci sed.
                    </p>
                </div>
                <div class="col50">
                    <div class="imgBxAbout">
                        <img src="{{asset('welcome/img/imgLeos2.jpg')}}" alt="">
                    </div>
                </div>
            </div>

        </section>

        <section class="menu" id="panes">
            <div class="title">
                <h2 class="titleText">Los mas Destacados</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="content">
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/panFrances.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Pan Frances </h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/panItaliano.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Pan Italiano</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/panRedondo.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Pan Redondo</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/panMica.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Pan Mica</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/panCachanga.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Cachanga</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/panMarraqueta.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Marraqueta</h3>
                    </div>
                </div>
            </div>
            <div class="title">
               <a href="#" class="btn">Ver Todos</a>
            </div>

        </section>
        <section class="testimonials" id="dulces">
            <div class="title white">
                <h2 class="titleText">Los Mejores Dulces</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="content">
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/panFrances.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Pan Frances </h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/panItaliano.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Pan Italiano</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/panRedondo.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Pan Redondo</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/panMica.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Pan Mica</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/panCachanga.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Cachanga</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/panMarraqueta.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Marraqueta</h3>
                    </div>
                </div>
                <div class="title">
                    <a href="#" class="btn">Ver Todos</a>
                 </div>
            </div>
        </section>
        <section class="expert" id="equipo">
            <div class="title ">
                <h2 class="titleText">Nuestro Equipo</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="content">
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/expert1.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Lorem ipsum</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/expert2.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Lorem ipsum</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/expert3.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Lorem ipsum</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/expert4.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Lorem ipsum</h3>
                    </div>
                </div>
            </div>
        </section>
      

        <section class="contact" id="contacto">
            <div class="title ">
                <h2 class="titleText">Contactanos</h2>
                <p>Si Desea Contanctarse con Nosotros lo puede realizar mediante el siguiente Formulario</p>
            </div>
            <div class="contactForm">
                <h3>CONTACTO</h3>
                <div class="inputBox">
                    <input type="text" name="" id="" placeholder="Nombre">
                </div>
                <div class="inputBox">
                    <input type="text" name="" id="" placeholder="Telefono">
                </div>
                <div class="inputBox">
                    <input type="text" name="" id="" placeholder="Email">
                </div>
                <div class="inputBox">
                    <textarea type="text" name="" id="" placeholder="Mensaje"></textarea>
                </div>
                <div class="inputBox">
                    <input type="submit" name="" id="" value="Enviar">
                </div>

            </div>
        </section>

        <script type="text/javascript">
            window.addEventListener('scroll',function(){
                const header = document.querySelector('header');
                header.classList.toggle("sticky", window.scrollY > 0);
            });
            function toggleMenu(){
                const menuToggle = document.querySelector('.menuToggle');
                const navigation = document.querySelector('.navigation');
                menuToggle.classList.toggle('active');
                navigation.classList.toggle('active');

            }
        </script>
    </body>
</html>
