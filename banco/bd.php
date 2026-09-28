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
}