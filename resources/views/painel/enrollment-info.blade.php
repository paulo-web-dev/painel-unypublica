@extends('painel.layouts.app')


@section('content')

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Matrícula
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 box lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y mt-5 lg:mt-0">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full"
                            src="{{ url('dist/images/profile-9.jpg') }}">

                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-base">{{ $enrollment->student->name }}</div>
                        <div class="text-gray-600"></div>
                    </div>
                </div>
                <div class="p-5 border-t nav-tab border-gray-200 dark:border-dark-5">
                    <p class="flex items-center mb-3">
                        <span class="font-bold mr-3 ">CPF: </span> {{ $enrollment->student->cpf }}
                    </p>
                    <p class="flex items-center mb-3">
                        <span class="font-bold mr-3 ">E-mail: </span> {{ $enrollment->student->email }}
                    </p>
                    <p class="flex items-center mb-3">
                        <span class="font-bold mr-3 ">Telefone: </span> {{ $enrollment->student->phone }}
                    </p>
                    <p class="flex items-center mb-3">
                        <span class="font-bold mr-3 ">CEP: </span> {{ $enrollment->student->cep }}
                    </p>
                    <p class="flex items-center">
                        <span class="font-bold mr-3 ">Endereço: </span> {{ $enrollment->student->street }},
                        {{ $enrollment->student->house_number }}
                    </p>
                    <p class=" mb-10">
                        {{ $enrollment->student->district }} -
                        {{ $enrollment->student->city }}/{{ $enrollment->student->state }}
                    </p>
                    <a href="{{ route('informacao-aluno', ['id' => $enrollment->student_id]) }}">
                        <button class="btn btn-rounded-secondary w-auto bg-gray-500 text-black font-normal">
                            <i data-feather="user" class="w-4 h-4 mr-2"></i>
                            Voltar para informações do aluno
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 box lg:col-span-8 xxl:col-span-9 tab-content">

            <div id="informacoes-matricula" role="tabpanel" aria-labelledby="informacoes-pessoais-tab"
                class="grid grid-cols-12 gap-6 tab-pane active">
                <form autocomplete="off" action="{{ route('atualiza-matricula', ['enrollment' => $enrollment->id]) }}"
                    class="grid grid-cols-12 gap-6 col-span-12 xxl:col-span-12" method="post">
                    @csrf
                    @method('PUT')

                    <!-- BEGIN: Products -->
                    <div class="intro-y col-span-9 xxl:col-span-9">
                        <div class="flex items-center border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base p-5 mr-auto ml-3">
                                Informações da Matrícula
                            </h2>
                        </div>
                    </div>
                    <div class="intro-y col-span-3 xxl:col-span-3">
                        <a href="javascript:;" data-toggle="modal" data-target="#excluirMatricula"
                            class="btn btn-elevated-danger float-right mr-3 mt-3 mb-2">Excluir Matrícula</a>
                    </div>
                    <div class="intro-y col-span-12 xxl:col-span-6">
                        <div class="col-span-12 mt-5 ml-3">
                            <label for="turma" class="form-label"><strong>Turma</strong></label>
                            <div>
                                <select data-placeholder="Selecione a turma" name="turma" class="tom-select w-full">
                                    <option value="{{ $enrollment->classes->id }}">
                                        {{ $enrollment->classes->id }} -
                                        {{ $enrollment->classes->title }} -
                                        {{ $enrollment->classes->subtitle }}
                                        ({{ date('d/m/Y', strtotime($enrollment->classes->start_date)) }} à
                                        {{ date('d/m/Y', strtotime($enrollment->classes->end_date)) }}
                                        )
                                    </option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">
                                            {{ $class->id }} -
                                            {{ $class->title }} -
                                            {{ $class->subtitle }}
                                            ({{ date('d/m/Y', strtotime($class->start_date)) }}
                                            à
                                            {{ date('d/m/Y', strtotime($class->end_date)) }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-span-6 mt-10 ml-3">
                            <label for="modalidade" class="form-label"><strong>Modalidade</strong></label>
                            <div>
                                <select data-placeholder="Selecione a modalidade" name="modalidade"
                                    class="tom-select w-full">
                                    <option value="{{ $enrollment->modality }}">
                                        @if ($enrollment->modality == 'in_person')
                                            Presencial
                                        @elseif ($enrollment->modality == 'distance_learning')
                                            Online
                                        @else
                                            Híbrida
                                        @endif
                                    </option>
                                    <option value="distance_learning">Online</option>
                                    <option value="in_person">Presencial</option>
                                    <option value="hybrid">Híbrida</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="valor" class="form-label"><strong>Valor</strong></label>
                                <input id="valor" type="text" name="valor" class="form-control"
                                    placeholder="Valor da Matrícula" value="{{ $enrollment->value }}">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="desconto" class="form-label"><strong>Desconto</strong></label>
                                <input id="desconto" type="text" name="desconto" class="form-control"
                                    placeholder="Desconto da Matrícula" value="{{ $enrollment->discount }}">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="valorFinal" class="form-label"><strong>Valor Final</strong></label>
                                <input id="valorFinal" type="text" name="valorFinal" class="form-control"
                                    placeholder="Valor Final da Matrícula" value="{{ $enrollment->final_value }}">
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="status" class="form-label"><strong>Status</strong></label>
                                <div>
                                    <select data-placeholder="Selecione o status da matrícula" name="status"
                                        class="tom-select w-full">
                                        <option value="{{ $enrollment->status }}">
                                            @if ($enrollment->status == 'not_checked')
                                                Não conferido
                                            @endif
                                            @if ($enrollment->status == 'checked')
                                                Conferido
                                            @endif
                                            @if ($enrollment->status == 'scheduled_billing')
                                                Pagamento agendado
                                            @endif
                                            @if ($enrollment->status == 'bill_sent')
                                                Pagamento solicitado
                                            @endif
                                            @if ($enrollment->status == 'identified_payment')
                                                Pagamento identificado
                                            @endif
                                            @if ($enrollment->status == 'commercial_pending')
                                                Pendência Comercial
                                            @endif
                                            @if ($enrollment->status == 'financial_pending')
                                                Pendência Financeira
                                            @endif
                                        </option>
                                        <option value="not_checked">Não conferido</option>
                                        <option value="checked">Conferido</option>
                                        <option value="scheduled_billing">Pagamento agendado</option>
                                        <option value="bill_sent">Pagamento solicitado</option>
                                        <option value="identified_payment">Pagamento identificado</option>
                                        <option value="commercial_pending">Pendência Comercial</option>
                                        <option value="financial_pending">Pendência Financeira</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="dataPagamento" class="form-label"><strong>Data de
                                        Pagamento</strong></label>
                                <div class="relative mx-auto">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border
                                                                                                                                                                                                                                                                                                                                                 text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                        <i data-feather="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" id="dataPagamento" class="data form-control pl-12"
                                        name="dataPagamento" autocomplete="off" value="{{ $enrollment->payday }}"
                                        data-single-mode="true">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="intro-y box col-span-12 xxl:col-span-6">
                        <div class="flex mt-5 ml-0">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="metodoPagamento" class="form-label"><strong>Método de Pagamento</strong></label>
                                <input id="metodoPagamento" type="text" name="metodoPagamento" class="form-control"
                                    placeholder="Boleto, cartão de crédito" value="{{ $enrollment->payment_method }}">
                            </div>
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label for="notaFiscal" class="form-label"><strong>Nota Fiscal</strong></label>
                                <input id="notaFiscal" type="text" name="notaFiscal" class="form-control"
                                    placeholder="Nota Fiscal" value="{{ $enrollment->invoice }}">
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="linkPagamento" class="form-label"><strong>Link do pagamento</strong></label>
                                <input id="linkPagamento" type="text" name="linkPagamento" class="form-control"
                                    value="{{ $enrollment->payment_slip }}">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="codigoTransacao" class="form-label"><strong>Código de Transação</strong></label>
                                <input id="codigoTransacao" type="text" name="codigoTransacao" class="form-control"
                                    value="{{ $enrollment->transaction_code }}">
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="dataInicio" class="form-label"><strong>Data de Início</strong></label>
                                <div class="relative mx-auto">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                dark:bg-dark-1 dark:border-dark-4">
                                        <i data-feather="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" autocomplete="off" class="data form-control pl-12" name="dataInicio"
                                        value="{{ $enrollment->start_date }}" data-single-mode="true">
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="dataTermino" class="form-label"><strong>Data de Termino</strong></label>
                                <div class="relative mx-auto">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                dark:bg-dark-1 dark:border-dark-4">
                                        <i data-feather="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" autocomplete="off" class="data form-control pl-12" name="dataTermino"
                                        value="{{ $enrollment->end_date }}" data-single-mode="true">
                                </div>
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="carteira" class="form-label"><strong>Carteira</strong></label>
                                <input id="carteira" type="text" name="carteira" class="form-control" placeholder="Carteira"
                                    value="{{ $enrollment->wallet }}">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="unidade" class="form-label"><strong>Unidade</strong></label>
                                <input id="unidade" type="text" name="unidade" class="form-control"
                                    placeholder="Matriz, Filial Curitiba" value="{{ $enrollment->company }}">
                            </div>
                        </div>
                    </div>

                    <div class="intro-y box col-span-12 xxl:col-span-12 ml-3 mr-3 mt-12">
                        <input type="hidden" name="idAluno" value="{{ $enrollment->student_id }}">
                        <button class="btn btn-primary w-full mr-2 mb-2"> <i data-feather="activity"
                                class="w-4 h-4 mr-2"></i>
                            Atualizar matrícula </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- BEGIN: Modal Content -->
    <div id="excluirMatricula" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('excluir-matricula', ['enrollment' => $enrollment->id]) }}" method="POST">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="x-circle"
                                class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Você tem certeza?</div>
                            <div class="text-gray-600 mt-2">Você realmente quer excluir esta matrícula?
                                <br>Esse processo não poderá ser desfeito.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-dismiss="modal"
                                class="btn btn-outline-secondary w-24 dark:border-dark-5 dark:text-gray-300 mr-1">Cancelar</button>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-24">Excluir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- END: Modal Content -->
@endsection
@push('custom-scripts')
    <script>
        cash(".data").each(function() {
            let options = {
                autoApply: true,
                singleMode: false,
                lang: "pt-BR",
                numberOfColumns: 2,
                numberOfMonths: 2,
                resetButton: true,
                dropdowns: {
                    minYear: 1990,
                    maxYear: null,
                    months: true,
                    years: true,
                },
            };
            if (cash(this).data("single-mode")) {
                options.singleMode = true;
                options.numberOfColumns = 1;
                options.numberOfMonths = 1;
            }

            const picker = new Litepicker({
                element: this,
                ...options
            });

        });
    </script>
@endpush
