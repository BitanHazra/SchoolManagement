$(document).ready(function(){

    var data = {};
    var address = {};
    var class_10 = {};
    var class_12 = {};
    var grad = {};
    var pg = {};
    var ex = {};
    var formData;
    var imageFile;
    
    var empid = $('#employee_id').val();

    function ajaxCall(formData){
        $('#sendingData').find('input, text').each(function() {
            $(this).blur();
        });
        $(".data_upload_msz").css('display','flex');
        $(".msz_flow").css("display","flex");
        
        $.ajax({
            url:'dataUploadTable.php',
            type:'POST',
            data:formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false,
            success:function(datas){
                
                $(".msz_flow").css("display","none");
                $(".msz_flow_s").css("display","flex");
                $("#upload_msz_close").focus();
            },
            error:function(xlv,value,status){
                $(".msz_flow").css("display","none");
                $(".msz_flow_f").css("display","flex");
                $("#upload_msz_close_f").focus();
                console.log(value+''+status);
            }
        });
    }

    function editDataForm(formData,work){
        var full_name = $('#f_name').val()+' '+$('#m_name').val()+' '+$('#l_name').val();
        
        address['flat']=$('#flat').val();
        address['Area']=$('#area').val();
        address['State']=$('#state').val();
        address['Building']=$('#building').val();
        address['City']=$('#city').val();
        address['pincode']=$('#pincode').val();
        address['Road']=$('#road').val();
        address['Country']=$('#country').val();
        address['zip_code']=$('#zip').val();

        class_10['school']=$('#school10').val();
        class_10['year']=$('#year_10').val();
        class_10['percentage']=$('#per_10').val();

        class_12['school']=$('#school12').val();
        class_12['year']=$('#year_12').val();
        class_12['percentage']=$('#per_12').val();
        
        grad['school']=$('#school_gr').val();
        grad['year']=$('#year_gr').val();
        grad['percentage']=$('#per_gr').val();

        pg['school']=$('#school_pg').val();
        pg['year']=$('#year_pg').val();
        pg['percentage']=$('#per_pg').val();

        ex['year']=$('#year_ex').val();
        ex['school']=$('#ex').val();
        var empid = $('#employee_id').val();
        
        formData.append('emp_id',empid);
        formData.append('work',work);
        formData.append('name',full_name);
        formData.append('address',JSON.stringify(address));
        formData.append('class_10',JSON.stringify(class_10));
        formData.append('class_12',JSON.stringify(class_12));
        formData.append('grad',JSON.stringify(grad));
        formData.append('pg',JSON.stringify(pg));
        formData.append('ex',JSON.stringify(ex));
        formData.append('dob',$('#date_col').val());
        formData.append('gender',$('#Male').val());
        formData.append('blood',$('#blood').val());
        formData.append('phone',$('#phone').val());
        formData.append('quali',$('#quali').val());
        formData.append('employee_id',empid);
        
        ajaxCall(formData);
    }
    $('#addNewbtn').on('click',function(e){
        e.preventDefault();
        formData = new FormData();
        editDataForm(formData,'addNew');
    })
    function closeWindow(){
        window.close();
        window.location.href='/school_Management/teachers/teachers.php';
    }
    $('#upload_msz_close').on('click',closeWindow);
    $('#upload_msz_close_p').on('click',closeWindow);
    $('#upload_msz_close_f').on('click',closeWindow);
})