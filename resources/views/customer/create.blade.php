<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form
            action="{{ route('customers.store') }}"
            method="POST"
        >
            @csrf
            <div>
                <input type="text" name="nome" placeholder="Nome do cliente" required>
            </div>

            <div>
                <input type="email" name="email" placeholder="E-mail do cliente" required>
            </div>

            <div>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>
