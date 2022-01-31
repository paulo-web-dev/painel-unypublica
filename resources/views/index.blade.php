@include('headunypublica')
@include('headerunypublica')

<!-- FAZER PROGRAMAÇÃO PARA EXIBIR BANNER -->

    <section id="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="carouselHome" class="carousel slide" data-ride="carousel" data-interval="false">
                            <ol class="carousel-indicators">
                               
                                    <li data-target="#carouselHome" data-slide-to="1" class= "active "></li>
                            
                            </ol>
                            <div class="carousel-inner">
                                    <div class="carousel-item  active ">
                                        <a href="https://unipublicabrasil.com.br/uploads/banners/prestac%CC%A7a%CC%83o%20de%20contas.png">
                                            <img class="d-block w-100" src="https://unipublicabrasil.com.br/uploads/banners/prestac%CC%A7a%CC%83o%20de%20contas.png">
                                            <div class="carousel-caption">
                                              
                                                <!--<p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipiscing<br> elit, sed do eiusmod tempor incid.</p>-->
                                                <!-- <a href="https://unyflex.com.br/assinatura" class="btn-unyflex-solid"><i class="fas fa-check"></i> Assine Agora!</a> -->
                                            </div>
                                    </div>
                                    
                                    </a>
                

                                <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
    </section>


<!-- CATEGORIAS -->


    <section id="categorias">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=federais" class="btn-categoria">Servidores Federais</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=rh" class="btn-categoria">RH Municipal</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=juridico" class="btn-categoria">Jurídico</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=licitacao" class="btn-categoria">Licitações Públicas</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=controle" class="btn-categoria">Controle Interno</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=tributacao" class="btn-categoria">Tributação Municipal</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=assessoria" class="btn-categoria">Assessoria</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=secretarias" class="btn-categoria">Secretarias Municipais</a>
                </div>
                <div class="col-lg-12">
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=legislativo" class="btn-categoria">Legislativo</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=financas" class="btn-categoria">Finanças Municipais</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=contadores" class="btn-categoria">Contadores Municipais</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=saude" class="btn-categoria">Profissionais da Saúde</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=ambiente" class="btn-categoria">Gestão Ambiental</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=patrimonio" class="btn-categoria">Patrimônio</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=consorcio" class="btn-categoria">Consórcio</a>
                    <a href="https://unipublicabrasil.com.br/agendados.php?setor=autarquia" class="btn-categoria">Autarquia</a>
                </div>
            </div>
        </div>
    </section>


<!-- CURSOS PRESENCIAIS -->

    <section id="cursosPresenciais">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cursos Agendados</h2>
                    <hr>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme">
                            @foreach ($presenciais as $presencial )
                                
                          
                            <div class="item">
                                <div class="box-cursos">
                                    <div class="box-content-top">
                                        <a href="https://unipublicabrasil.com.br/curso.php?curso=portal-ouvidoria-e-lgpd-estudo-pratico&id=2527">
                                            <img src="https://unipublicabrasil.com.br/dev-paulo/storage/app/cursos/banner/{{$presencial->photo}}" class="img-fluid" alt="">
                                        </a>
                                        <p><i class="fas fa-map-marker-alt"></i>Curitiba </p>
                                        <div class="box-data">
                                            <p><strong>{{$presencial->workload}}</strong>Horas</p>
                                        </div>
                                    </div>
                                
                                    <p class="tag-data"><i class="far fa-calendar"></i>{{date('d/m/Y', strtotime($presencial->start_date))}}</p>
                                    <hr>
                                    <ul>
                                            @foreach ($presencial->panels as $painel )
                                                
                                            
                                            <li>{{$painel->title}}</li>
                                            @endforeach
                                           
                                     
                                    </ul>

                                    <a href="https://dev-paulo.unipublicabrasil.com.br/curso/{{$presencial->slug}}" class="btn-unyflex-light">Ver Programação Completa</a>
                                </div>
                            </div> 
                         @endforeach
                            </div>
                            </div>
                    <a href="https://unipublicabrasil.com.br/agendados.php" style="text-align: center;" class="w-100 btn-unyflex-light mb-5">Ver todos os cursos!</a>
                </div>
            </div>
        </div>
    </section>


