<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Obtém o ID do aluno a partir da URL usando o método GET
$id = $_GET['id'];

// Prepara a instrução SQL para selecionar o aluno pelo ID
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
// Executa a instrução SQL, passando o ID do aluno como parâmetro
$stmt->execute([$id]);

// Recupera os dados do aluno como um array associativo
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluno</title>
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
        <h2 class="font-bold mt-6 text-white text-center my-6">Informações:</h2>
        <div class="flex justify-center">

            <?php if ($aluno): ?>

                <!-- Exibe os detalhes do aluno -->
                <div class="rounded-3xl w-96 border-solid border border-yellow-400 p-4">
                    <p><strong>ID:</strong> <?= $aluno['id'] ?></p>
                    <p><strong>Nome:</strong> <?= $aluno['nome'] ?></p>
                    <p><strong>Matrícula:</strong> <?= $aluno['matricula'] ?></p>
                    <p><strong>Data de Nascimento:</strong> <?= $aluno['data_nascimento'] ?></p>
                    <p><strong>E-mail:</strong> <?= $aluno['email'] ?></p>
                    <p class="mb-4"><strong>telefone:</strong> <?= $aluno['telefone'] ?></p>
                    <p>
                        <!-- Links para editar e excluir o aluno -->
                    <div class="flex gap-4">
                        <a class="text-indigo-500 hover:text-indigo-900 border border-indigo-500 p-2 rounded-2xl " href="update-aluno.php?id=<?= $aluno['id'] ?>">Editar</a>
                        <a class="text-red-600 hover:text-red-900 border border-red-600 p-2 rounded-2xl" href="delete-aluno.php?id=<?= $aluno['id'] ?>">Excluir</a>
                    </div>
                    </p>
                </div>
            <?php else: ?>
                <!-- Exibe uma mensagem caso o aluno não seja encontrado -->
                <p>Aluno não encontrado.</p>
            <?php endif; ?>
        </div>
    </main>


</body>

</html>