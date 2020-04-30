// alert('okddd')

function showMsg(type,msg){
  if(type == 'danger'){
        toastr.error(msg, "Danger", {
              progressBar: !0
            });
  }else if (type == 'success') {
        toastr.success(msg, "Success", {
              progressBar: !0
            });
  }else{
       toastr.warning(msg, "Warning", {
              progressBar: !0
            });
  }

}





function insertData(url, method, data) {
    // alert('ok')
    // console.log(data)
    var dataToReturn = "";
    $.ajax({
        url: url,
        method: method,
        async: false,
        data: data,
        contentType: false,
        processData: false,
        success: function (response) {
            var responseObj = $.parseJSON(response);
            dataToReturn = responseObj;
        }
    });
    return dataToReturn;
}




$('body').on('change', 'input[type=file]', function (e) {
    if ($(this).hasClass('uploadedExcel')) {
        var file = this.files[0];
        var html = '';
        var fileType = file["type"];
        var ValidImageTypes = ["application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"];
        if ($.inArray(fileType, ValidImageTypes) > -1) {
            var tmppath = URL.createObjectURL(e.target.files[0]);
        } else {
            showMsg('danger', 'Only Excel Allowed');
            $(this).val('');
        }
    } else {
        var file = this.files[0];
        var html = '';
        var fileType = file["type"];
        var ValidImageTypes = ["image/png","image/jpeg","image/jpg","image/gif","image/PNG","image/JPEG","image/JPG","image/GIF"];
        if ($.inArray(fileType, ValidImageTypes) > -1) {
            var tmppath = URL.createObjectURL(e.target.files[0]);
            html += '<img src="' + tmppath + '"  class="uploaded-images">';
            $(this).parent().find('.img-append').html(html);
        } else {
            showMsg('danger', 'Only PNG Type Image Allowed');
            $(this).val('');
        }
    }
    });


function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel, header) {
    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
// alert('excel')
    var CSV = '';
    //This condition will generate the Label/Header
    if (ShowLabel) {
        var row = "";

        //This loop will extract the label from 1st index of on array
        for (var index in header) {
            //Now convert each value to string and comma-seprated
            row += header[index] + ',';


        }

        row = row.slice(0, -1);

        //append Label row with line break
        CSV += row + '\r\n';
    }

    //1st loop is to extract each row
    for (var i = 0; i < arrData.length; i++) {

        var removeData = '';
        var row = "";
        //2nd loop will extract each column and convert it in string comma-seprated
        for (var index in arrData[i]) {

            if ($.inArray(index, removeData) > -1) {
                continue;
            } else {
                row += '"' + arrData[i][index] + '",';
            }


        }

        row.slice(0, row.length - 1);

        //add a line break after each row
        CSV += row + '\r\n';
    }

    if (CSV == '') {
        alert("Invalid data");
        return;
    }

    //Generate a file name
    var fileName = "MyReport_";
    //this will remove the blank-spaces from the title and replace it with an underscore
    fileName += ReportTitle.replace(/ /g, "_");

    //Initialize file format you want csv or xls
    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);

    // Now the little tricky part.
    // you can use either>> window.open(uri);
    // but this will not work in some browsers
    // or you will not get the correct file extension    

    //this trick will generate a temp <a /> tag
    var link = document.createElement("a");
    link.href = uri;

    //set the visibility hidden so it will not effect on your web-layout
    link.style = "visibility:hidden";
    link.download = fileName + ".csv";

    //this part will append the anchor tag and remove it after automatic click
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}


function loaderStart() {
    $('body').find('#loading').removeClass('d-none');

    $('body').css('overflow', 'hidden');

}



function loaderEnd() {
    $('body').find('#loading').addClass('d-none');
    $('body').css('overflow', 'auto');
}



$(document).ajaxStart(function () {
    loaderStart();
});

$(document).ajaxComplete(function () {
    loaderEnd();
});

$(document).ready(function(){
    loaderStart();
   setTimeout(function(){loaderEnd();}, 2000);
});


