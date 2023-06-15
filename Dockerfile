FROM centos:7.9.2009

RUN mkdir "/svc"
WORKDIR "/svc"

ENV LANG en_US.UTF-8
COPY svc /svc/

RUN chmod +x /svc/wordscheck
ENTRYPOINT ["./wordscheck"]
