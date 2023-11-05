@extends('app.layouts.basico')

@section('titulo', "Produtos")

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Editar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacoes-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">

                @component('app.produto.components.form_create_edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores])          
                @endcomponent

            </div>
        </div>

    </div>

@endsection