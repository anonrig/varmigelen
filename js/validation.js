$(document).ready(function(){
     
    $('#contact-form').validate(
    {
        rules: {
            inputUsername: {
                minlength: 2,
                required: true
            },
            inputEmail: {
                required: true,
                email: true
            },
            inputName: {
                minlength: 2,
                required: true
            },
            inputPassword: {
                minlength: 6,
                required: true
            },
            body: {
                required: true,
                minlength: 6,
            },
            
        },
        highlight: function(span) {
            $(span).closest('.login-checkbox').addClass('error');
        },
        success: function(label) {
            label
            .text('Aferin tosunuma')
            .closest('.control-group').addClass('success');
        }
    });
    $('#newsletter').validate(
    {
        rules:{
            share:{
                required:true,
                email: true
            }, 
        },
        highlight: function(label) {
            $(label).closest('.erroring').addClass('error');
        },
        success: function(label) {
            label
            .text('Aferin aslan parçası')
            .closest('.control-group').addClass('success');
        }
    });
}); // end document.ready
