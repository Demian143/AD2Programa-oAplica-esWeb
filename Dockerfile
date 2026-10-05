FROM mysql:8.0

COPY banco/criar_bd.sql /docker-entrypoint-initdb.d/01-criar_bd.sql
COPY banco/preencher_bd.sql /docker-entrypoint-initdb.d/02-preencher_bd.sql

EXPOSE 3306