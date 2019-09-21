FROM python:3

# OAuth 2.0 credentials must be created first
COPY credentials.json /

RUN python3 -m venv env
RUN env/bin/python -m pip install --upgrade pip setuptools wheel
RUN env/bin/pip install --upgrade "google-auth-oauthlib[tool]"

# manually run this, follow the link and enter the auth code
# save the generated file to google-assistant-grpc/devicecredentials.json
#RUN env/bin/google-oauthlib-tool --client-secrets credentials.json --scope https://www.googleapis.com/auth/assistant-sdk-prototype --save --headless

#RUN cat devicecredentials.json

# keep the container running
CMD tail -f /dev/null
