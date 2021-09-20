@extends('painel.layouts.app')

@section('content')

    <!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Professores
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-6">
                    <div class="mt-3">
                        <label for="update-profile-form-7" class="form-label">Nome</label>
                        <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                            placeholder="Nome do professor" value="">
                    </div>
                    <div class="mt-3">
                        <label for="update-profile-form-6" class="form-label">Email</label>
                        <input id="update-profile-form-6" type="text" name="email" class="form-control"
                            placeholder="E-mail do professor" value="">
                    </div>
                    <div class="mt-3">
                        <label for="short-resume" class="form-label">Breve Currículo</label>
                    </div>
                    <div class="mt-3">
                        <label for="status" class="form-label"><strong>Status</strong></label>
                        <div class="mt-2">
                            <select data-placeholder="Selecione o status do professor" name="status"
                                class="tom-select w-full">
                                <option selected disabled>Selecione</option>
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
                            placeholder="Telefone do professor" value="">
                    </div>
                    <div class="mt-3">
                        <label for="update-profile-form-9" class="form-label">CPF</label>
                        <input id="update-profile-form-9" type="text" name="cpf" class="form-control"
                            placeholder="CPF do professor" value="">
                    </div>
                    <div class="mt-3">
                        <label for="full-resume" class="form-label">Currículo Completo</label>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button type="button" class="btn btn-primary w-40 mr-auto">Cadastrar professor</button>
            </div>
        </div>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>
@endsection
@push('custom-scripts')

@endpush
