<x-app-layout>
	<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Complete Travel Website Html Css</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    
        <link rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    </head>
    <body>
        <!--header--->
        {{-- <header>
            <a href="#" class="logo">Travel</a>
            <div class="bx bx-menu" id="menu-icon"></div>
    
            <ul class="navbar">
                <li><a href="#home">Home</a></li>
                <li><a href="#package">Package</a></li>
                <li><a href="#destination">Destination</a></li>
                <li><a href="#contact">Contact Us</a></li>
            </ul>
        </header> --}}
        {{-- {{$empresa->nombre}} --}}
        <!--Home section--->
        <section class="home" id="home">
            <div class="home-text">
                <h1>Elige tu Destino <br>con {{$empresa->nombre}}</h1>
                <p>Disfruta experiencias inolvidables <br>explora nuevos lugares</p>
                <a href="{{route('inicio')}}" class="home-btn">Comienza</a>
            </div>
        </section>
    
        <!--container--->
        <section class="container">
            <div class="text">
                <h2>Escoje tus actividades <br> con nuestros diferentes servicios!</h2>
            </div>
    
            {{-- bg-white bg-opacity-50 shadow-xl rounded-lg p-6 --}}
            <div class="row-items bg-indigo-200">
                <div class="container-box">
                    <div class="container-img  ">
                        <img src="img/c2.png">
                    </div>
                    <h4>Lugares Turisticos</h4>
                </div>
    
                <div class="container-box">
                    <div class="container-img">
                        <img src="img/c7.png">
                    </div>
                    <h4>Restaurantes</h4>
                </div>
    
                <div class="container-box">
                    <div class="container-img">
                        <img src="img/c4.png">
                    </div>
                    <h4>Hoteles</h4>
                </div>
    
                <div class="container-box">
                    <div class="container-img">
                        <img src="img/c8.png">
                    </div>
                    <h4>Viajes</h4>
                </div>
    
            </div>
        </section>
    
        <!--Package section--->
        <section class="package" id="package">
            <div class="title">
                <h2>Variedad <br> de Destinos</h2>
            </div>
    
            <div class="package-content">
                <div class="box items-center">
                    <div class="thum">
                        <img src="img/l4.jpg">
                    </div>
                    
                    <div class="dest-content ">
                        <div class="location items-center">
                            <h4 class="items-center">Santa Cruz</h4>
                        </div>
                    </div>
                </div>
    
                <div class="box">
                    <div class="thum">
                        <img src="img/l3.jpg">
                    </div>
    
                    <div class="dest-content">
                        <div class="location">
                            <h4>Cochabamba</h4>
                        </div>
                        
                    </div>
                </div>
    
                <div class="box">
                    <div class="thum">
                        <img src="img/d14.jpg">
                    </div>
    
                    <div class="dest-content">
                        <div class="location">
                            <h4>Potosi</h4>
                        </div>
                    </div>
                </div>
    
            </div>
        </section>
    
        <!--destination section--->
        <section class="destination" id="destination">
            <div class="title">
                <h2>Nuestros Destinos <br> Mas Populares!</h2>
            </div>
    
            <div class="destination-content">
                <div class="col-content">
                    <img src="img/d13.jpg">
                    <h5>Samaipata</h5>
                    <p>Santa Cruz</p>
                </div>
    
                <div class="col-content">
                    <img src="img/d5.jpg">
                    <h5>El Cristo</h5>
                    <p>Cochabamba</p>
                </div>
    
                <div class="col-content">
                    <img src="img/d11.jpg"> 
                    {{-- d6 o d7 --}}
                    <h5>Lago Titicaca</h5>
                    <p>La Paz</p>
                </div>
    
                <div class="col-content">
                    <img src="img/d8.jpg">
                    <h5>Casa Dorada</h5>
                    <p>Tarija</p>
                </div>
    
                <div class="col-content">
                    <img src="img/d10.jpg">
                    <h5>Salar de Uyuni</h5>
                    <p>Potosi</p>
                </div>
    
                <div class="col-content">
                    <img src="img/d12.jpg">
                    <h5>Huellas de Dinosaurios</h5>
                    <p>Chuquisaca</p>
                </div>
    
            </div>
        </section>
    
        <!--Newsletter--->
        <section class="newsletter content-center bg-center">
            <div class="news-text content-center bg-center">
                <h2 class="text-center">{{$empresa->nombre}}</h2>
                <p>El propósito general de {{$empresa->nombre}} es aportar a la industria del turismo en Bolivia, de manera que se permita mejorar la experiencia del cliente 
                     <br> a través de diversos servicios que se adapten a los requerimientos del cliente como ser Lugares Turisticos, Viajes, Hoteles, 
                    <br>  Restaurantes, Transportes Privados, facilitando asi y ampliando tus opciones en el proceso de elegir tu proximo destino</p>
            </div>
    
            {{-- <div class="send">
                <form>
                    <input type="email" placeholder="Write Your Email" required>
                    <input type="submit" value="Submit">
                </form>
            </div> --}}
        </section>
    
        <!--footer--->
        <section id="contact">
            <div class="footer">
                <div class="main mb-4 px-4">
                    <div class="list mb-4">
                        <h4>Ubicacion</h4>
                        <ul>
                            <li><a href="">{{$empresa->ubicacion}}</a></li>
                            <li><a href="">{{$empresa->direccion}}</a></li>
                        </ul>
                    </div>
    
                    {{-- <div class="list">
                        <h4>Support</h4>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Tour</a></li>
                        </ul>
                    </div> --}}
    
                    
                    <div class="list">
                        <h4>Contacto</h4>
                        <ul>
                            <li><a href="">{{$empresa->telefono}}</a></li>
                            <li><a href="">{{$empresa->email}}</a></li>
                        </ul>
                    </div>
                
    
                    <div class="list">
                        <h4>Redes</h4>
                        <div class="social">
                            <a href="{{$empresa->facebook}}"><i class='bx bxl-facebook' ></i></a>
                            <a href={{$empresa->instagram}}><i class='bx bxl-instagram-alt' ></i></a>
                            <a href={{$empresa->whatsapp}}><i class='bx bxl-whatsapp' ></i></a>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="end-text">
                <p> ©2022 Todos los derechos reservados por {{$empresa->nombre}}</p>
            </div>
        </section>
    
        <!--link to js--->
        <script type="text/javascript" src="js/script.js"></script>
    
    </body>
</html>
    
</x-app-layout>