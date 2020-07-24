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
            })
        }
        
    })



    $('#searchInput').keyup(function(){
        
        $('#result').html('');

        var searchField = $('#searchInput').val();
       
        var expression = new RegExp(searchField, "i");
   
        $.getJSON('update.json', function(data){
            $.each(data, function(key, value){
                if(value.tittle.search(expression) != -1){
                    $('#result').append('<li class="list-group-append"><a href="#"> ' + value.tittle + '</a></li>');
                }
            });
        })
    })


});