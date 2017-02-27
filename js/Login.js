function handle(e)
{
    if(e.keyCode === 13)
    {
        e.preventDefault(); // Ensure it is only this code that runs
        setName();
    }
}

function setName(inName)
{
    $('#loadingGif').show();
    $.when(checkNameAvailability(inName)).done(function(response)
    {
        console.log(response);
        // the code here will be executed when all four ajax requests resolve.
        // outObj is a list of length 3 containing the response text,
        // status, and jqXHR object for each of the four ajax calls respectively.
        if(response === "")
        {
            console.log("Name Available");
            //Add name to DB then go to lobby
            addName(inName);
        }
        else
        {
            $('#loadingGif').hide();
            $('#nameBox').addClass('parsley-error').removeClass('parsley-success');
            $('#meinError2').text("Name Already In Use Sorry. Pick Another One");
            $('#nameBox').focus();
            //var specificField = $('#nameBox').parsley();
            //window.ParsleyUI.removeError(specificField, "custom");
            //window.ParsleyUI.addError(specificField, "custom", 'Name Already In Use Sorry. Pick Another One');
            //window.ParsleyUI.updateError(specificField, "type", 'Name Already In Use Sorry. Pick Another One');
            $('.bs-callout-warning').toggleClass('hidden', false);
            // remove the error
            //window.ParsleyUI.removeError(specificField, "type");
            //specificField.addError({error: 'this is a custom error message'});
            //$('#nameBox').parsley().ParsleyUI.addError({error: 'this is a custom error message'});
            return;
        }
    });
}

function checkNameAvailability(inName)
{
    return $.ajax(
    {
        type: "POST",
        url:"php/Login.php",
        data: {inName:inName, inFunc:"check"},
        success: function(data) 
        {
            //console.log(data);
            return data;
        }
    });
}

function addName(inName)
{
    /*return $.ajax(
    {
        type: "POST",
        url:"php/Login.php",
        data: {inName:inName, inFunc:"add"},
        success: function(data) 
        {
            if(data == 1)
            {
                sessionStorage.setItem('username', inName);
                $('#loadingGif').hide();
                location.replace("Lobby.php");
                //return data;
            }
        }
    });*/
    sessionStorage.setItem('username', inName);
    $('#loadingGif').hide();
    location.replace("Lobby.php");
}