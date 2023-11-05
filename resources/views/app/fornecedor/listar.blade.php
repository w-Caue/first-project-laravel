@extends('app.layouts.basico')

@section('titulo', "Fornecedor")

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacoes-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td><a href=" {{ route('app.fornecedor.excluir', $fornecedor->id) }} ">Excluir</a></td>
                                <td><a href=" {{ route('app.fornecedor.editar', $fornecedor->id) }} ">Editar</a></td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <h5>Lista de Produtos</h5>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                            </tr>            
                                        </thead>
                                        <tbody>
                                            @foreach ($fornecedor->produtos as $key => $produto)
                                            <tr>
                                                <td>{{ $produto->id }}</td>
                                                <td>{{ $produto->nome }}</td>
                                            </tr>
                                            @endforeach                         
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                         @endforeach

                    </tbody>

                </table>
                <div id="paginate">
                    {{$fornecedores->appends($request)->links('app.layouts._partials.paginate')}}
                </div>

                    
    
                    Exibindo {{$fornecedores->count() }} fornecedores de {{$fornecedores->total() }} ({{$fornecedores->firstItem() }} a {{$fornecedores->lastItem() }})
            </div>
        </div>

    </div>

@endsection