<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $dataNascimento = $_POST['dataNascimento'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    
    // Prepara a instrução SQL para inserir um novo aluno no banco de dados
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, matricula, data_nascimento, email, telefone) VALUES (?, ?, ?, ?, ?)");
    
    // Executa a instrução SQL com os dados do formulário
    $stmt->execute([$nome, $matricula, $dataNascimento, $email, $telefone]);
    
    // Redireciona para a página de listagem de alunos após a inserção
    header('Location: index-aluno.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
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
        <div class="justify-center flex h-screen items-center">
            <div class="rounded-3xl w-96 border-solid border border-yellow-400">
                <div class="justify-center flex">
                    <svg class="mt-14" height="71" width="71" fill="none" viewBox="0 0 71 71"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clipPath="url(#clip0_355_14)">
                            <path
                                d="M31.239 35.987C41.2367 35.9864 44.8339 25.9761 45.7756 17.7534C46.9356 7.6238 42.1454 0 31.239 0C20.334 0 15.5414 7.62322 16.7024 17.7534C17.645 25.9761 21.2411 35.9877 31.239 35.987Z"
                                fill="#FACC19" />
                            <path
                                d="M53.0999 40.1541C53.4216 40.1541 53.7412 40.1637 54.0586 40.1814C53.5828 39.5027 53.0321 38.9041 52.3877 38.4228C50.4666 36.989 47.9786 36.5186 45.7791 35.6543C44.7084 35.2337 43.7497 34.816 42.8496 34.3403C39.812 37.6716 35.8507 39.4143 31.2378 39.4147C26.6264 39.4147 22.6655 37.6721 19.6281 34.3403C18.7281 34.8161 17.7691 35.2337 16.6987 35.6543C14.4992 36.5187 12.0113 36.989 10.0901 38.4228C6.76773 40.9026 5.90911 46.4811 5.2345 50.2863C4.67775 53.4275 4.30373 56.6331 4.19456 59.8236C4.10998 62.2951 5.33021 62.6416 7.39779 63.3877C9.98663 64.3214 12.6597 65.0145 15.3507 65.5828C20.5478 66.6802 25.9048 67.5235 31.2387 67.5613C33.8232 67.5428 36.413 67.3343 38.9875 67.0006C37.0812 64.2386 35.9632 60.8931 35.9632 57.2908C35.9633 47.8415 43.6507 40.1541 53.0999 40.1541Z"
                                fill="#FACC19" />
                            <path
                                d="M53.1 43.5811C45.5288 43.5811 39.3906 49.7192 39.3906 57.2904C39.3906 64.8617 45.5286 70.9998 53.1 70.9998C60.6714 70.9998 66.8095 64.8617 66.8095 57.2904C66.8094 49.7191 60.6712 43.5811 53.1 43.5811ZM59.0979 59.6425H55.4522V63.2881C55.4522 64.5872 54.3991 65.6404 53.1001 65.6404C51.801 65.6404 50.7478 64.5872 50.7478 63.2881V59.6425H47.1022C45.8031 59.6425 44.75 58.5894 44.75 57.2902C44.75 55.9911 45.803 54.9379 47.1022 54.9379H50.7478V51.2923C50.7478 49.9932 51.801 48.94 53.1001 48.94C54.3992 48.94 55.4522 49.9932 55.4522 51.2923V54.9379H59.0979C60.397 54.9379 61.4502 55.9911 61.4502 57.2902C61.45 58.5896 60.3971 59.6425 59.0979 59.6425Z"
                                fill="#FACC19" />
                        </g>
                        <defs>
                            <clipPath id="clip0_355_14">
                                <rect height="71" width="71" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <h2 class="text-center text-yellow-400 my-6 font-medium">Cadastrar novo aluno</h2>

                <!-- Formulário para adicionar um novo aluno -->
                <form method="POST">
                    <div class="flex flex-col items-center gap-2">

                        <!-- Campo para inserir o nome do aluno -->
                        <div class="flex flex-col">
                            <label class="text-white font-light text-start" for="nome">
                                Aluno</label>
                            <input
                                class="border-solid border border-yellow-400 outline-none place-content-start px-2 py-1 rounded-md text-black bg-white placeholder-gray-600 placeholder-opacity-20 font-medium"
                                type="text" id="nome" name="nome" placeholder="Nome" required>
                        </div>

                        <!-- Campo para inserir a matrícula do aluno -->
                        <div class="flex flex-col">
                            <label class="text-white font-light text-start" for="matricula">Matrícula</label>
                            <input
                                class="border-solid border border-yellow-400 outline-none place-content-start px-2 py-1 rounded-md text-black bg-white placeholder-gray-600 placeholder-opacity-20 font-medium"
                                type="text" id="matricula" name="matricula" placeholder="Matrícula" required>
                        </div>

                        <!-- Campo para inserir o e-mail do aluno -->
                        <div class="flex flex-col">

                            <label class="text-white font-light text-start" for="email">Email</label>
                            <input
                                class="border-solid border border-yellow-400 outline-none place-content-start px-2 py-1 rounded-md text-black bg-white placeholder-gray-600 placeholder-opacity-20 font-medium"
                                type="email" id="email" name="email" placeholder="Email" required>
                        </div>

                        <!-- Campo para inseriro celular do aluno -->
                        <div class="flex flex-col">

                            <label class="text-white font-light text-start" for="telefone">Telefone</label>
                            <input
                                class="border-solid border border-yellow-400 outline-none place-content-start px-2 py-1 rounded-md text-black bg-white placeholder-gray-600 placeholder-opacity-20 font-medium"
                                type="tel" id="telefone" name="telefone" placeholder="Telefone" required>
                        </div>

                        <!-- Campo para inserir a data de nascimento do aluno -->
                        
                        <div class="flex flex-col">
                            <label class="text-white font-light text-start" for="dataNascimento">Data de Nascimento   </label>
                            <input
                                class="border-solid border border-yellow-400 outline-none place-content-start px-2 py-1 rounded-md text-black bg-white placeholder-gray-600 placeholder-opacity-20 font-medium"
                                type="date" id="dataNascimento" name="dataNascimento" placeholder="Nascimento" required>
                        </div>

                        <button
                            class="bg-yellow-400 hover:bg-yellow-200 duration-300 m-8 px-4 py-1 rounded-md text-black font-semibold"
                            type="submit">Adicionar</button>

                    </div>
                </form>
            </div>
        </div>

    </main>

    <footer class="flex justify-center text-black p-10 bg-yellow-400">
        <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
    </footer>
</body>

</html>

