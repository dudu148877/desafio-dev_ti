<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CNAB</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        header a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }

        header a:hover {
            text-decoration: underline;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="file"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
    <script>
        function validateFileType() {
            const fileInput = document.querySelector('input[type="file"]');
            const filePath = fileInput.value;
            const allowedExtensions = /(.txt)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Por favor, envie um arquivo com a extensão .txt');
                fileInput.value = ''; 
                return false; 
            }
            return true; 
        }
    </script>
</head>
<body>
  
    <header>
        <a href="https://www.linkedin.com/in/duduxzl/" target="_blank">LinkedIn</a>
        <a href="https://github.com/dudu148877" target="_blank">GitHub</a>
    </header>

    <div class="container">
        <h1>Upload de Arquivo CNAB</h1>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <form action="{{ route('upload.cnab') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateFileType()">
            @csrf
            <input type="file" name="cnab_file" required>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
