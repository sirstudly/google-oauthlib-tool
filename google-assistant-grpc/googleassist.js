'use strict';
const assistant = require("./googleassistant");

if(process.argv.length > 2) {
	assistant.assist(process.argv[2])
		.then(({ text }) => {
		  console.log(text);
		});
}
else {
	console.log("No parameter specified.");
}
