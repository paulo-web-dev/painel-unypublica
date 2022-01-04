@extends('painel.layouts.app')

@section('content')
    <form action="{{ route('cadastrar-despesa') }}" enctype="multipart/form-data" data-single="true" method="post">
        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <div class="col-span-12 lg:col-span-8">
                <!-- BEGIN: Personal Information -->
                <div class="intro-y box mt-5" >
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Informações Do Fluxo De Caixa
                        </h2>
                    </div>
                    <div class="p-5">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
                                <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i data-feather="x" class="w-4 h-4"></i>
                                </button>
                            </div>
                        @endforeach

                            @csrf

                            <label for="mes" class="form-label"><strong>Mês</strong></label>

                                <select data-placeholder="Selecione o status do curso" name="mes"
                                    class="tom-select w-full">
                                    <option value="Janeiro">Janeiro</option>
                                    <option value="Fevereiro">Fevereiro</option>
                                    <option value="Março">Março</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Maio">Maio</option>
                                    <option value="Junho">Junho</option>
                                    <option value="Julho">Julho</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Setembro">Setembro</option>
                                    <option value="Outrubro">Outrubro</option>
                                    <option value="Novembro">Novembro</option>
                                    <option value="Dezembro">Dezembro</option>
                                </select>

                                <label for="ano" class="form-label"><strong>Ano</strong></label>

                                <select data-placeholder="Selecione o status do curso" name="mes"
                                    class="tom-select w-full">
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                        </div>

                </div>
            </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Filtrar </button>
                </div>
            </div>
             <!-- BEGIN: Data List -->
 <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="text-center whitespace-nowrap">#</th>
                <th class="text-center whitespace-nowrap">Mês</th>
                <th class="text-center whitespace-nowrap">Ano</th>
                <th class="text-center whitespace-nowrap">Número de Alunos</th>
                <th class="text-center whitespace-nowrap">Previsão de Faturamento total</th>
                <th class="text-center whitespace-nowrap">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($flows as $flow)
                <tr class="intro-x">
                    <td class="text-center">
                        {{ $flow->id }}
                    </td>
                    <td class="text-center">
                        <a class="font-medium whitespace-nowrap">{{ $flow->mes }}</a>
                        <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $flow->mes }}</div>
                    </td>
                    <td class="text-center">{{ $flow->ano }}</td>
                    <td class="text-center">{{ $flow->numeroAlunos }}</td>
                    <td class="text-center">R${{ $flow->valorFinal }}</td>

                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-theme-6 mr-3" href="javascript:;" data-toggle="modal"
                                data-target="#excluirCurso{{ $flow->id }}">
                                <i data-feather="trash" class="w-4 h-4 mr-1"></i> Excluir
                            </a>
                        </div>
                        <!-- BEGIN: Modal Content -->
                        <div id="excluirCurso{{ $flow->id }}" class="modal" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('excluir-curso', ['course' => $flow->id]) }}"
                                        method="POST">
                                        <div class="modal-body p-0">
                                            <div class="p-5 text-center"> <i data-feather="x-circle"
                                                    class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                                <div class="text-3xl mt-5">Você realmente quer excluir este
                                                    curso?</div>
                                                <div class="text-gray-600 mt-2">
                                                    Esse processo não poderá ser desfeito.
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
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
        <!-- END: Personal Information -->
    </div>
</div>
</form>


@endsection
@push('custom-scripts')
@if (session()->get('message'))
<script>
    cash(function() {
        cash('#modalInfo').modal('show');
    });
</script>
@endif

@endpush

