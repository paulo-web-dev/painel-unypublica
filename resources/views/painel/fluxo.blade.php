
@extends('painel.layouts.app')

@section('content')

            <!-- BEGIN: Post Info -->




            <form action="{{ route('cadastrar-fluxo') }}" data-single="true" method="post">
                @csrf
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de turmas
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Tipo</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data de Início</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data de Termino</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Valor estimado de curso</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Número de Alunos
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course as $classes)
                                <?php $counter=$loop->index;
                                $a=$counter;?>
                                @csrf
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{ $classes->id }}</td>
                                        <td class="border">{{ $classes->title }}{{$counter}}</td>
                                        <td class="border">{{ $classes->subtitle }}</td>
                                        <td class="border">{{ $classes->type }}</td>
                                        <td class="border">
                                            {{ date('d/m/Y', strtotime($classes->start_date)) }}
                                        </td>
                                        <td class="border">
                                            {{ date('d/m/Y', strtotime($classes->end_date)) }}
                                        </td>
                                        <td class="border">

                                                <div class="text-theme-6">
                                                    <input type="number" name="{{$counter}}" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="R$">
                                                </div>
                                        </td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <input type="number" name="alunos{{$counter}}" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                            </div>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <div class="flex justify-center">
                    <input type="number" name="desconto" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="INSIRA A O DESCONTO">
                </div>
                <button type="submit" class="btn btn-primary w-40 mr-auto">Adicionar Fluxo</button>
            </div>
        </div>
    </div>


</form>
@endsection

