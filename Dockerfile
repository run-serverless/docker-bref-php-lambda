FROM bref/php-84:2

COPY ./app /var/task

CMD ["index.php"]