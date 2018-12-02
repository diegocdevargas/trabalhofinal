<div class="container-fluid">
    <h1>Despesas</h1>

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
        @foreach($despesas as $des)
            <tr>
                <td>{{ $des->id }}</td>
                <td>{{ $des->nome }}</td>
                @if ($des->tipo == 'A')
                    <td>Alta</td>
                @elseif ($des->tipo == 'M')
                    <td>Média</td>
                @elseif ($des->tipo == 'B')
                    <td>Baixa</td>
                @endif  
                <td>{{ $des->valor }}</td>
                <td>{{ $des->data }}</td>
                <td>{{ $des->info_adic }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

