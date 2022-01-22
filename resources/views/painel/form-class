@extends('painel.layouts.app')

@section('content')
    <form action="{{ route('cadastrar-curso') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="update-profile-form-7" class="form-label"><strong>Nome</strong></label>
                                    <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                        placeholder="Nome do curso" value="">
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
                                    <label for="post-form-3" class="form-label"><strong>Categorias</strong></label>
                                    <select data-placeholder="Selecione as categorias" name="categorias[]"
                                        class="tom-select w-full" id="post-form-3" multiple>
                                        @foreach ($allcategories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                                        @endforeach
                                    </select>
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

@endpush
