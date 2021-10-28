@extends('painel.layouts.app')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                Materiais Cadastrados
            </h2>
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-6">
                <div class="mt-1">
                    <a href="" class="flex items-center px-3 py-2 rounded-md bg-theme-1 text-white font-medium"> <i
                            class="w-4 h-4 mr-2" data-feather="box"></i> Todos os materiais </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-feather="file-text"></i> PDF </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-feather="video"></i> Apresentação Power Point </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-feather="file-plus"></i> Excel </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-feather="file"></i> Word </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-feather="archive"></i> Arquivo Compactado (.rar) </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2"
                            data-feather="trash"></i> Lixeira </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->
        </div>
        <div class="col-span-12 lg:col-span-9 xxl:col-span-10">
            <!-- BEGIN: File Manager Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700 dark:text-gray-300"
                        data-feather="search"></i>
                    <form action="{{ route('filtra-materiais') }}" method="post">
                        @csrf
                        <input type="text" name="search"
                            class="form-control w-full sm:w-64 box px-10 text-gray-700 dark:text-gray-300 placeholder-theme-13"
                            placeholder="Buscar materiais">
                    </form>
                </div>
                <div class="w-full sm:w-auto flex">
                    <a href="{{ route('adicionar-material') }}" class="btn btn-primary shadow-md mr-2">
                        Cadastrar Material
                    </a>
                </div>
            </div>
            <!-- END: File Manager Filter -->
            <!-- BEGIN: Directory & Files -->
            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                @foreach ($materials as $material)
                    <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 xxl:col-span-2">
                        <div class="file box rounded-md px-5 pt-8 pb-5 sm:px-5 relative zoom-in">
                            <a href="{{ route('informacao-material', ['material' => $material->id]) }}"
                                class="w-3/5 file__icon file__icon--file mx-auto">
                                <div class="file__icon__file-name">PDF</div>
                            </a>
                            <a href="{{ route('informacao-material', ['material' => $material->id]) }}"
                                class="block font-medium mt-4 text-center truncate">{{ $material->name }}</a>
                            <div class="text-gray-600 text-xs text-center mt-0.5">1 KB</div>
                            <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i
                                        data-feather="more-vertical" class="w-5 h-5 text-gray-600"></i> </a>
                                <div class="dropdown-menu w-40">
                                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                        <a href="javascript:;" data-toggle="modal"
                                            data-target="#excluirMaterial{{ $material->id }}"
                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="trash" class="w-4 h-4 mr-2"></i> Excluir </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN: Modal Content -->
                    <div id="excluirMaterial{{ $material->id }}" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('excluir-material', ['material' => $material->id]) }}"
                                    method="POST">
                                    <div class="modal-body p-0">
                                        <div class="p-5 text-center"> <i data-feather="x-circle"
                                                class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Você realmente quer excluir este material?</div>
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
                @endforeach

            </div>
            @if (isset($filters))
                {{ $materials->appends($filters)->links() }}
            @else
                {{ $materials->links() }}
            @endif
            <!-- END: Directory & Files -->

        </div>
    </div>

@endsection

@push('custom-scripts')

@endpush
