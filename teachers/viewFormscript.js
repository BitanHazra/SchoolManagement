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
    
    var empid = $('#emp_id').val();

    function fetchTeacherData(empid){
        $.ajax({
            url:'dataUploadTable.php',
            type:'POST',
            data:{'emp_id':empid,'work':'view_emp'},
            dataType:'json',
            success:function(data){
                
                var emp_data = data['rows'][0];
                var emp_name = emp_data['teacher_name'];
                var emp_address =JSON.parse(emp_data['address']);
                var class10 =JSON.parse(emp_data['class10']);
                var class12 =JSON.parse(emp_data['class12']);
                var graduation =JSON.parse(emp_data['graduation']);
                var pg =JSON.parse(emp_data['pg']);
                var ex =JSON.parse(emp_data['experience']);
                
                
                $('#date_col').val(emp_data['dob']);
                $('#Male').attr('checked',true);
                $('#blood').val(emp_data['blood_group']);
                $('#phone').val(emp_data['phone']);
                $('#quali').val(emp_data['quali']);

                $('#f_name').val(emp_name.split(' ')[0]);
                if( emp_name.split(' ').length===3){
                    $('#m_name').val(emp_name.split(' ')[1]);
                }
                if( emp_name.split(' ').length===2){
                    $('#l_name').val(emp_name.split(' ')[emp_name.split(' ').length-1]);
                }
                
                $('#flat').val(emp_address['flat']);
                $('#area').val(emp_address['Area']);
                $('#state').val(emp_address['State']);
                $('#building').val(emp_address['Building']);
                $('#city').val(emp_address['City']);
                $('#pincode').val(emp_address['pincode']);
                $('#road').val(emp_address['Road']);
                $('#country').val(emp_address['Country']);
                
                $('#zip').val(emp_address['zip_code']);

                $('#school10').val(class10['school']);
                $('#year_10').val(class10['year']);
                $('#per_10').val(class10['percentage']);

                $('#school12').val(class12['school']);
                $('#year_12').val(class12['year']);
                $('#per_12').val(class12['percentage']);
                
                $('#school_gr').val(graduation['school']);
                $('#year_gr').val(graduation['year']);
                $('#per_gr').val(graduation['percentage']);

                $('#school_pg').val(pg['school']);
                $('#year_pg').val(pg['year']);
                $('#per_pg').val(pg['percentage']);

                $('#year_ex').val(ex['year']);
                $('#ex').val(ex['school']);
            },
            error:function(xpt,value,status){
                console.log("error in"+value+"status"+status);
            }
        })
    }
    fetchTeacherData(empid);
    $('#canclebtn').on('click',function(){
        window.close();
        window.location.href='/school_Management/teachers/teachers.php';
    });
    $('#file_input').on('change',function(event){
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            $(".img_upload").attr('src',e.target.result);
        }
        reader.readAsDataURL(file); 
    });

    function deleteTeacherData(empid){
        $.ajax({
            url:'dataUploadTable.php',
            type:'POST',
            data:{'emp_id':empid,'work':'delete_emp'},
            dataType:'json',
            success:function(data){
                $('.data_upload_msz').css('display','flex');
                $('.msz_container').css('display','block');
                $(".msz_flow_s").css("display","flex");
                $("#upload_msz_close").focus();
                
            },
            error:function(xpt,value,status){
                console.log("error in"+value+"status"+status);
            }
        })
    }
    $('#deletebtn').on('click',function(){
        deleteTeacherData(empid);
    });
    function closeWindow(){
        window.close();
        window.location.href='/school_Management/teachers/teachers.php';
    }
    $('#upload_msz_close').on('click',closeWindow);
    $('#upload_msz_close_p').on('click',closeWindow);
    $('#upload_msz_close_f').on('click',closeWindow);
    


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

        var imageInput = document.getElementById('file_input');
        imageFile = imageInput.files[0];
        formData.append('image', imageFile);
        console.log(imageFile);
        formData.append('data',data);
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
        
        ajaxCall(formData);
    }
    $('#updatebtn').on('click',function(e){
        e.preventDefault();
        formData = new FormData();
        editDataForm(formData,'update');
    })
    $('#addNewbtn').on('click',function(e){
        e.preventDefault();
        var imageInput = document.getElementById('file_input');
        var imageFile = imageInput.files[0];
        
        formData = new FormData();
        formData.append('image', imageFile);
        editDataForm(formData,'addNew');
    })
});