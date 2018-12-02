<div class="container-fluid">
    <h1>Receitas Futuras</h1>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Prioridade</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Info. Adicional</th>
            </tr>
        </thead>
        <tbody>
        @foreach($receita_futura as $rec_fu)
            <tr>
                <td>{{ $rec_fu->id }}</td>
                <td>{{ $rec_fu->nome }}</td>
                @if ($rec_fu->tipo == 'A')
                    <td>Alta</td>
                @elseif ($rec_fu->tipo == 'M')
                    <td>Média</td>
                @elseif ($rec_fu->tipo == 'B')
                    <td>Baixa</td>
                @endif 
                <td>{{ $rec_fu->valor }}</td>
                <td>{{ $rec_fu->data }}</td>
                <td>{{ $rec_fu->info_adic }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

