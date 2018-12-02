<div class="container-fluid">
    <h1>Despesas Futuras</h1>

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
        @foreach($despesa_futura as $des_fu)
            <tr>
                <td>{{ $des_fu->id }}</td>
                <td>{{ $des_fu->nome }}</td>
                @if ($des_fu->tipo == 'A')
                    <td>Alta</td>
                @elseif ($des_fu->tipo == 'M')
                    <td>Média</td>
                @elseif ($des_fu->tipo == 'B')
                    <td>Baixa</td>
                @endif 
                <td>{{ $des_fu->valor }}</td>
                <td>{{ $des_fu->data }}</td>
                <td>{{ $des_fu->info_adic }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

