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
                        <div class="font-medium text-base">{{ $student->name }}</div>
                        <div class="text-gray-600"></div>
                    </div>
                </div>
                <div class="p-5 border-t nav-tab border-gray-200 dark:border-dark-5">
                    <p class="flex items-center mb-3">
                        <span class="font-bold mr-3 ">CPF: </span> {{ $student->cpf }}
                    </p>
                    <p class="flex items-center mb-3">
                        <span class="font-bold mr-3 ">E-mail: </span> {{ $student->email }}
                    </p>
                    <p class="flex items-center mb-3">
                        <span class="font-bold mr-3 ">Telefone: </span> {{ $student->phone }}
                    </p>
                    <p class="flex items-center mb-3">
                        <span class="font-bold mr-3 ">CEP: </span> {{ $student->cep }}
                    </p>
                    <p class="flex items-center">
                        <span class="font-bold mr-3 ">Endereço: </span> {{ $student->street }},
                        {{ $student->house_number }}
                    </p>
                    <p class=" mb-10">
                        {{ $student->district }} -
                        {{ $student->city }}/{{ $student->state }}
                    </p>
                </div>
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 box lg:col-span-8 xxl:col-span-9 tab-content">

            <div id="informacoes-assinatura" role="tabpanel" aria-labelledby="informacoes-pessoais-tab"
                class="grid grid-cols-12 gap-6 tab-pane active">
                <form action="{{ route('cadastrar-assinatura') }}"
                    class="grid grid-cols-12 gap-6 col-span-12 xxl:col-span-12" method="post">
                    @csrf

                    <!-- BEGIN: Products -->
                    <div class="intro-y col-span-12 xxl:col-span-12">
                        <div class="flex items-center border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base p-5 mr-auto ml-3">
                                Informações da Assinatura
                            </h2>
                        </div>
                    </div>
                    <div class="intro-y col-span-12 xxl:col-span-6">
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="valor" class="form-label"><strong>Valor</strong></label>
                                <input id="valor" type="text" name="valor" class="form-control"
                                    placeholder="Valor da Assinatura" value="">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="desconto" class="form-label"><strong>Desconto</strong></label>
                                <input id="desconto" type="text" name="desconto" class="form-control"
                                    placeholder="Desconto da Assinatura" value="">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="valorFinal" class="form-label"><strong>Valor Final</strong></label>
                                <input id="valorFinal" type="text" name="valorFinal" class="form-control"
                                    placeholder="Valor Final da Assinatura" value="">
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="status" class="form-label"><strong>Status</strong></label>
                                <div class="mt-2">
                                    <select data-placeholder="Selecione o status da assinatura" name="status"
                                        class="tom-select w-full">
                                        <<option selected disabled>Selecione</option>
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
                                <label for="metodoPagamento" class="form-label"><strong>Método de Pagamento</strong></label>
                                <input id="metodoPagamento" type="text" name="metodoPagamento" class="form-control mt-2"
                                    placeholder="Boleto, cartão de crédito" value="">
                            </div>
                        </div>
                    </div>

                    <div class="intro-y box col-span-12 xxl:col-span-6">
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="dataInicio" class="form-label"><strong>Data de Início</strong></label>
                                <div class="relative mx-auto">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border
                                                                                                                                                                                                     text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                        <i data-feather="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" autocomplete="off" class="data form-control pl-12" name="dataInicio"
                                        value="" data-single-mode="true">
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="dataTermino" class="form-label"><strong>Data de Termino</strong></label>
                                <div class="relative mx-auto">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border
                                                                                                                                                                                                        text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                        <i data-feather="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" autocomplete="off" class="data form-control pl-12" name="dataTermino"
                                        value="" data-single-mode="true">
                                </div>
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="carteira" class="form-label"><strong>Carteira</strong></label>
                                <input id="carteira" type="text" name="carteira" class="form-control mt-2"
                                    placeholder="Carteira" value="">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="unidade" class="form-label"><strong>Unidade</strong></label>
                                <input id="unidade" type="text" name="unidade" class="form-control mt-2"
                                    placeholder="Matriz, Filial Curitiba" value="">
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label for="notaFiscal" class="form-label"><strong>Nota Fiscal</strong></label>
                                <input id="notaFiscal" type="text" name="notaFiscal" class="form-control"
                                    placeholder="Nota Fiscal" value="">
                            </div>
                        </div>
                    </div>

                    <div class="intro-y box col-span-12 xxl:col-span-12 ml-3 mr-3 mt-12">
                        <input type="hidden" name="idAluno" value="{{ $student->id }}">
                        <button class="btn btn-primary w-full mr-2 mb-2"> <i data-feather="activity"
                                class="w-4 h-4 mr-2"></i>
                            Cadastrar assinatura </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                ...options,
            });
        });
    </script>
@endpush
