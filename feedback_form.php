<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
</head>
<style>
    body
    {
        background-image: url(back4.jpg);
        background-repeat: no-repeat;
        background-size: 100%;
        
    }
    textarea{
        font-family: 'Times New Roman', Times, serif;
        width: 230px;
        height: 60px;
        font-size: 16.6px;
    }
    p{
        font-family: 'Times New Roman', Times, serif;
        font-size: 16.5px;
    }
    input, button{
        font-family: 'Times New Roman', Times, serif;
        font-size: 16.5px;
    }
</style>
<body>
    <form id='feedbackForm'  action="submit_feedback.php" method="post" onsubmit="return validateForm()">
        <fieldset>
        <p><b style="color: #993300;">Name: </b>
        <input type="text" name="iname" >
        </p>
        <p><b style="color: #993300;" >Email: </b>
        <input type="email" name="email" >
        </p>
        <p><b style="color: #993300;">Feedback: </b> <br>
        <textarea name="feedback" id="" ></textarea>
        </p>
        <p><b style="color: #993300;">Rating: </b>
        <input type="radio" name="rating" value="1" id="">Poor
        <input type="radio" name="rating" value="2" id="">Below Average
        <input type="radio" name="rating" value="3" id="" checked>Fair
        <input type="radio" name="rating" value="4" id=""> Very Good
        <input type="radio" name="rating" value="5" id="">Excellent
        </p>
        <p>
        <input type="submit" value="SUBMIT" />
        </p>
        
     </fieldset>
    </form>
    <form method="post" action="view_feedback.php">
    <p><button >RETRIEVE</button></p>
    </form>
</body>
<script>
    //Variables
    
    //Form Validation
    function validateForm()
    {
    var iname = document.forms['feedbackForm']['iname'].value;
    var email = document.forms['feedbackForm']['email'].value;
    var feedback = document.forms['feedbackForm']['feedback'].value;
    var atposition=email.indexOf("@"); 
    var dotposition=email.lastIndexOf("."); 
        if (iname == null || iname == "") {
            alert("Name can't be blank");
            return false;
        }
        else if (feedback == null || feedback == "") {
            alert("Feedback can't be blank");
            return false;
        }
        else if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length) {
            alert("Please enter a valid e-mail address");
            return false;
        }
        return true;
    }
</script>
</html>