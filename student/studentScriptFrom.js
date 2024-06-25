$(document).ready(function(){
    
    var data = {};
    var address = {};
    var formData;
    var imageFile;
    
    var empid = $('#emp_id').val();
    
    function fetchstudentData(empid){
        $.ajax({
            url:'dataUploadTable.php',
            type:'POST',
            data:{'emp_id':empid,'work':'view_emp'},
            dataType:'json',
            success:function(data){
                console.log(data);
                var emp_data = data['rows'][0];
                var emp_name = emp_data['student_name'];
                var emp_address =JSON.parse(emp_data['address']);

                $('#date_col').val(emp_data['dob']);
                $('#Male').attr('checked',true);
                $('#blood').val(emp_data['blood_group']);
                $('#phone').val(emp_data['phone']);
                $('#std').val(emp_data['std']);
                $('#student_id').val(emp_data['student_id']);

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
                $('#father_name').val(emp_data['father_name']);
                $('#mother_name').val(emp_data['mother_name']);
                $('#Mobile_No').val(emp_data['phone']);

            },
            error:function(xpt,value,status){
                console.log("error in"+value+"status"+status);
            }
        })
    }
    fetchstudentData(empid);
    $('#canclebtn').on('click',function(){
        window.close();
        window.location.href='/school_Management/student/student.php';
    });
    $('#file_input').on('change',function(event){
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            $(".img_upload").attr('src',e.target.result);
        }
        reader.readAsDataURL(file); 
    });

    function deletestudentData(empid){
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
        deletestudentData(empid);
    });
    function closeWindow(){
        window.close();
        window.location.href='/school_Management/student/student.php';
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

        
        formData.append('std',$('#std').val());
        formData.append('emp_id',$('#student_id').val());
        formData.append('work',work);
        formData.append('name',full_name);
        formData.append('address',JSON.stringify(address))
        formData.append('dob',$('#date_col').val());
        formData.append('gender',$('#Male').val());
        formData.append('blood',$('#blood').val());
        formData.append('phone',$('#phone').val());
        formData.append('mobile_no',$('#Mobile_No').val());
        formData.append('father_name',$('#father_name').val())
        formData.append('mother_name',$('#mother_name').val())
        
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