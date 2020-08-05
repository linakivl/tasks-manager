$(document).ready(function(){
    //delete
    $('.deleteButton').click(function(){
    //e.preventDefault cause its inside the form
    // e.preventDefault();
    //get id
  
    var taskId = $(this).data('tasks-id');
    var confirmalert = confirm("Are you sure?");
   
    if(confirmalert == true){
        //Azax request 
        $.ajax({
            
            url: '/lina-first-project/ajax.php',
            type: 'post',
            data: {
            'action': 'delete-task',
            'deleteVal': taskId
            },
            success: function(response){

                location.reload();
            
          }
        });
    }
    });

    $('.updateBtn').click(function(e){

       
       
        var taskid = $(this).data('tasks-id');
        var update = confirm("Are you sure you want to do this update?");
        var tittleName = $('.tittleName').val();
        var description = $('.descArea').val();
       

        if(update == 1){
           
            $.ajax({
                url: '/lina-first-project/ajax.php',
                type: 'post',
                data: {

                    'action': 'update-task', 
                    'updateVal' : taskid,
                    'tittle' : tittleName,
                    'description' : description
                },
                success: function(response){

                    location.reload();
                
              }
            });
        }
        
    });

    $('.searchField').keyup(function(){
        
        var textField = $(this).val(); 
        if(textField!=''){
            $.ajax( {
                url: '/lina-first-project/ajax.php',
                type: 'post',
                data: { 'action' : 'search-task',
                        'inputSearch' : textField
                },
                success: function(response){
                    if(response){
                        
                        $("#table-data").html(response);
                        
                    }
                } 
              });
            }
        if(textField == ''){
            location.reload();
        }
    });
    
   //active class list sidebar
    $(".container__sideBar--list li").click(function(){
        $(".container__sideBar--list li").removeClass("active")
        $(this).addClass("active");
    });


    $('.editBtn').click(function(){
        var box = $(this).closest('.taskInfo').find('.hideUpdate');
        box.slideToggle();
    });

    // $('.container__sideBar a').click(function(){

    //   $('.container__sideBar--list').slideToggle();
       

    // });   
    // $('.container__sideBar a').mouseenter(function(){
    //     $('.container__sideBar--list').css("display","block");
    // });
    // $('.container__sideBar a').mouseleave(function(){
    //     $('.container__sideBar--list').css("display","none");
    // });
    

});