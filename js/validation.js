var result = false
document.addEventListener('submit',(e) => {

    checkInputs();

    if(result === false){
        e.preventDefault();
    }
    else{
    }
    
    
    
    
});

function checkInputs(){

    const nameValue = document.getElementById("name").value.trim();
    const usernameValue = document.getElementById("username").value.trim();
    const emailValue = document.getElementById("email").value.trim();
    const pnumValue = document.getElementById("contactnum").value.trim();


    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var phoneformat = /^[0-9\b]+$/;
    

    if(nameValue===''){
        setErrorFor(document.getElementById("name"),'Full name cannot be blank');
        result = false
    }
    else if(document.getElementById("name").value.length>25){
        setErrorFor(document.getElementById("name"),'Full name letter too much');
        result = false
    }

    else{
        setSuccessFor(document.getElementById("name"));
        result = true
    }
    
    if(usernameValue===''){
        setErrorFor(document.getElementById("username"),'Username cannot be blank');
        result = false
    }
    else if(document.getElementById("username").value.length>25){
        setErrorFor(document.getElementById("username"),'Username letter too much');
        result = false
    }

    else{
        setSuccessFor(document.getElementById("username"));
        result = true
    }
        
    
    if(document.getElementById("email").value.match(mailformat)){

        setSuccessFor(document.getElementById("email"));
        result = true

    }
    
    else{
        if(emailValue === ''){
            setErrorFor(document.getElementById("email"),'email cannot be blank');
            result = false
        }
        else{
            setErrorFor(document.getElementById("email"),'Invalid format');
            result = false
        }
    }    
        
    if(pnumValue === ''){
        setErrorFor(document.getElementById("phonenumber"),'phone number cannot be blank');
        result = false
    }
    else if(document.getElementById("phonenumber").value.match(phoneformat)){
        setSuccessFor(document.getElementById("phonenumber"));
        result = true
    }
    else{

        setErrorFor(document.getElementById("phonenumber"),'phone number format invalid');
        result = false

        }

    
    
}