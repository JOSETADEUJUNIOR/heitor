

function ValidarLogin(){

    if ($("#emailLogin").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Nome corretamente</h3>',
            showConfirmButton: true,
            

            
          })
        return false;
    
    }else if ($("#senhaLogin").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Senha corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    
    }else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }
}

function ValidarEmailCadastrado(email_digitado){

    if (email_digitado != "") {
        
    
    $.get("_email_duplicado_cad_ajax.php?email=" + email_digitado, function(retorno){
        if(retorno){
            $("#email").val('');
            Swal.fire({
            
                icon: 'warning',
                title: 'Opss..',
                width: 'auto',
                html: '<h3>O e-mail:' + email_digitado + ' Já existe !</h3>',
                showConfirmButton: false,
                timer: 2000,
              })
              
                return false;
              
        }
    })
}
}

function ValidarCadastro(){
 
    if ($("#CadNome").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Nome corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#email").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Email corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    
    }
    if ($("#CadSenha").val().trim()==""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Senha corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    }else if ($("#CadSenha").val().length < 6) {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Senha com no minimo 6 caracteres</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    
    }
    
    if ($("#CadResenha").val().trim()==""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Confirme Senha corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    }else if ($("#CadResenha").val() != ($("#CadSenha").val())) {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>O campo Confirmar senha precisa ser igual ao campo senha</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
        
    }else{
       
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }
}


function ValidarMeusDados(){

    if ($("#dadosNome").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Nome corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }else if ($("#dadosEmail").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo E-mail corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
        
    
    
    }
    else if ($("#dadosSenha").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Senha corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
       
    }else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }


}

function ValidarCategoria(){

    if ($("#nomeCategoria").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o Nome Corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }


}

function ValidarEmpresa(){

    if ($("#empNome").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Nome corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#empEnd").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Endereço corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    }
    if ($("#empTel").val().trim() == ""){

        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Telefone corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
            })
        return false;
    }
    if ($("#empEmail").val().trim() == ""){

            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                width: 'auto',
                html: '<h3>Preencha o campo E-mail corretamente</h3>',
                showConfirmButton: false,
                timer: 2000,
                
                })
            return false;
    }
    
    else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }
}

function ValidarMovimento(){

    if ($("#tipo").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo tipo corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#dtMovimento").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Data do Movimento corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    }
    if ($("#valor").val().trim() == ""){

        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Valor corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
            })
        return false;
    }
    if ($("#cat").val().trim() == ""){

            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                width: 'auto',
                html: '<h3>Preencha o campo Categoria corretamente</h3>',
                showConfirmButton: false,
                timer: 2000,
                
                })
            return false;
    }
    if ($("#emp").val().trim() == ""){

        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Empresa corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
            })
        return false;
    }
    if ($("#conta").val().trim() == ""){

        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Conta corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
            })
        return false;
    }
    
    else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }
}


function ValidarConsultaMov(){

    
    if ($("#dtInicial").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Data incial Corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    }    
    if ($("#dtFinal").val().trim() == ""){
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo Data final Corretamente</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    }    
    else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Realizando Busca!</h3>',
            showConfirmButton: false,
            timer: 9000,
          })
          return true;
    }
}







function ValidarConta(){

    if ($("#nomeBanco").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo nome do banco Corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#agencia").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo agencia corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#numConta").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo numero da conta corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }
    if ($("#saldo").val().trim() == "") {
       
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            width: 'auto',
            html: '<h3>Preencha o campo saldo corretamente!</h3>',
            showConfirmButton: false,
            timer: 2000,
            
          })
        return false;
    
    }else{
        Swal.fire({
            
            icon: 'success',
            title: 'Sucesso',
            width: 'auto',
            html: '<h3>Dados Salvos com sucesso!</h3>',
            showConfirmButton: false,
            timer: 2000,
          })
          return true;
    }


}




function SinalizaCampo(div,nome){
    console.log(nome);//dadosNome

    if ($("#"+nome).val().trim()== "") {
        $("#" + div).addClass("has-error");
           

    }else{
        $("#" + div).removeClass("has-error").addClass("has-success");
        
    }

}