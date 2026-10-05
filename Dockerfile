FROM mysql:8.0

COPY banco/criar_bd.sql /docker-entrypoint-initdb.d/01-criacao.sql
COPY banco/preencher_bd.sql /docker-entrypoint-initdb.d/02-insercao.sql