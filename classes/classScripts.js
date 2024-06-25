$(document).ready(function(){
    var btable = document.getElementById('myTable').getElementsByTagName('tbody')[0];
    var tablee = document.getElementById('myTable');
    var employeeNumber;

    function loadFetchData(records){
        
        $.ajax({
            url:'classData.php',
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
                    var tcell_a = trows.insertCell();
                    tcell_a.innerHTML="<span>\
                    <button class='edit_data_link'><img src='icon/icons8-edit-30 (1).png' class='action_edit'></button>\
                    <button class='delete_data_link'><img src='icon/icons8-delete-30.png'  class='action_delete'></button>\
                </span>";
                $('.className').append(`<option value=${data['rows'][index]['std']}>${data['rows'][index]['std']}</option>`);
                
                })
                if($('#entry_to_view').val()<9){
                    $('#entry_to_view').val(records);
                }
                $('#total_entry').text(" "+data['pages']+" ");
                data['teacherName'].forEach(function(value,index){
                    $('.teacher_name').append(`<option value=${data['teacherName'][index]['teacher_name']}>${data['teacherName'][index]['teacher_name']}</option>`);
                })
                },
            error: function(xhr, status, error) {
                console.error("Request failed with status: " + status + ", error: " + error);
            }
        });
    }
    loadFetchData(12);
    
    function updateData(work){
        
        let select = document.getElementById('classNames');
        let selectedOption = select.options[select.selectedIndex];
        let className = selectedOption.value;

        let selectName = document.getElementById('teacher_names');
        let selectedOptionName = selectName.options[selectName.selectedIndex];
        let teacherName = selectedOptionName.value;
        $.ajax({
            url:'classData.php',
            type:'post',
            data:{'className':className,'teacherName':teacherName,'work':work},
            dataType:'json',
            success:function(data){
                alert('Done');

                },
            error: function(xhr, status, error) {
                console.error("Request failed with status: " + status + ", error: " + error);
            }
        });
    }
    function newData(work){
        
        let select = document.getElementById('classNameNew');
        let className = select.value;

        let selectName = document.getElementById('teacher_nameNew');
        let selectedOptionName = selectName.options[selectName.selectedIndex];
        let teacherName = selectedOptionName.value;
        $.ajax({
            url:'classData.php',
            type:'post',
            data:{'className':className,'teacherName':teacherName,'work':work},
            dataType:'json',
            success:function(data){
                alert('Done');

                },
            error: function(xhr, status, error) {
                console.error("Request failed with status: " + status + ", error: " + error);
            }
        });
    }
    function deleteData(work){
        
        let select = document.getElementById('classNameDelete');
        let selectedOption = select.options[select.selectedIndex];
        let className = selectedOption.value;

        let selectName = document.getElementById('teacher_nameDelete');
        let selectedOptionName = selectName.options[selectName.selectedIndex];
        let teacherName = selectedOptionName.value;
        $.ajax({
            url:'classData.php',
            type:'post',
            data:{'className':className,'teacherName':teacherName,'work':work},
            dataType:'json',
            success:function(data){
                alert('Done');

                },
            error: function(xhr, status, error) {
                console.error("Request failed with status: " + status + ", error: " + error);
            }
        });
    }
    tablee.addEventListener('click',function(event){
        // Get the first cell (employee number) of the clicked row
        employeeNumber = event.target.closest('tr').cells[2].textContent;
        var classNo = event.target.closest('tr').cells[1].textContent;
        
        $('.edit_data_link').on('click',function(){
            $('.editFrame').css('display','flex');
        });
        $('.delete_data_link').on('click',function(){
            $('.deleteFrame').css('display','flex')
        });
});
$('#edit').on('click',function(){
    updateData('updateData');
})
$('#create').on('click',function(){
    newData('newData');
})
$('#delete').on('click',function(){
    deleteData('deleteData');
})
$('.create_new_btn').on('click',function(){
    $('.newFrame').css('display','flex')
})
$('.cross').on('click',function(){
    window.close();
    window.location.href = "/school_Management/classes/classes.php";
})

$('#entry_to_view').on('change',function(){
var no_of_record=$(this).val();
console.log(no_of_record);
loadFetchData(no_of_record);
});
});