<!-- CURSOS ONLINE -->


     <section id="cursosOnline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cursos Online</h2>
                    <hr>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme">
                     @foreach ($onlines as $online )
                            <div class="item">
                                <div class="box-cursos">
                                    <div class="box-content-top">
                                        <a href="https://unyflex.com.br/curso/255">
                                            <img src="https://unipublicabrasil.com.br/dev-paulo/storage/app/cursos/banner/{{$online->photo}}" class="img-fluid" alt="">
                                        </a>
                                        <h6></h6>
                                        <p><i class="fas fa-circle"></i> Ao Vivo (Online)</p>
                                        <div class="box-data">
                                            <p><strong>{{$online->workload}}</strong>horas</p>
                                        </div>
                                    </div>
                                    <p class="tag-data">Disponivel para: <i class="fab fa-google-play"></i> <i class="fab fa-windows"></i> <i class="fab fa-apple"> </i> <i class="fab fa-app-store-ios"></i> </p>
                                    <hr>
                                    <ul>
                                       @foreach ($online->panels as $painel )
                                                
                                            
                                            <li>{{$painel->title}}</li>
                                            @endforeach
                                           
                                       
                                    </ul>

                                    <a href="https://unyflex.com.br/curso/265" class="btn-unyflex-light">Começar Agora</a>
                                </div>
                            </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section id="callUm">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h4><strong>+1600</strong> cursos realizados</h4>
                </div>
                <div class="col-lg-3">
                    <h4><strong>+150</strong> professores qualificados</h4>
                </div>
                <div class="col-lg-3">
                    <h4><strong>+36500</strong> alunos formados</h4>
                </div>
                <div class="col-lg-3">
                    <h4><strong>+72</strong> cursos online</h4>
                </div>
            </div>
        </div>
    </section>

    <section id="diferenciais">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Confira as vantagens da assinatura!</h2>
                    <hr class="mx-auto">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-3">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/icon/icon-01.png" class="img-fluid">
                    <p>Apostilas de pós graduação<br>
                        completas disponíveis</p>
                </div>
                <div class="col-lg-3">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/icon/icon-02.png" class="img-fluid">
                    <p>Entrevistas com docentes<br>
                        sobre temas atuais</p>
                </div>
                <div class="col-lg-3">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/icon/icon-03.png" class="img-fluid">
                    <p>Aplicativo para iOS<br>
                        e Android</p>
                </div>
                <div class="col-lg-3">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/icon/icon-04.png" class="img-fluid">
                    <p>Certificados de<br>
                        conclusão de curso</p>
                </div>
                <div class="col-lg-3">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/icon/icon-05.png" class="img-fluid">
                    <p>Podcast em mp3<br>
                        (resumos)</p>
                </div>
                <div class="col-lg-3">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/icon/icon-06.png" class="img-fluid">
                    <p>Tira dúvidas<br>
                        ilimitados</p>
                </div>
                <div class="col-lg-3">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/icon/icon-07.png" class="img-fluid">
                    <p>Aulas ao vivo toda semana<br>
                        R$ 1490,00 por curso</p>
                </div>
                <div class="col-lg-3">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/icon/icon-08.png" class="img-fluid">
                    <p>Busca inteligente<br>
                        (busque pelos termos)</p>
                </div>
                <div class="col-lg-3">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/icon/icon-09.png" class="img-fluid">
                    <p>Cursos modulares<br>
                        (ou intensivos) R$ 699 cada</p>
                </div>
                <div class="col-lg-3">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/icon/icon-10.png" class="img-fluid">
                    <p>Videoaulas completas<br>
                        R$ 299 por curso</p>
                </div>
                <div class="col-lg-3">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/icon/icon-11.png" class="img-fluid">
                    <p>Descontos exclusivos em<br>
                        cursos de graduação ou pós</p>
                </div>
                <div class="col-lg-3">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/icon/icon-12.png" class="img-fluid">
                    <p>Kit escolar de estudo<br>
                        (caderno, caneta, suporte<br>
                        de celular e copo 500ml)</p>
                </div>
            </div>
        </div>
    </section>

    <section id="callDois">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="https://www.unipublicabrasil.com.br/assets/img/mockup.png" alt="App Unyflex" class="img-fluid img-mockup">
                </div>
                <div class="col-lg-8">
                    <h2 class="mt-5 pt-4">Aplicativo Unyflex</h2>
                    <hr>
                    <p>Na Unyflex você aprenderá de forma continuada, síncrona (ao vivo) e assíncrona (online) com quem sabe e entende do assunto. Com mais de 200 cursos completos, mais de 1000 videoaulas, mais de 300 apostilas, nesta plataforma, você vai encontrar o que é mais relevante para seu trabalho, aprendendo com segurança, seriedade e poder.</p>
                    <a href="#">
                        <img src="https://www.unipublicabrasil.com.br/assets/img/android.png" alt="Google Play" class="img-fluid w-25 p-2">
                    </a>
                    <a href="#">
                        <img src="https://www.unipublicabrasil.com.br/assets/img/ios.png" alt="Play Store" class="img-fluid w-25 p-2">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="planos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Faça qualquer curso gratuitamente!</h2>
                    <hr class="mx-auto">
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-6">
                    <div class="box-planos">
                        <h4>Assinatura <strong>Individual</strong></h4>
                        <hr class="mx-auto">
                        <p>acesso a todos os cursos e muito mais</p>
                        <div class="box-price">
                            <p>A partir de<br> <sup>R$</sup> <strong>139</strong><sub>,90/mês</sub></p>
                        </div>
                        <a href="https://unyflex.com.br/escolhapag" class="btn-unyflex-solid">Assinar Agora!</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box-planos plano-destaque">
                        <h4>Assinatura <strong>CORPORATIVA</strong></h4>
                        <hr class="mx-auto">
                        <p>Capacitação para toda a sua equipe!</p>
                        <div class="box-price">
                            <p>A partir de<br> <sup>R$</sup> <strong>99</strong><sub>,90/mês</sub></p>
                        </div>
                        <a href="https://unyflex.com.br/corporativo" class="btn-unyflex-solid">
                            <font style="color: #000000">Assinar Agora!</font>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                dots: false,
                nav: true,
                navText: ["<div class='nav-btn prev-slide'></div>", "<div class='nav-btn next-slide'></div>"],
                responsive: {
                    0: {
                        items: 1,
                        margin: 0,
                        loop: false
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        });
    </script>
    @include('footerunypublica')