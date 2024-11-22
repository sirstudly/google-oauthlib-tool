# Google Assistant RPC Tool

Registers a new "device" with Google Assistant privileges.
Once setup, allows a nodeJS script to be run to execute commands against Google Assistant.

See https://github.com/googlesamples/assistant-sdk-nodejs


# install nvm/nodejs for googleassist 
# https://linuxize.com/post/how-to-install-node-js-on-centos-7/
curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.11/install.sh | bash
nvm install --lts
sudo yum install gcc-c++ make
cd google-assistant-gprc
npm install
node timecheck.js
