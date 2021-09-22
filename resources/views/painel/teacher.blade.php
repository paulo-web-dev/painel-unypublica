@extends('painel.layouts.app')

@section('content')

    <h2 class="intro-y text-lg font-medium mt-10">
        Lista de professores cadastrados
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('adicionar-professor') }}" class="btn btn-primary shadow-md mr-2">
                <i data-feather="plus" class="w-4 h-4 mr-2"></i> Adicionar professor
            </a>
            <div class="hidden md:block mx-auto text-gray-600"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Pesquisar...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        @foreach ($teachers as $teacher)
            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
                <div class="box h-72">
                    <div class="flex items-start px-5 pt-5">
                        <div class="w-full flex flex-col lg:flex-row items-center">
                            <div class="w-16 h-16 image-fit">
                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full"
                                    src="{{ url('dist/images/profile-11.jpg') }}">
                            </div>
                            <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                                <a href="" class="font-medium">{{ $teacher->name }}</a>
                                <div class="text-gray-600 text-xs mt-0.5">{{ $teacher->cpf }}</div>
                            </div>
                        </div>
                        <div class="absolute right-0 top-0 mr-5 mt-3 dropdown">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i
                                    data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>
                            </a>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                    <a href="{{ route('informacao-professor', ['teacher' => $teacher->id]) }}"
                                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Editar </a>
                                    <a href=""
                                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="trash" class="w-4 h-4 mr-2"></i> Excluir </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center lg:text-left p-5">
                        <div>{!! $teacher->short_resume !!}</div>
                        <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i
                                data-feather="mail" class="w-3 h-3 mr-2"></i> {{ $teacher->email }} </div>
                        <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i
                                data-feather="phone" class="w-3 h-3 mr-2"></i> {{ $teacher->phone }} </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- END: Users Layout -->
    </div>
@endsection
@push('custom-scripts')

@endpush
