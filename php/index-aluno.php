<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Executa a consulta para obter todos os alunos
$stmt = $pdo->query("SELECT * FROM usuarios");
// Recupera todos os resultados da consulta como um array associativo
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Alunos</title>
    <link rel="stylesheet" href="/style/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <nav class=" flex bg-yellow-400 w-full justify-between items-center">
        <div class="m-2 flex items-center justify-center">
            <svg height="50" width="64" fill="none" viewBox="0 0 64 59" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M59.4336 6.92468C55.0386 2.32957 50.182 0 44.9972 0C39.8684 0 35.188 2.58837 31.9911 6.9941C28.8129 2.5885 24.1645 0 19.0783 0C13.9228 0 9.20503 2.25753 4.66321 6.90329C1.68795 9.9481 -0.0572313 14.6499 0.0014334 19.4825C0.0468391 23.3037 1.21563 28.9449 6.52847 34.1298C10.6593 38.1592 29.9443 57.7138 30.1391 57.9113C30.638 58.421 31.3239 58.7064 32.039 58.7064C32.7514 58.7064 33.4373 58.4209 33.9389 57.9113C34.1336 57.7138 53.4187 38.1593 57.5468 34.1298C66.9721 24.9369 64.6985 12.4218 59.4336 6.92468ZM45.3628 29.3532C45.3628 30.8262 44.17 32.0216 42.6944 32.0216C41.2188 32.0216 40.026 30.8262 40.026 29.3532V26.6848H24.0152V29.3532C24.0152 30.8262 22.8224 32.0216 21.3467 32.0216C19.8711 32.0216 18.6783 30.8262 18.6783 29.3532V18.6794C18.6783 17.2064 19.8711 16.0109 21.3467 16.0109C22.8224 16.0109 24.0152 17.2064 24.0152 18.6794V21.3478H40.026V18.6794C40.026 17.2064 41.2188 16.0109 42.6944 16.0109C44.17 16.0109 45.3628 17.2064 45.3628 18.6794V29.3532Z"
                    fill="black" />
            </svg>
            <h1 class="text-black font-bold m-2">GymDash</h1>
        </div>

        <div class="gap-4 text-yellow-400 font-semibold hidden md:flex">
            <a class="bg-black px-4 py-2 rounded-2xl hover:bg-gray-900 duration-200" href="/index.php">Home</a>
            <a class="bg-black px-4 py-2 rounded-2xl hover:bg-gray-900 duration-200 mr-4" href="index-aluno.php">Listar Alunos</a>

        </div>

    </nav>

    <main>
        <h2 class="font-bold my-16 text-black text-center">Lista de Alunos</h2>
        
            <table class="min-w-full divide-y divide-gray-200 ">
                <thead class="bg-yellow-400">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Matrícula</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Data de Nascimento</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">E-mail</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Telefone</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-black uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-200 divide-y divide-white">
                    <?php foreach ($alunos as $aluno): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $aluno['id'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black"><?= $aluno['nome'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black"><?= $aluno['matricula'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black"><?= $aluno['data_nascimento'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black"><?= $aluno['email'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black"><?= $aluno['telefone'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="read-aluno.php?id=<?= $aluno['id'] ?>" class="text-indigo-600 hover:text-indigo-900">Visualizar</a>
                                <a href="update-aluno.php?id=<?= $aluno['id'] ?>" class="ml-4 text-yellow-600 hover:text-yellow-900">Editar</a>
                                <a href="delete-aluno.php?id=<?= $aluno['id'] ?>" class="ml-4 text-red-600 hover:text-red-900">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        
    </main>

    
</body>

</html>

<style>
    body{
        background-color: white;
    }
</style>