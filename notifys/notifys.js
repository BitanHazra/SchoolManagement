$(document).ready(function(){
    var btable = document.getElementById('mtable').getElementsByTagName('tbody')[0];
    var s_detail_data;
    var s_date_data;
    function dataFetch(work,no_of_data,s_detail=0,s_date=0){
        $.ajax({
            url:'dataNotifys.php',
            type:'post',
            data:{'work':work,'no_of_data':no_of_data,'e_description':s_detail,'e_date':s_date},
            dataType:'json',
            success:function(data){
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
                
                
                if(work=='addNew_notify'){
                    if(data!='fail'){
                        alert("Data Add/updates successfully");
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

    dataFetch('view_notify',9);
    
    $('#no_of_data').on('change',function(){
        var no_of_data = $(this).val();
        dataFetch('view_notify',no_of_data);
    })
    $('#Add_Update').on('click',function(){
        s_detail_data = $('.notify_detail').val();
        s_date_data = $('.notify_date').val();
        no_of_data = $('#no_of_data').val();
        dataFetch('addNew_notify',no_of_data,s_detail_data,s_date_data);
    })
});