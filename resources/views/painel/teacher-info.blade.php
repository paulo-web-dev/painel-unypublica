@extends('painel.layouts.app')

@section('content')

    <!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Professores
            </h2>
        </div>

        <form action="{{ route('atualiza-professor', ['teacher' => $teacher->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="p-5">
                <div class="grid grid-cols-12 gap-x-5">
                    @csrf
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label">Nome</label>
                            <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                placeholder="Nome do professor" value="{{ $teacher->name }}">
                        </div>
                        <div class="mt-3">
                            <label for="update-profile-form-6" class="form-label">Email</label>
                            <input id="update-profile-form-6" type="text" name="email" class="form-control"
                                placeholder="E-mail do professor" value="{{ $teacher->email }}">
                        </div>
                        <div class="mt-6">
                            <label for="short-resume" class="form-label">Breve Currículo</label>
                            <div class="mt-2">
                                <textarea class="form-control editor" name="short_resume" id="short_resume" cols="30"
                                    rows="10">{{ $teacher->short_resume }}</textarea>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="status" class="form-label"><strong>Status</strong></label>
                            <div class="mt-2">
                                <select data-placeholder="Selecione o status do professor" name="status"
                                    class="tom-select w-full">
                                    @if ($teacher->status == 'able')
                                        Habilitado
                                    @endif
                                    @if ($teacher->status == 'disable')
                                        Desabilitado
                                    @endif
                                    <option value="able">Habilitado</option>
                                    <option value="disabled">Desabilitado</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label">Telefone</label>
                            <input id="update-profile-form-7" type="text" name="telefone" class="form-control"
                                placeholder="Telefone do professor" value="{{ $teacher->phone }}">
                        </div>
                        <div class="mt-3">
                            <label for="update-profile-form-9" class="form-label">CPF</label>
                            <input id="update-profile-form-9" type="text" name="cpf" class="form-control"
                                placeholder="CPF do professor" value="{{ $teacher->cpf }}">
                        </div>
                        <div class="mt-6">
                            <label for="full-resume" class="form-label">Currículo Completo</label>
                            <div class="mt-2">
                                <textarea class="form-control editor" name="full_resume" id="full_resume" cols="30"
                                    rows="15">{{ $teacher->full_resume }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-10">
                    <button type="submit" class="btn btn-primary mr-auto">Atualizar informações do professor</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    @if (session()->get('message') == 'teacher_updated')
        <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="modalInfo" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="p-5 text-center"> <i data-feather="check-circle"
                            class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Bom trabalho!</div>
                        <div class="text-gray-600 mt-2">Os dados dos professores foram atualizados com sucesso!</div>
                    </div>
                    <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal"
                            class="btn btn-primary w-24">Ok</button> </div>
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
