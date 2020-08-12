
$.noConflict();
jQuery(document).ready(function($){
    
    
     $('#selectAll').click(function(event){
         if (this.checked){
                 $('.checkBox').prop('checked', true);
        } else {
            $('.checkBox').prop('checked', false);
        }
    })
})