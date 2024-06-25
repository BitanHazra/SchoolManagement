$(document).ready(function(){
    var btable = document.getElementById('mtable').getElementsByTagName('tbody')[0];
    var s_detail_data;
    var s_date_data;
    function dataFetch(work,no_of_data,s_detail=0,s_date=0){
        $.ajax({
            url:'dataEvents.php',
            type:'post',
            data:{'work':work,'no_of_data':no_of_data,'e_description':s_detail,'e_date':s_date},
            dataType:'json',
            success:function(data){
                if(work=='view_event'){
                    btable.innerHTML='';
                    data['rows'].forEach(function(value,index,array){
                    var rows = btable.insertRow();
                    for(var key in value){
                        var cels = rows.insertCell();
                        cels.innerHTML = value[key];
                    }
                });
                $('.pagination_entry').text(data['pagination']);
                $('#no_of_data').val(no_of_data);
                }
                
                if(work=='addNew_event'){
                    if(data!='fail'){
                        $('.pagination_entry').text(data);
                        alert("Data updates successfully");
                        $('#no_of_data').val(no_of_data);
                    }else{
                        alert('Fail To update data.')
                    }
                }
            },
            error:function(ex,value,status){
                console.log("value"+value+"status"+status);
            }
        });
    }

    dataFetch('view_event',9);
    
    $('#no_of_data').on('change',function(){
        var no_of_data = $(this).val();
        dataFetch('view_event',no_of_data);
    })
    $('#Add_Update').on('click',function(){
        s_detail_data = $('.event_detail').val();
        s_date_data = $('.event_date').val();
        no_of_data = $('#no_of_data').val();
        dataFetch('addNew_event',no_of_data,s_detail_data,s_date_data);
    })
});