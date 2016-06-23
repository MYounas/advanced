/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
    
    $(document).on('click','.language',function(){
       var lang=$(this).attr('id');
       
       $.post('index.php?r=site/language',{'lang':lang},function(data){
          location.reload(); 
       });
    });
    
    $(document).on('click','.fc-day',function (){
       var date=$(this).attr('data-date'); 
       
       $.get('index.php?r=event/create',{'date':date},function(data){
           $('#modal').modal('show')
               .find('#modalContent')
               .html(data);
       });
       
    });
    
   $('#modalButton').click(function (){
       $('#modal').modal('show')
               .find('#modalContent')
               .load($(this).attr('value'));
   }) ;
});

