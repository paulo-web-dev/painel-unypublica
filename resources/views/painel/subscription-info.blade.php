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
                        <div class="font-medium text-base">{{ $subscription->student->name }}</div>
                        <div class="text-gray-600"></div>
                    </div>
                </div>
                <div class="p-5 border-t nav-tab border-gray-200 dark:border-dark-5">
                    <p class="flex items-center mb-3">
                        <span class="font-bold mr-3 ">CPF: </span> {{ $subscription->student->cpf }}
                    </p>
                    <p class="flex items-center mb-3">
                        <span class="font-bold mr-3 ">E-mail: </span> {{ $subscription->student->email }}
                    </p>
                    <p class="flex items-center mb-3">
                        <span class="font-bold mr-3 ">Telefone: </span> {{ $subscription->student->phone }}
                    </p>
                    <p class="flex items-center mb-3">
                        <span class="font-bold mr-3 ">CEP: </span> {{ $subscription->student->cep }}
                    </p>
                    <p class="flex items-center">
                        <span class="font-bold mr-3 ">Endereço: </span> {{ $subscription->student->street }},
                        {{ $subscription->student->house_number }}
                    </p>
                    <p class=" mb-10">
                        {{ $subscription->student->district }} -
                        {{ $subscription->student->city }}/{{ $subscription->student->state }}
                    </p>
                    <a href="{{ route('informacao-aluno', ['id' => $subscription->student_id]) }}">
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

            <div id="informacoes-assinatura" role="tabpanel" aria-labelledby="informacoes-pessoais-tab"
                class="grid grid-cols-12 gap-6 tab-pane active">
                <form action="{{ route('atualiza-assinatura', ['subscription' => $subscription->id]) }}"
                    class="grid grid-cols-12 gap-6 col-span-12 xxl:col-span-12" method="post">
                    @csrf
                    @method('PUT')

                    <!-- BEGIN: Products -->
                    <div class="intro-y col-span-12 xxl:col-span-9">
                        <div class="flex items-center border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base p-5 mr-auto ml-3">
                                Informações da Assinatura
                            </h2>
                        </div>
                    </div>
                    <div class="intro-y col-span-3 xxl:col-span-3">
                        <a href="javascript:;" data-toggle="modal" data-target="#excluirAssinatura"
                            class="btn btn-elevated-danger float-right mr-3 mt-3 mb-2">Excluir Assinatura</a>
                    </div>
                    <div class="intro-y col-span-12 xxl:col-span-6">
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="valor" class="form-label"><strong>Valor</strong></label>
                                <input id="valor" type="text" name="valor" class="form-control"
                                    placeholder="Valor da Assinatura" value="{{ $subscription->value }}">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="desconto" class="form-label"><strong>Desconto</strong></label>
                                <input id="desconto" type="text" name="desconto" class="form-control"
                                    placeholder="Desconto da Assinatura" value="{{ $subscription->discount }}">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="valorFinal" class="form-label"><strong>Valor Final</strong></label>
                                <input id="valorFinal" type="text" name="valorFinal" class="form-control"
                                    placeholder="Valor Final da Assinatura" value="{{ $subscription->final_value }}">
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="status" class="form-label"><strong>Status</strong></label>
                                <div class="mt-2">
                                    <select data-placeholder="Selecione o status da matrícula" name="status"
                                        class="tom-select w-full">
                                        <option value="{{ $subscription->status }}">
                                            @if ($subscription->status == 'not_checked')
                                                Não conferido
                                            @endif
                                            @if ($subscription->status == 'checked')
                                                Conferido
                                            @endif
                                            @if ($subscription->status == 'scheduled_billing')
                                                Pagamento agendado
                                            @endif
                                            @if ($subscription->status == 'bill_sent')
                                                Pagamento solicitado
                                            @endif
                                            @if ($subscription->status == 'identified_payment')
                                                Pagamento identificado
                                            @endif
                                            @if ($subscription->status == 'commercial_pending')
                                                Pendência Comercial
                                            @endif
                                            @if ($subscription->status == 'financial_pending')
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
                                <label for="metodoPagamento" class="form-label"><strong>Método de Pagamento</strong></label>
                                <input id="metodoPagamento" type="text" name="metodoPagamento" class="form-control mt-2"
                                    placeholder="Boleto, cartão de crédito" value="{{ $subscription->payment_method }}">
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full px-3 mt-8 mb-6 md:mb-0">
                                <button type="button" onclick="abreParcelamento()" class="btn btn-instagram w-32 mr-2 mb-2">
                                    <i data-feather="dollar-sign" class="w-4 h-4 mr-2"></i> Parcelar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="intro-y box col-span-12 xxl:col-span-6">
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="dataInicio" class="form-label"><strong>Data de Início</strong></label>
                                <div class="relative mx-auto">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                        <i data-feather="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" autocomplete="off" class="data form-control pl-12" name="dataInicio"
                                        value="{{ $subscription->start_date }}" data-single-mode="true">
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="dataTermino" class="form-label"><strong>Data de Termino</strong></label>
                                <div class="relative mx-auto">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                        <i data-feather="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" autocomplete="off" class="data form-control pl-12" name="dataTermino"
                                        value="{{ $subscription->end_date }}" data-single-mode="true">
                                </div>
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="carteira" class="form-label"><strong>Carteira</strong></label>
                                <input id="carteira" type="text" name="carteira" class="form-control mt-2"
                                    placeholder="Carteira" value="{{ $subscription->wallet }}">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="unidade" class="form-label"><strong>Unidade</strong></label>
                                <input id="unidade" type="text" name="unidade" class="form-control mt-2"
                                    placeholder="Matriz, Filial Curitiba" value="{{ $subscription->company }}">
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label for="notaFiscal" class="form-label"><strong>Nota Fiscal</strong></label>
                                <input id="notaFiscal" type="text" name="notaFiscal" class="form-control"
                                    placeholder="Nota Fiscal" value="{{ $subscription->invoice }}">
                            </div>
                        </div>
                    </div>
                    <div class="intro-y box col-span-12 xxl:col-span-12">
                        <div class="flex mt-10 ml-0  px-3">
                            <table class="table table-auto">
                                <thead>
                                    <tr>
                                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data de
                                            Vencimento</th>
                                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data de Pagamento
                                        </th>
                                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Valor</th>
                                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Status</th>
                                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">
                                            Ações
                                            <div class="dropdown ml-auto float-right">
                                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"
                                                    aria-expanded="false"> <i data-feather="more-horizontal"
                                                        class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>
                                                </a>
                                                <div class="dropdown-menu w-40">
                                                    <div class="dropdown-menu__content">
                                                        <a href="{{ route('adicionar-parcela', ['subscription' => $subscription->id]) }}"
                                                            class="items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 ">
                                                            <i data-feather="plus" class="w-4 h-4 mr-2"></i> <strong>Nova
                                                                Parcela</strong></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="tabelaParcelamento">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($subscriptionPayment as $parcela)
                                        <tr class="hover:bg-gray-200">
                                            <td class="border">{{ $i }}</td>
                                            <td class="border">{{ date('d/m/Y', strtotime($parcela->due_date)) }}
                                            </td>
                                            <td class="border">
                                                {{ empty($parcela->payday) ? '--/--/--' : date('d/m/Y', strtotime($parcela->payday)) }}
                                            </td>
                                            <td class="border"> R$ {{ $parcela->monthly_value }}</td>
                                            <td class="border">
                                                @if ($parcela->status == 'expired')
                                                    <span class="text-theme-6">Vencido</span>
                                                @endif
                                                @if ($parcela->status == 'payable')
                                                    <span>Em aberto</span>
                                                @endif
                                                @if ($parcela->status == 'paid')
                                                    <span class="text-theme-9">Pago</span>
                                                @endif
                                            </td>
                                            <td class="border">
                                                <a class="edit flex items-center mr-3 float-left"
                                                    href="{{ route('informacao-parcela', ['subscriptionPayment' => $parcela->id]) }}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="intro-y box col-span-12 xxl:col-span-12 ml-3 mr-3 mt-12">
                        <input type="hidden" name="idAluno" value="{{ $subscription->student->id }}">
                        <button class="btn btn-primary w-full mr-2 mb-2"> <i data-feather="activity"
                                class="w-4 h-4 mr-2"></i>
                            Atualizar assinatura </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- BEGIN: Modal Content -->
    <div id="modalParcelamento" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label for="numparcelas" class="form-label"><strong>Em quantas vezes você quer parcelar o valor
                                    R$ {{ $subscription->final_value }}</strong></label>
                            <input id="numparcelas" type="text" name="numparcelas" class="form-control mt-2"
                                placeholder="Número de parcelas" value="">
                        </div>
                        <div class="w-full px-3 pt-5 pb-5 mb-6 md:mb-0">
                            <label for="dataInicio" class="form-label">
                                <strong>Qual a data de início do
                                    parcelamento?</strong></label>
                            <div class="relative mx-auto">
                                <div
                                    class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border
                                                                                text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                    <i data-feather="calendar" class="w-4 h-4"></i>
                                </div>
                                <input type="text" autocomplete="off" class="data form-control pl-12"
                                    id="dataInicioParcelamento" data-single-mode="true">
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary w-24">Cancelar</button>
                        <button type="button" onclick="fazerParcelamento({{ $subscription->id }})" data-dismiss="modal"
                            class="btn btn-primary w-24">Parcelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Modal Content -->
    <!-- BEGIN: Modal Content -->
    <div id="excluirAssinatura" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('excluir-assinatura', ['subscription' => $subscription->id]) }}" method="POST">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="x-circle"
                                class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Você realmente quer excluir esta assinatura?</div>
                            <div class="text-gray-600 mt-2">Todas as parcelas referente a esta assinatura, também serão
                                excluidas.
                                <br><br>Esse processo não poderá ser desfeito.
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
    </div>
    @if (session()->get('message') == 'subscriptionPayment_created')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-5 text-center"> <i data-feather="check-circle"
                            class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bom trabalho!</div>
                        <div class="text-gray-600 mt-2">A parcela foi criada com sucesso!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                            class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->

    @endif
    @if (session()->get('message') == 'subscriptionPayment_deleted')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-5 text-center"> <i data-feather="check-circle"
                            class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bom trabalho!</div>
                        <div class="text-gray-600 mt-2">A parcela foi excluida com sucesso!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                            class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->

    @endif
    @if (session()->get('message') == 'subscription_updated')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-5 text-center"> <i data-feather="check-circle"
                            class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bom trabalho!</div>
                        <div class="text-gray-600 mt-2">A assinatura foi atualizada com sucesso!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                            class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->

    @endif
