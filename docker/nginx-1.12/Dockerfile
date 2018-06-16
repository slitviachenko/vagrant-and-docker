# https://hub.docker.com/_/nginx/
FROM nginx:1.12

RUN apt-get update && \
    apt-get install -y \
        openssl

RUN mkdir /etc/nginx/ssl
# https://www.shellhacks.com/create-csr-openssl-without-prompt-non-interactive/
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/symfony3.local.net.key -out /etc/nginx/ssl/symfony3.local.net.crt -subj "/C=UA/ST=Kyiv/L=Kyiv/O=Magento/OU=IT Department/CN=symfony3.local.net/emailAddress=sergey.litvyachenko@gmail.com"
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/magento-2-2-ce.local.net.key -out /etc/nginx/ssl/magento-2-2-ce.local.net.crt -subj "/C=UA/ST=Kyiv/L=Kyiv/O=Magento/OU=IT Department/CN=magento-2-2-ce.local.net/emailAddress=sergey.litvyachenko@gmail.com"

RUN rm -rdf /etc/nginx/sites-available/
RUN rm -rdf /etc/nginx/sites-enabled/
RUN rm -rdf /etc/nginx/conf.d/
RUN mkdir /etc/nginx/sites-available/
RUN mkdir /etc/nginx/sites-enabled/
RUN mkdir /etc/nginx/conf.d/

COPY conf/nginx.conf /etc/nginx/nginx.conf
COPY conf/upstream.conf /etc/nginx/conf.d/upstream.conf
COPY conf/sites-available/default.conf /etc/nginx/sites-available/default.conf
COPY conf/sites-available/magento-2-2-ce.local.net.conf /etc/nginx/sites-available/magento-2-2-ce.local.net.conf
COPY conf/sites-available/symfony3.local.net.conf /etc/nginx/sites-available/symfony3.local.net.conf

RUN ln -s /etc/nginx/sites-available/default.conf /etc/nginx/sites-enabled/default.conf
RUN ln -s /etc/nginx/sites-available/magento-2-2-ce.local.net.conf /etc/nginx/sites-enabled/magento-2-2-ce.local.net
RUN ln -s /etc/nginx/sites-available/symfony3.local.net.conf /etc/nginx/sites-enabled/symfony3.local.net
