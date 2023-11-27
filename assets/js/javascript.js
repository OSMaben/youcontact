document.querySelector('.delete').addEventListener('click', () => {
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: true,
        timer: 3000
      });
})

function printf(element, message) {
  document.querySelector(element).textContent = message;
}

let nameF = document.querySelector("#name");
let email = document.querySelector("#email");
let phone = document.querySelector("#phone");
let password = document.querySelector("#password");
let confPass = document.querySelector("#confpass");
let register = document.querySelector("#register");

mailInfo = fName =  phone = onePass = twopass = false;

register.addEventListener('click', (e) => {
  e.preventDefault();

  if(nameF.value === '' && !nameF.value.match(/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u)) {
    printf('.nameErr', "Invalide Info");
    nameF.style.border = "red 2px solid";
    fName = false;
  }

  else{
    printf('.nameErr', "");
    nameF.style.border = "green 2px solid"
    fName = true;
  }

  if (email.value === '' && !email.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
    printf('.emailErr', "Invalide Info");
    email.style.border = "red 2px solid";
    mailInfo = false;
  }
  else {
    printf('.emailErr', "");
    email.style.border = "green 2px solid"
    mailInfo = true;
  }

  if (phone.value === '' && !phone.value.match(/(\+212|0)([ \-_/]*)(\d[ \-_/]*){9}/)) {
    printf('.phoneErr', "Invalide Info");
    phone.style.border = "red 2px solid";
    phone = false;
  }
  else {
    printf('.phoneErr', "");
    phone.style.border = "green 2px solid"
    phone = true;
  }

  if (password.value === '' && !password.value.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&^])[A-Za-z\d@.#$!%*?&]{8,15}$/)) {
    printf('.passwordErr', "Invalide Info");
    password.style.border = "red 2px solid";
    onePass = false;
  }
  else {
    printf('.passwordErr', "");
    password.style.border = "green 2px solid"
    onePass = true;
  }
  if (confPass.value === '' && !confPass.value.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&^])[A-Za-z\d@.#$!%*?&]{8,15}$/)) {
    printf('.confErr', "Invalide Info");
    confPass.style.border = "red 2px solid";
    twopass = false;
  }
  else {
    printf('.confErr', "");
    confPass.style.border = "green 2px solid"
    twopass = true;
  }
});