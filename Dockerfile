FROM ubuntu:latest
LABEL authors="povilas"

ENTRYPOINT ["top", "-b"]
