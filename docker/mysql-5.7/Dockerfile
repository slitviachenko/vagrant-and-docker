FROM mysql:5.7

COPY conf/my-mysql.cnf /etc/mysql/conf.d/my-mysql.cnf
COPY db/tables.sql /docker-entrypoint-initdb.d/tables.sql
