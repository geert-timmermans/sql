<?php
include 'connect.php';

if(isset($_POST['submit'])) {
    try {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $birthDate = $_POST['birthDate'];
        $card = $_POST['card'];
        $cardNumber = $_POST['cardNumber'];

        if($card == 'on') {
            $card = '1';
        }
        else {
            $card = '0';
            $cardNumber = NULL;
        }

        $sqlInsert = "insert into clients (lastName, firstName, birthDate, card, cardNumber) values (:lastName, :firstName, :birthDate, :loyalCard, :cardNr)";
        $stmt = $pdo->prepare($sqlInsert);

        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':birthDate', $birthDate);
        $stmt->bindParam(':loyalCard', $card);
        $stmt->bindParam(':cardNr', $cardNumber);

        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<a href="index.html" class="btn btn-danger my-3 col-2 offset-5">Back</a>
<div class="container mt-5 d-flex justify-content-center">
    <form action="" method="post">
        <div class="d-flex">
            <div class="form-group col-6">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="ex: Jan">
            </div>
            <div class="form-group ml-5 col-6">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="ex: Janssen">
            </div>
        </div>
        <div class="form-group col-6">
            <label for="birthDate">Date of Birth</label>
            <input type="date" class="form-control" name="birthDate" id="birthDate">
        </div>
        <div class="d-flex">
            <div class="d-flex flex-column">
                <h6>Loyalty Card</h6>
                <div class="form-group form-check col-2 ml-3">
                    <input type="checkbox" class="form-check-input" name="card" id="checkboxCard">
                    <label class="form-check-label" for="checkboxCard">Yes</label>
                </div>
                <div class="form-group form-check col-2 ml-3">
                    <input type="checkbox" class="form-check-input" name="card2" id="checkboxCard2">
                    <label class="form-check-label" for="checkboxCard2">No</label>
                </div>
            </div>
            <div class="form-group ml-5">
                <label for="cardNr">Card number</label>
                <input type="number" class="form-control" name="cardNr" id="cardNr" placeholder="ex: 2222">
            </div>
        </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript">
    $("#checkboxCard").change(function(){
        var state = this.checked;
        if(state){
            $("#cardNr").prop("disabled", false);
        } else {
            $("#cardNr").prop("disabled", true);
        }
    });
</script>

</body>
</html>