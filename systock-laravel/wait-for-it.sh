#!/bin/bash
set -e

host="$1"
shift
cmd="$@"

# Aguarda até que a conexão com o host e a porta seja possível
until nc -z "$host" 3306; do
  echo "Aguardando o banco de dados MySQL em $host:3306..."
  sleep 1
done

echo "Banco de dados MySQL disponível. Executando o comando..."
exec $cmd
