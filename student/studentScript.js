$(document).ready(function(){
    var btable = document.getElementById('myTable').getElementsByTagName('tbody')[0];
    var tablee = document.getElementById('myTable');
    var employeeNumber;
    var datao;
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
                    tcell.innerHTML="<span>\
                    <a href='editForm.php'class='edit_data_link'><img src='icon/icons8-edit-30 (1).png' class='action_edit'></a>\
                    <a href='viewForm.php' class='view_data_link'><img src='icon/icons8-view-30 (1).png' class='action_view'></a>\
                    <a href='deleteForm.php' class='delete_data_link'><img src='icon/icons8-delete-30.png'  class='action_delete'></a>\
                </span>";
                })
                if($('#entry_to_view').val()<9){
                    $('#entry_to_view').val(records);
                }
                
                $('#total_entry').text(" "+data['pages']+" ");

                $('#employeeIdSelect').empty();
                data['data_all_result'].forEach(function(value,index){
                    console.log(data['data_all_result'][index]['std']);
                    $('#employeeIdSelect').append(`<option>${data['data_all_result'][index]['std']}</option`);
                })
                
                },
            error: function(xhr, status, error) {
                console.error("Request failed with status: " + status + ", error: " + error);
            }
        });
    }
    loadFetchData(9);
    
    $('#delete_record').on('click',function(){
        alert();
    })
    
    tablee.addEventListener('click',function(event){
                // Get the first cell (employee number) of the clicked row
                employeeNumber = event.target.closest('tr').cells[1].textContent;
                $('.view_data_link').attr('href','viewForm.php?emp_no='+employeeNumber);
                $('.edit_data_link').attr('href','editForm.php?emp_no='+employeeNumber);
                $('.delete_data_link').attr('href','deleteForm.php?emp_no='+employeeNumber);
        
    });

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
                        if(nrows<6){
                            var tcell = trows.insertCell();
                            tcell.innerHTML=data['rows'][index][keys];
                            nrows++;
                        } 
                    }
                    tcell.innerHTML="<span>\
                    <a href='editForm.php'class='edit_data_link'><img src='icon/icons8-edit-30 (1).png' class='action_edit'></a>\
                    <a href='viewForm.php' class='view_data_link'><img src='icon/icons8-view-30 (1).png' class='action_view'></a>\
                    <a href='deleteForm.php' class='delete_data_link'><img src='icon/icons8-delete-30.png'  class='action_delete'></a>\
                </span>";
                })
                if($('#entry_to_view').val()<9){
                    $('#entry_to_view').val(data['pages']);
                }
                $('#total_entry').text(" "+data['pages']+" ");
                
                },
            error: function(xhr, status, error) {
                console.error("Request failed with status: " + status + ", error: " + error);
            }
        });
    }

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
            changeTableValue(text,'searchEmployee',option.dataset.code);
        }else{
            loadFetchData(9);
        }
    })
    
    $('#entry_to_view').on('change',function(){
        var no_of_record=$(this).val();
        console.log(no_of_record);
        loadFetchData(no_of_record);
    });

    $('#export').on('click',function(){
        var table = document.getElementById("myTable");
    var rows = table.querySelectorAll("tr");
    var csv = [];

    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");

        for (var j = 0; j < cols.length; j++) {
            row.push(cols[j].innerText);
        }

        csv.push(row.join(","));
    }

    // Download CSV file
    var csvContent = "data:text/csv;charset=utf-8," + csv.join("\n");
    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "table.csv");
    document.body.appendChild(link); // Required for FF
    link.click(); // This will download the CSV file
    });
    
    $('#print').on('click',function(){
        var printContent = document.getElementById('printContent').outerHTML
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print()
        document.body.innerHTML = originalContent;
    });
    

    $('.drop-container').on('mouseenter',function(){
        $('.dropdown').css('display','flex');
    }).on('mouseleave',function(){
        $('.dropdown').css('display','none');
    });
    
});