@endsection
@push('custom-scripts')
    @if (session()->get('message'))
        <script>
            cash(function() {
                cash('#modalInfo').modal('show');
            });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var url = 'http://localhost/unipublica-site/public/';

        function fazerParcelamento(id) {

            var numparcelas = cash('#numparcelas').val();
            var dataInicioParcelamento = cash('#dataInicioParcelamento').val();
            urlFinal = url + 'painel/alunos/assinatura/parcelar/' + id;
            axios.post(urlFinal, {
                    data: {
                        'numparcelas': numparcelas,
                        'dataInicioParcelamento': dataInicioParcelamento
                    }
                })
                .then(function(response) {
                    parcelas = response.data;
                    var i;
                    var tabelaParcelamento;
                    cash('.tabelaParcelamento').html('');
                    for (i = 0; i < numparcelas; i++) {
                        var id = parcelas[i].id;
                        var dataVencimento = parcelas[i].dataVencimento;
                        var valorParcela = parcelas[i].valor;
                        var statusParcela = parcelas[i].status;
                        dataVencimento = dataVencimento.split('-').reverse().join('/');

                        if (statusParcela == 'payable') {
                            statusParcela = '<span>Em aberto</span>';
                        }

                        tabelaParcelamento = '<tr class="hover:bg-gray-200">' +
                            '<td class="border">' + (i + 1) + '</a></td> ' +
                            '<td class="border">' + dataVencimento + '</td> ' +
                            '<td class="border">--/--/--</td> ' +
                            '<td class="border"> R$' + valorParcela + '</td>' +
                            '<td class="border">' + statusParcela + '</td>' +
                            '<td>' +
                            '<a class="edit flex items-center mr-3" href="' + url + 'painel/alunos/parcelas/' + id +
                            '">' +
                            '<i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar ' +
                            '</a>' +
                            '</td>' +
                            '</tr>'
                        cash('.tabelaParcelamento').append(tabelaParcelamento);
                        feather.replace({
                            "stroke-width": 1.5,
                        });
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function abreParcelamento() {
            cash('#modalParcelamento').modal('show');
        }

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
