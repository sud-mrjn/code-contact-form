<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire de Contact</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-1.11.2.min"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/validator.min"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Formulaire de Contact</h1>
                    <div id="msgSubmit" class="h3 hidden"></div>
                    <form class="form" id="contactForm" action="process.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="text" data-error="Please enter nom field." placeholder="Nom" name="lname" id="nom" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" data-error="Please enter prenom field." placeholder="Prénom" name="fname" id="prenom" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="Email" name="email" id="email" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" data-error="Please enter texte field." name="message" placeholder="Texte" id="message" required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <p>
                                <input class="btn btn-success btn-lg" type="submit" value="Envoyer"/>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#contactForm").validator().on("submit", function (event) {
                event.preventDefault();
                submitForm();
        });

        function submitForm() {
            var FormData = $("#contactForm").serialize();

            $.ajax({
                type: "POST",
                url: "process.php",
                data: FormData,
                success: function (text) {
                    if (text == "success") {
                        $("#contactForm")[0].reset();
                        submitMSG(true, "Form Submitted Successfully!")
                    } else {
                        $("#contactForm").removeClass().one(function () {
                            $(this).removeClass();
                        });
                        submitMSG(false, text);
                    }
                }
            });
        }

        function submitMSG(valid, msg) {
            if (valid) {
                var msgClasses = "h3 text-success";
            } else {
                var msgClasses = "h3 text-danger";
            }
            $("#msgSubmit").removeClass().addClass(msgClasses).html(msg);
        }
    </script>
</body>
</html>