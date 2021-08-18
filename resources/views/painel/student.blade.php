@extends('painel.layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h1 class="intro-y text-lg font-medium mt-10">
        Lista de alunos cadastrados
    </h1>
    <a href="{{ route('adicionar-aluno') }}" class="btn btn-primary w-49 mr-2 mt-5 mb-2"> <i data-feather="plus"
            class="w-4 h-4 mr-2"></i> Adicionar aluno </a>
    <div class="intro-y box p-5 mt-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">
                <div class="sm:flex items-center sm:mr-4">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Campo</label>
                    <select id="tabulator-html-filter-field"
                        class="form-select w-full sm:w-32 xxl:w-full mt-2 sm:mt-0 sm:w-auto">
                        <option value="name">Aluno</option>
                        <option value="email">E-mail</option>
                        <option value="cpf">CPF</option>
                    </select>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Filtro</label>
                    <select id="tabulator-html-filter-type" class="form-select w-full mt-2 sm:mt-0 sm:w-auto">
                        <option value="like" selected>Contêm</option>
                        <option value="=">=</option>
                        <option value="<">&lt;</option>
                        <option value="<=">&lt;=</option>
                        <option value=">">></option>
                        <option value=">=">>=</option>
                        <option value="!=">!=</option>
                    </select>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Valor</label>
                    <input id="tabulator-html-filter-value" type="text" class="form-control sm:w-40 xxl:w-full mt-2 sm:mt-0"
                        placeholder="...">
                </div>
                <div class="mt-2 xl:mt-0">
                    <button id="tabulator-html-filter-go" type="button"
                        class="btn btn-primary w-full sm:w-16">Filtrar</button>
                    <button id="tabulator-html-filter-reset" type="button"
                        class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1">Limpar</button>
                </div>
            </form>
            <div class="flex mt-5 sm:mt-0">
                <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2"> <i
                        data-feather="printer" class="w-4 h-4 mr-2"></i> Print </button>
                <div class="dropdown w-1/2 sm:w-auto">
                    <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto" aria-expanded="false"> <i
                            data-feather="file-text" class="w-4 h-4 mr-2"></i> Export <i data-feather="chevron-down"
                            class="w-4 h-4 ml-auto sm:ml-2"></i> </button>
                    <div class="dropdown-menu w-40">
                        <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                            <a id="tabulator-export-csv" href="javascript:;"
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export CSV </a>
                            <a id="tabulator-export-json" href="javascript:;"
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export JSON </a>
                            <a id="tabulator-export-xlsx" href="javascript:;"
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export XLSX </a>
                            <a id="tabulator-export-html" href="javascript:;"
                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export HTML </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="deleteSucesso" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Bom trabalho!</div>
                            <div class="text-gray-600 mt-2">Aluxo excluído com sucesso!</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" onClick="document.location.reload(true);"
                                class="btn btn-primary w-24">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="deleteErro" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="x-circle"
                                class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Erro!</div>
                            <div class="text-gray-600 mt-2 mensagemErro"></div>
                        </div>
                        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                                class="btn btn-outline-secondary w-24 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                            <button type="button" class="btn btn-danger w-24">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto scrollbar-hidden">
            <div id="tabelaAlunos" class="mt-5 table-report table-report--tabulator">

            </div>
        </div>

    </div>

@endsection
@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var url = "http://localhost/unipublica-site/public/";

        function excluirAluno(id) {
            urlFinal = url + 'painel/alunos/excluir/' + id;
            axios.post(urlFinal, {
                    _method: 'DELETE',
                    data: {
                        'id': id
                    }
                })
                .then(function(response) {
                    if (response.data == 'sucesso') {
                        cash('.modal').modal('hide');
                        setTimeout(
                            function() {
                                cash('#deleteSucesso').modal('show');
                            }, 1000);
                    } else {
                        cash('.modal').modal('hide');
                        setTimeout(
                            function() {
                                cash('.mensagemErro').html(response.data);
                                cash('#deleteErro').modal('show');
                            }, 1000);
                    }
                })
                .catch(function(error) {
                    cash('.modal').modal('hide');
                    setTimeout(
                        function() {
                            cash('.mensagemErro').html(error);
                            cash('#deleteErro').modal('show');
                        }, 1000);
                });
        }
    </script>
@endpush
