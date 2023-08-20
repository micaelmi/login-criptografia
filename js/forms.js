document.addEventListener("DOMContentLoaded", function () {
  const cadastro = document.querySelector("#cadastro");
  const nome = document.querySelector("#nome");
  const email = document.querySelector("#email");
  const senha = document.querySelector("#senha");
  const cadastrar = document.querySelector("#cadastrar");
  const emailError = document.querySelector("#email-error");
  const senhaError = document.querySelector("#senha-error");

  const login = document.querySelector("#login");
  const loginEmail = document.querySelector("#login-email");
  const loginSenha = document.querySelector("#login-senha");
  const entrar = document.querySelector("#entrar");

  email.addEventListener("blur", function () {
    const emailValue = email.value;
    const isValid = validateEmail(emailValue);

    if (!isValid) {
      emailError.textContent = "Digite um endereço de e-mail válido.";
      emailError.style.display = "block";
      emailError.style.color = "red";
    } else {
      emailError.style.display = "none";
    }
  });

  function validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  }

  senha.addEventListener("blur", function () {
    const senhaValue = senha.value;
    const passwordStrength = validatePasswordStrength(senhaValue);

    if (passwordStrength === "fraca") {
      senhaError.textContent =
        "Senha fraca: pelo menos 8 caracteres e ambos números e letras.";
      senhaError.style.color = "red";
    } else if (passwordStrength === "razoável") {
      senhaError.textContent =
        "Senha razoável: pelo menos 8 caracteres com letras e números.";
      senhaError.style.color = "orange";
    } else if (passwordStrength === "forte") {
      senhaError.textContent =
        "Senha forte: maiúsculas, minúsculas ou mais de 10 caracteres.";
      senhaError.style.color = "green";
    } else {
      senhaError.textContent = "";
      senhaError.style.color = "initial";
    }
  });

  function validatePasswordStrength(password) {
    if (
      password.length < 8 ||
      !/\d/.test(password) ||
      !/[a-zA-Z]/.test(password)
    ) {
      return "fraca";
    } else if (
      password.length >= 8 &&
      /\d/.test(password) &&
      /[a-zA-Z]/.test(password)
    ) {
      return "razoável";
    } else if (
      (password.length >= 10 &&
        /[a-z]/.test(password) &&
        /[A-Z]/.test(password)) ||
      password.length > 10
    ) {
      return "forte";
    } else {
      return "desconhecida";
    }
  }

  nome.addEventListener('blur', function() {
    const nameValue = nome.value;
    const isValid = validateNameLength(nameValue);

    if (!isValid) {
      nameError.textContent = 'O nome deve ter pelo menos 5 caracteres.';
      nameError.style.color = 'red';
    } else {
      nameError.textContent = '';
      nameError.style.color = 'initial';
    }
  });

  function validateNameLength(name) {
    return name.length >= 5;
  }
});
