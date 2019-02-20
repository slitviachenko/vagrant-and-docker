# https://hub.docker.com/_/nginx/
FROM nginx:1.12

RUN apt-get update && \
    apt-get install -y \
        openssl

RUN mkdir /etc/nginx/ssl
# https://www.shellhacks.com/create-csr-openssl-without-prompt-non-interactive/
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/symfony3.local.net.key -out /etc/nginx/ssl/symfony3.local.net.crt -subj "/C=UA/ST=Kyiv/L=Kyiv/O=Magento/OU=IT Department/CN=symfony3.local.net/emailAddress=sergey.litvyachenko@gmail.com"
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/magento-2-2-ce.local.net.key -out /etc/nginx/ssl/magento-2-2-ce.local.net.crt -subj "/C=UA/ST=Kyiv/L=Kyiv/O=Magento/OU=IT Department/CN=magento-2-2-ce.local.net/emailAddress=sergey.litvyachenko@gmail.com"
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/marketplace.magento.local.key -out /etc/nginx/ssl/marketplace.magento.local.crt -subj "/C=UA/ST=Kyiv/L=Kyiv/O=Magento/OU=IT Department/CN=marketplace.magento.local/emailAddress=sergey.litvyachenko@gmail.com"
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/api.marketplace.local.key -out /etc/nginx/ssl/api.marketplace.local.crt -subj "/C=UA/ST=Kyiv/L=Kyiv/O=Magento/OU=IT Department/CN=api.marketplace.local/emailAddress=sergey.litvyachenko@gmail.com"
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/devportal.marketplace.local.key -out /etc/nginx/ssl/devportal.marketplace.local.crt -subj "/C=UA/ST=Kyiv/L=Kyiv/O=Magento/OU=IT Department/CN=devportal.marketplace.local/emailAddress=sergey.litvyachenko@gmail.com"
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/settlement.marketplace.local.key -out /etc/nginx/ssl/settlement.marketplace.local.crt -subj "/C=UA/ST=Kyiv/L=Kyiv/O=Magento/OU=IT Department/CN=settlement.marketplace.local/emailAddress=sergey.litvyachenko@gmail.com"
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/pr.marketplace.local.key -out /etc/nginx/ssl/pr.marketplace.local.crt -subj "/C=UA/ST=Kyiv/L=Kyiv/O=Magento/OU=IT Department/CN=pr.marketplace.local/emailAddress=sergey.litvyachenko@gmail.com"

RUN rm -rdf /etc/nginx/sites-available/
RUN rm -rdf /etc/nginx/sites-enabled/
RUN rm -rdf /etc/nginx/conf.d/
RUN mkdir /etc/nginx/sites-available/
RUN mkdir /etc/nginx/sites-enabled/
RUN mkdir /etc/nginx/conf.d/

COPY conf/nginx.conf /etc/nginx/nginx.conf
COPY conf/upstream.conf /etc/nginx/conf.d/upstream.conf
COPY conf/sites-available/default.conf /etc/nginx/sites-available/default.conf
COPY conf/sites-available/symfony3.local.net.conf /etc/nginx/sites-available/symfony3.local.net.conf
COPY conf/sites-available/magento-2-2-ce.local.net.conf /etc/nginx/sites-available/magento-2-2-ce.local.net.conf
COPY conf/sites-available/marketplace.magento.local.conf /etc/nginx/sites-available/marketplace.magento.local.conf
COPY conf/sites-available/api.marketplace.local.conf /etc/nginx/sites-available/api.marketplace.local.conf
COPY conf/sites-available/devportal.marketplace.local.conf /etc/nginx/sites-available/devportal.marketplace.local.conf
COPY conf/sites-available/settlement.marketplace.local.conf /etc/nginx/sites-available/settlement.marketplace.local.conf
COPY conf/sites-available/pr.marketplace.local.conf /etc/nginx/sites-available/pr.marketplace.local.conf

RUN ln -s /etc/nginx/sites-available/default.conf /etc/nginx/sites-enabled/01-default.conf
RUN ln -s /etc/nginx/sites-available/symfony3.local.net.conf /etc/nginx/sites-enabled/symfony3.local.net
RUN ln -s /etc/nginx/sites-available/magento-2-2-ce.local.net.conf /etc/nginx/sites-enabled/magento-2-2-ce.local.net
RUN ln -s /etc/nginx/sites-available/marketplace.magento.local.conf /etc/nginx/sites-enabled/marketplace.magento.local
RUN ln -s /etc/nginx/sites-available/api.marketplace.local.conf /etc/nginx/sites-enabled/api.marketplace.local
RUN ln -s /etc/nginx/sites-available/devportal.marketplace.local.conf /etc/nginx/sites-enabled/devportal.marketplace.local
RUN ln -s /etc/nginx/sites-available/settlement.marketplace.local.conf /etc/nginx/sites-enabled/settlement.marketplace.local
RUN ln -s /etc/nginx/sites-available/pr.marketplace.local.conf /etc/nginx/sites-enabled/pr.marketplace.local
