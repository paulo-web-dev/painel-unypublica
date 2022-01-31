@extends('painel.layouts.app')

@section('content')
    <form action="{{ route('cadastrar-turma') }}" enctype="multipart/form-data" data-single="true" method="post">
        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <div class="col-span-12 lg:col-span-8">
                <!-- BEGIN: Personal Information -->
                <div class="intro-y box mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Informação da Turma
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
                     <div class="grid grid-cols-12 gap-x-5">
                            @csrf
                         
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="update-profile-form-7"
                                        class="form-label"><strong>Título</strong></label>
                                    <input id="update-profile-form-7" type="text" name="titulo" class="form-control"
                                        placeholder="Título da turma" value="">
                                </div>
                                <div class="mt-3">
                                    <label for="dataInicio" class="form-label"><strong>Data de Início</strong></label>
                                    <div class="relative mx-auto">
                                        <div
                                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                            <i data-feather="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" autocomplete="off" class="data form-control pl-12"
                                            name="dataInicio" value=""
                                            data-single-mode="true">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="status" class="form-label"><strong>Status</strong></label>
                                    <div class="mt-2">
                                        <select data-placeholder="Selecione o status do curso" name="status"
                                            class="tom-select w-full">
                                            <option value="able">Habilitado</option>
                                            <option value="disabled">Desabilitado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-7" class="form-label"><strong>Carga
                                            Horária</strong></label>
                                    <input id="update-profile-form-7" type="text" name="cargaHoraria" class="form-control"
                                        placeholder="Carga horária da turma" value="">
                                </div>
                                <div class="flex justify-end mt-12">
                                    <input type="submit" value="Atualizar turma" class="btn btn-primary mr-auto mb-2">
                                </div>
                            </div>
                               <input type="hidden" value="{{$course->id}}" name="curso">     
                             
                                 
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="update-profile-form-7"
                                        class="form-label"><strong>Subtítulo</strong></label>
                                    <input id="update-profile-form-7" type="text" name="subtitulo" class="form-control"
                                        placeholder="Subtítulo da turma" value="">
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="update-profile-form-7"
                                        class="form-label"><strong>Slug</strong></label>
                                    <input id="update-profile-form-7" type="text" name="slug" class="form-control"
                                        placeholder="Subtítulo da turma" value="">
                                </div>
                                <div class="mt-3">
                                    <label for="dataTermino" class="form-label"><strong>Data de Termino</strong></label>
                                    <div class="relative mx-auto">
                                        <div
                                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                            <i data-feather="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" autocomplete="off" class="data form-control pl-12"
                                            name="dataTermino" value=" "
                                            data-single-mode="true">
                                    </div>
                                </div>
                               
                                <div class="mt-3">
                                    <label for="status" class="form-label"><strong>Tipo</strong></label>
                                    <div class="mt-2">
                                        <select data-placeholder="Selecione o tipo do curso" name="tipo"
                                            class="tom-select w-full">
                                            <option value="Premium">Premium</option>
                                            <option  value="Master">Master</option>
                                            <option value="Classico">Classico</option>
                                        </select>
                                    </div>
                                </div>
                                  <div class="mt-3 grid grid-cols-12">
                        <div class="col-span-12 lg:col-span-4">
                            <label for="post-form-2" class="form-label"><strong>Confirmado</strong></label><br>
                            <input id="post-form-2" class="form-check-switch"  type="checkbox"
                                name="confirmado">
                        </div>
                        <div class="col-span-12 lg:col-span-4">
                            <label for="post-form-2" class="form-label"><strong>Aovivo</strong></label><br>
                            <input id="post-form-2" class="form-check-switch"  type="checkbox"
                                name="aovivo">
                        </div>
                        <div class="col-span-12 lg:col-span-4">
                            <label for="post-form-2" class="form-label"><strong>Unyflex</strong></label><br>
                            <input id="post-form-2" class="form-check-switch"  type="checkbox"
                                name="unyflex">
                        </div>
                    </div>
                      <div class="col-span-12 xl:col-span-6" >
                        <label class="form-label"><strong>Adicionar Banner</strong></label>
                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                            <div class="px-4 pt-24 pb-24 flex items-center justify-center cursor-pointer relative">
                                <div id="areaArquivo">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i>
                                    <span class="mr-1 font-bold">Adicionar Banner</span>
                                </div>
                                <input type="file" id="file" name="file"
                                    class="w-full h-full top-0 left-0 absolute opacity-0">
                            </div>
                        </div></div>
                            </div>
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
    <script>
        cash(".data").each(function() {
            let options = {
                autoApply: true,
                singleMode: false,
                lang: "pt-BR",
                numberOfColumns: 2,
                numberOfMonths: 2,
                resetButton: true,
                format: 'DD/MM/YYYY',
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

@endpush
