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
        $query = "SELECT * FROM submissoes WHERE usuario_id={$usuario_id} AND modelo_id={$modelo_id} AND desafio_id={$desafio_id}";
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
        $query = "UPDATE desafios SET status={$status} WHERE id={$desafio_id}";
        mysqli_query($this->con, $query);
    }
    
    public function save_submissao(
        int $usuario_id,
        int $desafio_id,
        int $modelo_id,
        string $prompt,
        string $resposta,
        float $nota
    ) {
        // Checar se data de submissão é maior que a data_limite
        $query_data_limite = "SELECT data_limite FROM desafios WHERE id={$desafio_id}";
        $resp = mysqli_query($this->con, $query_data_limite);
        $data_limite = new DateTime($resp);
        $today = new DateTime();

        if ($today > $data_limite) {
            throw new Exception("Submissão após data limite.");
        }

        $query_salvar_requisicao = "INSERT INTO submissoes (usuario_id, desafio_id, modelo_id, prompt, resposta, nota) VALUES ({$usuario_id}, {$desafio_id}, {$modelo_id}, {$prompt}, {$resposta}, {$nota})";
        mysqli_query($this->con, $query_salvar_requisicao);
    }
}