@include('headunypublica')
@include('headerunypublica')


<section id="titleHeader">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h1>{{$class->title}}</h1>
                        <h1>{{$class->subtitle}}</h1>
                        <h6><i class="fas fa-calendar pr-1"></i> {{$class->start_date}}</h6>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-descrition">
                            <h2>Informações do Curso</h2>
                            <hr>
                            <p>curso técnico, em dinâmica de imersão, com foco no treinamento de servidores públicos, fornecendo a devida habilitação profissional.</p>
                            <p class="icon-descrition mt-4"><i class="fas fa-hourglass-half"></i> Carga-horária 18 horas </p>
                            <p class="icon-descrition"><i class="fas fa-hourglass-half"></i> Curso Premium</p>
                            <p class="icon-descrition mb-4"><i class="fas fa-hourglass-half"></i> +Tutorial Complementar (
                                36h                                )</p>

                            <a href="pre-matricula.php?id=2532" class="w-100 btn-unyflex-light my-1">Pré-Matrícula</a>
                            <a href="matricula.php?id=2532#pagina-curso" class="w-100 btn-unyflex-solid my-1">Fazer Matrícula</a>
                            <a href="resumo-curso.php?id=2532" class="w-100 btn-unyflex-light">Imprimir proposta</a>

                        </div>
                    </div>
                </div>
            </div>
        </section>






<section id="descricaoCurso">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="tab">
                            <button class="tabLinks active-sobre" onclick="openSobre(event, 'tab01')" id="defaultOpen">Sobre o Curso</button>
                            <button class="tabLinks" onclick="openSobre(event, 'tab02')">Carga Horária</button>
                            <button class="tabLinks" onclick="openSobre(event, 'tab03')">Corpo Docente</button>
                        </div>

                        <div id="tab01" class="tabContent" style="display: block;">
                            <p><strong>Pandemia</strong></p>
                            <p class="mb-3">O país, assim como o restante do mundo, passa por cuidados especiais em razão do surgimento do Coronavírus. Aqui, todos cumprem os protocolos de enfrentamento sem risco. Conheça as normas contra COVID-19. Conheça nosso protocolo contra covid-19.</p>

                            <p><strong>Habilidades</strong></p>
                            <p>Com este curso, o aluno vai adquirir conhecimentos sobre o tema e seus desmembramentos, de maneira objetiva e prática, já que os professores possuem titulação e vivência na área. Reforçará a competência e desempenhará suas atividades com eficiência; crescerá na carreira, e contribuirá no combate às irregularidades e responsabilizações.</p>
                        </div>

                        <div id="tab02" class="tabContent" style="display: none;">
                            <p><strong></strong></p>
                            <p>Serão 4 dias onde aprenderá conteúdo de pelo menos 4 anos. Com cada painel sendo de uma ementa das nossas pós graduações. Te levando do começo ao fim, as respostas do seu dia-a-dia, do que pode, e do que não pode na gestão pública.</p>
                            <br>
                            <p><strong></strong></p>
                            <p>Seu certificado tem a validação da nossa faculdade, devidamente registrado ao MEC, sendo de curso de extensão universitária. Com a devida carga horário mencionada. Este mesmo certificado, poderá ser utilizado em dispensas de materiais em nossas graduações e pós graduações.</p>
                        </div>

                        <div id="tab03" class="tabContent" style="display: none;">

                        @foreach ($teachers as $teacher)
                            
                        

                                                            <figure id="img" style="float: left;">

                                    <img src="https://unipublicabrasil.com.br/dev-paulo/storage/app/docentes/{{$teacher->teacher->photo}}" style="border-radius: 50%; max-height: 75px;">


                                </figure>
                                <div style="margin-left:100px;text-align: justify;">
                                    <br>
                                    <p> <strong>{{$teacher->teacher->name}}</strong></p>
                                    <br>

                                    <p>{{$teacher->teacher->short_resume}}</p>

                                </div>


