## Como Executar

1. **Configurar variáveis de ambiente:**
   ```bash
   source .env
   ```

2. **Subir os serviços com Docker:**
   ```bash
   docker compose up --build -d
   ```
   *(Inclui banco de dados e phpMyAdmin para visualizar os dados).*

3. **Iniciar o servidor PHP:**
   ```bash
   php -S localhost:8000
   ```
