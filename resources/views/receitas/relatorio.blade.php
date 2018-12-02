<div class="container-fluid">
    <h1>Receitas</h1>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Info. Adicional</th>
            </tr>
        </thead>
        <tbody>
        @foreach($receitas as $rec)
            <tr>
                <td>{{ $rec->id }}</td>
                <td>{{ $rec->nome }}</td>
                @if ($rec->tipo == 'A')
                    <td>Alta</td>
                @elseif ($rec->tipo == 'M')
                    <td>Média</td>
                @elseif ($rec->tipo == 'B')
                    <td>Baixa</td>
                @endif 
                <td>{{ $rec->valor }}</td>
                <td>{{ $rec->data }}</td>
                <td>{{ $rec->info_adic }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

