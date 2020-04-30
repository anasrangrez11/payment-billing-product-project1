<?php include('Crypto.php');


$result = CallAPI("POST", 'https://obligr.com/admin/plan-data');
$result = json_decode($result,true);
$activePlan = $result['result'] ;
// _dx($result);
?>

<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Buy Bulk SMS - Digital Marketing | Cloud Telephony Company</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="./assets/css/lite-purple.min.css" rel="stylesheet" />
    <link href="./assets/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/toastr.css" />
     <link rel="stylesheet" href="./assets/css/sweetalert2.min.css" />
    <script src="./assets/js/jquery-3.3.1.min.js"></script>

</head>
<style type="text/css">
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.swal2-modal{
    width: 60% !important;
}


.btn-primary {
    color: #fff;
    background-color: #0425E2 !important;
    border-color: #663399;
}
.card{
    background-color: #FFFFFF !important;
}



.btn-block {
    /*display: block;*/
    width: 60% !important;
}

.btn {
    height: 40px  !important;
    line-height: 40px !important;
    border-radius: 6px !important;
}

.dropdown, .dropup {
    position: relative !important;
    top: 26px !important;
}
.per-price{
    position: relative !important;
    top: 30px !important;
}
.back-card {
    background-image: url(https://obligr.com/buysms/obligr_sms_buy.jpg);
    background-repeat: no-repeat !important;
    /*background-size: contain !important;*/
    background-size: 53% 100%;
}
.dropdown-toggle.btn {
        padding-right: 30px !important;
        padding-left: 10px !important;
}

.position-class.show {
    display: -webkit-inline-box;
    margin-top: -20px !important;
    margin-left: -79px !important;
}
.martop-5 {
    margin-top: 3rem;
}
.marleft-5{
    margin-left: 3rem !important;
}
.marright-5 {
    margin-right: 3rem !important;
}
.marleft-3 {
    margin-left: 1rem;
}
  
@media only screen and (max-width: 767px) {
  .back-card {
     background-image: none !important;
    }
    .card-body {
       padding: 0em !important;
    }
    .martop-5 {
        margin-top: 0rem;
    }
    .marleft-5{
        margin-left:10px !important;
    }
    .marright-5 {
        margin-right:10px !important
    }
    .col-md-6.offset-md-6.pad-15 {
        padding-right: 0px;
        padding-left: 0px;
    }
    .dropdown, .dropup {
        position: relative !important;
        top: 0px !important;
    }
    .text-align-center{
        text-align: center;
    }
    .per-price {
        position: relative !important;
        top: 8px !important;
        padding-left: 20px;
    }
    .col-md-6.total-none {
        text-align: -webkit-center;
    }
    .marleft-3 {
        margin-left: auto;
        margin-right:auto;
    }
    .swal2-modal{
        width: 100% !important;
    }

}
</style>


<script>
  window.onload = function() {
    var d = new Date().getTime();      
    document.getElementById("tid").value = d;
  };
  var SITEURL = 'https://obligr.com/admin/'
</script>

<body class="text-left">

    <?php include('header.php')?>

  <div class="col-md-12">
    <div class="card mb-4 martop-5">
        <div class="card-body back-card">
            <div class="col-md-6 offset-md-6 pad-15">
                <div class="card info">
                    <form class="pricing-send" action="https://obligr.com/buysms/ccavRequestHandler.php" method="POST">
                        <div class="row martop-5 marleft-5 marright-5 ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country : </label>
                                    <select class="form-control">
                                        <option>India</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="d-none plan_name"  name="plan_name">
                                    <div class="dropdown marleft-3 text-align-center">
                                      <button class="btn btn-primary dropdown-toggle plan_name-text dropdown-text-type" type="button" id="dropdownMenuButton" plan_id="<?= $activePlan[0]['plan_id']?>" style="text-align: inherit;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?= $activePlan[0]['plan_name']?>
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <?php foreach ($activePlan as $plan ): ?>
                                           <li class="dropdown-item type" style="cursor: pointer" plan_id="<?= $plan['plan_id']?>"><?= $plan['plan_name']?></li>
                                        <?php endforeach ?>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row martop-5 marleft-5 marright-5 ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Total Quantity : </label>
                                    <input type="number" class="form-control no-sms-price"  name="no_of_sms">
                                    <small class="no-sms-error text-danger"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="per-price"><span class="pricepersms">0.25</span> /SMS</div>
                                        <div class="dropdown ml-3">
                                        <input type="text" class="d-none pricetype" name="currency">
                                          <button class="btn btn-primary dropdown-toggle dropdown-text-price-type" type="button" id="dropdownMenuButton1" data-toggle="dropdown" style="text-align: inherit;" aria-haspopup="true" aria-expanded="false">
                                            INR
                                          </button>
                                          <div class="dropdown-menu position-class" aria-labelledby="dropdownMenuButton1" style="transform: translate3d(0px, 40px, 0px) !important;top: -25px; left: -78px;">
                                               <li class="dropdown-item price-type" style="cursor: pointer" value="INR">INR</li>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="row martop-5 marleft-5 marright-5 mb-5">
                            <div class="col-md-6">
                                    <!-- <div class="col-md-12"> -->
                                        <div class="form-group">
                                            <label>Total Amount : </label>
                                            <input type="number" class="form-control ttl-amt pricing-amount" name="subamount" >
                                                <small class="ttl-amt-err text-danger"></small>
                                        </div>
                                            <input type="hidden" class="form-control" name="amount" >
                                    <!-- </div> -->
                                    <!-- /////////////////// strat pricing detail /////////////// -->
                                    <div class="d-none">
                                        <input type="hidden" name="tid" id="tid"/>
                                        <input type="hidden" name="merchant_id" value="221061" />
                                        <input type="hidden" name="order_id" value="123456789" />
                                        <input type="hidden" name="redirect_url" value="https://obligr.com/buysms/ccavResponseHandler.php" />
                                        <input type="hidden" name="cancel_url" value="https://obligr.com/buysms/ccavResponseHandler.php" />
                                        <input type="hidden" name="language" value="EN" />
                                        <input type="hidden" name="username">
                                        <input type="hidden" name="billing_name">
                                        <input type="hidden" name="billing_email">
                                        <input type="hidden" name="billing_tel">
                                        <input type="hidden" name="billing_address">
                                        <input type="hidden" name="billing_zip">
                                        <input type="hidden" name="billing_city">
                                        <input type="hidden" name="billing_state">
                                        <input type="hidden" name="billing_country">
                                        <input type="hidden" name="integration_type" value="iframe_normal">
                                    </div>
                                  
                                    <!-- /////////////////// end pricing detail /////////////// -->
                            </div>
                            <div class="col-md-6 total-none ">
                                <button class="btn btn-primary btn-block btn-rounded  mt-3 btn-click" type="button" data-toggle="modal" data-target="#Pricing-model">BUY</button>
                            </div>
                            <div class="col-md-6 cus-tnone d-none">
                                <a href="">Get Custom Quote</a>
                            </div>
                        </div>
                    </form>
                    <!-- <div class="embed-responsive d-none embed-responsive-16by9">
                      <iframe class="embed-responsive-item" id="paymentFrame" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                    </div> -->
                </div>
            </div>
            
        </div>
    </div>
</div>



    <!-- /////////////////// model start //////////////////////////// -->

    <div class="modal fade" id="Pricing-model" tabindex="-1" role="dialog" aria-labelledby="update_student" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="update_student_title">Authenticate</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <form class="user-detail">
                <div class="modal-body">
                    <input type="hidden" name="billing-amount">
                    <input type="hidden" name="plan_id">
                        <div class="row">
                            <div class="col-md-12">
                                <label>User Name</label>
                                <input type="text" name="username" placeholder="Enter User Name Ex :- wasi" class="form-control" />
                                <span class="user-err text-danger"></span>
                                <div class="singup">
                                    Don’t have a Obligr User Account?<a href="https://obligr.com/signup"> Create New Account</a>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3 form-group">
                                <label>Billing Address</label>
                                <input type="text" name="billing_address" class="form-control">
                                <span class="error text-danger"></span>
                            </div>
                            <div class="col-md-6 mt-3 form-group">
                                <label>Billing Pin</label>
                                <input type="text" name="billing_zip" class="form-control">
                                <span class="error text-danger"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Billing State</label>
                                <input type="text" name="billing_state" class="form-control">
                                <span class="error text-danger"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Billing City</label>
                                <input type="text" name="billing_city" class="form-control">
                                <span class="error text-danger"></span>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-outline-success " type="submit">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- /////////////////////// model end /////////////////////////////////// -->

    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/script.min.js"></script>
    <script src="./assets/js/sidebar.large.script.min.js"></script>
    <script src="./assets/js/sweetalert2.min.js"></script>

    <script src="./assets/js/toastr.min.js"></script>
    <script src="./assets/js/handlebars.js"></script>
    <script src="./assets/js/validation.js"></script>
    <script src="./assets/js/helper_script.js"></script>
    <script src="./assets/js/script.js"></script>
    
    <script type="text/javascript">
/* ///////=======//////////==== global varible start =========////////============/////////////////*/
        var plan_id        =   $('body').find('.dropdown-text-type').attr('plan_id')
        var plan_text      =   $('body').find('.dropdown-text-type').text()
        var minamt         =     ''
        var minqty         =     ''
        var pricetype   =   $('body').find('.dropdown-text-price-type').text()
        $('body').find('.pricetype').val($.trim(pricetype))

        var numsms      =   $('body').find('input[name=no_of_sms]').val(500)


        var planname = $('body').find('.plan_name-text').text()
        $('body').find('.plan_name').val($.trim(planname))

/* ///////=======//////////==== global varible end =========////////============/////////////////*/





        
/* ///////=======//////////==== Plan type start (plan_id)=========////////============/////////////////*/
        




        $('body').on('click','.type',function(){
            $('.dropdown-text-type').text($(this).text())
            plan_text = $(this).text()
            plan_id = $(this).attr('plan_id')
            firstTime(plan_id)
            myfun(minqty,plan_id,'Plan Price')
        })
$('.dropdown-text-type').trigger('click')
$('.dropdown-text-price-type').trigger('click')

// $('body').on('click','.dropdown-text-price-type',function(){
//     $(this).parent().css('position','unset')
//     $(this).parent().css('transform','none')
// })
/* ///////=======//////////==== Plan type end =========////////============/////////////////*/



function firstTime(plan_id) {
     var res = getData(SITEURL+'plan-id','POST',{plan_id:plan_id})
    // console.log(res)
    minamt = res.minamt
    minqty = res.minqty
     $('body').find('input[name=no_of_sms]').val(res.minqty)
}firstTime(plan_id)

// console.log(minamt)
// console.log(minqty)

/* ///////=======//////////==== price type start =========////////============/////////////////*/

        $('body').on('click','.price-type',function(){
            $('.dropdown-text-price-type').text($(this).text())
            pricetype = $(this).text()
            // console.log(pricetype,'wasi')
        })

/* ///////=======//////////==== price type end =========////////============/////////////////*/






/* ///////=======//////////==== amount keyup event start =========////////============/////////////////*/

$('body').on('keyup','.ttl-amt',function(){
    var amt = $(this).val()

    if(validateNumber(amt)){
        if(parseInt(amt) >= parseInt(minamt)){
                var res = getData(SITEURL+'amt-get-qty','POST',{amount:amt,plan_id:plan_id})
                // console.log(res)
                if(res.status == 'ok'){
                                $('body').find('input[name=no_of_sms]').val(res.qty)
                                $('body').find('.pricepersms').text(res.per_sms_price)
                                $('body').find('.ttl-amt-err').text('')
                                
                                $('body').find('.total-none').removeClass('d-none')
                                $('body').find('.cus-tnone').addClass('d-none')
                            }else{
                                $('body').find('input[name=no_of_sms]').val(0)
                                showMsg('danger',res.msg)
                                $('body').find('.total-none').addClass('d-none')
                                $('body').find('.cus-tnone').removeClass('d-none')
                            }
            }else{
                $('body').find('.ttl-amt-err').text('Please enter amount should be greater than '+minamt)
            }
    }else{
        $('body').find('.ttl-amt-err').text('Please enter only number')
    }
})
/* ///////=======//////////==== amount keyup event end =========////////============/////////////////*/





/* ///////=======//////////==== no fo sms amount =========////////============/////////////////*/

        $('body').on('keyup','.no-sms-price',function(){

            if(parseInt($(this).val()) >= parseInt(minqty)){
                $('body').find('.no-sms-error').text('')
                var val = myfun($(this).val(),plan_id,'Plan Price')
                // $('body').find('.total-none').removeClass('d-none')
                // $('body').find('.cus-tnone').addClass('d-none')
            }else{
                $('body').find('.no-sms-error').text('Minimum '+minqty+' limit')
                $('body').find('.total-none').addClass('d-none')
                $('body').find('.cus-tnone').removeClass('d-none')
            }
        })


    function myfun(no_of_sms,itemtype,price){
            // console.log(no_of_sms,itemtype,price)
            var data = getData(SITEURL+'no-of-sms','POST',{
                                                                        no_of_sms:no_of_sms,
                                                                        type:itemtype,
                                                                        pricetype:price
                                                                    })  
            // console.log(data)
            if(data.status == 'ok'){
                $('body').find('.pricepersms').text(data.pricePerSMS)
                // $('body').find('.totalAmount').text(data.totalAmount)
                $('body').find('.pricing-amount').val(data.totalAmount)
                $('body').find('.total-none').removeClass('d-none')
                $('body').find('.cus-tnone').addClass('d-none')
            }else{
                // console.log($('body').find('.total-none'))
                showMsg('danger',data.msg)
                $('body').find('.total-none').addClass('d-none')
                $('body').find('.cus-tnone').removeClass('d-none')
            }
    }myfun(minqty,plan_id,'Plan Price')
/* ///////=======//////////==== no fo sms amount =========////////============/////////////////*/



/* ///////=======//////////==== pincode start on change =========////////============/////////////////*/

        $('body').on('change','input[name=billing_zip]',function(){
            var pincode  = $(this)

            pincode     =   pincodeVal(pincode,'Invalid pincode')
            // console.log(pincode)

            if(pincode){
                var res = getData(SITEURL+'pincode','POST',{pincode:$(this).val()})
                if(res){
                     $('body').find('.user-detail input[name=billing_state]').val(res.statename)
                     $('body').find('.user-detail input[name=billing_city]').val(res.districtname)
                }else{
                     $('body').find('.user-detail input[name=billing_state]').val('')
                     $('body').find('.user-detail input[name=billing_city]').val('')
                }
            }


        })

/* ///////=======//////////==== pincode end on change =========////////============/////////////////*/


/* ///////=======//////////==== model code start =========////////============/////////////////*/
   $('body').on('click','.btn-click',function(){
        console.log($('body').find('input[name=subamount]'))
        var amt     =   $('body').find('input[name=subamount]').val()
        var billingAmt = $('body').find('input[name=billing-amount]').val(amt)
            $('body').find('input[name=plan_id]').val(plan_id)
    })
// showMsg('success','wasi')

        $('body').on('submit','.user-detail',function(e){
            e.preventDefault()
            var formdata  = new FormData(this)
            var persmsprice = $('body').find('.pricepersms').text()
            var numofsms    = $('body').find('.no-sms-price').val()
            var plan_text      =   $('body').find('.dropdown-text-type').text()

            var username = $(this).find('input[name=username]')
            var address  = $(this).find('input[name=billing_address]')
            var state  = $(this).find('input[name=billing_state]')
            var city  = $(this).find('input[name=billing_city]')
            var pincode  = $(this).find('input[name=billing_zip]')

            username       =   _blankReg(username,'');
            pincode     =   pincodeVal(pincode,'Invalid pincode')
            address     =   _blankReg(address,'');
            state       =   _blankReg(state,'');
            city       =   _blankReg(city,'');

            
            if(username&&pincode&&address&&state&&city){
                var res = insertData(SITEURL+'check-user','POST',formdata)
                // console.log(res,'1')
                if(res.status == 'ok'){
                    $('body').find('.singup').addClass('d-none')
                    $('body').find('input[name=username]').val(res.data.username)
                    $('body').find('input[name=billing_name]').val(res.data.name)
                    $('body').find('input[name=billing_tel]').val(res.data.mobile)
                    $('body').find('input[name=billing_email]').val(res.data.email)
                    $('body').find('input[name=billing_address]').val(res.billing_address)
                    $('body').find('input[name=billing_zip]').val(res.billing_zip)
                    $('body').find('input[name=billing_city]').val(res.billing_city)
                    $('body').find('input[name=billing_state]').val(res.billing_state)
                    $('body').find('input[name=billing_country]').val('India')
                    $('body').find('input[name=order_id]').val(res.order_id)
                    $('body').find('input[name=amount]').val(res.grand_total)
                    $(this).trigger('reset')
                    $('#Pricing-model').toggle()
                    $('.modal-backdrop').addClass('d-none')
                    if(Object.keys(res.data).length){
                        // console.log(res,'1')
                        swal({
                          title: 'Invoice',
                          html: `<div class="table-responsive">
                                    <h5><b>INVOICE ID : </b>#${res.order_id}</h5>
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Item Type</th>
                                                <th scope="col">Remark</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-left">
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>${res.credit_type}</td>
                                                <td>${plan_text}</td>
                                                <td>${persmsprice}</td>
                                                <td>${numofsms}</td>
                                                <td>${res.amount}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right"><b>Sub Total</b></td>
                                                <td>${res.amount}/-</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right">Discount (${res.discount_per}%)</td>
                                                <td>${res.discount}/-</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right">GST (${res.gstpercentage}%)</td>
                                                <td>${res.gst}/-</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right">Transaction Charge (2.40%)</td>
                                                <td>${res.trans_charge}/-</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right"><b>Grand Total</b></td>
                                                <td>${res.grand_total}/-</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`,
                          timer: 30000,
                          showCancelButton:true
                        }).then(function (result) {
                            $('body').find('.pricing-send').trigger('submit')
                        },function(res) {
                            deleteTransaction()
                        });
                        var id = res.trans_id
                        function deleteTransaction() {
                            var res = getData(SITEURL+'delete-transaction','POST',{id:id});
                        }
                    }
                }else{
                    showMsg('danger', res.msg)
                    // console.log('ok')
                    $('body').find('.singup').removeClass('d-none')
                }

            }else{
                $('body').find('.user-err').text('Please enter user name')
            }
        })
/* ///////=======//////////==== model code end =========////////============/////////////////*/



    </script>

</body>
</html>