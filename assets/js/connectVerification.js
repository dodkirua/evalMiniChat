import {validatePass, validate, comparePass} from "./function/security";


const pass = document.getElementById('pass');
const verify =  document.getElementById('passVerify');
const regis = document.getElementById("registration");

pass.addEventListener('keyup',validatePass);
verify.addEventListener('keyup',comparePass);

regis.addEventListener("submit",function (e){
    e.preventDefault();
    if(validate()){
        regis.submit();
    }
});