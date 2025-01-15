<?php
    require_once __DIR__ . '/../Models/Conexao.php';

    class LoginController {     
        private $conn;

        public function __construct() {
            $conexao = new Conexao();
            $this->conn = $conexao->getConexao();
        }

        //Método para autenticar um login
        public function autenticar($usuario) {
            try {
                
                // Busca a senha hash do usuário no banco de dados
                $sql_busca_usuario = "SELECT * FROM Usuarios WHERE usuario = :usuario";
                $stmt = $this->conn->prepare($sql_busca_usuario);
                $stmt->bindValue(':usuario', $usuario->getUsuario()); // Usa o nome do usuário, não o objeto
                $stmt->execute();
        
                $dados_usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
                if ($dados_usuario) {
                    $senha = $usuario->getSenha(); // Obtém a senha do objeto
                    // Verifica se a senha digitada corresponde ao hash armazenado
                    if (password_verify($senha, $dados_usuario['senha'])) {
                        $id_usuario = $dados_usuario['id'];
                        session_start();
                        $_SESSION['id_usuario'] = $id_usuario;
                        header('Location: ../Views/dashboard.php');
                        exit();
                    } else {
                        // Senha incorreta
                        header('Location: ../../index.php');
                        exit();
                    }
                } else {
                    // Usuário não encontrado
                    header('Location: ../../index.php');
                    exit();
                }
            } catch (Exception $erro) {
                echo $erro->getMessage();
            }
        }
    }        

?>
