$(document).ready(function () {
    $("#submit").click(function () {
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        $("#returnmessage").empty(); // To empty previous error/success message.
// Checking for blank fields.
        if (name == '' || email == '' || message == '') {
            alert("Remplissez tous les champs s'il vous plaît");
        } else {
// Returns successful data submission message when the entered information is stored in database.
            $.post("../php/process.php", {
                name1: name,
                email1: email,
                message1: message
            }, function (data) {
                $("#returnmessage").append(data); // Append returned message to message paragraph.
                if (data == '<div class="alert alert-success" role="alert">Votre message a bien été envoyé, vous recevrez une réponse dans moins de 72 heures !</div>') {
                    $("#form")[0].reset(); // To reset form fields on success.
                }
            });
        }
    });
});