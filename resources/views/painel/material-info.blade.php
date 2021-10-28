@extends('painel.layouts.app')

@section('content')

    <!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Informação do Material
            </h2>
        </div>

        <form action="{{ route('atualizar-material', ['material' => $material->id]) }}" enctype="multipart/form-data"
            data-single="true" method="post">
            <div class="p-5">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i data-feather="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                @endforeach

                <div class="grid grid-cols-12 gap-x-5">
                    @csrf
                    @method('PUT')

                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Nome</strong></label>
                            <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                placeholder="Nome do material" value="{{ $material->name }}">
                        </div>
                        <div class="mt-3">
                            <label for="status" class="form-label"><strong>Tipo</strong></label>
                            <div class="mt-2">
                                <select data-placeholder="Selecione o tipo do arquivo" name="tipo"
                                    class="tom-select w-full">
                                    <option @if ($material->tipo == 'PDF')
                                        selected
                                        @endif value="PDF">PDF</option>
                                    <option @if ($material->tipo == 'PowerPoint')
                                        selected
                                        @endif value="PowerPoint">Apresentação PowerPoint</option>
                                    <option @if ($material->tipo == 'Excel')
                                        selected
                                        @endif value="Excel">Planilha do Excel</option>
                                    <option @if ($material->tipo == 'Word')
                                        selected
                                        @endif value="Word">Documento do Word</option>
                                    <option @if ($material->tipo == 'Arquivo Compactado (.rar)')
                                        selected
                                        @endif value="Arquivo Compactado (.rar)">Arquivo Compactado (.rar)</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="status" class="form-label"><strong>Status</strong></label>
                            <div class="mt-2">
                                <select data-placeholder="Selecione o status do material" name="status"
                                    class="tom-select w-full">
                                    <option @if ($material->status == 'able')
                                        selected
                                        @endif value="able">Habilitado</option>
                                    <option @if ($material->status == 'disabled')
                                        selected
                                        @endif value="disabled">Desabilitado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-6">
                        <label class="form-label"><strong>Material Cadastrado</strong></label>
                        <div class="rounded-md pt-4">
                            <div class="file box rounded-md relative">
                                <a href="" class="w-1/5 file__icon file__icon--file">
                                    <div class="file__icon__file-name">{{ $material->tipo }}</div>
                                </a>
                                <a class="block font-medium mt-4 ml-10 truncate">{{ $material->name }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-6">
                        <label class="form-label mt-4"><strong>Substituir material</strong></label>
                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                            <div class="px-4 pt-8 pb-8 flex items-center justify-center cursor-pointer relative">
                                <div id="areaArquivo">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i>
                                    <span class="mr-1 font-bold">Adicionar arquivo</span>
                                </div>
                                <input type="file" id="arquivo" name="arquivo"
                                    class="w-full h-full top-0 left-0 absolute opacity-0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar material</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->

    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de turmas
            </h2>
        </div>


        <div class="p-5">

            <div class="grid grid-cols-12 gap-x-5">
                @csrf
                @method('PUT')

                <div class="col-span-12 xl:col-span-12">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Turma</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data de Início</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data de Fim</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Título</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Subtítulo</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data de Início</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data de Termino</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($material->panels as $panel)
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{ $panel->classes->id }}</td>
                                        <td class="border">{{ $panel->classes->title }}</td>
                                        <td class="border">
                                            {{ date('d/m/Y', strtotime($panel->classes->start_date)) }}
                                        </td>
                                        <td class="border">
                                            {{ date('d/m/Y', strtotime($panel->classes->end_date)) }}
                                        </td>
                                        <td class="border">{{ $panel->id }}</td>
                                        <td class="border">{{ $panel->title }}</td>
                                        <td class="border">{{ $panel->subtitle }}</td>
                                        <td class="border">
                                            {{ date('d/m/Y H:i:s', strtotime($panel->start_time)) }}
                                        </td>
                                        <td class="border">
                                            {{ date('d/m/Y H:i:s', strtotime($panel->end_time)) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="javascript:;" data-toggle="modal" data-target="#modalPainel"
                    class="btn btn-primary mr-auto mb-2">Inserir no Painel</a>
            </div>
        </div>
    </div>

    <div id="modalPainel" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('inserir-material', ['material' => $material->id]) }}" method="post">
                    <div class="p-5 text-center">
                        @csrf
                        <div class="mt-3">
                            <label for="painel" class="form-label"><strong>Selecione o Painel para incluir o
                                    Material</strong></label>
                            <div class="mt-2">
                                <select data-placeholder="Selecione o painel" class="tom-select w-full" name="panel">
                                    @foreach ($classes as $class)
                                        @foreach ($class->panels as $panel)
                                            <option value="{{ $panel->id }}">
                                                #{{ $class->id }} {{ $class->title }} -
                                                {{ $panel->title }} &nbsp;&nbsp;&nbsp;&nbsp;
                                                {{ date('d/m/Y H:i:s', strtotime($panel->start_time)) }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                                {{--  --}}
                            </div>
                        </div>

                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="submit" class="btn btn-primary w-24">Ok</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- END: Users Layout -->
    @if (session()->get('message') == 'material_updated')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-5 text-center"> <i data-feather="check-circle"
                            class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bom trabalho!</div>
                        <div class="text-gray-600 mt-2">Os dados do material foram atualizados com sucesso!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                            class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->

    @endif

    @if (session()->get('message') == 'material_update_error')
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Erro!</div>
                            <div class="text-gray-600 mt-2">Não foi possível atualizar os dados do material!</div>
                        </div>
                        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                                class="btn btn-primary w-24">Ok</button> </div>
                    </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif

    <!-- END: Users Layout -->
    @if (session()->get('message') == 'material_added')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-5 text-center"> <i data-feather="check-circle"
                            class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bom trabalho!</div>
                        <div class="text-gray-600 mt-2">O material foi inserido no painel selecionado!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                            class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->

    @endif

    @if (session()->get('message') == 'material_add_error')
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Erro!</div>
                            <div class="text-gray-600 mt-2">Não foi possível inserir material no painel selecionado!</div>
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
    @if (session()->get('message'))
        <script>
            cash(function() {
                cash('#modalInfo').modal('show');
            });
        </script>
    @endif
    <script>
        (function(cash) {
            document.getElementById('arquivo').onchange = function() {
                var arquivo = document.getElementById('arquivo').value;
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
@endpush
