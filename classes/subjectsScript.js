$(document).ready(function(){
    var btable = document.getElementById('myTable').getElementsByTagName('tbody')[0];
    var tablee = document.getElementById('myTable');
    var employeeNumber;

    function loadFetchData(records){
        $.ajax({
            url:'classData.php',
            type:'post',
            data:{'records':records,'work':'load_pagi_subject'},
            dataType:'json',
            success:function(data){
                btable.innerHTML='';
                $('#entry_to_view').val(records);
                data['rows'].forEach(function(value,index,array){
                    var nrows=0;
                    var trows = btable.insertRow();
                    var tcell = trows.insertCell();
                    tcell.innerHTML='<input type="checkbox">';
                    for(let keys in data['rows'][index]){
                        if(nrows<6){
                            var tcell = trows.insertCell();
                            tcell.innerHTML=data['rows'][index][keys];
                            nrows++;
                        }  
                    }                    
                })
                if($('#entry_to_view').val()<9){
                    $('#entry_to_view').val(records);
                }
                
                $('#total_entry').text(" "+data['pages']+" ");
                },
            error: function(xhr, status, error) {
                console.error("Request failed with status: " + status + ", error: " + error);
            }
        });
    }
    loadFetchData(9);

    $('#entry_to_view').on('change',function(){
        var no_of_record=$(this).val();
        console.log(no_of_record);
        loadFetchData(no_of_record);
    });
});