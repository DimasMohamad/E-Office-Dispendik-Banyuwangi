/**
 *
 * Customize JS
 * By Eris DSR
 *
**/

//INISIALISASI FORM SELECT (COMBO BOX)
$(document).ready( function() {
    $('select').formSelect();
});

//INISIALISASI ACCORDION
$(document).ready(function(){
    $('.collapsible').collapsible();
});

//INISIALISASI TABS
$(document).ready(function(){
    $('.tabs').tabs();
});

//VALIDASI EMAIL
$(document).ready(function()
{
    $("#emaile").blur(function()
    {

        $("#msgboxe").removeClass().addClass('messagebox').text('Checking.....').fadeIn("slow");
        $.post("",{ emaile:$('#emaile').val() } ,function(data)
        {
          if(data=="no") //if email is there
          {

            $("#msgboxe").fadeTo(200,0.1,function() //start fading the messagebox
            { 
              $(this).html('Email already registered').addClass('messageboxerror').fadeTo(900,1);
            });     
          }
          else // if the email is not there
          {
            $("#msgboxe").fadeTo(200,0.1,function()  //start fading the messagebox
            { 
              //add message and change the class of the box and start fading
              $(this).html('Available').addClass('messageboxok').fadeTo(900,1); 
            });
          }     
        });
    });
});

//KEY UP PADA SEARCH
function searchKeyUp() {
    var input, filter, ul, li, a, i;
    input = document.getElementById('search');
    filter = input.value.toUpperCase();
    ul = document.getElementById("list");
    li = ul.getElementsByTagName('li');

    for (i = 0; i < li.length; i++) {
        b = li[i].getElementsByTagName("b")[0];
        if (b.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}