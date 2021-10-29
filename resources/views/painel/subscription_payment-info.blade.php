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
                    <a
                        href="{{ route('informacao-assinatura', ['subscription' => $subscriptionPayment->subscription_id]) }}">
                        <button class="btn btn-rounded-secondary w-auto bg-gray-500 text-black font-normal">
                            <i data-feather="user" class="w-4 h-4 mr-2"></i>
                            Voltar para informações da assinatura
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 box lg:col-span-8 xxl:col-span-9 tab-content">
            <div id="informacoes-assinatura" role="tabpanel" aria-labelledby="informacoes-pessoais-tab"
                class="grid grid-cols-12 gap-6 tab-pane active">
                <form action="{{ route('atualiza-parcela', ['subscriptionPayment' => $subscriptionPayment->id]) }}"
                    class="grid grid-cols-12 gap-6 col-span-12 xxl:col-span-12" method="post">
                    @csrf
                    @method('PUT')

                    <!-- BEGIN: Products -->
                    <div class="intro-y col-span-12 xxl:col-span-9">
                        <div class="flex items-center border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base p-5 mr-auto ml-3">
                                Informações da Parcela
                            </h2>
                        </div>
                    </div>
                    <div class="intro-y col-span-3 xxl:col-span-3">
                        <a href="javascript:;" data-toggle="modal" data-target="#excluirParcela"
                            class="btn btn-elevated-danger float-right mr-3 mt-3 mb-2">Excluir Parcela</a>
                    </div>
                    <div class="intro-y col-span-12 xxl:col-span-12">
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="valorParcela" class="form-label"><strong>Valor da parcela</strong></label>
                                <input id="valorParcela" type="text" name="valorParcela" class="form-control"
                                    placeholder="Valor da Parcela" value="{{ $subscriptionPayment->monthly_value }}">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="dataInicio" class="form-label"><strong>Data de Vencimento</strong></label>
                                <div class="relative mx-auto">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                        <i data-feather="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" autocomplete="off" class="data form-control pl-12"
                                        name="dataVencimento" value="{{ $subscriptionPayment->due_date }}"
                                        data-single-mode="true">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="status" class="form-label"><strong>Status</strong></label>
                                <select data-placeholder="Selecione o status da matrícula" name="status"
                                    class="tom-select w-full">
                                    <option value="{{ $subscriptionPayment->status }}">
                                        @if ($subscriptionPayment->status == 'expired')
                                            Vencido
                                        @endif
                                        @if ($subscriptionPayment->status == 'payable')
                                            Em aberto
                                        @endif
                                        @if ($subscriptionPayment->status == 'paid')
                                            Pago
                                        @endif
                                    </option>
                                    <option value="expired">Vencido</option>
                                    <option value="payable">Em aberto</option>
                                    <option value="paid">Pago</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="valorPago" class="form-label"><strong>Valor Pago</strong></label>
                                <input id="valorPago" type="text" name="valorPago" class="form-control"
                                    placeholder="Valor Pago" value="{{ $subscriptionPayment->amount_paid }}">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="dataInicio" class="form-label"><strong>Data de Pagamento</strong></label>
                                <div class="relative mx-auto">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                        <i data-feather="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" autocomplete="off" class="data form-control pl-12"
                                        name="dataPagamento" value="{{ $subscriptionPayment->payday }}"
                                        data-single-mode="true">
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="codigoTransacao" class="form-label"><strong>Código de Transação</strong></label>
                                <input id="codigoTransacao" type="text" name="codigoTransacao" class="form-control"
                                    placeholder="Link de pagamento" value="{{ $subscriptionPayment->transaction_code }}">
                            </div>
                        </div>
                        <div class="flex mt-10 ml-0">
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label for="linkPagamento" class="form-label"><strong>Link de pagamento</strong></label>
                                <input id="linkPagamento" type="text" name="linkPagamento" class="form-control"
                                    placeholder="Link de pagamento" value="{{ $subscriptionPayment->payment_slip }}">
                            </div>
                        </div>
                    </div>

                    <div class="intro-y box col-span-12 xxl:col-span-12 ml-3 mr-3 mt-12">
                        <input type="hidden" name="idAluno" value="">
                        <button class="btn btn-primary w-full mr-2 mb-2"> <i data-feather="activity"
                                class="w-4 h-4 mr-2"></i>
                            Atualizar parcela </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- BEGIN: Modal Content -->
    <div id="excluirParcela" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('excluir-parcela', ['subscriptionPayment' => $subscriptionPayment->id]) }}"
                    method="POST">
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
    </div> <!-- END: Modal Content -->
    @if (session()->get('message') == 'subscriptionPayment_updated')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-5 text-center"> <i data-feather="check-circle"
                            class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bom trabalho!</div>
                        <div class="text-gray-600 mt-2">A parcela foi atualizada com sucesso!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                            class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div>
        <!-- END: Modal Content -->
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
