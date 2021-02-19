<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panaderia Leos</title>
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
            <a href="#" class="logo">Panadería Leos<span>.</span></a>
            <div class="menuToggle" onclick="toggleMenu();"></div>
            <ul class="navigation">
                <li><a href="#banner">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#expert">Expert</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#contact">Contact</a></li>
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/home') }}">Home</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endauth

                @endif

            </ul>
        </header>
        <section class="banner" id="banner">
            <div class="content">
                <h2>Always choose Good</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero nesciunt veritatis numquam doloribus sed illo molestias quam earum mollitia. Commodi modi quae amet alias numquam aliquam minima optio! Nihil, expedita!</p>
                <a href="#" class="btn">Our Menu</a>
            </div>
        </section>
        <section class="about" id="about">
            <div class="row">
                <div class="col50">
                    <h2 class="titleTex"><span>A</span>bout Us</h2>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore nesciunt perspiciatis, vel est repudiandae reprehenderit exercitationem deserunt velit? Nostrum ea beatae atque blanditiis iure facere quod rerum unde quisquam exercitationem!. <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, odio? Odio nam ex beatae illo error possimus voluptate maxime quae animi distinctio deserunt debitis nulla nihil dignissimos, magni, adipisci sed.
                    </p>
                </div>
                <div class="col50">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/img1.jpg')}}" alt="">
                    </div>
                </div>
            </div>

        </section>

        <section class="menu" id="menu">
            <div class="title">
                <h2 class="titleTex">Our <span>M</span>enu</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="content">
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/menu1.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Special Salads </h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/menu2.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Special Soup</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/menu3.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Special Pasta</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/menu4.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Special Salad</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/menu5.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Special Soup</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/menu6.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Special Pasta</h3>
                    </div>
                </div>
            </div>
            <div class="title">
               <a href="#" class="btn">view all</a>
            </div>

        </section>
        <section class="expert" id="expert">
            <div class="title">
                <h2 class="titleText">Our Kitchen<span>E</span>xpert</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="content">
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/expert1.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Someone Famous</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/expert2.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Someone Famous</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/expert3.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Someone Famous</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/expert4.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <h3>Someone Famous</h3>
                    </div>
                </div>
            </div>
        </section>
        <section class="testimonials" id="testimonials">
            <div class="title white">
                <h2 class="titleText">They <span>S</span>aid About Us</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="content">
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/testi1.jpg')}}">
                    </div>
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi at dignissimos deserunt quae expedita? Voluptatibus, </p>
                        <h3>Someone Famous</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/testi2.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi at dignissimos deserunt quae expedita? Voluptatibus, </p>
                        <h3>Someone Famous</h3>
                    </div>
                </div>
                <div class="box">
                    <div class="imgBx">
                        <img src="{{asset('welcome/img/testi3.jpg')}}" alt="">
                    </div>
                    <div class="text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi at dignissimos deserunt quae expedita? Voluptatibus, </p>
                        <h3>Someone Famous</h3>
                    </div>
                </div>

            </div>
        </section>

        <section class="contact" id="contact">
            <div class="title">
                <h2 class="titleText">They <span>C</span>ontact Us</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="contactForm">
                <h3>Send Message</h3>
                <div class="inputBox">
                    <input type="text" name="" id="" placeholder="Name">
                </div>
                <div class="inputBox">
                    <input type="text" name="" id="" placeholder="Email">
                </div>
                <div class="inputBox">
                    <textarea type="text" name="" id=""></textarea>
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
                menuToggle.classList.toggle('active');
            }
        </script>
    </body>
</html>
