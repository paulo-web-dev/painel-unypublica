@extends('painel.layouts.app')

@section('content')
    <form action="{{ route('atualizar-categoria', ['category' => $category->id]) }}" enctype="multipart/form-data"
        data-single="true" method="post">
        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <div class="col-span-12 lg:col-span-8">
                <!-- BEGIN: Personal Information -->
                <div class="intro-y box mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Informação da Categoria
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
                                        placeholder="Nome da Categoria" value="{{ $category->title }}">
                                </div>
                                   <div class="mt-3">
                                    <label for="update-profile-form-7" class="form-label"><strong>Slug</strong></label>
                                    <input id="update-profile-form-7" type="text" name="slug" class="form-control"
                                        placeholder="Slug da Categoria" value="{{ $category->slug }}">
                                </div>
                                <div class="mt-3">
                                    <label for="status" class="form-label"><strong>Status</strong></label>
                                    <div class="mt-2">
                                        <select data-placeholder="Selecione o status do curso" name="status"
                                            class="tom-select w-full">
                                            <option @if ($category->status == 'able')
                                                selected
                                                @endif value="able">Habilitado</option>
                                            <option @if ($category->status == 'disabled')
                                                selected
                                                @endif value="disabled">Desabilitado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Categoria</button>
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
                            value=" {{ date('d/m/Y H:i:s', strtotime($category->created_at)) }}" id="post-form-2"
                            data-single-mode="true">
                    </div>
                    <div class="mt-3">
                        <label for="post-form-2" class="form-label"><strong>Última Atualização</strong></label>
                        <input class="datepicker form-control" disabled
                            value=" {{ date('d/m/Y H:i:s', strtotime($category->updated_at)) }}" id="post-form-2"
                            data-single-mode="true">
                    </div>
                  
                         
                        </select>
                    </div>
                </div>
            </div>

            <!-- END: Post Info -->
        </div>
    </form>
                            </tbody>
                        </table>
                    </div>
                </div>
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
