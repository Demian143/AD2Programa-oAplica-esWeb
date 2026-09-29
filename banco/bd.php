<?php

class Bd {
    private $con = null;
    public function __construct(
        private string $host,
        private string $database,
        private string $user,
        private string $password
    ) {}

    public function connect() {
        $this->con = mysqli_connect(
            $this->host, 
            $this->user, 
            $this->password, 
            $this->database
            );
    }

    public function ai_model_already_exists(int $usuario_id, int $modelo_id, int $desafio_id): bool | null {
        // Decidi usar o null ao invés de retornar erro por conveniencia
        if (!$this->con) {
            return null;
        }
        $query = "SELECT * FROM submissoes WHERE usuario_id={$usuario_id} AND modelo_id={$modelo_id} AND desafio_id={$desafio_id};";
        $resp = mysqli_query($this->con, $query);
        if (count($resp) > 0) {
            // Se o usuario já tem um modelo enviado a resposta é negativa
            return false;
        }
        return true;
    }

    public function change_desafio_status(
        int $desafio_id, 
        string $status
    ) {
        if ($status == "aberto") {
            $query = "UPDATE desafios SET status={$status} WHERE id={$desafio_id}";
            mysqli_query($this->con, $query);
            return;
        }

        // RN06
        $query_correcao_de_notas = "UPDATE usuarios as usuario
                                    
                                    INNER JOIN ( 
                                        SELECT usuario_id, MAX(nota) AS max_nota
                                        FROM submissoes 
                                        WHERE desafio_id={$desafio_id}
                                        GROUP BY usuario_id
                                    ) as submissao ON usuario.id=submissao.usuario_id
                                    
                                    INNER JOIN desafios as desafio ON desafio.id={$desafio_id}
                                    
                                    SET usuario.pontos = 
                                        CASE 
                                            WHEN max_nota >= 90 THEN 10
                                            WHEN max_nota >= 70 AND max_nota < 90 THEN 5
                                            ELSE 0
                                        END
                                    WHERE usuario.id=submissao.usuario_id;";
        
    }
    
    public function save_submissao(
        int $usuario_id,
        int $desafio_id,
        int $modelo_id,
        string $prompt,
        string $resposta,
        float $nota
    ) {
        // RN01
        // Um usuário não pode realizar mais de uma submissão utilizando o mesmo
        // modelo de Inteligência Artificial em um mesmo desafio.
        $query_submissao_duplicada = "SELECT * FROM submissoes WHERE usuario_id={$usuario_id} AND desafio_id={$desafio_id} AND modelo_id={$modelo_id}";
        $resp_submissao_duplicada = mysqli_query($this->con, $query_submissao_duplicada)->fetch_array();

        if (count($resp_submissao_duplicada) > 0) {
            throw new Exception("Submissão duplicada");
        }

        $query_data_limite = "SELECT data_limite, status FROM desafios WHERE id={$desafio_id}";
        $resp = mysqli_query($this->con, $query_data_limite)->fetch_assoc();
        // RN02
        if ($resp["status"] == "finalizado") {
            throw new Exception("Desafio já finalizado");
        }
        // RN03
        $data_limite = new DateTime($resp["data_limite"]);
        $today = new DateTime();

        if ($today > $data_limite) {
            throw new Exception("Submissão após data limite.");
        }
        // RN04
        $query_modelo_ativo = "SELECT status FROM modelos WHERE id={$modelo_id}";
        $modelo = mysqli_query($this->con, $query_modelo_ativo)->fetch_assoc();
        if ($modelo["status"] == "inativo") {
            throw new Exception("Modelo inativo.");
        }
        // RN05
        if ( 0 > $nota > 100) {
            throw new Exception("Nota invalida.");
        }
        
        $query_salvar_requisicao = "INSERT INTO submissoes (usuario_id, desafio_id, modelo_id, prompt, resposta, nota) VALUES ({$usuario_id}, {$desafio_id}, {$modelo_id}, {$prompt}, {$resposta}, {$nota})";
        mysqli_query($this->con, $query_salvar_requisicao);
    }
}