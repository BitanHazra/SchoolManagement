$(document).ready(function(){
    var btable = document.getElementById('myTable').getElementsByTagName('tbody')[0];
    var tablee = document.getElementById('myTable');
    var studentName;
    var parentNumber;
    var employeeIdOption = document.getElementById('employeeIdSelect');
    var searchOption = document.getElementById('select_option');

    function loadFetchData(records){
        
        $.ajax({
            url:'dataUploadTable.php',
            type:'post',
            data:{'records':records,'work':'load_pagi'},
            dataType:'json',
            success:function(data){
                btable.innerHTML='';
                $('#entry_to_view').val(records);
                $('#employeeIdSelect').empty();
                data['rows'].forEach(function(value,index,array){
                    var nrows=0;
                    var trows = btable.insertRow();
                    var tcell = trows.insertCell();
                    tcell.innerHTML='<input type="checkbox">';
                    for(let keys in data['rows'][index]){
                        if(nrows<4){
                            var tcell = trows.insertCell();
                            tcell.innerHTML=data['rows'][index][keys];
                            nrows++;
                        }  
                    }
                    var acell = trows.insertCell();
                    acell.innerHTML=`<input type="checkbox" id=${data['rows'][index]['student_name']} value=${data['rows'][index]['student_name']}>\
                    <label for=${data['rows'][index]['student_name']}></label>`;
                })
                data['student_class'].forEach(function(value,index){
                    $('#employeeIdSelect').append(`<option>${data['student_class'][index]['std']}</option`);
                })
                
                if($('#entry_to_view').val()<9){
                    $('#entry_to_view').val(records);
                }
                $('#total_entry').text(" "+data['pages']+" ");

                data['checkResult'].forEach(function(value,index){
                    var idName = data['checkResult'][index]['password'];
                    try{
                        var actionCheck = document.getElementById(idName);
                        actionCheck.checked=true;
                    }catch(e){
                        
                    }
                })
                },
            error: function(xhr, status, error) {
                console.error("Request failed with status: " + status + ", error: " + error);
            }
        });
    }
    loadFetchData(9);
    function giveAccess(studentName,parentNumber,work){
        $.ajax({
            url:'dataUploadTable.php',
            type:'post',
            data:{'studentName':studentName,'parentNumber':parentNumber,'work':work},
            dataType:'json',
            success:function(data){
                
                },
            error: function(xhr, status, error) {
                console.error("Request failed with status: " + status + ", error: " + error);
            }
        })
    }
    function changeTableValue(employeeID,work,optionSearch){
        $.ajax({
            url:'dataUploadTable.php',
            type:'post',
            data:{'employeeID':employeeID,'work':work,'optionSearch':optionSearch},
            dataType:'json',
            success:function(data){
                btable.innerHTML='';
                $('#entry_to_view').val(data['pages']);
                data['rows'].forEach(function(value,index,array){
                    var nrows=0;
                    var trows = btable.insertRow();
                    var tcell = trows.insertCell();
                    tcell.innerHTML='<input type="checkbox">';
                    for(let keys in data['rows'][index]){
                        if(nrows<4){
                            var tcell = trows.insertCell();
                            tcell.innerHTML=data['rows'][index][keys];
                            nrows++;
                        } 
                    }
                    var acell = trows.insertCell();
                    acell.innerHTML=`<input type="checkbox" id=${data['rows'][index]['student_name']} value=${data['rows'][index]['student_name']}>\
                    <label for=${data['rows'][index]['student_name']}></label>`;
                })
                
                    
                
                $('#total_entry').text(" "+data['pages']+" ");
                
                data['checkResult'].forEach(function(value,index){
                    var idName = data['checkResult'][index]['password'];
                    try{
                        var actionCheck = document.getElementById(idName);
                        actionCheck.checked=true;
                    }catch(e){
                        
                    }
                })
                },
            error: function(xhr, status, error) {
                console.error("Request failed with status: " + status + ", error: " + error);
            }
        });
    }
    $('#delete_record').on('click',function(){
        alert();
    })
    tablee.addEventListener('click',function(event){
        
        // Get the first cell (employee number) of the clicked row
        studentName = event.target.closest('tr').cells[1].textContent;
        parentNumber = event.target.closest('tr').cells[4].textContent;
        var actionCheckBox = document.getElementById(studentName);
        actionCheckBox.addEventListener('change',function(){
            if(this.checked){
                giveAccess(studentName,parentNumber,'giveAccess');
            }else{
                giveAccess(studentName,parentNumber,'removeAccess');
            }
        });
});
    $('#entry_to_view').on('change',function(){
        var no_of_record=$(this).val();
        console.log(no_of_record);
        loadFetchData(no_of_record);
    });

    employeeIdOption.addEventListener('change',function(){
        var employeeID = this.value;
        changeTableValue(employeeID,'filterEmployee','std');
    })
    $('#search').on('input',function(){
        var text = $(this).val();
        var option = searchOption.options[searchOption.selectedIndex];
        if(text!=''){
            console.log(option.dataset.code);
            changeTableValue(text,'searchEmployee',option.dataset.code);
        }else{
            loadFetchData(9);
        }
    })
    
});