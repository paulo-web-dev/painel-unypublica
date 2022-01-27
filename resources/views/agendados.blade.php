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
<section id="listagem">
        <div class="container">
            <div class="row mt-3">

                

                        <!-- PARTE GERAL -->
                        
                        

                                                            <div class="w-100 pl-3 pt-3">
                                        <h3><strong>Proximos Cursos Agendados</strong></h3>
                                        <hr>
                                    </div>
                                        @foreach ($agendados as $agendado)
                                            
                                        
                                     <div class="col-lg-4 px-0">
                                        <div class="box-cursos">
                                            <div class="box-content-top">
                                                <a href="https://unipublicabrasil.com.br/curso.php?curso=portal-ouvidoria-e-lgpd-estudo-pratico&amp;id=2527">
                                                    <img src="https://www.unipublicabrasil.com.br/uploads/cursos/bef66d6730b491d4ec64fd213f98e4c413122021190124.png" class="img-fluid" alt="">
                                                </a>
                                                <p><i class="fas fa-map-marker-alt"></i>Curitiba - PR </p>
                                                <div class="box-data">
                                                    <p><strong>{{$agendado->workload}} </strong>Horas</p>
                                                </div>
                                            </div>
                                            
                                    <p class="tag-data"><i class="far fa-calendar"></i>{{date('d/m/Y', strtotime($agendado->start_date))}}</p>
                                            <hr>
                                            <ul>
                                            @foreach ($agendado->panels as $painel)
                                             <li>{{$painel->title}}</li>
                                             @endforeach
                                             </ul>

                                            <a href="https://unipublicabrasil.com.br/curso.php?curso=portal-ouvidoria-e-lgpd-estudo-pratico&amp;id=2527" class="btn-unyflex-light">Ver Programação Completa</a>
                                        </div>
                                    </div>
                                @endforeach
        
    </section>