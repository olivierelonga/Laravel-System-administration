
// member login


        $("#sp_login input").keyup(function()
        {

            $("#sp_login input").css('border-color', '');
            $("#dialog").fadeOut();

        });



         $("#btn_login").click(function(){


      if($('#username').val() == "" && $('#password').val() == "") 
            
        {
            $("html, body").animate({ scrollTop: $('body').offset().top }, 1000);
            $("#dialog").html('<center> Please enter your login details !</center>').show().css('color', 'red');
            $('input[name=username]').css('border-color', '#e41919');
            $('input[name=password]').css('border-color', '#e41919');
            $("input[name=username]").focus();
           
        } 
         else 
             if($('#username').val() == "") 
            
          {
                $("html, body").animate({ scrollTop: $('body').offset().top }, 1000);
                $("#dialog").html('<center>Please type your industry number! </center>').fadeIn().css('color', 'red');
                $('input[name=username]').css('border-color', '#e41919');
                $("input[name=username]").focus();
          } 

        else 
          if ($('#password').val() == "") {   

                $("html, body").animate({ scrollTop: $('body').offset().top }, 1000);
                $("#dialog").html('<center>Please type your password!</center>').fadeIn().css('color', 'red');
                $('input[name=password]').css('border-color', '#e41919');
                $("input[name=password]").focus();


            }else             
                 {

                var $btn = $("#btn_login").button("loading");
                $.ajax({
                    
                    url:'server/response.php',
                    type: 'POST',
                    data: $("#sp_login").serialize(), 
                    dataType: 'json',
                    success: function(data){
            
                      if(data.status=="success"){
                           
                                sessionStorage.setItem('sp_id',data.c_registration);
                                window.location.replace("sp_portal/");
 
                          }

                           else if(data.status=="not_active"){

                             $("html, body").animate({ scrollTop: $('body').offset().top }, 1000);
                             $("#dialog").html('<center> '+ data.message +' </center>').show().css('color', 'red');
                             $btn.button("reset");
                        }
                        else{


                             $("html, body").animate({ scrollTop: $('body').offset().top }, 1000);
                             $("#dialog").html('<center> '+ data.message +' </center>').show().css('color', 'red');
                             $btn.button("reset");


                        }
                      

                    },
                    error: function(data){

                            $("html, body").animate({ scrollTop: $('body').offset().top }, 1000);
                            $("#dialog").html('<center>Sorry Something is wrong! </center>').show().css('color', 'red');
                            $btn.button("reset");

                    }
                 

                     });
              
        }

        });
