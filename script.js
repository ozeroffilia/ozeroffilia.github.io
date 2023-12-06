function submitForm() {
    // Добавьте вашу логику для отправки формы, например, AJAX-запрос

    // После успешного ответа от сервера
    // Покажем popup сообщение
    openSuccessMessage();
}

function openSuccessMessage() {
    var successPopup = document.getElementById("successPopup");
    successPopup.style.display = "block";
}

function closeSuccessMessage() {
    var successPopup = document.getElementById("successPopup");
    successPopup.style.display = "none";
}


function validateForm() {
    var firstName = document.getElementById("first_name").value;
    var lastName = document.getElementById("last_name").value;
    var phoneNumber = document.getElementById("phone_number").value;
    var email = document.getElementById("email").value;
    var deviceType = document.getElementById("device_type").value;
    var problemDescription = document.getElementById("problem_description").value;

    if (firstName === "" || lastName === "" || phoneNumber === "" || email === "" || deviceType === "" || problemDescription === "") {
    alert("Пожалуйста, заполните все обязательные поля.");
    return false;
    }
showSuccessMessage();
return true;
}