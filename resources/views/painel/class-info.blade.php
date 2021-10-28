@extends('painel.layouts.app')

@section('content')
    <form action="{{ route('atualizar-turma', ['classes' => $class->id]) }}" enctype="multipart/form-data"
        data-single="true" method="post">
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
                            @method('PUT')
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="update-profile-form-7"
                                        class="form-label"><strong>Título</strong></label>
                                    <input id="update-profile-form-7" type="text" name="titulo" class="form-control"
                                        placeholder="Título da turma" value="{{ $class->title }}">
                                </div>
                                <div class="mt-3">
                                    <label for="dataInicio" class="form-label"><strong>Data de Início</strong></label>
                                    <div class="relative mx-auto">
                                        <div
                                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                            <i data-feather="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" autocomplete="off" class="data form-control pl-12"
                                            name="dataInicio" value="{{ $class->start_date . ' 03:00:00' }}"
                                            data-single-mode="true">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="status" class="form-label"><strong>Status</strong></label>
                                    <div class="mt-2">
                                        <select data-placeholder="Selecione o status do curso" name="status"
                                            class="tom-select w-full">
                                            <option @if ($class->status == 'able')
                                                selected
                                                @endif value="able">Habilitado</option>
                                            <option @if ($class->status == 'disabled')
                                                selected
                                                @endif value="disabled">Desabilitado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-7" class="form-label"><strong>Carga
                                            Horária</strong></label>
                                    <input id="update-profile-form-7" type="text" name="cargaHoraria" class="form-control"
                                        placeholder="Carga horária da turma" value="{{ $class->workload }}">
                                </div>
                                <div class="flex justify-end mt-12">
                                    <input type="submit" value="Atualizar turma" class="btn btn-primary mr-auto mb-2">
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="update-profile-form-7"
                                        class="form-label"><strong>Subtítulo</strong></label>
                                    <input id="update-profile-form-7" type="text" name="subtitulo" class="form-control"
                                        placeholder="Subtítulo da turma" value="{{ $class->subtitle }}">
                                </div>
                                <div class="mt-3">
                                    <label for="dataTermino" class="form-label"><strong>Data de Termino</strong></label>
                                    <div class="relative mx-auto">
                                        <div
                                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                            <i data-feather="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" autocomplete="off" class="data form-control pl-12"
                                            name="dataTermino" value="{{ $class->end_date . ' 03:00:00' }}"
                                            data-single-mode="true">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="status" class="form-label"><strong>Tipo</strong></label>
                                    <div class="mt-2">
                                        <select data-placeholder="Selecione o tipo do curso" name="tipo"
                                            class="tom-select w-full">
                                            <option @if ($class->type == 'Premium')
                                                selected
                                                @endif value="Premium">Premium</option>
                                            <option @if ($class->type == 'Master')
                                                selected
                                                @endif value="Master">Master</option>
                                            <option @if ($class->type == 'Classico')
                                                selected
                                                @endif value="Classico">Classico</option>
                                        </select>
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
                    <div class="mt-3">
                        <label for="post-form-2" class="form-label"><strong>Data de Cadastro</strong></label>
                        <input class="datepicker form-control" disabled
                            value="{{ date('d/m/Y H:i:s', strtotime($class->created_at)) }}" id="post-form-2"
                            data-single-mode="true">
                    </div>
                    <div class="mt-3">
                        <label for="post-form-2" class="form-label"><strong>Última Atualização</strong></label>
                        <input class="datepicker form-control" disabled
                            value="{{ date('d/m/Y H:i:s', strtotime($class->updated_at)) }}" id="post-form-2"
                            data-single-mode="true">
                    </div>
                    <div class="mt-3 grid grid-cols-12">
                        <div class="col-span-12 lg:col-span-4">
                            <label for="post-form-2" class="form-label"><strong>Confirmado</strong></label><br>
                            <input id="post-form-2" class="form-check-switch" @if ($class->confirmed == '1') checked @endif type="checkbox"
                                name="confirmado">
                        </div>
                        <div class="col-span-12 lg:col-span-4">
                            <label for="post-form-2" class="form-label"><strong>Aovivo</strong></label><br>
                            <input id="post-form-2" class="form-check-switch" @if ($class->live == '1') checked @endif type="checkbox"
                                name="aovivo">
                        </div>
                    </div>
                </div>
            </div>

            <!-- END: Post Info -->
        </div>

    </form>

    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Paineis
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-12">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Título</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Subtítulo</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data de Início
                                    </th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data de Termino
                                    </th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Status</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Docente</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Núm. Vídeoaulas</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($panels as $panel)
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{ $panel->id }}</td>
                                        <td class="border">{{ $panel->title }}</td>
                                        <td class="border">{{ $panel->subtitle }}</td>
                                        <td class="border">
                                            {{ date('d/m/Y h:i:s', strtotime($panel->start_time)) }}</td>
                                        <td class="border">
                                            {{ date('d/m/Y h:i:s', strtotime($panel->end_time)) }}</td>
                                        <td class="border">
                                            @if ($panel->status == 'disabled')
                                                <div class="text-theme-6">
                                                    Desabilitado
                                                </div>
                                            @else
                                                <div class=" text-theme-9">
                                                    Habilitado
                                                </div>
                                            @endif
                                        </td>
                                        <td class="border">
                                            @foreach ($panel->teachers as $teacher)
                                                @if (sizeof($panel->teachers) > 1)
                                                    {{ $teacher->name . ',' }}
                                                @else
                                                    {{ $teacher->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="border">
                                            {{ sizeof($panel->video_lesson) }}
                                        </td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3" href="javascript:;" data-toggle="modal"
                                                    data-target="#infoPainel{{ $panel->id }}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                                <a class="flex text-theme-6 mr-3" href="javascript:;" data-toggle="modal"
                                                    data-target="#excluirPainel{{ $panel->id }}">
                                                    <i data-feather="trash" class="w-4 h-4 mr-1"></i> Excluir
                                                </a>
                                            </div>
                                            <!-- BEGIN: Modal Content -->
                                            <div id="infoPainel{{ $panel->id }}" class="modal" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-0">
                                                            <form method="POST"
                                                                action="{{ route('atualizar-painel', ['panel' => $panel->id]) }}">
                                                                <!-- BEGIN: Personal Information -->
                                                                <div class="intro-y box mt-5">
                                                                    <div
                                                                        class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                                                        <h2 class="font-medium text-base mr-auto">
                                                                            Informação do Painel
                                                                        </h2>
                                                                    </div>
                                                                    <div class="p-5">
                                                                        <div class="grid grid-cols-12 gap-x-5">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="col-span-12 xl:col-span-6">
                                                                                <div class="mt-3">
                                                                                    <label for="update-profile-form-7"
                                                                                        class="form-label"><strong>Título</strong></label>
                                                                                    <input id="update-profile-form-7"
                                                                                        type="text" name="titulo"
                                                                                        class="form-control"
                                                                                        placeholder="Título do painel"
                                                                                        value="{{ $panel->title }}">
                                                                                </div>
                                                                                <div class="mt-3">
                                                                                    <label for="dataInicio"
                                                                                        class="form-label"><strong>Data
                                                                                            de Início</strong></label>
                                                                                    <div class="relative mx-auto">
                                                                                        <div
                                                                                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                                                                            <i data-feather="calendar"
                                                                                                class="w-4 h-4"></i>
                                                                                        </div>
                                                                                        <input type="text"
                                                                                            autocomplete="off"
                                                                                            class="form-control pl-12"
                                                                                            name="dataInicio"
                                                                                            value="{{ date('d/m/Y h:i:s', strtotime($panel->start_time)) }}"
                                                                                            placeholder="00/00/0000 00:00:00">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mt-3">
                                                                                    <label for="status"
                                                                                        class="form-label"><strong>Status</strong></label>
                                                                                    <div class="mt-2">
                                                                                        <select
                                                                                            data-placeholder="Selecione o status do curso"
                                                                                            name="status"
                                                                                            class="tom-select w-full">
                                                                                            <option @if ($panel->status == 'able')
                                                                                                selected
                                                                                                @endif value="able">
                                                                                                Habilitado</option>
                                                                                            <option @if ($panel->status == 'disabled')
                                                                                                selected
                                                                                                @endif value="disabled">
                                                                                                Desabilitado</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-span-12 xl:col-span-6">
                                                                                <div class="mt-3">
                                                                                    <label for="update-profile-form-7"
                                                                                        class="form-label"><strong>Subtítulo</strong></label>
                                                                                    <input id="update-profile-form-7"
                                                                                        type="text" name="subtitulo"
                                                                                        class="form-control"
                                                                                        placeholder="Subtítulo da turma"
                                                                                        value="{{ $panel->subtitle }}">
                                                                                </div>
                                                                                <div class="mt-3">
                                                                                    <label for="dataTermino"
                                                                                        class="form-label"><strong>Data
                                                                                            de Termino</strong></label>
                                                                                    <div class="relative mx-auto">
                                                                                        <div
                                                                                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                                                                            <i data-feather="calendar"
                                                                                                class="w-4 h-4"></i>
                                                                                        </div>
                                                                                        <input type="text"
                                                                                            autocomplete="off"
                                                                                            class="form-control pl-12"
                                                                                            name="dataTermino"
                                                                                            value="{{ date('d/m/Y h:i:s', strtotime($panel->end_time)) }}"
                                                                                            placeholder="00/00/0000 00:00:00">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mt-3">
                                                                                    <label for="dataTermino"
                                                                                        class="form-label">
                                                                                        <strong>Docentes</strong>
                                                                                    </label>
                                                                                    <select
                                                                                        data-placeholder="Selecione os docentes"
                                                                                        name="docentes[]"
                                                                                        class="tom-select w-full"
                                                                                        id="post-form-3" multiple>
                                                                                        @foreach ($allteachers as $teacher)
                                                                                            <option @if (str_contains($panel->teachers, $teacher->name))
                                                                                                selected
                                                                                        @endif
                                                                                        value="{{ $teacher->id }}">{{ $teacher->name }}
                                                                                        </option>
                                @endforeach
                                </select>
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-12">
                    <div class="mt-3">
                        <label for="status" class="form-label"><strong>Conteúdo</strong></label>
                        <div class="mt-2">
                            <textarea class="form-control editor" name="conteudo" id="conteudo" cols="30"
                                rows="10">{{ $panel->content }}</textarea>
                        </div>
                    </div>
                    <div class="flex justify-end mt-10">
                        <input type="hidden" value="{{ $class->id }}" name="idTurma">
                        <button type="submit" class="btn btn-primary mr-auto">Atualizar
                            informações do
                            painel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>

    <!-- BEGIN: Modal Content -->
    <div id="excluirPainel{{ $panel->id }}" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('excluir-painel', ['panel' => $panel->id]) }}" method="POST">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="x-circle"
                                class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Você realmente quer excluir
                                este painel?</div>
                            <div class="text-gray-600 mt-2">
                                Esse processo não poderá ser desfeito.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-dismiss="modal"
                                class="btn btn-outline-secondary w-24 dark:border-dark-5 dark:text-gray-300 mr-1">Cancelar</button>
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $class->id }}" name="idTurma">
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
