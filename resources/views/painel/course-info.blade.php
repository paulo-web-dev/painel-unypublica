@extends('painel.layouts.app')

@section('content')
    <form action="{{ route('atualizar-curso', ['course' => $course->id]) }}" enctype="multipart/form-data"
        data-single="true" method="post">
        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <div class="col-span-12 lg:col-span-8">
                <!-- BEGIN: Personal Information -->
                <div class="intro-y box mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Informação do Curso
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
                                    <label for="update-profile-form-7" class="form-label"><strong>Nome</strong></label>
                                    <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                        placeholder="Nome do curso" value="{{ $course->title }}">
                                </div>
                                <div class="mt-3">
                                    <label for="status" class="form-label"><strong>Status</strong></label>
                                    <div class="mt-2">
                                        <select data-placeholder="Selecione o status do curso" name="status"
                                            class="tom-select w-full">
                                            <option @if ($course->status == 'able')
                                                selected
                                                @endif value="able">Habilitado</option>
                                            <option @if ($course->status == 'disabled')
                                                selected
                                                @endif value="disabled">Desabilitado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar curso</button>
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
                            value=" {{ date('d/m/Y H:i:s', strtotime($course->created_at)) }}" id="post-form-2"
                            data-single-mode="true">
                    </div>
                    <div class="mt-3">
                        <label for="post-form-2" class="form-label"><strong>Última Atualização</strong></label>
                        <input class="datepicker form-control" disabled
                            value=" {{ date('d/m/Y H:i:s', strtotime($course->updated_at)) }}" id="post-form-2"
                            data-single-mode="true">
                    </div>
                    <div class="mt-3">
                        <label for="post-form-3" class="form-label"><strong>Categorias</strong></label>
                        <select data-placeholder="Selecione as categorias" name="categorias[]" class="tom-select w-full"
                            id="post-form-3" multiple>
                            @foreach ($allcategories as $categorie)
                                <option @if (str_contains($categories, $categorie->slug))
                                    selected
                                    @endif value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- END: Post Info -->
        </div>
    </form>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Título</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Subtítulo</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Tipo</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data de Início</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data de Termino</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Status</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course->classes as $classes)
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{ $classes->id }}</td>
                                        <td class="border">{{ $classes->title }}</td>
                                        <td class="border">{{ $classes->subtitle }}</td>
                                        <td class="border">{{ $classes->type }}</td>
                                        <td class="border">
                                            {{ date('d/m/Y', strtotime($classes->start_date)) }}
                                        </td>
                                        <td class="border">
                                            {{ date('d/m/Y', strtotime($classes->end_date)) }}
                                        </td>
                                        <td class="border">
                                            @if ($classes->status == 'disabled')
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
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{ route('informacao-turma', ['classes' => $classes->id]) }}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                                <a class="flex text-theme-6 mr-3" href="javascript:;" data-toggle="modal"
                                                    data-target="#excluirTurma{{ $classes->id }}">
                                                    <i data-feather="trash" class="w-4 h-4 mr-1"></i> Excluir
                                                </a>
                                            </div>
                                            <!-- BEGIN: Modal Content -->
                                            <div id="excluirTurma{{ $classes->id }}" class="modal" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form
                                                            action="{{ route('excluir-turma', ['classes' => $classes->id]) }}"
                                                            method="POST">
                                                            <div class="modal-body p-0">
                                                                <div class="p-5 text-center"> <i data-feather="x-circle"
                                                                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                                                    <div class="text-3xl mt-5">Você realmente quer excluir
                                                                        esta
                                                                        turma?</div>
                                                                    <div class="text-gray-600 mt-2">
                                                                        Esse processo não poderá ser desfeito.
                                                                    </div>
                                                                </div>
                                                                <div class="px-5 pb-8 text-center">
                                                                    <button type="button" data-dismiss="modal"
                                                                        class="btn btn-outline-secondary w-24 dark:border-dark-5 dark:text-gray-300 mr-1">Cancelar</button>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger w-24">Excluir</button>
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
            <div class="flex justify-end mt-4">
                <a href="" class="btn btn-primary mr-auto mb-2">Cadastrar turma</a>
            </div>
        </div>
    </div>
    <!-- END: Users Layout -->
    @if (session()->get('message') == 'course_created')
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-5 text-center"> <i data-feather="check-circle"
                            class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bom trabalho!</div>
                        <div class="text-gray-600 mt-2">O curso foi criado com sucesso!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                            class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif

    <!-- END: Users Layout -->
    @if (session()->get('message') == 'course_updated')
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-5 text-center"> <i data-feather="check-circle"
                            class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bom trabalho!</div>
                        <div class="text-gray-600 mt-2">Os dados do curso foram atualizados com sucesso!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                            class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif

    @if (session()->get('message') == 'course_update_error')
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Erro!</div>
                            <div class="text-gray-600 mt-2">Não foi possível atualizar os dados do curso!</div>
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
@endpush
