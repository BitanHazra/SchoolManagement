$(document).ready(function(){
    var btable = document.getElementById('mtable').getElementsByTagName('tbody')[0];
    var s_detail_data;
    var s_date_data;
    var month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

    function dataFetch(work,no_of_data){
        $.ajax({
            url:'dashboardData.php',
            type:'post',
            data:{'work':work,'no_of_data':no_of_data},
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
                $('.t_inc_t').text(data['t_total']);
                $('.t_inc_p').text(data['p_total']);
                $('.t_inc_s').text(data['s_total']);
                $('.t_inc_c').text(data['c_total']);
                $('.pagination_entry').text(data['pagination']);
                $('#no_of_data').val(no_of_data);
            },
            error:function(ex,value,status){
                console.log("value"+value+"status"+status);
            }
        });
    }

    dataFetch('view_notify',5);
    
    const calendarDays = document.getElementById('calendarDays');
  const addActivityForm = document.getElementById('addActivityForm');

  // Generate calendar days
  for (let i = 1; i <= 30; i++) {
    const day = document.createElement('div');
    day.classList.add('day');
    day.setAttribute('data-date', i);
    day.addEventListener('click', () => showAddActivityForm(i));
    day.innerHTML = `<span>${i}</span><ul class="activities"></ul>`;
    calendarDays.appendChild(day);
  }

  function showAddActivityForm(day) {
    const activityDateInput = document.getElementById('activityDate');
    activityDateInput.value = `2024-04-${day.toString().padStart(2, '0')}`;
    addActivityForm.style.display = 'block';
  }

  function toggleAddActivityForm() {
    addActivityForm.style.display = addActivityForm.style.display === 'none' ? 'block' : 'none';
  }

  function addActivity(activityNames,activityDates) {
    var date = new Date(activityDates);
    const activityName = activityNames;
    const activityDate = date.getDate();
    console.log();
    if (activityName !== '') {
      const day = document.querySelector(`.day[data-date="${parseInt(activityDate)}"]`);
      const activitiesList = day.querySelector('.activities');
      
      //while(activitiesList.firstChild){
      //  activitiesList.removeChild(activitiesList.firstChild);
      //  }
      const activityItem = document.createElement('li');
      activityItem.classList.add('activity');
      activityItem.innerHTML = `<span style='background: #e0e0e0;'>${activityName}</span>`;
      activitiesList.appendChild(activityItem);
      addActivityForm.style.display = 'none';
    }
  }
  
    $('#entry_to_view').on('change',function(){
        var no_of_record=$(this).val();
        console.log(no_of_record);
        dataFetch('view_notify',no_of_record);
    });

    function add_month_year(){
        var date = new Date();
        var currentYear = date.getFullYear();
        for(var m=0;m<month.length;m++){
            $('#month').append('<option value='+month[m]+'>'+month[m]+'</option>');
        }
        for(var i=currentYear;i>=2000;i--){
            $('#year').append(`<option value=${i}>${i}</option>`);
        }

    }
    function getActivityCalender(from_date,to_date,work){
        $.ajax({
            url:'dashboardData.php',
            type:'post',
            data:{'work':work,'from_date':from_date,'to_date':to_date},
            dataType:'json',
            success:function(data){
                for(var days=1;days<31;days++){
                    const day = document.querySelector(`.day[data-date="${parseInt(days)}"]`);               
                    const activities = day.querySelector('.activities');
                    while(activities.firstChild){
                        activities.removeChild(activities.firstChild);
                        }
                }
                
                data['rows'].forEach(function(value,index){                    
                        addActivity(data['rows'][index]['description'],data['rows'][index]['event_date']);                    
                })
            },
            error:function(ex,value,status){
                console.log("value"+value+"status"+status);
            }
        });
    }
    add_month_year();
    getActivityCalender('2023-10-01','2023-10-31','activity_calender');
    $('#month').on('change',function(){
        var c_month = $(this).val();
        var c_year = $('#year').val();
        var fr_month = month.indexOf(c_month)+1;
        getActivityCalender(`${c_year}-${fr_month}-01`,`${c_year}-${fr_month}-31`,'activity_calender');
    });
    $('#year').on('change',function(){
        var c_month = $('#month').val();
        var c_year = $(this).val();
        var fr_month = month.indexOf(c_month)+1;
        getActivityCalender(`${c_year}-${fr_month}-01`,`${c_year}-${fr_month}-31`,'activity_calender');
    });
});