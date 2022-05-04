$(document).ready(function(){
    $('.inc-btn').click(function(e){
        e.preventDefault();
        var inc_value=$(this).closest('.prod-data').find('.quant').val();
        var value=parseInt(inc_value,10);
        value=isNaN(value) ? 0 : value;
        if(value<100){
            value++;
            $(this).closest('.prod-data').find('.quant').val(value);
            
            
            
        }
    });
    $('.dec-btn').click(function(e){
        e.preventDefault();
        var dec_value=$(this).closest('.prod-data').find('.quant').val();
        
        var value=parseInt(dec_value,10);
        value=isNaN(value) ? 0 : value;
        if(value>1){
            value--;
            $(this).closest('.prod-data').find('.quant').val(value);
           
        }
    });
});