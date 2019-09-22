'use strict';
const assistant = require("./googleassistant");

assistant.assist('what time is it')
.then(({ text }) => {
  console.log(text); // Will log "It's 12:30"
});
