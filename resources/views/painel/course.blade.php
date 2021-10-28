@extends('painel.layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h1 class="intro-y text-lg font-medium mt-10">
        Lista de cursos cadastrados
    </h1>
    <a href="{{ route('adicionar-curso') }}" class="btn btn-primary w-49 mr-2 mt-5 mb-2"> <i data-feather="plus"
            class="w-4 h-4 mr-2"></i> Adicionar curso
    </a>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="w-full mr-0 sm:w-auto mt-3 sm:mt-0 sm:ml-auto">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <form action="{{ route('filtra-cursos') }}" method="post">
                        @csrf
                        <input type="text" name="search" class="form-control w-56 box pr-10 placeholder-theme-13"
                            placeholder="Pesquisar...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                    </form>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="text-center whitespace-nowrap">#</th>
                        <th class="text-center whitespace-nowrap">Curso</th>
                        <th class="text-center whitespace-nowrap">Código</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr class="intro-x">
                            <td class="text-center">
                                {{ $course->id }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('informacao-curso', ['course' => $course->id]) }}"
                                    class="font-medium whitespace-nowrap">{{ $course->title }}</a>
                                <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $course->subtitle }}</div>
                            </td>
                            <td class="text-center">{{ $course->slug }}</td>
                            <td class="text-center">
                                @if ($course->status == 'disabled')
                                    <div class="flex items-center justify-center text-theme-6">
                                        <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Desabilitado
                                    </div>
                                @else
                                    <div class="flex items-center justify-center text-theme-9">
                                        <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Habilitado
                                    </div>
                                @endif

                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center text-theme-1 mr-3"
                                        href="{{ route('informacao-curso', ['course' => $course->id]) }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                    </a>
                                    <a class="flex items-center text-theme-6 mr-3" href="javascript:;" data-toggle="modal"
                                        data-target="#excluirCurso{{ $course->id }}">
                                        <i data-feather="trash" class="w-4 h-4 mr-1"></i> Excluir
                                    </a>
                                </div>
                                <!-- BEGIN: Modal Content -->
                                <div id="excluirCurso{{ $course->id }}" class="modal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('excluir-curso', ['course' => $course->id]) }}"
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
            @if (isset($filters))
                {{ $courses->appends($filters)->links() }}
            @else
                {{ $courses->links() }}
            @endif
        </div>
        <!-- END: Data List -->
    </div>
    <!-- END: Users Layout -->
    @if (session()->get('message') == 'course_deleted')
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-5 text-center"> <i data-feather="check-circle"
                            class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bom trabalho!</div>
                        <div class="text-gray-600 mt-2">O curso foi excluído com sucesso!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                            class="btn btn-primary w-24">Ok</button> </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->
    @endif

    @if (session()->get('message') == 'course_delete_error')
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center"> <i data-feather="check-circle"
                                class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Erro!</div>
                            <div class="text-gray-600 mt-2">Não foi possível excluir o curso!</div>
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
