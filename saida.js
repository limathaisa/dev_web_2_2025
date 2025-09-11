// @ts-nocheck
let leitor = require('prompt-sync')();
let idade = leitor("Informe a idade");
console.log(typeof idade);
idade = parseInt(idade);
console.log("A idade é:" + idade);

//node saida.js
//npn init
// para instalar qualquer coisa no node npm I prompt- sync