<!DOCTYPE html>
<html>
<head>
    <title>Transações CNAB</title>
</head>
<body>
    <h1>Transações por Loja</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Loja</th>
                <th>Tipo</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->store_name }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
