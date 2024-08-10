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

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $dataNascimento = $_POST['dataNascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Prepara a instrução SQL para atualizar os dados do aluno
    $stmt = $pdo->prepare("UPDATE usuarios SET nome = ?, matricula = ?, data_nascimento = ?, email = ?, telefone =? WHERE id = ?");

    // Executa a instrução SQL com os novos dados do formulário
    $stmt->execute([$nome, $matricula, $dataNascimento, $email, $telefone, $id]);

    // Redireciona para a página de listagem de alunos após a atualização
    header('Location: index-aluno.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
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

    <main class="flex justify-center items-center h-screen">
        <div class="rounded-3xl w-96 border-solid border border-yellow-400">
            <h2 class="font-bold mt-6 text-yellow-400 text-center my-6">Editar Aluno</h2>
            <!-- Formulário para editar os dados do aluno -->

            <form method="POST">
                <div class="flex flex-col items-center gap-2">
                    <!-- Campo para inserir o nome do aluno -->
                    <div class="flex flex-col">
                        <label class="text-white font-light text-start" for="nome">
                            Aluno</label>
                        <input
                            class="border-solid border border-yellow-400 outline-none place-content-start px-2 py-1 rounded-md text-black bg-white placeholder-gray-600 placeholder-opacity-20 font-medium"
                            type="text" id="nome" name="nome" placeholder="Nome" value="<?= $aluno['nome'] ?>" required>
                    </div>

                    <!-- Campo para inserir a matrícula do aluno -->
                    <div class="flex flex-col">
                        <label class="text-white font-light text-start" for="matricula">Matrícula</label>
                        <input
                            class="border-solid border border-yellow-400 outline-none place-content-start px-2 py-1 rounded-md text-black bg-white placeholder-gray-600 placeholder-opacity-20 font-medium"
                            type="text" id="matricula" name="matricula" placeholder="Matrícula" value="<?= $aluno['matricula'] ?>" required>
                    </div>

                    <!-- Campo para inserir o e-mail do aluno -->
                    <div class="flex flex-col">

                        <label class="text-white font-light text-start" for="email">Email</label>
                        <input
                            class="border-solid border border-yellow-400 outline-none place-content-start px-2 py-1 rounded-md text-black bg-white placeholder-gray-600 placeholder-opacity-20 font-medium"
                            type="email" id="email" name="email" placeholder="Email" value="<?= $aluno['email'] ?>" required>
                    </div>

                    <!-- Campo para inseriro celular do aluno -->
                    <div class="flex flex-col">

                        <label class="text-white font-light text-start" for="telefone">Telefone</label>
                        <input
                            class="border-solid border border-yellow-400 outline-none place-content-start px-2 py-1 rounded-md text-black bg-white placeholder-gray-600 placeholder-opacity-20 font-medium"
                            type="tel" id="telefone" name="telefone" placeholder="Telefone" value="<?= $aluno['telefone'] ?>" required>
                    </div>

                    <!-- Campo para inserir a data de nascimento do aluno -->

                    <div class="flex flex-col">
                        <label class="text-white font-light text-start" for="dataNascimento">Data de Nascimento </label>
                        <input
                            class="border-solid border border-yellow-400 outline-none place-content-start px-2 py-1 rounded-md text-black bg-white placeholder-gray-600 placeholder-opacity-20 font-medium"
                            type="date" id="dataNascimento" name="dataNascimento" placeholder="Nascimento" value="<?= $aluno['data_nascimento'] ?>" required>
                    </div>

                    <button
                        class="bg-yellow-400 hover:bg-yellow-200 duration-300 m-8 px-4 py-1 rounded-md text-black font-semibold"
                        type="submit">Atualizar</button>
                </div>
            </form>
        </div>
    </main>

</body>

<footer class="flex justify-center text-black p-10 bg-yellow-400">
    <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
</footer>

</html>