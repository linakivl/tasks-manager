$(document).ready(function(){
    //delete
    $('.deleteBtn').click(function(e){
    //e.preventDefault cause its inside the form
    e.preventDefault();
  
    //get id
    var taskId = $(this).data('tasks-id');
    var confirmalert = confirm("Are you sure?");
    if(confirmalert == true){
        //Azax request 
        $.ajax({
            url: '/lina-first-project/ajax.php',
            type: 'post',
            dataType: "json",
            data: {
            'action': 'delete-task',
            'deleteVal': taskId
            },
            success: function(response){
            if (response && response.status) {
                location.reload();
            }
            //   //Remove row from Html table
            //   // $(el).closest('.info-task').css('background','tomato');
   
            }
        });
    }
    });

    $('.updateBtn').click(function(e){

        e.preventDefault();
       
        var taskid = $(this).data('tasks-id');
      
       
        var update = confirm("Are you sure you want to do this update?");
        var tittleName = $('.tittleName').val();
        var description = $('.descArea').val();
        var userId = $('.hideUserId').val();
       

        if(update == 1){
            $.ajax({
                url: '/lina-first-project/ajax.php',
                type: 'post',
                data: {
                    'action': 'update-task', 
                    'updateVal' : taskid,
                    'tittle' : tittleName,
                    'description' : description,
                    'userId' : userId
                },
                success: function(response){
                    if(response){
                        location.reload();
                    }
                }
            });
        }
        
    });

    $('#searchInput').keyup(function(){

        var txtSearch = $(this).val();
        if(txtSearch!=''){
            $.ajax( {
                url: '/lina-first-project/ajax.php',
                type: 'post',
                
                data: {'action': 'search-task', 'inputSearch' : txtSearch},
                success: function(response){
                $("#table-data").html(response); 
                }
            }); 
        }else{
           
            $("#table-data").html('');
         
        }
        
    });


    $(".searchIcon").click(function(){
        $(".sidebar").toggleClass("toggleWidth");
        $(".searchField").toggleClass("toggleInputSearch");
    });
   
   
    
});