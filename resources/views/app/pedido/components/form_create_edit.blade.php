@if (isset($pedido->id))
    <form action="{{route('pedido.update', ['pedido' => $pedido->id])}}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{route('pedido.store')}}" method="post">
        @csrf
@endif

    <select name="cliente_id">
        <option>-- Selecione um Cliente --</option>

        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : ''}}>{{ $cliente->nome }}</option>
        @endforeach
        {{$errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}
        
    </select>

    @if (isset($pedido->id))
        <button type="submit" class="borda-preta">Salvar Informações</button>
    @else
        <button type="submit" class="borda-preta">Cadastrar</button>
    @endif

</form>