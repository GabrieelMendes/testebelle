console.log("Script carregado com sucesso!");

function alternarForm(formulario) {
    console.log("Alternando para o formulário: " + formulario);
    if (formulario === 'cadastro') {
        document.getElementById('cadastroForm').style.display = 'flex';
        document.getElementById('loginForm').style.display = 'none';
    } else {
        document.getElementById('cadastroForm').style.display = 'none';
        document.getElementById('loginForm').style.display = 'flex';
    }
}



    function validarCadastro() {
        var nome = document.getElementById('nome');
        var email = document.getElementById('email');
        var senha = document.getElementById('senha');
        var confirmarSenha = document.getElementById('confirmarSenha');
        var erroNome = document.getElementById('erroNome');
        var erroEmail = document.getElementById('erroEmail');
        var erroSenha = document.getElementById('erroSenha');

        // Verificação do campo de nome
        if (nome.value.trim() === '') {
            erroNome.innerHTML = 'Por favor, insira seu nome';
            return false; // Impede o envio do formulário se o nome estiver em branco
        }else{
            erroNome.innerHTML = '';
        }

        // Verificação de e-mail
        if (email.value.trim() === '') {
            erroEmail.innerHTML = 'Por favor, insira seu e-mail';
            return false; // Impede o envio do formulário se o e-mail estiver em branco
        }
        
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
            erroEmail.innerHTML = 'Por favor, insira um e-mail válido';
            return false; // Impede o envio do formulário se o e-mail não for válido
        } 
        else{
            erroEmail.innerHTML = '';
        }
        // Verificação do comprimento mínimo da senha
        if (senha.value.length < 8) {
            erroSenha.innerHTML = 'A senha deve ter pelo menos 8 caracteres';
            return false; // Impede o envio do formulário se a senha for muito curta
        }

        // Verificação de coincidência de senha
        if (senha.value !== confirmarSenha.value) {
            erroSenha.innerHTML = 'As senhas não coincidem';
            return false; // Impede o envio do formulário se as senhas não coincidirem
        }
else{
        erroSenha.innerHTML = '';
}
        return true; // Permite o envio do formulário se todas as verificações passarem
    }




function validarLogin() {
    console.log("Validando login...");
    // Adicione suas validações de login aqui
    return true;
}