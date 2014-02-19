/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*jQuery time*/
$(document).ready(function(){
        $("#accordian h3").click(function(){
                //slide up all the link lists
                $("#accordian ul ul").slideUp();
                //slide down the link list below the h3 clicked - only if its closed
                if(!$(this).next().is(":visible"))
                {
                        $(this).next().slideDown();
                }
        })
})