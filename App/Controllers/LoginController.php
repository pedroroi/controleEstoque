<?php
// /App/Controllers/LoginController.php

require_once __DIR__ . '/../Models/Usuario.php';
require_once __DIR__ . '/../Models/Conexao.php';

class LoginController {
<<<<<<< HEAD
    private $conn; // Declarar a propriedade de conexão

    // Construtor para conectar ao banco
    public function __construct() {
        $conexao = new Conexao(); // Instancia a conexão
        $this->conn = $conexao->getConexao(); // Atribui à propriedade $conn
    }

   // Busca a senha hash do usuário
   $sql_busca_usuario = "SELECT * FROM Usuarios WHERE usuario = ?";
   $stmt = $conn->prepare($sql_busca_usuario);
   $stmt->bindParam(1, $usuario);
   $stmt->execute();

   $dados_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

   if ($dados_usuario) {
       // Verifica se a senha digitada corresponde ao hash armazenado
       if (password_verify($senha, $dados_usuario['senha'])) {
           $id_usuario = $dados_usuario['id'];
           session_start();
           $_SESSION['id_usuario'] = $id_usuario;
           header('Location: views/dashboard.php');
       } else {
           // Senha incorreta
           header('Location: index.php');
       }
   } else {
       // Usuário não encontrado
       header('Location: index.php');
   }
} catch (Exception $erro) {
   echo $erro->getMessage();
}

=======
    private $conn;

    public function __construct() {
        // Conecta ao banco de dados
        $this->conn = Conexao::getInstance();
    }

    public function autenticar() {
        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            
            $usuarioModel = new Usuario($this->conn);

            // Verifica se a autenticação foi bem-sucedida
            $dadosUsuario = $usuarioModel->autenticar($usuario, $senha);
            
            if ($dadosUsuario) {
                // Usuário autenticado com sucesso, inicia a sessão
                session_start();
                $_SESSION['id_usuario'] = $dadosUsuario['id']; // Supondo que o ID seja retornado
                $_SESSION['usuario'] = $dadosUsuario['usuario']; // Usuário autenticado
                
                // Redireciona para a dashboard
                header('Location: /projeto/App/Views/dashboard.php');
                exit();
            } else {
                echo 'Deu ruim, mano';
            }
        }
    }
}

// Criação de uma instância para chamar o método autenticar
$loginController = new LoginController();
$loginController->autenticar();

>>>>>>> e5ae8b96f558c0cb4a939304f2addbdf0960d0e3

?>
