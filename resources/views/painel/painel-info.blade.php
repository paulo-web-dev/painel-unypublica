@extends('painel.layouts.app')

@section('content')
    <form action="{{ route('atualizar-painel', ['panel' => $panel->id]) }}" enctype="multipart/form-data"
        data-single="true" method="post">
        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <div class="col-span-12 lg:col-span-8">
                <!-- BEGIN: Personal Information -->
                <div class="intro-y box mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Informação do Painel
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
                            @method('PUT')
                            <input type="hidden" value="{{$panel->id}}" name="class_id">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="update-profile-form-7"
                                        class="form-label"><strong>Título</strong></label>
                                    <input id="update-profile-form-7" type="text" name="titulo" class="form-control"
                                        placeholder="Título da turma" value="{{ $panel->title }}">
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="update-profile-form-7"
                                        class="form-label"><strong>Subtitulo</strong></label>
                                    <input id="update-profile-form-7" type="text" name="subtitulo" class="form-control"
                                        placeholder="Título da turma" value="{{ $panel->title }}">
                                </div>
                                <div class="mt-3">
                                    <label for="dataInicio" class="form-label"><strong>Data De Começo</strong></label>
                                    <div class="relative mx-auto">
                                        <div
                                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                            <i data-feather="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" autocomplete="off" class="data form-control pl-12"
                                            name="dataInicio" value="{{ $panel->start_date . ' 03:00:00' }}"
                                            data-single-mode="true">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="status" class="form-label"><strong>Status</strong></label>
                                    <div class="mt-2">
                                        <select data-placeholder="Selecione o status do curso" name="status"
                                            class="tom-select w-full">
                                            <option @if ($panel->status == 'able')
                                                selected
                                                @endif value="able">Habilitado</option>
                                            <option @if ($panel->status == 'disabled')
                                                selected
                                                @endif value="disabled">Desabilitado</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="mt-3">
                                    <label for="docente" class="form-label"><strong>Professor</strong></label>
                                    <div class="mt-2">
                                        <select data-placeholder="Selecione o status do curso" name="docente"
                                            class="tom-select w-full">
                                            @foreach ($teachers as $teacher)
                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                              <div class="mt-3">
                                    <label for="dataTermino" class="form-label"><strong>Data De Termino</strong></label>
                                    <div class="relative mx-auto">
                                        <div
                                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                            <i data-feather="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" autocomplete="off" class="data form-control pl-12"
                                            name="dataTermino" value="{{ $panel->start_date . ' 03:00:00' }}"
                                            data-single-mode="true">
                                    </div>
                                </div>
                                <div class="flex justify-end mt-12">
                                    <input type="submit" value="Atualizar painel" class="btn btn-primary mr-auto mb-2">
                                </div>
                            </div>
                            
                        
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Personal Information -->
            </div>
            <!-- BEGIN: Post Info -->
            <div class="col-span-12 lg:col-span-4">
                <div class="intro-y box mt-5 p-5">
                     <div class="mt-6">
                            <label for="conteudo" class="form-label">Conteudo do Painel</label>
                            <div class="mt-2">
                                <textarea class="form-control editor" name="conteudo" id="full_resume" cols="30"
                                    rows="15">{{$panel->content}}</textarea>
                            </div>
                             <div class="mt-3">
                                    <label for="update-profile-form-7"
                                        class="form-label"><strong>Título</strong></label>
                                    <input id="update-profile-form-7" type="text" name="titulo" class="form-control"
                                        placeholder="Título da turma" value="{{ $panel->title }}">
                                </div>
                         <div class="mt-3">
                                    <label for="update-profile-form-7"
                                        class="form-label"><strong>Título</strong></label>
                                    <input id="update-profile-form-7" type="text" name="titulo" class="form-control"
                                        placeholder="Título da turma" value="{{ $panel->title }}">
                                </div>

                         <div class="mt-3">
                                    <label for="update-profile-form-7"
                                        class="form-label"><strong>Título</strong></label>
                                    <input id="update-profile-form-7" type="text" name="titulo" class="form-control"
                                        placeholder="Título da turma" value="{{ $panel->title }}">
                                </div>
                    </div>
                </div>
            </div>

            <!-- END: Post Info -->
        </div>

    </form>

    </div>
    </div>
    </div>

    </div>
    </div> <!-- END: Users Layout -->

    <!-- END: Users Layout -->
    @if (session()->get('message') == 'panel_updated')
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-5 text-center"> <i data-feather="check-circle"
                            class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bom trabalho!</div>
                        <div class="text-gray-600 mt-2">Os dados do painel foram atualizados com sucesso!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                            class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif

    @if (session()->get('message') == 'panel_update_error')
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Erro!</div>
                            <div class="text-gray-600 mt-2">Não foi possível atualizar os dados do painel!</div>
                        </div>
                        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                                class="btn btn-primary w-24">Ok</button> </div>
                    </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif

    <!-- END: Users Layout -->
    @if (session()->get('message') == 'class_updated')
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-5 text-center"> <i data-feather="check-circle"
                            class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bom trabalho!</div>
                        <div class="text-gray-600 mt-2">Os dados da turma foram atualizados com sucesso!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                            class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif

    @if (session()->get('message') == 'class_update_error')
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Erro!</div>
                            <div class="text-gray-600 mt-2">Não foi possível atualizar os dados da turma!</div>
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
