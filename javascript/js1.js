$(document).ready(function() {
                $("#button").click(function(){
                    $("#popup").show();
                    $("#hover").show();
                
                });
                
                $("#hover").click(function (){
                    $("#popup").hide();
                    $("#hover").hide();
                })