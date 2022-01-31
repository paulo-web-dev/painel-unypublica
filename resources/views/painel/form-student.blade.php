@extends('painel.layouts.app')


@section('content')

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cadastro de aluno
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5 lg:mt-0">
                <div class="p-5 border-t nav-tab border-gray-200 dark:border-dark-5">
                    <a id="informacoes-pessoais-tab" data-toggle="tab" data-target="#informacoes-pessoais"
                        href="javascript:;" role="tab" class="flex items-center">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Informações Pessoais </a>
                </div>
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 xxl:col-span-9 tab-content">
            <form action="{{ route('cadastrar-aluno') }}" method="post" enctype="multipart/form-data" data-single="true" method="post">
                @csrf
                <div id="informacoes-pessoais" role="tabpanel" aria-labelledby="informacoes-pessoais-tab"
                    class="grid grid-cols-12 gap-6 tab-pane active">
                    <!-- BEGIN: Products -->

                    <div class="intro-y box col-span-12 xxl:col-span-12">
                        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                                Informações Pessoais
                            </h2>
                        </div>
                        
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-24 lg:h-24 image-fit relative">
                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full"
                                    src="{{ url('dist/images/profile-11.jpg') }}">
                                <div
                                    class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-1 rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-camera w-4 h-4 text-white">
                                        <path
                                            d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                        </path>
                                        <circle cx="12" cy="13" r="4"></circle>
                                    </svg>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="intro-y box col-span-12 xxl:col-span-6">
                        <div class="col-span-12 mt-5">
                            <label for="nome" class="form-label"><strong>Nome</strong></label>
                            <input id="nome" type="text" name="nome" class="form-control" placeholder="Nome do aluno">
                        </div>
                        <div class="col-span-6 mt-5">
                            <label for="cpf" class="form-label"><strong>CPF</strong></label>
                            <input id="cpf" type="text" name="cpf" class="form-control" placeholder="CPF do aluno">
                        </div>
                        <div class="mt-5">
                            <label for="email" class="form-label"><strong>E-mail</strong></label>
                            <input id="email" type="email" name="email" class="form-control" placeholder="E-mail do aluno">
                        </div>
                        <div class="mt-5">
                            <label for="telefone" class="form-label"><strong>Telefone</strong></label>
                            <input id="telefone" type="text" name="telefone" class="form-control"
                                placeholder="Telefone do aluno">
                        </div>
                    </div>
                    <div class="intro-y box col-span-12 xxl:col-span-6">
                        <div class="mt-5 ml-3">
                            <label for="cep" class="form-label"><strong>CEP</strong></label>
                            <input id="cep" type="text" name="cep" class="form-control" placeholder="CEP do aluno">
                        </div>
                        <div class="flex mt-5 ml-0">
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label for="rua" class="form-label"><strong>Rua</strong></label>
                                <input id="rua" type="text" name="rua" class="form-control" placeholder="Rua do aluno">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="numero" class="form-label"><strong>Núm</strong></label>
                                <input id="numero" type="text" name="num" class="form-control" placeholder="Núm do aluno">
                            </div>
                        </div>
                        <div class="mt-5 ml-3">
                            <label for="bairro" class="form-label"><strong>Bairro</strong></label>
                            <input id="bairro" type="text" name="bairro" class="form-control" placeholder="Bairro do aluno">
                        </div>
                        <div class="flex mt-5 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="cidade">
                                    <strong>Cidade</strong>
                                </label>
                                <input class="form-control" id="cidade" name="cidade" type="text"
                                    placeholder="Cidade do Aluno">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="uf">
                                    <strong>UF</strong>
                                </label>
                                <div class="relative">
                                    <select class="form-control" name="uf" id="uf">
                                        <option selected disabled>Selecione</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>

                                
                                    </div>
                                </div>
                            </div></div>
                    
                      <div class="col-span-12 xl:col-span-6" style="margin-left:100px; margin-right:100px; margin-top:30px;margin-bottom:30px">
                        <label class="form-label"><strong>Foto do Aluno</strong></label>
                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                            <div class="px-4 pt-24 pb-24 flex items-center justify-center cursor-pointer relative">
                                <div id="areaArquivo">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i>
                                    <span class="mr-1 font-bold">Foto do Aluno</span>
                                </div>
                                <input type="file" id="file" name="file"
                                    class="w-full h-full top-0 left-0 absolute opacity-0">
                            </div>
                        </div></div></div></div>   </div>
                    
                    <div class="intro-y box col-span-12 xxl:col-span-12">
                        <button type="submit" class="btn btn-primary w-full  mr-2 mb-2"> <i data-feather="activity"
                                class="w-4 h-4 mr-2"></i>
                            Adicionar aluno </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('custom-scripts')
      <script>
        (function(cash) {
            document.getElementById('file').onchange = function() {
                var arquivo = document.getElementById('file').value;
                var nomearquivo = arquivo.substring(12);
                var modeloArquivo =
                    '<div class="file box rounded-md px-5 sm:px-5 relative zoom-in">' +
                    '<p class="w-1/5 file__icon file__icon--file mx-auto">' +
                    '</p>' +
                    '<p class="block font-medium mt-4 text-center truncate">' + nomearquivo + '</p>' +
                    '</div>';
                cash('#areaArquivo').html(modeloArquivo);
            }
        })(cash);
    </script>
@endpush