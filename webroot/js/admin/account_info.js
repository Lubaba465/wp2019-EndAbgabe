$(document).ready(function () {
    $("button.accountSection").click(function () {
        var sectionId = $(this).attr("id");
        var siteId = "admin/";
        switch (sectionId) {
            case "passwordUpd":
                siteId = "admin/views/account/password_update.php";
                break;
            case "accountDeact":
                siteId = "admin/views/account/account_deactivate.php";
                break;
            case "personDataUpd":
            default:
                siteId = "admin/views/account/personal_data.php";
                break;
        }
        $("#adminSection").load(siteId);
    });

    $("#deactAccount").click(function () {
        // var id = $(this).parents("tr").attr("id");
        var accountDeac = !!document.getElementById("accountDeac").checked;
        var pw = document.getElementById("pw").value;

        if (accountDeac) {
            if (pw !== "") {
                if (confirm('Sind Sie sicher?')) {
                    $.ajax({
                        url: 'admin/views/account/account_controller.php',
                        type: 'GET',
                        data: {pw: pw},
                        error: function () {
                            alert('es ist ein Fehler aufgetreten!');
                        },
                        success: function (data) {
                            // $("#"+id).remove();
                            // alert("das Konto wurde erfolgreich deaktiviert!"+data);
                            alert(data);

                            if (data === 'Ihr Konto wurde deaktiviert!') {
                                window.location = 'database.php';
                            }
                        }
                    });
                }
            } else {
                alert('Bitte geben Sie ihr Passwort ein!');
            }
        } else {
            alert('Bitte bestätigen Sie die Deaktivierung')
        }
    });


    $("#pwUpdate").click(function (e) {
        e.preventDefault();
        // var id = $(this).parents("tr").attr("id");
        var oldPW = document.getElementById("oldPW").value,
            newPW = document.getElementById("newPW").value,
            newPWRepeat = document.getElementById("newPWRepeat").value,
            flag = true;

        if (oldPW === "" || newPW === "", newPWRepeat === "") {
            flag = false;
        }

        if (flag) {
            if (newPW === newPWRepeat) {
                if (confirm('Sind Sie sicher?')) {
                    $.ajax({
                        url: 'admin/views/account/account_controller.php',
                        type: 'GET',
                        // data: {oldPW: oldPW, newPW: newPW},
                        data: {test: oldPW},
                        error: function () {
                            alert('es ist ein Fehler aufgetreten!');
                        },
                        success: function (data) {
                            alert(data);
                        }
                    });
                }
            } else {
                alert('Das Passwort Wiederholung stimmt nicht!');
            }
        }
        else {
            alert('Bitte übeprufen Sie die Eingaben!');
        }
    });

    $("#accountUpd").click(function () {
        // var id = $(this).parents("tr").attr("id");
        var pwAccUpd = document.getElementById("pwAccUpd").value;
        var fname = document.getElementById("fname").value;
        var lname = document.getElementById("lname").value;
        var email = document.getElementById("email").value;

        if (confirm('Sind Sie sicher?')) {
            $.ajax({
                url: 'admin/views/account/account_controller.php',
                type: 'POST',
                data: {pw: pw, fname: fname, lname: lname, email: email},
                error: function () {
                    alert('es ist ein Fehler aufgetreten!');
                },
                success: function (data) {
                    alert(data);
                }
            });
        }
    });
});

function pwShow() {
    var accountDeac = document.getElementById("accountDeac");
    var pwConfirm = document.getElementById("pwConfirm");
    pwConfirm.style.display = accountDeac.checked ? "block" : "none";
}