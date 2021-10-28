@extends('painel.layouts.app')

@section('content')

    <!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Material
            </h2>
        </div>

        <form action="{{ route('cadastrar-material') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Nome</strong></label>
                            <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                placeholder="Nome do material" value="">
                        </div>
                        <div class="mt-3">
                            <label for="status" class="form-label"><strong>Tipo</strong></label>
                            <div class="mt-2">
                                <select data-placeholder="Selecione o tipo do arquivo" name="tipo"
                                    class="tom-select w-full">
                                    <option selected disabled>Selecione</option>
                                    <option value="PDF">PDF</option>
                                    <option value="PowerPoint">Apresentação PowerPoint</option>
                                    <option value="Excel">Planilha do Excel</option>
                                    <option value="Word">Documento do Word</option>
                                    <option value="Arquivo Compactado (.rar)">Arquivo Compactado (.rar)</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="status" class="form-label"><strong>Status</strong></label>
                            <div class="mt-2">
                                <select data-placeholder="Selecione o status do professor" name="status"
                                    class="tom-select w-full">
                                    <option selected disabled>Selecione</option>
                                    <option value="able">Habilitado</option>
                                    <option value="disabled">Desabilitado</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-span-12 xl:col-span-6">
                        <label class="form-label"><strong>Upload de material</strong></label>
                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                            <div class="px-4 pt-24 pb-24 flex items-center justify-center cursor-pointer relative">
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
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Cadastrar material</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>
@endsection
@push('custom-scripts')
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
