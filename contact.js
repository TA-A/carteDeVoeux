        var formValid = document.getElementById("bouton_envoi");

        var nom = document.getElementById("nom");
        var missNom = document.getElementById("missNom");
        var nomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;

        var email = document.getElementById("email");
        var missEmail = document.getElementById("missMail");
        var emailValid = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        
        var message = document.getElementById("message");
        var missMess = document.getElementById("missMess");

console.log("click",validation)
        formValid.addEventListener("click",validation);

        function validation(event){
            //si le champ est vide
            if (nom.validity.valueMissing){
                event.preventDefault();
                missNom.textContent = "Nom manquant";
                missNom.style.color = "red";
            //Si le format de données est incorrect
            }
            else if (nomValid.test(nom.value) == false){
                    event.preventDefault();
                    missNom.textContent = 'Format incorrect';
                    missNom.style.color = 'orange';
                }else{
            }

            if (nom.validity.valueMissing){
                event.preventDefault();
                missMail.textContent = "Email manquant";
                missMail.style.color = "red";
                //Si le format de données est incorrect
            }else if (emailValid.test(email.value) == false){
                    event.preventDefault();
                    missMail.textContent = 'Format incorrect';
                    missMail.style.color = 'orange';
                }else{
            }

            if (nom.validity.valueMissing){
                event.preventDefault();
                missMess.textContent = "Message manquant";
                missMess.style.color = "red";
            }
        }