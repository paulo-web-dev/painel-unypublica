@extends('painel.layouts.app')


@section('content')

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Perfil
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5 lg:mt-0">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full"
                            src="https://unipublicabrasil.com.br/dev-paulo/storage/app/alunos/perfil/{{$student->photo}}">
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-base">{{ $student->name }}</div>
                        <div class="text-gray-600">{{ $student->city }}/ {{ $student->state }}</div>
                    </div>
                </div>
                <div class="p-5 border-t nav-tab border-gray-200 dark:border-dark-5">
                    <a id="informacoes-pessoais-tab" data-toggle="tab" data-target="#informacoes-pessoais"
                        href="javascript:;" role="tab" class="flex items-center">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Informações Pessoais </a>
                    <a id="produtos-contratados-tab" role="tab" data-toggle="tab" data-target="#produtos-contratados"
                        href="javascript:;" class="flex items-center mt-5" href=""> <i data-feather="box"
                            class="w-4 h-4 mr-2"></i> Produtos
                        Contratados </a>
                    <a class="flex items-center mt-5" href=""> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Alterar
                        Senha </a>
                </div>
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 box lg:col-span-8 xxl:col-span-9 tab-content">

            <div id="informacoes-pessoais" role="tabpanel" aria-labelledby="informacoes-pessoais-tab"
                class="grid grid-cols-12 gap-6 tab-pane active">
                <form action="{{ route('atualiza-aluno', ['student' => $student->id]) }}"
                    class="grid grid-cols-12 gap-6 col-span-12 xxl:col-span-12" enctype="multipart/form-data" data-single="true"  method="post">
                    @csrf
                    @method('PUT')

                    <!-- BEGIN: Products -->
                    <div class="intro-y col-span-12 xxl:col-span-12">
                        <div class="flex items-center p-5">
                            <h2 class="font-medium text-base mr-auto">
                                Informações Pessoais
                            </h2>
                        </div>
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-24 lg:h-24 image-fit relative">
                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full"
                                    src="https://unipublicabrasil.com.br/dev-paulo/storage/app/alunos/perfil/{{$student->photo}}">
                                <div
                                    class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-1 rounded-full p-2">
                                    <i class="w-4 h-4 text-white" data-feather="camera"></i>
                                </div>
                            </div>
                            <div class="ml-5">
                                <div class="truncate sm:whitespace-normal font-medium text-lg">
                                    {{ $student->name }}
                                </div>
                                <div class="text-gray-600">ID: {{ $student->id }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-y col-span-12 xxl:col-span-6 px-5">
                        <div class="col-span-12 mt-5">
                            <label for="nome" class="form-label"><strong>Nome</strong></label>
                            <input id="nome" type="text" name="nome" class="form-control" placeholder="Nome do aluno"
                                value="{{ $student->name }}">
                        </div>
                        <div class="col-span-6 mt-5">
                            <label for="cpf" class="form-label"><strong>CPF</strong></label>
                            <input id="cpf" type="text" name="cpf" class="form-control" placeholder="CPF do aluno"
                                value="{{ $student->cpf }}">
                        </div>
                        <div class="mt-5">
                            <label for="email" class="form-label"><strong>E-mail</strong></label>
                            <input id="email" type="email" name="email" class="form-control" placeholder="E-mail do aluno"
                                value="{{ $student->email }}">
                        </div>
                        <div class="mt-5">
                            <label for="telefone" class="form-label"><strong>Telefone</strong></label>
                            <input id="telefone" type="text" name="telefone" class="form-control"
                                placeholder="Telefone do aluno" value="{{ $student->phone }}">
                        </div>
                    </div>
                    <div class="intro-y col-span-12 xxl:col-span-6 px-5">
                        <div class="mt-5 ml-3">
                            <label for="cep" class="form-label"><strong>CEP</strong></label>
                            <input id="cep" type="text" name="cep" class="form-control" placeholder="CEP do aluno"
                                value="{{ $student->cep }}">
                        </div>
                        <div class="flex mt-5 ml-0">
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label for="rua" class="form-label"><strong>Rua</strong></label>
                                <input id="rua" type="text" name="rua" class="form-control" placeholder="Rua do aluno"
                                    value="{{ $student->street }}">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="numero" class="form-label"><strong>Núm</strong></label>
                                <input id="numero" type="text" name="num" class="form-control" placeholder="Núm do aluno"
                                    value="{{ $student->house_number }}">
                            </div>
                        </div>
                        <div class="mt-5 ml-3">
                            <label for="bairro" class="form-label"><strong>Bairro</strong></label>
                            <input id="bairro" type="text" name="bairro" class="form-control" placeholder="Bairro do aluno"
                                value="{{ $student->district }}">
                        </div>
                        <div class="flex mt-5 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="cidade">
                                    <strong>Cidade</strong>
                                </label>
                                <input class="form-control" id="cidade" name="cidade" type="text"
                                    value="{{ $student->city }}" placeholder="Cidade do Aluno">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="uf">
                                    <strong>UF</strong>
                                </label>
                                <div class="relative">
                                    <select class="form-control" name="uf" id="uf">
                                        <option>{{ $student->state }}</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                           <div class="col-span-12 xl:col-span-6" style="margin-left:100px; margin-right:100px; margin-top:30px;margin-bottom:30px">
                        <label class="form-label"><strong>Atualizar Foto do Aluno</strong></label>
                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                            <div class="px-4 pt-24 pb-24 flex items-center justify-center cursor-pointer relative">
                                <div id="areaArquivo">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i>
                                    <span class="mr-1 font-bold">Atualizar Foto do Aluno</span>
                                </div>
                                <input type="file" id="file" name="file"
                                    class="w-full h-full top-0 left-0 absolute opacity-0">
                            </div>
                        </div></div>
                    </div>
                    <div class="intro-y col-span-12 xxl:col-span-12 mt-12 px-5 pb-4">
                        <button class="btn btn-primary w-full  mr-2 mb-2"> <i data-feather="activity"
                                class="w-4 h-4 mr-2"></i>
                            Atualizar cadastro </button>
                    </div>
                </form>
            </div>
            <div id="produtos-contratados" role="tabpanel" aria-labelledby="produtos-contratados-tab"
                class="grid grid-cols-12 gap-6 tab-pane">
                <!-- BEGIN: Products -->
                <div class="intro-y box  col-span-12 xxl:col-span-6">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Produtos Contratados
                        </h2>
                        <div class="dropdown ml-auto">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i
                                    data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>
                            </a>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content">
                                    <a href="{{ route('adicionar-matricula', ['student' => $student->id]) }}"
                                        class="items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200">
                                        <i data-feather="plus" class="w-4 h-4 mr-2"></i> <strong>Nova Matrícula</strong>
                                    </a>
                                </div>
                                <div class="dropdown-menu__content">
                                    <a href="{{ route('adicionar-assinatura', ['student' => $student->id]) }}"
                                        class="items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 ">
                                        <i data-feather="plus" class="w-4 h-4 mr-2"></i> <strong>Nova
                                            Assinatura</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="boxed-tabs nav nav-tabs flex-col sm:flex-row text-gray-700 dark:text-gray-300"
                            role="tablist">
                            <a id="top-products-presencial-tab" data-toggle="tab" data-target="#presencial"
                                href="javascript:;"
                                class="w-full sm:w-20 mb-2 sm:mb-0 py-2 rounded-md box dark:bg-dark-5 text-center sm:mx-2 active"
                                role="tab" aria-selected="true"> <i data-feather="home"
                                    class="block w-6 h-6 mb-2 mx-auto"></i>
                                Presencial </a>
                            <a id="top-products-online-tab" data-toggle="tab" data-target="#online" href="javascript:;"
                                class="w-full sm:w-20 mb-2 sm:mb-0 py-2 rounded-md box dark:bg-dark-5 text-center sm:mx-2"
                                role="tab" aria-selected="false"> <i data-feather="video"
                                    class="block w-6 h-6 mb-2 mx-auto"></i> Online </a>
                            <a id="top-products-assinatura-tab" data-toggle="tab" data-target="#assinatura"
                                href="javascript:;"
                                class="w-full sm:w-20 mb-2 sm:mb-0 py-2 rounded-md box dark:bg-dark-5 text-center sm:mx-2"
                                role="tab" aria-selected="false"> <i data-feather="monitor"
                                    class="block w-6 h-6 mb-2 mx-auto"></i> Assinatura </a>
                        </div>
                        <div class="tab-content mt-8">
                            <div id="presencial" class="tab-pane active" role="tabpanel"
                                aria-labelledby="top-products-presencial-tab">
                                @foreach ($student->enrollment as $enrollment)
                                    @if ($enrollment->modality == 'in_person')
                                        <div class="flex items-center mb-5">
                                            <div class="border-l-2 border-theme-1 pl-4">
                                                <a href="{{ route('informacao-matricula', ['enrollment' => $enrollment->id]) }}"
                                                    class="font-bold">{{ $enrollment->classes->title }} -
                                                    {{ $enrollment->classes->subtitle }}
                                                    (# {{ $enrollment->classes->id }})

                                                    <div class="text-gray-600"># {{ $enrollment->id }}
                                                        <span class="ml-10">Data:
                                                            {{ date('d/m/Y', strtotime($enrollment->classes->start_date)) }}
                                                            à
                                                            {{ date('d/m/Y', strtotime($enrollment->classes->end_date)) }}
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div id="online" class="tab-pane" role="tabpanel" aria-labelledby="top-products-online-tab">
                                @foreach ($student->enrollment as $enrollment)
                                    @if ($enrollment->modality == 'distance_learning')
                                        <div class="flex items-center mb-5">
                                            <div class="border-l-2 border-theme-1 pl-4">
                                                <a href="{{ route('informacao-matricula', ['enrollment' => $enrollment->id]) }}"
                                                    class="font-bold">{{ $enrollment->classes->title }} -
                                                    {{ $enrollment->classes->subtitle }}
                                                    (# {{ $enrollment->classes->id }})
                                                </a>
                                                <div class="text-gray-600"># {{ $enrollment->id }}
                                                    <span class="ml-10"><strong>Data de Vigência: </strong>
                                                        {{ date('d/m/Y', strtotime($enrollment->start_date)) }}
                                                        à
                                                        {{ date('d/m/Y', strtotime($enrollment->end_date)) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div id="assinatura" class="tab-pane" role="tabpanel"
                                aria-labelledby="top-products-assinatura-tab">
                                @foreach ($subscription as $itemSubscription)

                                    <div class="flex items-center">
                                        <div class="border-l-2 border-theme-1 pl-4">
                                            <a href="{{ route('informacao-assinatura', ['subscription' => $itemSubscription->id]) }}"
                                                class="font-bold">Assinatura de
                                                {{ date('d/m/Y', strtotime($itemSubscription->start_date)) }} até
                                                {{ date('d/m/Y', strtotime($itemSubscription->start_date)) }}
                                            </a>
                                            <div class="text-gray-600">
                                                <span><strong>#</strong> {{ $itemSubscription->id }}</span>
                                                <span class="ml-5"><strong>Status: </strong>
                                                    @if ($itemSubscription->status == 'not_checked')
                                                        Não conferido
                                                    @endif
                                                    @if ($itemSubscription->status == 'checked')
                                                        Conferido
                                                    @endif
                                                    @if ($itemSubscription->status == 'scheduled_billing')
                                                        Pagamento agendado
                                                    @endif
                                                    @if ($itemSubscription->status == 'bill_sent')
                                                        Pagamento solicitado
                                                    @endif
                                                    @if ($itemSubscription->status == 'identified_payment')
                                                        Pagamento identificado
                                                    @endif
                                                    @if ($itemSubscription->status == 'commercial_pending')
                                                        Pendência Comercial
                                                    @endif
                                                    @if ($itemSubscription->status == 'financial_pending')
                                                        Pendência Financeira
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Products -->
                {{-- <!-- BEGIN: Statistics -->
                <div class="intro-y box col-span-12 xxl:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Estatísticas Financeiras
                        </h2>
                        <div class="dropdown ml-auto">
                            <a class="dropdown-toggle w-5 h-5 block sm:hidden" href="javascript:;" aria-expanded="false"> <i
                                    data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>
                            </a>
                            <button class="dropdown-toggle btn btn-outline-secondary font-normal hidden sm:flex"
                                aria-expanded="false"> Export <i data-feather="chevron-down" class="w-4 h-4 ml-2"></i>
                            </button>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content box dark:bg-dark-1">
                                    <div class="px-4 py-2 border-b border-gray-200 dark:border-dark-5 font-medium">
                                        Export
                                        Tools</div>
                                    <div class="p-2">
                                        <a href=""
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="printer"
                                                class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i>
                                            Print </a>
                                        <a href=""
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="external-link"
                                                class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> Excel </a>
                                        <a href=""
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="file-text"
                                                class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> CSV </a>
                                        <a href=""
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="archive"
                                                class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i>
                                            PDF </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex flex-col sm:flex-row items-center">
                            <div class="flex flex-wrap sm:flex-nowrap mr-auto">
                                <div class="flex items-center mr-5 mb-1 sm:mb-0">
                                    <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                                    <span>Presencial</span>
                                </div>
                                <div class="flex items-center mr-5 mb-1 sm:mb-0">
                                    <div class="w-2 h-2 bg-theme-1 rounded-full mr-3"></div>
                                    <span>Online</span>
                                </div>
                            </div>
                        </div>
                        <div class="report-chart mt-8">
                            <canvas id="report-line-chart" height="130"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END: General Statistics --> --}}

                <!-- BEGIN:  -->
                <div class="intro-y box col-span-12 xxl:col-span-6">

                </div>
                <!-- END:  -->
                <!-- BEGIN:  -->
                <div class="intro-y box col-span-12 xxl:col-span-6">

                </div>
                <!-- END:  -->

            </div>
        </div>
    </div>
    @if (session()->get('message') == 'success')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Bom trabalho!</div>
                            <div class="text-gray-600 mt-2">O aluno foi adicionado com sucesso!</div>
                        </div>
                        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                                class="btn btn-primary w-24">Ok</button> </div>
                    </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif
    @if (session()->get('message') == 'atualizado')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Bom trabalho!</div>
                            <div class="text-gray-600 mt-2">Os dados do aluno foram atualizados com sucesso!</div>
                        </div>
                        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                                class="btn btn-primary w-24">Ok</button> </div>
                    </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif
    @if (session()->get('message') == 'erro')
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Erro!</div>
                            <div class="text-gray-600 mt-2">Não foi possível atualizar o usuário!</div>
                        </div>
                        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                                class="btn btn-primary w-24">Ok</button> </div>
                    </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif
    @if (session()->get('message') == 'enrollment_deleted')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Bom trabalho!</div>
                            <div class="text-gray-600 mt-2">A matrícula foi excluída com sucesso!</div>
                        </div>
                        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                                class="btn btn-primary w-24">Ok</button> </div>
                    </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif
    @if (session()->get('message') == 'enrollment_created')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Bom trabalho!</div>
                            <div class="text-gray-600 mt-2">A matrícula foi criada com sucesso!</div>
                        </div>
                        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                                class="btn btn-primary w-24">Ok</button> </div>
                    </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif
    @if (session()->get('message') == 'subscription_created')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Bom trabalho!</div>
                            <div class="text-gray-600 mt-2">A assinatura foi criada com sucesso!</div>
                        </div>
                        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                                class="btn btn-primary w-24">Ok</button> </div>
                    </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif
    @if (session()->get('message') == 'subscription_deleted')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Bom trabalho!</div>
                            <div class="text-gray-600 mt-2">A assinatura foi excluída com sucesso!</div>
                        </div>
                        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                                class="btn btn-primary w-24">Ok</button> </div>
                    </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif


@endsection
@push('custom-scripts')
      <script>
        (function(cash) {
            document.getElementById('file').onchange = function() {
                var arquivo = document.getElementById('file').value;
                var nomearquivo = arquivo.substring(12);
                var modeloArquivo =
                    '<div class="file box rounded-md px-5 sm:px-5 relative zoom-in">' +
                    '<p class="w-1/5 file__icon file__icon--file mx-auto">' +
                    '</p>' +
                    '<p class="block font-medium mt-4 text-center truncate">' + nomearquivo + '</p>' +
                    '</div>';
                cash('#areaArquivo').html(modeloArquivo);
            }
        })(cash);
    </script>
    <script src="{{ url('dist/js/modal-info.js') }}"></script>
@endpush
