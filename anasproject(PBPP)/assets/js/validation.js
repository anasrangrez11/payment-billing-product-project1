var regNumber          =   new RegExp(/^[0-9.]*$/);
var regName         =   RegExp(/^[a-z A-Z-.']+$/);
var regAlhpa        =   RegExp(/^[a-z A-Z]+$/);
var regAlphaNum     =   RegExp(/^[a-z A-Z. 0-9',-]+$/);
var regUsername     =   RegExp(/^[a-zA-Z0-9']+$/);
var regEmail        =   RegExp(/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i);
var regCard         =   RegExp(/^[0-9.]*$/);
var regUrl          =   RegExp(/(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/);
var regPhone        =   RegExp(/^[0-9 \s]{10}$/);
var regIndiaPhone   =   RegExp(/^[0]?[6789]\d{9}$/);
var regindiamobile  =   RegExp(/^[6-9]\d{9}$/);
var regnotnumeric   =   RegExp(/^[a-z A-Z !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*$/);
var regJoinDate     =   RegExp(/^(0[1-9]|[12][0-9]|3[01])[\- \/.](?:(0[1-9]|1[012])[\- \/.](19|20)[0-9]{2})$/);
var regHour         =   RegExp(/^\d{1,2}[:][0-5][0-9]$/);
var regPin          =   RegExp(/^[0-9 \s]{6}$/);
var mobileNumber    =   RegExp(/^([0|\+[0-9]{1,5})?([6-9][0-9]{9})$/);


var message         =   {
                            isError:false,
                            messages:[]
                        }

function resetMessage(){
     message        =   {
                            isError:false,
                            messages:[]
                        }
}


function validateName(name) {
    return regName.test(name);
}

function validateUsername(username){
    return regUsername.test(username);
}
function validateNameNum(name) {    
    return regAlphaNum.test(name);
}


function validateEmail(email){
    return regEmail.test(email);
}

function validateNumber(number){
    return regNumber.test(number);
}

function validateIndiaNumber(number){
    return regIndiaPhone.test(number);
}

function onlyIndianMobileNuberBlank(number){
            return mobileNumber.test(number)
            }
function validatePassword(password){
    if(password == '' || password.length < 6){
        return false;
    }
    return true;
}


//admin login form validation
function validateLoginForm(){
    resetMessage();

    var userName = $('.user-name').val();
    var userPass = $('.user-password').val();

    var isValidUserName = validateNameNum(userName);
    var isValidPassword = validatePassword(userPass);

    if(!isValidPassword){
        message.messages.push({class:'err-password',msg:'Invalid Password'});
        message.isError = true;
    }else{
        message.messages.push({class:'err-password',msg:''});   
    }

    if(!isValidUserName){
        message.messages.push({class:'err-username',msg:'Invalid Username'});           
        message.isError = true;
    }else{
        message.messages.push({class:'err-username',msg:''});
    }

    return message;

}



// function for login validation end

function validateCategory(form){
    resetMessage();
    var catName = form.find('.cat-name').val();
    var catNametrim = $.trim(catName);

    if(catNametrim == ''){
        message.messages.push({class:'err-catname',msg:'Please Fill Category Name'});          
        message.isError = true;
    }else{
        message.messages.push({class:'err-catname',msg:''});
    }
    
    return message;
}

// function for Category validation end

function validateFaculty(form){ 
    resetMessage();     
    var fac_img             = form.find('.faculty-image').val();            
    var facultyName         = form.find('.faculty-name').val();
    
    if(facultyName == ''){
        message.messages.push({class:'err-faculty-name',msg:'Please Fill Faculty Name'});           
        message.isError = true;
    }else{
        message.messages.push({class:'err-faculty-name',msg:''});
    }

    if(fac_img == ''){        
        message.messages.push({class:'err-faculty-image',msg:'Please Fill Faculty Image'});         
        message.isError = true;
    }else{
        message.messages.push({class:'err-faculty-image',msg:''});
    }

    return message;
}



// function for faculty validation end

function validateSubject(form){
    resetMessage();
    
    var subjectName = form.find('.sub-name').val();

    var isValidsubjectName = validateName(subjectName);

    if(subjectName == ''){
        message.messages.push({class:'err-subject-name',msg:'Please Fill Subject Name'});           
        message.isError = true;
    }else{
        message.messages.push({class:'err-subject-name',msg:''});
    }
    return message;
}

// function for subject validation end


function validateInstitute(form){
    resetMessage();

    var institutesName = form.find('.institute-name').val();

    var isValidinstitutesName = validateName(institutesName);

    if(institutesName == ''){
        message.messages.push({class:'err-institute-name',msg:'Please Fill Institutes Name'});          
        message.isError = true;
    }else{
        message.messages.push({class:'err-institute-name',msg:''});
    }
    return message;
}

// function for institutes validation end


function validateMode(form){
    resetMessage();

    var modeName = form.find('.mode-name').val();

    var isValidmodeName = validateName(modeName);

    if(modeName == ''){
        message.messages.push({class:'err-mode-name',msg:'Please Fill Mode Name'});         
        message.isError = true;
    }else{
        message.messages.push({class:'err-mode-name',msg:''});
    }
    return message;
}

// function for mode validation end

function validateLanguage(form){
    resetMessage();

    var languageName = form.find('.language-name').val();

    var isValidlanguageName = validateName(languageName);

    if(languageName == ''){
        message.messages.push({class:'err-language-name',msg:'Please Fill Language Name'});         
        message.isError = true;
    }else{
        message.messages.push({class:'err-language-name',msg:''});
    }
    return message;
}

// function for language validation end

function validateImage(){
    $('body').on('change','.uploadedImg',function(e){
        
        var file            = this.files[0];

        var fileType        = file["type"];

        var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];



        if ($.inArray(fileType, ValidImageTypes) > -1) {

             var tmppath    = URL.createObjectURL(e.target.files[0]);

             $(this).parent().find('img').attr('src',tmppath);

        }else{

            showMessage('alert-danger', 'Only Image Allowed');

            $(this).val('');

        }

    })
}


function validateCourse(){
    resetMessage();

    var courseName = $('.course-name').val();

    var isValidcourseName = validateName(courseName);

    if(courseName == ''){
        message.messages.push({class:'err-course-name',msg:'Please Fill Course Name'});         
        message.isError = true;
    }else{
        message.messages.push({class:'err-course-name',msg:''});
    }
    return message;
}


function removeValidated(classObj,msgClass){

   $('body').on('keyup',classObj,function(e){
    if (e.keyCode!=13) {
        $(this).removeClass('parsley-error');
    $(msgClass).text("");    
    }
    
  });            
   }


   function removeValidatedFromtant(classObj,msgClass){

             $('body').on('keyup',classObj,function(e){
              if (e.keyCode!=13) {
                  $(this).removeClass('invalid');
                  $(this).parent().find(msgClass).text('');    
              }
              
            });            
          }

   // all validation function


   function mouseremoveValidated(classObj,msgClass){

   $('body').on('mouseover',classObj,function(e){
    if (e.keyCode!=13) {
        $(this).removeClass('parsley-error');
    $(msgClass).text("");    
    }
    
  });            
   }

   function noBlankData(classObj,msgClass,msgText){
                 var registerNumberVal          =   $.trim($(classObj).val());

              if (registerNumberVal == '') {
                $(classObj).addClass('parsley-error');
                $(msgClass).text(msgText);
                $(classObj).val('');
                return false;
             }else{
                    $(classObj).removeClass('parsley-error');
                    $(msgClass).text('');  
                    return true;
                }
            }

// function for course validation end


function removeAddFrom(classObj,fromClass,errClass,inputClass){

        $('body').on('click',classObj,function(){
            $(fromClass).trigger('reset');
            $(errClass).text("");
            $(inputClass).removeClass('parsley-error')
        })
        }

        function removeUpdateFrom(classObj,errClass,inputClass){

        $('body').on('click',classObj,function(){
            $(errClass).text("");
            $(inputClass).removeClass('parsley-error')
        })
        }


function removeErrorFrom(classObj,errClass,inputClass){

        $('body').on('click',classObj,function(){
            $(errClass).text("");
            $(inputClass).removeClass('parsley-error')
        })
        }


        function changeValidated(classObj,msgClass){

             $('body').on('change',classObj,function(e){
                        $(this).removeClass('parsley-error');
                        $(msgClass).text("");

                 });            

        }


        function OnlyalphabetsBlank(classObj,msgClass,msgText){

                var firstNameVal          =   $.trim($(classObj).val());

                 if (!regName.test(firstNameVal) || firstNameVal == '') {
                    $(classObj).addClass('parsley-error');
                     $(msgClass).text(msgText);
                    return false;  
                 }else{
                    $(classObj).removeClass('parsley-error');
                     $(msgClass).text('');  
                    return true; 
                     
                 }
                }

 function _onlyAlphaReg(nameObj,message){

        var name          =   $.trim($(nameObj).val());


         if ($.trim(name) == '') {

                      nameObj.trigger('focus');
                      nameObj.addClass('border-danger');
                      nameObj.parent().find('.error').text('This field is required');
                      nameObj.parents('.form-group').addClass('has-danger');
                      
             }else if(!regalpha.test(name) ||  name.length < 2 || name.length > 50 ){

                      nameObj.trigger('focus');
                      nameObj.addClass('border-danger');
                      nameObj.parent().find('.error').text(message);
                      nameObj.parents('.form-group').addClass('has-danger');
                      return  false;

            }else{

                      nameObj.parent().find('.error').text('');
                      nameObj.removeClass('border-danger');
                      nameObj.removeClass('border-danger');
                      nameObj.parents('.form-group').removeClass('has-danger')
                      return  true;
            }

    }

     function _blankReg(nameObj,message){

        var name          =   $.trim($(nameObj).val());
         if ($.trim(name) == '') {
                      nameObj.trigger('focus');
                      nameObj.parent().find('.error').text('This field is required');
                      nameObj.parents('.form-group').addClass('has-danger');
                    
                     
             }else{
                      nameObj.parent().find('.error').text('');
                      nameObj.removeClass('border-danger');
                      nameObj.parents('.form-group').removeClass('has-danger')
                      return  true;
            }

    }

    function _emailReg(nameObj,message){

     
            var email          =   $.trim($(nameObj).val());

         if (email == '') {

                      nameObj.trigger('focus');
                      nameObj.parent().find('.error').text('This field is required');
                      nameObj.parents('.form-group').addClass('has-danger').addClass('is_focused');

            }else if(!regEmail.test(email)){

                      nameObj.trigger('focus');
                      nameObj.parent().find('.error').text(message);
                      nameObj.parents('.form-group').addClass('has-danger').addClass('is_focused');
                      return  false;

            }else{

                    nameObj.parent().find('.error').text('');
                    nameObj.parents('.form-group').removeClass('has-danger').removeClass('is_focused');
                    return  true;
            }

    }

     function _indiaMobileReg(nameObj,message){

        var mobile          =   $(nameObj).val();

              

        if (mobile == '') {

                        nameObj.trigger('focus');
                        nameObj.addClass('border-danger');
                        nameObj.parent().find('.error').text('This field is required');
                        nameObj.parents('.form-group').addClass('has-danger');

        }else if(!regindiamobile.test(mobile)){
                        nameObj.trigger('focus');
                        nameObj.addClass('border-danger');
                        nameObj.parent().find('.error').text(message);
                        nameObj.parents('.form-group').addClass('has-danger');
                        return  false;     
        }else{
                      nameObj.parent().find('.error').text('');
                      nameObj.removeClass('border-danger');
                      nameObj.parents('.form-group').removeClass('has-danger')
                      return  true;
        }
    }   

  function alphaNumericVal(classObj,msgClass,msgText){

                var alphaNumVal          =   $.trim($(classObj).val());

                 if (!regAlphaNum.test(alphaNumVal) || alphaNumVal == '') {
                    $(classObj).addClass('parsley-error');
                     $(msgClass).text(msgText);
                    return false;  
                 }else{
                    $(classObj).removeClass('parsley-error');
                     $(msgClass).text('');  
                    return true; 
                     
                 }
                }




 function selectOption(classObj,msgClass,msg){
                
                var selectVal       = $(classObj).val();

                if (selectVal=='') {
                    $(classObj).addClass('parsley-error');
                    $(msgClass).text(msg);
                    return false;  
                }else{
                    $(classObj).removeClass('parsley-error');
                    $(msgClass).text('');  
                    return true; 
                }
            }

 function _selectoptionReg(nameObj,message){

        var select          =   $.trim($(nameObj).val());

        if (select == '') {

                      nameObj.trigger('focus');
                      nameObj.addClass('border-danger');
                      nameObj.parents('.form-group').find('.error').text(message);
                      nameObj.parents('.form-group').addClass('has-danger');
                      return  false;
             }else{
                      nameObj.parents('.form-group').find('.error').text('');
                      nameObj.removeClass('border-danger');
                      nameObj.parents('.form-group').removeClass('has-danger')
                      return  true;
        }
    }

 function onlyNumber(classObj,msgClass,msgText){

             var inputValue          =   $.trim($(classObj).val());

             if (!regCard.test(inputValue) || inputValue == '') {
                $(classObj).addClass('parsley-error');
                 $(msgClass).text(msgText);
                return false;  
               
             }else{
               $(classObj).removeClass('parsley-error');
                 $(msgClass).text('');  
                return true;  
                
             }
        }




 function regHourValidation(classObj,msgClass,msgText){

             var inputValue          =   $.trim($(classObj).val());

             if (!regHour.test(inputValue) || inputValue == '') {
                $(classObj).addClass('parsley-error');
                 $(msgClass).text(msgText);
                return false;  
               
             }else{
               $(classObj).removeClass('parsley-error');
                 $(msgClass).text('');  
                return true;  
                
             }
        }





function alphaspacel(classObj,msgClass,msgText){

             var inputValue          =   $.trim($(classObj).val());

             if (!regnotnumeric.test(inputValue) || inputValue == '') {
                    $(classObj).addClass('parsley-error');
                    $(msgClass).text(msgText);
                    return false;  
               
             }else{
                    $(classObj).removeClass('parsley-error');
                    $(msgClass).text('');  
                    return true;  
                
             }
        }




        function onlyNumberWithBlank(classObj,msgClass,msgText){

             var inputValue          =   $.trim($(classObj).val());

             if (regCard.test(inputValue) || inputValue == '') {
                    $(classObj).removeClass('parsley-error');
                 $(msgClass).text('');  
                return true;  
               
             }else{
                $(classObj).addClass('parsley-error');
                 $(msgClass).text(msgText);
                return false;  
               
                
             }
        }


        function onlyAlpha(classObj,msgClass,msgText){

             var inputValue          =   $.trim($(classObj).val());

             if (!regAlhpa.test(inputValue) || inputValue == '') {
                $(classObj).addClass('parsley-error');
                 $(msgClass).text(msgText);
                return false;  
               
             }else{
               $(classObj).removeClass('parsley-error');
                 $(msgClass).text('');  
                return true;  
                
             }
        }




        function urlValid(classObj,msgClass,msgText){

             var inputValue          =   $.trim($(classObj).val());

             if (!regUrl.test(inputValue) || inputValue == '') {
                $(classObj).addClass('parsley-error');
                 $(msgClass).text(msgText);
                return false;  
               
             }else{
               $(classObj).removeClass('parsley-error');
                 $(msgClass).text('');  
                return true;  
                
             }
        }



        function onlyMobileNuberBlank(classObj,msgClass,msgText){

             var inputValue          =   $.trim($(classObj).val());

             if (!regPhone.test(inputValue) || isNaN(inputValue)) {
                    $(classObj).addClass('parsley-error');
                    $(msgClass).text(msgText);
                    return false;  
             }else{
                    $(classObj).removeClass('parsley-error');
                    $(msgClass).text('');  
                    return true; 
                 
             }
            }



            function noBlankFill(classObj,msgClass,msgText){

                var inputValue          =   $.trim($(classObj).val());

                if (inputValue=='') {
                    $(classObj).addClass('parsley-error');
                    $(msgClass).text(msgText);
                    return false;  
                }else{
                    $(classObj).removeClass('parsley-error');
                    $(msgClass).text('');  
                    return true; 
                }
            }




            function selectOptionSerach(classObj,msgClass,msg){
                
                var selectVal       = $(classObj).val();
                var length          = selectVal.length;


                if (selectVal=='' || length<4) {
                    $(classObj).addClass('parsley-error');
                    $(msgClass).text(msg);
                    return false;  
                    
                }else{
                    $(classObj).removeClass('parsley-error');
                    $(msgClass).text('');  
                    return true; 
                    
                }
            }



    function isCheckedValidation(classObj,msgClass,msg){
        var isChecked               =   $(classObj).is(':checked');
        if (!isChecked) {
                $(classObj).addClass('parsley-error');
                  $(msgClass).text(msg);
                   return false;  
        }else{
            $(classObj).removeClass('parsley-error');
                 $(msgClass).text('');  
                  return true; 
        }
    }



    function dateofBirth(classObj,msgClass,msg){
                var joiningDateVal          =   $(classObj).val();


             if (!regJoinDate.test(joiningDateVal) || joiningDateVal == '') {
                    $(classObj).addClass('parsley-error');
                    $(msgClass).text(msg);
                    
                    return false;  
             }else{
                    $(classObj).removeClass('parsley-error');
                    $(msgClass).text('');  
                    return true; 
             }

            }



             function onlyEmailBlank(classObj,msgClass,msgText){

             var inputValue          =   $.trim($(classObj).val());

             if (!regEmail.test(inputValue) || inputValue == '') {
                    $(classObj).addClass('parsley-error');
                    $(msgClass).text(msgText);
                    return false;  
             }else{
                    $(classObj).removeClass('parsley-error');
                    $(msgClass).text('');  
                    return true; 
                 
             }
            }



        function passwordReg(classObj,msgClass,msgText){

             var inputValue          =   $.trim($(classObj).val());
             var length              =      inputValue.length;

             if (length > 6 || inputValue == '') {
                    $(classObj).addClass('parsley-error');
                    $(msgClass).text(msgText);
                    return false;  
             }else{
                    $(classObj).removeClass('parsley-error');
                    $(msgClass).text('');  
                    return true; 
                 
             }
            }




        function userPassword(classObj,msgClass,msgText) {
            
            var password          =   $.trim($(classObj).val());


            if (password.length < 6 || password == '' || password.length >= 21 ) {
                $(classObj).addClass('parsley-error');
                $(msgClass).text(msgText);
                return false;  
                
            }else{
                    $(classObj).removeClass('parsley-error');
                    $(msgClass).text('');  
                    return true; 
            }

    }



            

//New Call Request form validation
function validateNewCallRequest(){
    resetMessage();

    var des = $('.newcallreqdes').val();
    



    if(des == ''){
        message.messages.push({class:'err-des',msg:'Please Fill Description.'});
        message.isError = true;
    }else{
        message.messages.push({class:'err-des',msg:''});    
    }
    return message;

}

function _onlyNum(nameObj,message){

        var name          =   $.trim($(nameObj).val());


         if ($.trim(name) == '') {

                      nameObj.trigger('focus');
                      nameObj.addClass('border-danger');
                      nameObj.parent().find('.error').text('This field is required');
                      nameObj.parents('.form-group').addClass('has-danger');
                      
             }else if(!regNumber.test(name) ||  name < 1){

                      nameObj.trigger('focus');
                      nameObj.addClass('border-danger');
                      nameObj.parent().find('.error').text(message);
                      nameObj.parents('.form-group').addClass('has-danger');
                      return  false;

            }else{

                      nameObj.parent().find('.error').text('');
                      nameObj.removeClass('border-danger');
                      nameObj.removeClass('border-danger');
                      nameObj.parents('.form-group').removeClass('has-danger')
                      return  true;
            }

    }

    function pincodeVal(nameObj,message){

    // var alphaNumVal          =   $.trim($(classObj).val());
    var name          =   $.trim($(nameObj).val());

    if ($.trim(name) == '') {

        nameObj.trigger('focus');
        nameObj.addClass('border-danger');
        nameObj.parent().find('.error').text('This field is required');
        nameObj.parents('.form-group').addClass('has-danger');
                      
    }else if(!regPin.test(name)) {
        nameObj.trigger('focus');
        nameObj.addClass('border-danger');
        nameObj.parent().find('.error').text(message);
        nameObj.parents('.form-group').addClass('has-danger'); 
    }else{
        nameObj.parent().find('.error').text('');
        nameObj.removeClass('border-danger');
        nameObj.removeClass('border-danger');
        nameObj.parents('.form-group').removeClass('has-danger')
        return  true;
    }
}