@endforeach
                            

                        </div>

                    </div>
                </div>
            </div>
        </section>









        <section id="callTres" class="mt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Conteúdo Programático</h2>
                        <hr class="mx-auto">
                    </div>
                    <div class="col-lg-10 offset-lg-1">
                        <div class="tab my-4 text-center">
                            <button class="tablinks active" onclick="openCity(event, 'painel01')" id="defaultOpenPainel">Painel 01</button>
                            <button class="tablinks" onclick="openCity(event, 'painel02')">Painel 02</button>
                            <button class="tablinks" onclick="openCity(event, 'painel03')">Painel 03</button>
                            <button class="tablinks" onclick="openCity(event, 'painel04')">Painel 04</button>
                            <button class="tablinks" onclick="openCity(event, 'painel05')">Painel 05</button>
                            <button class="tablinks" onclick="openCity(event, 'painel06')">Painel 06</button>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-3 mt-3">
                    @foreach ($panels as $panel )
                        
                    
                                                        <div id="painel0{{$loop->iteration}}" class="tabcontent" style="display: block;">
                                    <h6>{{$panel->title}}</h6>
                                    <hr>
                                    <p><strong>Docente:</strong> {{$panel->teacher->name}}</p>
                                    <p><i class="fas fa-calendar"></i>Dia: {{$panel->start_time}} <i class="fas fa-clock"></i> Horário:14h às 17h</p>
                                    <ul>
                                        {{$panel->content}}
                                    </ul>
                                </div>
                                @endforeach
                                           
                                    </ul>
                                </div>
                        
                        
                    </div>
                </div>
            </div>
        </section>








        <section id="diferenciaisCurso">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <h2>Nossos cursos podem ser realizados de 4 formas</h2>
                        <hr>
                    </div>
                    <div class="col-lg-3">
                        <img src="https://unipublicabrasil.com.br/assets/img/icon/icon-01.png" alt="Cursos Presenciais" class="img-fluid">
                        <p class="mb-0 mt-3"><strong>Cursos Presenciais</strong></p>
                        <p>A experiência mais imersiva do ensino Unipublica.</p>
                    </div>
                    <div class="col-lg-3">
                        <img src="https://unipublicabrasil.com.br/assets/img/icon/icon-02.png" alt="Ao vivo" class="img-fluid">
                        <p class="mb-0 mt-3"><strong>Ao Vivo </strong></p>
                        <p>A experiência mais tecnológica, o aluno participa e envia perguntas em tempo real.</p>
                    </div>
                    <div class="col-lg-3">
                        <img src="https://unipublicabrasil.com.br/assets/img/icon/icon-03.png" alt="Aulas Gravadas" class="img-fluid">
                        <p class="mb-0 mt-3"><strong>Aulas Gravadas</strong></p>
                        <p>A experiência mais flexível de estudar.</p>
                    </div>
                    <div class="col-lg-3">
                        <img src="https://unipublicabrasil.com.br/assets/img/icon/icon-04.png" alt="In Company" class="img-fluid">
                        <p class="mb-0 mt-3"><strong>In Company</strong></p>
                        <p>Toda nossa qualidade e excelência promovida no seu local escolhido.</p>
                    </div>
                </div>
            </div>
        </section>















        <section id="investimento">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Investimento</h2>
                        <hr class="mx-auto">
                    </div>
                    <div class="col-lg-4">
                        <div class="box-investimento">
                            <h5>Matrícula Avulsa</h5>
                                                        <p style="text-decoration: line-through;  color: #909090; font-size: 12px;">De: R$ 2990</p>
                            <p>por R$2490,00</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-investimento">
                            <h5>+ de 1 Participante</h5>
                            <p style="text-decoration: line-through; color: #909090; font-size: 12px;">De: R$ 2990</p>
                            <p>por R$2241,00</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-investimento">
                            <h5>Assinantes Corporativos</h5>
                            <p>Gratuito</p>
                        </div>
                    </div>
                </div>
                <div class="row text-center py-5" style="margin-left: -370px;">
                    <div class="col-lg-3 offset-lg-3">
                        <a href="pre-matricula.php?id=2532" class="w-100 btn-unyflex-light">Pré-Matrícula</a>
                    </div>
                    <div class="col-lg-3">
                        <a href="matricula.php?id=2532#pagina-curso" class="w-100 btn-unyflex-solid">Fazer Matrícula</a>
                    </div>
                    <div class="col-lg-3 ">
                        <a href="resumo-curso.php?id=2532" class="w-100 btn-unyflex-light">Imprimir proposta</a>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-lg-12 text-center">
                        <h2>Localização</h2>
                        <hr class="mx-auto mb-5">
                    </div>
                    <div class="col-lg-4">
                        <p><strong>Local do Curso</strong></p>
                        <p>R. Voluntarios da patria, 547<br>
                            Centro, Curitiba - PR, 80020-000</p>

                        <p><a class="px-2" href="https://g.page/unipublica?share"><i class="fab fa-google"></i> Abrir no GMaps</a>
                            <!--<a class="px-2" href="#"><i class="fab fa-waze"></i> Abrir no Waze</a>-->
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <p><strong>Hotel Conveniado da Unipública </strong></p>
                        <p><strong>FLAT PETRAS</strong><br>
                            Alameda Júlia da Costa, 340<br>
                            São Francisco, Curitiba - PR, 80410-070</p>
                        <p>Para adquirir o desconto entre em contato <a href="https://api.whatsapp.com/send?phone=554138832313&amp;text=Olá.%20Sou%20aluno%20da%20Unipublica%20e%20gostaria%20de%20me%20hospedar" target="_blank"><b>clicando aqui</b></a>. Diga que é aluno Unipublica.</p>

                        <p><a class="px-2" href="https://g.page/flatpetras?share"><i class="fab fa-google"></i> Abrir no GMaps</a>
                            <!--<a class="px-2" href="#"><i class="fab fa-waze"></i> Abrir no Waze</a>-->
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <p><strong>Opções de Quartos</strong></p>
                        <p>Econômico Individual - R$ 110,00<br>
                            Econômico Duplo - R$ 130,00<br>
                            Luxo Individual - R$ 130,00<br>
                            Luxo Duplo - R$ 160,00</p>
                    </div>
                </div>
            </div>
        </section>





























        <script src="https://unipublicabrasil.com.br/assets/vendor/js/highlight.js"></script>
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
      

        <script src="https://unipublicabrasil.com.br/assets/vendor/js/aos.js"></script>
 
            AOS.init({
                easing: 'ease-in-out-sine'
            });
        </script>

        <script src="https://unipublicabrasil.com.br//assets/js/script.js"></script>
        
    @include('footerunypublica')