@extends('painel.layouts.app')

@section('content')
    <form action="{{ route('cadastrar-despesa') }}" enctype="multipart/form-data" data-single="true" method="post">
        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <div class="col-span-12 lg:col-span-8">
                <!-- BEGIN: Personal Information -->
                <div class="intro-y box mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Informação do Despesa
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
                        <div class="grid grid-cols-7 gap-x-5">
                            @csrf
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="update-profile-form-7" class="form-label"><strong>Nome da Despesa</strong></label>
                                    <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                        placeholder="Nome da despesa" value="">
                                </div>
                                <div class="grid grid-cols-7 gap-x-5">
                                    @csrf
                                    <div class="col-span-12 xl:col-span-6">
                                        <div class="mt-3">
                                            <label for="update-profile-form-7" class="form-label"><strong>Valor da Despesa</strong></label>
                                            <input id="update-profile-form-7" type="text" name="valor" class="form-control"
                                                placeholder="R$" value="">
                                        </div>
                                <div class="mt-3">
                                    <label for="mes" class="form-label"><strong>Mês da Despesa</strong></label>
                                    <div class="mt-2">
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
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="ano" class="form-label"><strong>Ano da Despesa</strong></label>
                                <div class="mt-2">
                                    <select data-placeholder="Selecione o status do curso" name="ano"
                                        class="tom-select w-full">
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="produto" class="form-label"><strong>Produto da Despesa</strong></label>
                            <div class="mt-2">
                                <select data-placeholder="Selecione o status do curso" name="produto"
                                    class="tom-select w-full">
                                    <option value="Presencial">Presencial</option>
                                    <option value="EAD">EAD</option>
                                    <option value="Pós Graduação">Pós Graduação</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="btn btn-primary w-40 mr-auto">Adicionar Despesa</button>
                        </div>
                    </div>
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

