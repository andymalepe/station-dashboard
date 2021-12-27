$(document).ready(function(){

    function checkDates(){
        if($('#startdate-stock-usage-export').val() == '' && $('#startdate-stock-usage-export').val() == ''){
            return false;
        }else{
            return true;
        }
    }
    function convertToExcel(data, suffix){
        let createXLSLFormatObj = [];

        // createXLSLFormatObj.push(xlsHeader);
        $.each(data, function(index, value) {
            var innerRowData = [];
            $("tbody").append('<tr><td>' + value.EmployeeID + '</td><td>' + value.FullName + '</td></tr>');
            $.each(value, function(ind, val) {

                innerRowData.push(val);
            });
            createXLSLFormatObj.push(innerRowData);
        });


        /* File Name */
        let filename = suffix+".xlsx";

        /* Sheet Name */
        let ws_name = "Food Usage";

        if (typeof console !== 'undefined') console.log(new Date());
        let wb = XLSX.utils.book_new(),
            ws = XLSX.utils.aoa_to_sheet(createXLSLFormatObj);

        /* Add worksheet to workbook */
        XLSX.utils.book_append_sheet(wb, ws, ws_name);

        /* Write workbook and Download */
        if (typeof console !== 'undefined') console.log(new Date());
        XLSX.writeFile(wb, filename);
        if (typeof console !== 'undefined') console.log(new Date());
    }

    $('li.nav-item.active').removeClass('active');
    $('#admin').addClass('active');
    $('.datepicker').datepicker({
        format:'dd-mm-yyyy',
        autoclose: true
    });

    $('#startdate-stock-usage-export').on('changeDate', function(){
        $('#enddate-stock-usage-export').datepicker('setStartDate', $('#startdate-stock-usage-export').val());
        if(checkDates()){
            $('#btn-stock-usage-export').removeClass('disabled');
        }
    });
    $('#enddate-stock-usage-export').on('changeDate', function(){
        $('#startdate-stock-usage-export').datepicker('setEndDate', $('#enddate-stock-usage-export').val());
        if(checkDates()){
            $('#btn-stock-usage-export').removeClass('disabled');
        }
    });


    $('#btn-stock-usage-export').on('click', function(){
        
        if(checkDates()){
            $.ajax({
                url: '/export/',
                type: 'GET',
                dataType: 'json',
                data: {
                    export: true,
                    consumption: true,
                    startdate: $('#startdate-stock-usage-export').val(),
                    enddate: $('#enddate-stock-usage-export').val()
                },
                success: function(data){
                        if (data.length > 0){
                        console.log(data);
                        convertToExcel(data, 'FoodConsumption');
                        }else {
                        alert('Error retrieving data');
                        }
                    },
                error: function(a, b, c){
                    console.log(a);
                }
                });
        }
    });
    
    $('#btn-stock-download').on('click', function(){
        
        $.ajax({
            url: '/export/',
            type: 'GET',
            dataType: 'json',
            data: {
                export: true,
                inventory: true
            },
            success: function(data){
                  if (data.length > 0){
                    console.log(data);
                    convertToExcel(data,'FoodInventory');
                  }else {
                    alert('Error retrieving data');
                  }
                },
            error: function(a, b, c){
                console.log(a);
            }
          });
    });

})