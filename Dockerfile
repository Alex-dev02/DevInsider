FROM alexionut02/alpinegcc:1.0
RUN rm -rf /var/cache/apk/*
RUN adduser -D testt
USER testt
