@include('layouts.app')





@include('layouts.header')





<div class="offer-section py-3 resturant-banner">



    <div class="container position-relative">



        <div class="resturant-banner-inner" id="restaurant-pic">



        </div>



    </div>



</div>



<div class="container">



    <div class="pb-3 rounded position-relative text-dark rest-basic-detail">



        <div class="d-flex align-items-start">



            <div class="text-dark">



                <h2 class="font-weight-bold h6" id="vendor_title"></h2>

                <div class="d-flex">



                    <p class="text-dark m-0" id="vendor_address"><span class="fa fa-map-marker "></span></p>

                    <div class="rest-time">

                        <span class="text-dark-50 font-weight-bold m-0 pl-3 time"></span><span

                                class="text-dark m-0 font-weight-bold" id="vendor_open_time1"></span>

                    </div>

                </div>



                <div class="rating-wrap d-flex align-items-center mt-2" id="restaurant_ratings">



                </div>





            </div>



            <div class="feather_icon ml-auto">





                <div class="row fu-review">

                    <a href="javascript:goToRatingAndReviews()" class="text-decoration-none mx-1 p-2 rest-right-btn"><i

                                class="font-weight-bold feather-star view_ratings_review"></i></a>

                    <a class="text-decoration-none mx-1 p-2 rest-right-btn restaurant_location_btn" target="_blank"><i

                                class="font-weight-bold feather-map-pin"></i></a>

                    <a href="{{route('contact_us')}}" class="btn">{{trans('lang.contact')}}</a>

                </div>



            </div>





        </div>



    </div>



</div>





<div class="modal fade" id="book_a_table" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

     aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">{{trans('lang.book_table')}}</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">


            <div class="error" id="field_error1" style="color:red;display:none;"></div>
                <div class="form-group row">



                    <div class="col-6">

                        <label for="date" class="font-weight-bold">{{trans('lang.select_date')}}</label>

                        <input class="form-control event_date" id="date" type="date" value="Select Date">

                        <p>Selected Day of the Week: <span id="dayOfWeek"></span></p>

                    </div>



                    <div class="col-6">

                        <label for="date" class="font-weight-bold">{{trans('lang.how_many_people')}}</label>

                        <select name="total_guest" class="form-control total_guest">

                            <option value="">Select</option>

                            <?php for($i = 1; $i < 26; $i++) {  ?>

                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                            <?php  } ?>



                        </select>



                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-6">

                        <label for="time" class="font-weight-bold">{{trans('lang.select_time')}}</label>

                        <!-- <input class="form-control event_date" id="time" type="time" value="Select Time"> -->
                        <select class="form-control event_date" id="time" value="Select Time">
                            <!-- Time options will be populated here -->
                        </select>

                    </div>

                </div>

                <label for="personal_detail" class="font-weight-bold">{{trans('lang.personal_details')}}</label>

                <div class="form-group row">

                    <div class="col-6">

                        <img alt="Profile Image" class="profile-image" id="user_image">

                    </div>

                    <div class="col-6">

                        <h6 id="user_name"></h6>
                        <span style="display:none;" id="user_fname"></span>
                        <span style="display:none;" id="user_lname"></span>
                        <span style="display:none;" id="user_phone"></span>
                        <span style="display:none;" id="dayofweek"></span>
                        <p id="user_email"></p>

                    </div>

                </div>

                <label for="special_discount" class="font-weight-bold">{{trans('lang.special_discount')}}</label>

                <div class="form-group row">

                    <span  style ="display:none;"  id="special_discount"></span><span id="special_discount_lbl"></span><span style ="display:none;" id="discount_type"></span>
                
                </div>


                <label for="birthday_occasion" class="font-weight-bold">{{trans('lang.special_occasion')}}</label>

                <div class="form-check">

                    <input class="form-check-input" type="radio" value="birthday" name="special_occassion"

                           id="birthday">

                    <label class="form-check-label" for="birthday">

                        {{trans('lang.birthday')}}

                    </label>

                </div>

                <div class="form-check">

                    <input class="form-check-input" type="radio" name="special_occassion" value="anniversary"

                           id="anniversary">

                    <label class="form-check-label" for="anniversary">

                        {{trans('lang.anniversary')}}

                    </label>

                </div>

                <div class="form-check">

                    <input class="form-check-input first_visit" type="checkbox" name="first_visit" value="first_visit"

                           id="first_visit">

                    <label class="form-check-label" for="first_visit">

                        {{trans('lang.is_this_your_first_visit')}}

                    </label>

                </div>



                <div class="form-group row col-12 mt-3">

                    <label for="special_request" class="font-weight-bold">{{trans('lang.additional_request')}}</label>

                    <input class="form-control special_request" id="request" type="text"

                           placeholder="Type your request here">

                </div>



            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('lang.close')}}</button>

                <button type="button" class="btn btn-primary book_table_btn">{{trans('lang.book')}}</button>

            </div>

        </div>

    </div>

</div>



<div class="container position-relative">





    <div class="row">



        <div class="col-md-8 pt-3 restaurant-detail-left">



            <div class="mb-3 overflow-hidden" id="vendor_menu"></div>



            <div class="book-table mb-4">

                <div class="bg-white p-3 border rounded-lg mb-3 table-book-view">

                    <div class="d-flex align-items-center">

                        <div class="media align-items-center">

                            <div class="mr-4 pr-4 border-right"><img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'" src="img/food_delivery.png"></div>

                                <div class="media-body">

                                    <h6 class="mb-1">{{trans('lang.available_food_delivery')}} </h6>

                                    <p class="text-muted mb-0">{{trans('lang.in_30_mins')}}</p>

                                </div>

                        </div>

                        <div class="float-right add-btn ml-auto">

                                <span class="menu-itemimg"><a href="<?php echo '/restaurant/' . $restaurant_id . '/' . $restaurant_slug . '/' . $zone_slug; ?>">

                                    <img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'" src="img/next.png"></a></span>

                        </div>

                    </div>



                </div>

                <div class="bg-white p-3 border rounded-lg mb-3 table-book-view">

                    <div class="d-flex align-items-center">

                        <div class="media align-items-center">

                            <div class="mr-4 pr-4 border-right"><img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'" src="img/book_table.png"></div>

                            <div class="media-body">

                                <h6 class="mb-1">{{trans('lang.book_table')}}</h6>

                                <p class="text-muted mb-0">{{trans('lang.get_instant_confirmation')}}</p></div>

                        </div>

                        <div class="float-right add-btn ml-auto">

                            <?php if(Auth::check()){ ?>

                            <span class="menu-itemimg" id="table_book_btn" type="button" data-toggle="modal"

                                  data-target="#book_a_table"><img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'" src="img/next.png"></span>

                            <?php }else{ ?>

                            <a href="<?php echo route('login'); ?>"><span class="menu-itemimg" type="button"><img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'"

                                            src="img/next.png"></span></a>

                            <?php }  ?>

                        </div>

                    </div>

                </div>





            </div>





            <div class="dyn-menulist mb-4 border-bottom pb-4">

                <div class="pb-2 d-flex align-items-center">

                    <h5 class="mb-0 list-title">{{trans('lang.menus')}}</h5>

                    <button class="view_all_menu_btn btn ml-auto"

                            onclick="showAllMenu()">{{trans('lang.view_all')}}</button>

                </div>

                <div class="offers-coupons row" id="restaurant_menus"></div>

            </div>



            <div class="dyntable-detail mb-4 border-bottom pb-4">

                <ul>

                    <li class="mb-5">

                        <span><img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'" src="img/time.png"></span>

                        <h5 class="mb-2">{{trans('lang.timming')}}</h5>

                        <div class="offers-coupons" id="vendor_open_close_time"></div>

                    </li>

                    <li class="mb-5">

                        <span><img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'" src="img/price.png"></span>

                        <h5 class="mb-2">{{trans('lang.cost')}}</h5>

                        <div class="offers-coupons" id="cost_for_two"></div>

                    </li>

                    <li class="mb-0">

                        <span><img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'" src="img/location-1.png"></span>

                        <h5 class="mb-2">{{trans('lang.location')}}</h5>

                        <div class="offers-coupons" id="vendor_location_div"></div>

                    </li>

                </ul>

            </div>





            <div class="daytab-cousines mb-4 border-bottom pb-4">

                <div class="pb-4 d-flex align-items-center">

                    <h5 class="m-0 list-title">{{trans('lang.cousines')}}</h5>

                </div>

                <ul class="offers-coupons" id="restaurant_causines"></ul>

            </div>





            <div class="mb-3">





                <div class="py-2 mb-3 restaurant-detailed-ratings-and-reviews">



                    <h4 class="font-weight-bold h6 w-100 mb-3">{{trans('lang.ratings_and_reviews')}}</h4>



                    <div id="customers_ratings_and_review"></div>



                    <div class="see_all_review_div" style="display:none">

                        <button class="btn btn-primary btn-block btn-sm see_all_reviews">

                            {{trans('lang.see_all_reviews')}}</button>

                    </div>



                    <p class="no_review_fount" style="display:none">{{trans('lang.no_review_found')}}</p>



                </div>



            </div>



        </div>



        <div class="col-md-4 pt-3 restaurant-detail-right">



            <div class="siddhi-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar"

                 id="cart_list">

                <div class="sidebar-header p-3">

                    <h3 class="font-weight-bold h6 w-100">{{trans('lang.location')}}</h3>

                    <div id="map"></div>

                    <div class="address_restaurant mt-4 mb-3"></div>

                    <a class="restaurant_direction" target="_blank" href=""><img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'"

                                src="img/direction.png"> {{trans('lang.directions')}}</a>



                </div>



            </div>



        </div>



    </div>



</div>



</div>





<input type="hidden" name="restaurant_id" id="restaurant_id" value="<?php echo $_GET['id']; ?>">



<input type="hidden" name="restaurant_name" id="restaurant_name" value="">



<input type="hidden" name="restaurant_location" id="restaurant_location" value="">



<input type="hidden" name="restaurant_image" id="restaurant_image" value="">



<input type="hidden" name="restaurant-pic" id="restaurant-pic" value="">



</div>





@include('layouts.footer')





@include('layouts.nav')





<div class="modal fade" id="extras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">



    <div class="modal-dialog modal-dialog-centered">



        <div class="modal-content">



            <div class="modal-header">



                <h5 class="modal-title">{{trans('lang.extras')}}</h5>



                <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                    <span aria-hidden="true">&times;</span>



                </button>



            </div>



            <div class="modal-body">



                <form>





                    <div class="recepie-body">



                        <div class="custom-control custom-radio border-bottom py-2">



                            <input type="radio" id="customRadio1f" name="location" class="custom-control-input" checked>



                            <label class="custom-control-label" for="customRadio1f">{{trans('lang.tuna')}} <span class="text-muted">+$35.00</span></label>



                        </div>



                        <div class="custom-control custom-radio border-bottom py-2">



                            <input type="radio" id="customRadio2f" name="location" class="custom-control-input">



                            <label class="custom-control-label" for="customRadio2f">{{trans('lang.salmon')}} <span class="text-muted">+$20.00</span></label>



                        </div>



                        <div class="custom-control custom-radio border-bottom py-2">



                            <input type="radio" id="customRadio3f" name="location" class="custom-control-input">



                            <label class="custom-control-label" for="customRadio3f">{{trans('lang.wasabi')}} <span class="text-muted">+$25.00</span></label>



                        </div>



                        <div class="custom-control custom-radio border-bottom py-2">



                            <input type="radio" id="customRadio4f" name="location" class="custom-control-input">



                            <label class="custom-control-label" for="customRadio4f">{{trans('lang.unagi')}} <span class="text-muted">+$10.00</span></label>



                        </div>



                        <div class="custom-control custom-radio border-bottom py-2">



                            <input type="radio" id="customRadio5f" name="location" class="custom-control-input">



                            <label class="custom-control-label" for="customRadio5f">Vegetables <span class="text-muted">+$5.00</span></label>



                        </div>



                        <div class="custom-control custom-radio border-bottom py-2">



                            <input type="radio" id="customRadio6f" name="location" class="custom-control-input">



                            <label class="custom-control-label" for="customRadio6f">Noodles <span class="text-muted">+$30.00</span></label>



                        </div>



                        <h6 class="font-weight-bold mt-4">{{trans('lang.quantity')}}</h6>



                        <div class="d-flex align-items-center">



                            <p class="m-0">



                                {{trans('lang.item')}}



                            </p>



                            <div class="ml-auto">



								<span class="count-number">



									<button type="button" class="btn-sm left dec btn btn-outline-secondary">



										<i class="feather-minus"></i>



									</button>



									<input class="count-number-input" type="text" readonly="" value="1" min="1">



									<button type="button" class="btn-sm right inc btn btn-outline-secondary">



										<i class="feather-plus"></i>



									</button></span>



                            </div>



                        </div>



                    </div>



                </form>



            </div>



            <div class="modal-footer p-0 border-0">



                <div class="col-6 m-0 p-0">



                    <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">



                        {{trans('lang.close')}}



                    </button>



                </div>



                <div class="col-6 m-0 p-0">



                    <button type="button" class="btn btn-primary btn-lg btn-block">



                        {{trans('lang.apply')}}



                    </button>



                </div>



            </div>



        </div>



    </div>



</div>



<!-- GeoFirestore -->



<script src="https://unpkg.com/geofirestore/dist/geofirestore.js"></script>



<script src="https://cdn.firebase.com/libs/geofire/5.0.1/geofire.min.js"></script>



<script type="text/javascript" src="{{asset('vendor/slick/slick.min.js')}}"></script>



<script type="text/javascript">





    var review_pagesize = 4;

    var review_start = null;

    var vendorOpen = false;

    var vendorId = "<?php echo $_GET['id']; ?>";

    var currentCurrency = '';

    var currencyAtRight = false;

    var refCurrency = database.collection('currencies').where('isActive', '==', true);

    if (user_uuid) {

        var userDetailsRef = database.collection('users').where('id', "==", user_uuid);

    }



    refCurrency.get().then(async function (snapshots) {

        var currencyData = snapshots.docs[0].data();

        currentCurrency = currencyData.symbol;

        currencyAtRight = currencyData.symbolAtRight;

        loadcurrency();

    });

    var dineInOrderSubject='';

    var dineInOrderMsg='';

        database.collection('dynamic_notification').where('type','==','dinein_placed').get().then(async function (snapshot) {

        if (snapshot.docs.length > 0) {



            data=snapshot.docs[0].data();

            dineInOrderSubject=data.subject;

            dineInOrderMsg=data.message;

        }

    });



    var vendorCategoriesName = [];

    var uservendorDetailsRef = database.collection('users');

    var vendorDetailsRef = database.collection('vendors').where('id', "==", vendorId);



    var vendorProductsRef = database.collection('vendor_products').where('vendorID', "==", vendorId);



    var vendorRatings = database.collection('foods_review').where('VendorId', "==", vendorId);



    var DeliveryCharge = database.collection('settings').doc('DeliveryCharge');



    var placeholderImageRef = database.collection('settings').doc('placeHolderImage');



    var vendorsRef = database.collection('vendors');



    var popularRestauantRef = database.collection('vendors').where("reviewsSum", ">=", 3);



    var vendorAllProductsRef = database.collection('vendor_products');

    var restaurantLongitude = '';

    var restaurantLatitude = '';

    var placeholderImage = '';

    var placeholder = database.collection('settings').doc('placeHolderImage');



    placeholder.get().then(async function (snapshotsimage) {

        var placeholderImageData = snapshotsimage.data();

        placeholderImage = placeholderImageData.image;

    })

    var diveinEnabledFromAdmin = '';

    var restaurantMenuPhotosOuter = '';

    var refDineinForRestaurant = database.collection('settings').doc("DineinForRestaurant");

    refDineinForRestaurant.get().then(async function (snapshotsDineinForRestaurant) {

        var dineinForRestaurantData = snapshotsDineinForRestaurant.data();

        diveinEnabledFromAdmin = dineinForRestaurantData.isEnabledForCustomer;

    })

    var couponsRef = database.collection('coupons').where('isEnabled', '==', true).where("resturant_id", "==", vendorId).orderBy("expiresAt").startAt(new Date());



    var firestore = firebase.firestore();

    var geoFirestore = new GeoFirestore(firestore);



    var placeholderImageSrc = '';



    placeholderImageRef.get().then(async function (placeholderImageSnapshots) {



        var placeHolderImageData = placeholderImageSnapshots.data();



        placeholderImageSrc = placeHolderImageData.image;



    })

    var fcmToken = '';

    var main_restaurant_id = '<?php echo $_GET['id']; ?>';

    uservendorDetailsRef.where('vendorID', "==", main_restaurant_id).get().then(async function (uservendorSnapshots) {

        if(!uservendorSnapshots.empty){

        var userVendorDetails = uservendorSnapshots.docs[0].data();

        if (userVendorDetails && userVendorDetails.fcmToken) {

            fcmToken = userVendorDetails.fcmToken;



        }



    }

    });





    function loadcurrency() {

        if (currencyAtRight) {

            jQuery('.currency-symbol-left').hide();

            jQuery('.currency-symbol-right').show();

            jQuery('.currency-symbol-right').text(currentCurrency);

        } else {

            jQuery('.currency-symbol-left').show();

            jQuery('.currency-symbol-right').hide();

            jQuery('.currency-symbol-left').text(currentCurrency);

        }

    }

    function getUserDetailsById(user_uuid) {
        if (user_uuid) {
            // Reference to the 'users' collection
            const userDetailsRef = database.collection('users').where('id', "==", user_uuid);

            userDetailsRef.get()
                .then((querySnapshot) => {
                    if (!querySnapshot.empty) {
            
                        const userDetails = querySnapshot.docs[0].data();
                        $("#user_fname").text(userDetails.firstName);
                        $("#user_lname").text(userDetails.lastName);
                        $("#user_name").text(userDetails.firstName + ' ' + userDetails.lastName);
                        $("#user_email").text(userDetails.email); 
                        $("#user_phone").text(userDetails.phoneNumber);
                        if (userDetails.profilePictureURL) {
                            $("#user_image").attr("src", userDetails.profilePictureURL); // Set image source
                        } else {
                            $("#user_image").attr("src", placeholderImageSrc);
                        }
                    } else {
                        console.log("No user found with the provided UUID");
                    }
                })
                .catch((error) => {
                    console.error("Error getting user details: ", error);
                });
        } else {
            console.log("User UUID is required");
        }
}

    $(document).ready(function () {





        getVendorDetails();



        getCusinDetails();



        getUsersReviews(true);



        getRestaurantMap();





    });


    function formatDate(date) {
      const year = date.getFullYear();
      const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Add leading zero for single-digit months
      const day = date.getDate().toString().padStart(2, '0'); // Add leading zero for single-digit days
      return `${year}-${month}-${day}`;
    }

  

     window.onload = function() {

        const today = new Date();
        const sevenDaysLater = new Date(today);
        sevenDaysLater.setDate(today.getDate() + 6);

        // Get the date input field
        const dateInput = document.getElementById('date');
        dateInput.value = formatDate(today);
        // Set the min and max attributes
        dateInput.min = formatDate(today); // Set the minimum date to today
        dateInput.max = formatDate(sevenDaysLater); // Set the maximum date to 7 days from today

        const dayOfWeekDisplay = document.getElementById('dayOfWeek'); // Assuming there's an element to display the day
        dayOfWeekDisplay.textContent = getDayOfDate(today); // Display day of the week for today

        $("#dayofweek").text(dayOfWeekDisplay.textContent);

        const timeSelect = document.getElementById('time');


        var vendorDetailsRef = database.collection('vendors').where('id', "==", main_restaurant_id);
        vendorDetailsRef.get().then(async function (vendorSnapshots) {

            if(!vendorSnapshots.empty){

                var vendorDetails = vendorSnapshots.docs[0].data();

                if (vendorDetails.openDineTime != undefined && vendorDetails.closeDineTime != undefined) {

                    res_opentime = vendorDetails.openDineTime;
                    res_closetime = vendorDetails.closeDineTime;

                    populateTimeSlots(res_opentime, res_closetime);
                }

                
            }
        });

        var res_opentime = '';
        var res_closetime = '';

        getTimeSlotDiscount(dayOfWeekDisplay.textContent);


            dateInput.addEventListener('input', function() {
                const selectedDate = new Date(dateInput.value);
                const dayOfWeek = getDayOfDate(selectedDate);
                dayOfWeekDisplay.textContent = dayOfWeek;
                $("#dayofweek").text(dayOfWeek);
                getTimeSlotDiscount(dayOfWeek);  
            });

            timeSelect.addEventListener('input', function() {
                var dayOfWeek = document.getElementById('dayofweek').innerText;
                getTimeSlotDiscount(dayOfWeek);
            });
            

          

        getUserDetailsById(user_uuid);

        function getTimeSlotDiscount(dayOfWeek){

            vendorDetailsRef.get().then(async function (vendorSnapshots) {

                

                if(!vendorSnapshots.empty){

                    var vendorDetails = vendorSnapshots.docs[0].data();

                    var specialOfferDiscount = 0;
                    var specialOfferVendor = [];

                    if(vendorDetails.hasOwnProperty('specialDiscount')){

                        specialOfferVendor = vendorDetails.specialDiscount;

                        if(specialOfferVendor.length > 0){
                            let discountApplied = false;
                            for(i=0; i< specialOfferVendor.length; i++){
                            
                                if(specialOfferVendor[i]['day'] == dayOfWeek){
                                   
                                    if(specialOfferVendor[i]['timeslot'].length > 0){
                                    
                                        for(j=0; j< specialOfferVendor[i]['timeslot'].length; j++){
                                           
                                            var selected_slot = $("#time").val();
                                           
                                            if(selected_slot >= specialOfferVendor[i]['timeslot'][j]['from'] && selected_slot <= specialOfferVendor[i]['timeslot'][j]['to']){
                                               
                                                if(specialOfferVendor[i]['timeslot'][j]['discount_type'] === 'dinein'){
                                                    var type_sign = '';
                                                    if(specialOfferVendor[i]['timeslot'][j]['type'] === 'percentage'){

                                                        specialOfferDiscount += parseFloat(specialOfferVendor[i]['timeslot'][j]['discount']);                                                      
                                                        type_sign = "%";
                                                        $("#discount_type").text("percentage");

                                                    }else{

                                                        specialOfferDiscount += parseFloat(specialOfferVendor[i]['timeslot'][j]['discount']);   
                                                        type_sign = currentCurrency;
                                                        $("#discount_type").text("amount");
                                                    }
                                                   
                                                    discountApplied = true;
                                                }
                                            }
                                        }
                                    }
                                    if (discountApplied) {
                                        if ($("#special_discount").length) {
                                            $("#special_discount_lbl").text(specialOfferDiscount + type_sign); // Display the discount with the correct type (currency or %)
                                            $("#special_discount").text(specialOfferDiscount); 
                                        }
                                    }
                                    else
                                    {
                                         $("#special_discount_lbl").text(''); // Clear the discount text if no match
                                         $("#special_discount").text(""); 
                                         $("#discount_type").text("");
                                    }
                                }
                            }
                        }else {
                            console.log("No special discounts found.");
                        }
                    }
                }
            });
        }

        function convertTo24HourFormat(timeStr) {
            const [time, modifier] = timeStr.split(' '); // Split the time and AM/PM modifier
            let [hours, minutes] = time.split(':'); // Split hours and minutes

            hours = parseInt(hours);
            if (modifier === 'PM' && hours !== 12) {
                hours += 12; // Convert PM hours to 24-hour format (except for 12 PM)
            } else if (modifier === 'AM' && hours === 12) {
                hours = 0; // Convert 12 AM to 00 hours
            }

            return formatTime(hours, minutes);
        }


        function populateTimeSlots(res_opentime,res_closetime) {

            const [openHour, openMinute] = convertTo24HourFormat(res_opentime).split(':').map(Number);
            const [closeHour, closeMinute] = convertTo24HourFormat(res_closetime).split(':').map(Number);

              // Create Date objects for open and close times
                let startTime = new Date();
                startTime.setHours(openHour, openMinute, 0, 0); // Set start time (open)
                let endTime = new Date();
                endTime.setHours(closeHour, closeMinute, 0, 0); // Set end time (close)

                // Clear any existing options in the time picker
                timeSelect.innerHTML = '';

                if (startTime >= endTime) {
                    console.log('Error: Start time is greater than or equal to end time.');
                    return;
                }

                while (startTime <= endTime) {
                    const timeString = formatTime(startTime.getHours(), startTime.getMinutes());
                    const option = document.createElement('option');
                    option.value = timeString;
                    option.textContent = timeString;
                    timeSelect.appendChild(option);

                    // Increment by 30 minutes
                    startTime.setMinutes(startTime.getMinutes() + 30);
                }

        }

        function formatTime(hour, minute) {
            return `${hour.toString().padStart(2, '0')}:${minute.toString().padStart(2, '0')}`;
        }

        function getDayOfDate(date) {
            const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            return daysOfWeek[date.getDay()]; // Get day of the week (0-6)
        }
        
    } 

   

    async function getVendorDetails() {





        geocollection = geoFirestore.collection('vendors');



        const query = geocollection.near({

            center: new firebase.firestore.GeoPoint(23.3970984, 70.6526456),

            radius: 200

        });



        query.get().then((value) => {





        });





        DeliveryCharge.get().then(async function (deliveryChargeSnapshots) {



            deliveryCharge = deliveryChargeSnapshots.data();



            deliveryCharge = deliveryCharge.amount;



            $("#deliveryChargeMain").val(deliveryCharge);



            $("#deliveryCharge").val(deliveryCharge);



        });



        vendorDetailsRef.get().then(async function (vendorSnapshots) {

            if(!vendorSnapshots.empty){

            var vendorDetails = vendorSnapshots.docs[0].data();



            $("#vendor_title").append(vendorDetails.title);



            $("#restaurant_name").val(vendorDetails.title);



            $("#vendor_address").append(vendorDetails.location);



            $("#restaurant_location").val(vendorDetails.location);



            $("#restaurant_image").val(vendorDetails.photo);

            if (vendorDetails.openDineTime != undefined && vendorDetails.closeDineTime != undefined) {

                $("#vendor_open_time").append(vendorDetails.openDineTime + ' - ' + vendorDetails.closeDineTime);

                $("#vendor_open_close_time").append(vendorDetails.openDineTime + ' - ' + vendorDetails.closeDineTime);

            }

            if (vendorDetails.hasOwnProperty('enabledDiveInFuture') && vendorDetails.enabledDiveInFuture == true && diveinEnabledFromAdmin == true) {

                $("#table_book_btn").show();

            }

            $(".restaurant_location_btn").attr("href", "http://maps.google.com?q=" + vendorDetails.latitude + "," + vendorDetails.longitude);

            if (vendorDetails.hasOwnProperty('reststatus') && vendorDetails.reststatus == true) {

                $("#vendor_shop_status").append("{{trans('lang.open')}}");

                $("#vendor_shop_status").addClass('open');

                vendorOpen = vendorDetails.reststatus;

            } else {

                $("#vendor_shop_status").append("{{trans('lang.closed')}}");

                $("#vendor_shop_status").addClass('close');

            }



            var rating = 0;

            if (vendorDetails.hasOwnProperty('reviewsCount') && vendorDetails.reviewsCount != 0) {

                rating = Math.round(parseFloat(vendorDetails.reviewsSum) / parseInt(vendorDetails.reviewsCount));

            } else {

                rating = 0;

            }







            if (vendorDetails.hasOwnProperty('photo') && vendorDetails.photo != '' && vendorDetails.photo != null) {

                photo = vendorDetails.photo;



            } else {

                photo = placeholderImageSrc;

            }

            $("#restaurant-pic").html('<img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'" alt="#" class="restaurant-pic" id="restaurant-pic" src="' + photo + '">');



            if (vendorDetails.hasOwnProperty('reviewsCount') && vendorDetails.reviewsCount != '') {

                reviewsCount = vendorDetails.reviewsCount;

            } else {

                reviewsCount = 0;

            }



            var html_rating = '<ul class="rating" data-rating="' + rating + '">';

            html_rating = html_rating + '<li class="rating__item"></li>';

            html_rating = html_rating + '<li class="rating__item"></li>';

            html_rating = html_rating + '<li class="rating__item"></li>';

            html_rating = html_rating + '<li class="rating__item"></li>';

            html_rating = html_rating + '<li class="rating__item"></li>';

            html_rating = html_rating + '</ul><p class="label-rating ml-2 small" id="vendor_reviews">(' + reviewsCount + ' Reviews)</p>';



            $("#restaurant_ratings").html(html_rating);





            if ($("#restaurant_place").length) {



                $("#restaurant_name_place").html(vendorDetails.title);



                if (vendorDetails.photo != "" && vendorDetails.photo != null) {



                    $("#restaurant_image_place").attr('src', vendorDetails.photo);



                    setTimeout(function () {

                        $("#restaurant_image_place").show()

                    }, 1000);



                } else {



                    $("#restaurant_image_place").remove();



                }



                $("#restaurant_location_place").html('<i class="feather-map-pin"></i>' + vendorDetails.location);



                $("#restaurant_place").show();



            }



            var menuCardPhotos = "";

            var menuPhotoCount = 0;

            var menuCardPhotos = '';

            restaurantMenuPhotosOuter = vendorDetails.restaurantMenuPhotos;

            if (vendorDetails.hasOwnProperty('restaurantMenuPhotos')) {

                vendorDetails.restaurantMenuPhotos.forEach((photo) => {

                    menuPhotoCount++;

                    if (menuPhotoCount <= 1) {

                        menuCardPhotos = menuCardPhotos + '<div class="col-md-3"><span class="image-item" id="photo_menu' + menuPhotoCount + '"><span class="remove-btn" data-id="' + menuPhotoCount + '" data-img="' + photo + '"><img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'" width="100px" id="" height="auto" src="' + photo + '"></div>';

                    }

                })

            }





            if (menuCardPhotos!= "" && menuCardPhotos!=null) {

                $("#restaurant_menus").html(menuCardPhotos);

            } else {

                $("#photos_menu_card").html('<p>Menu card photos not available.</p>');

            }



            var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

            var currentdate = new Date();

            var currentDay = days[currentdate.getDay()];

            var currentTime = currentdate.getHours()+":"+currentdate.getMinutes();

            specialOfferVendor = [];



            if(vendorDetails.hasOwnProperty('specialDiscount')){



                specialOfferVendor = vendorDetails.specialDiscount;

            }

            var specialOfferDiscount = 0;

            var specialOfferForHour = [];



             if (vendorDetails.hasOwnProperty("restaurantCost")) {



                    if(specialOfferVendor.length != 0){

                        for(i=0; i< specialOfferVendor.length; i++){

                            if(specialOfferVendor[i]['day'] == currentDay){



                                if(specialOfferVendor[i]['timeslot'].length > 0){

                                    for(j=0; j< specialOfferVendor[i]['timeslot'].length; j++){





                                        if(currentTime >= specialOfferVendor[i]['timeslot'][j]['from'] && currentTime <= specialOfferVendor[i]['timeslot'][j]['to']){



                                            specialOfferForHour.push(specialOfferVendor[i]['timeslot'][j]);



                                            if(specialOfferVendor[i]['timeslot'][j]['discount_type'] == 'dinein'){

                                                if(specialOfferVendor[i]['timeslot'][j]['type'] == 'percentage'){

                                                specialOfferDiscount += parseFloat(parseFloat(specialOfferVendor[i]['timeslot'][j]['discount'] * vendorDetails.restaurantCost) / 100);

                                                }else{

                                                    specialOfferDiscount += parseFloat(specialOfferVendor[i]['timeslot'][j]['discount']);



                                                }

                                            }



                                        }

                                    }

                                }





                            }

                        }

                    }



                    if (currencyAtRight) {



                        $("#cost_for_two").append("Cost for two - " + vendorDetails.restaurantCost + "" + currentCurrency + " (Approx) ");

                        if(specialOfferDiscount > 0 && vendorDetails.restaurantCost != ''){

                        $("#cost_for_two").append("<p class='mb-1 text-success'> {{trans('lang.special')}} {{trans('lang.offer')}} {{trans('lang.discount')}} - " + specialOfferDiscount + "" + currentCurrency);



                        }

                    } else {

                        $("#cost_for_two").append("Cost for two - " + currentCurrency + "" + vendorDetails.restaurantCost + " (Approx) ");

                        if(specialOfferDiscount > 0 && vendorDetails.restaurantCost != ''){

                        $("#cost_for_two").append("<p class='mb-1 text-success'> {{trans('lang.special')}} {{trans('lang.offer')}} {{trans('lang.discount')}} - " + currentCurrency + "" + specialOfferDiscount);



                        }

                    }

            } else {

                    $("#cost_for_two").append("Approx cost is not added");

            }



            $(".address_restaurant").append(vendorDetails.location);

            $("#vendor_location_div").append(vendorDetails.location);



            $(".restaurant_direction").attr("href", "https://www.google.com/maps/dir/?api=1&destination=" + vendorDetails.latitude + "," + vendorDetails.longitude);

            async function initializebothMap() {

                await database.collection('settings').doc("googleMapKey").get().then(function (googleMapKeySnapshotsHeader) {

                            var placeholderImageHeaderData = googleMapKeySnapshotsHeader.data();

                            googleMapKey = placeholderImageHeaderData.key;



                            const script = document.createElement('script');

                            if(mapType == 'google'){

                                script.src = "https://maps.googleapis.com/maps/api/js?key=" + googleMapKey + "&libraries=places";

                                script.async = true;

                                script.defer = true;

                                document.head.appendChild(script);

                            }else{

                                script.src = "https://unpkg.com/leaflet/dist/leaflet.js";

                                document.head.appendChild(script);

                            }

                            script.onload = function () {

                                initMap();

                            }

                    });

            }

             function initMap() {



                if(mapType == "google"){

                    const uluru = {lat: vendorDetails.latitude, lng: vendorDetails.longitude};

                    // The map, centered at Uluru

                    const map = new google.maps.Map(document.getElementById("map"), {

                        zoom: 12,

                        center: uluru,

                    });

                    const marker = new google.maps.Marker({

                        position: uluru,

                        map: map,

                    });

                }else{

                    const uluru = [vendorDetails.latitude, vendorDetails.longitude];

                    const map = L.map('map').setView(uluru, 12);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

                        maxZoom: 18,

                        attribution: '© OpenStreetMap contributors'

                    }).addTo(map);

                    const marker = L.marker(uluru).addTo(map);

                }

            }

            initializebothMap();

        }

        })





        let Star5 = Star4 = Star3 = Star2 = Star1 = 0;



        let percent1 = percent2 = percent3 = percent4 = percent5 = 0.0;





        vendorRatings.get().then(async function (vendorRateSnapshots) {





            var reviw_html = '';



            vendorRateSnapshots.docs.forEach((doc) => {



                let vendorRate = doc.data()



                if (vendorRate.rating == 5 || vendorRate.rating == 4.5) {



                    Star5++;



                }



                if (vendorRate.rating == 4 || vendorRate.rating == 3.5) {



                    Star4++;



                }



                if (vendorRate.rating == 3 || vendorRate.rating == 2.5) {



                    Star3++;



                }



                if (vendorRate.rating == 2 || vendorRate.rating == 1.5) {



                    Star2++;



                }



                if (vendorRate.rating == 1 || vendorRate.rating == 0.5) {



                    Star1++;



                }



            });





            let total = Star5 + Star4 + Star3 + Star2 + Star1;





            for (i = 1; i <= 5; ++i) {



                if (i == 1) {



                    percent1 = Star1 * 100 / total;



                    percent1 = percent1.toFixed(2);



                } else if (i == 2) {



                    percent2 = Star2 * 100 / total;



                    percent2 = percent2.toFixed(2);



                } else if (i == 3) {



                    percent3 = Star3 * 100 / total;



                    percent3 = percent3.toFixed(2);



                } else if (i == 4) {



                    percent4 = Star4 * 100 / total;



                    percent4 = percent4.toFixed(2);



                } else if (i == 5) {



                    percent5 = Star5 * 100 / total;



                    percent5 = percent5.toFixed(2);





                }



                for (j = 1; j <= 5; ++j) {



                    if (j <= i) {



                        reviw_html += '<i class="feather-star text-warning"></i>';



                    }



                }



            }





            $("#five_star_percent").attr('aria-valuenow', percent5).attr('style', 'width:' + percent5 + '%');



            $("#for_star_percent").attr('aria-valuenow', percent4).attr('style', 'width:' + percent4 + '%');



            $("#three_star_percent").attr('aria-valuenow', percent3).attr('style', 'width:' + percent3 + '%');



            $("#two_star_percent").attr('aria-valuenow', percent2).attr('style', 'width:' + percent2 + '%');



            $("#one_star_percent").attr('aria-valuenow', percent1).attr('style', 'width:' + percent1 + '%');





            $("#five_star").html(percent5 + ' %');



            $("#for_star").html(percent4 + ' %');



            $("#three_star").html(percent3 + ' %');



            $("#two_star").html(percent2 + ' %');



            $("#one_star").html(percent1 + ' %');



        })



    }



    async function getCusinDetails() {

        var vendorCategories = [];

        vendorProductsRef.get().then(async function (vendorProductsRefSnapshots) {

            vendorProductsRefSnapshots.docs.forEach((doc) => {

                var dataID = doc.data().categoryID;

                if (!vendorCategories.includes(dataID)) {

                    database.collection('vendor_categories').where('id', "==", dataID).get().then(async function (vendorCategoriesSnapshot) {

                        var name = vendorCategoriesSnapshot.docs[0].data().title;

                        $("#restaurant_causines").append("<li><span>" + name + "</span></li>");

                    })

                    vendorCategories.push(dataID);

                }

            });

        })

    }





    $(document).ready(function () {





        $(document).on("click", '.count-number-input-cart', function (event) {





            var id = $(this).attr('data-id');

            var restaurant_id = $(this).attr('data-restaurant');



            var quantity = $('.count_number_' + id).val();

            $.ajax({



                type: 'POST',



                url: "<?php echo route('change-quantity-cart'); ?>",



                data: {_token: '<?php echo csrf_token() ?>', restaurant_id: restaurant_id, id: id, quantity: quantity},



                success: function (data) {



                    data = JSON.parse(data);



                    $('#cart_list').html(data.html);

                    loadcurrency();



                }



            });





        });





        $(document).on("click", '.this_delivery_option', function (event) {



            var delivery_option = $(this).val();



            var deliveryCharge = $("#deliveryChargeMain").val();





            $.ajax({



                type: 'POST',



                url: "<?php echo route('order-delivery-option'); ?>",



                data: {

                    _token: '<?php echo csrf_token() ?>',

                    delivery_option: delivery_option,

                    deliveryCharge: deliveryCharge

                },



                success: function (data) {



                    data = JSON.parse(data);



                    $('#cart_list').html(data.html);

                    loadcurrency();



                }



            });





            return false;





        });





    });





    function getUsersReviews(limit) {



        customerRatingsAndReviews = document.getElementById('customers_ratings_and_review');





        if (limit && review_pagesize) {



            var reviewHTML = '';



            vendorRatings.limit(review_pagesize).get().then(async function (snapshots) {



                review_start = snapshots.docs[snapshots.docs.length - 1];

                if (snapshots.docs.length > 3) {

                    $(".see_all_review_div").show();

                }

                if (snapshots.docs.length == 0) {

                    $(".no_review_fount").show();

                }



                reviewHTML = buildRatingsAndReviewsHTML(snapshots);



                if (reviewHTML != '') {



                    jQuery("#customers_ratings_and_review").append(reviewHTML);



                }



            });



        } else if (review_start) {





            vendorRatings.startAfter(review_start).limit(review_pagesize).get().then(async function (snapshots) {



                review_start = snapshots.docs[snapshots.docs.length - 1];

                reviewHTML = buildRatingsAndReviewsHTML(snapshots);



                if (reviewHTML != '') {



                    jQuery("#customers_ratings_and_review").append(reviewHTML);



                }



            });



        }



    }





    $(".see_all_reviews").click(function () {



        getUsersReviews(false);



    })





    function buildRatingsAndReviewsHTML(reviewsSnapshots) {



        var reviewhtml = '';



        var allreviewdata = [];



        reviewsSnapshots.docs.forEach((listval) => {



            var reviewDatas = listval.data();



            allreviewdata.push(reviewDatas);



        });





        allreviewdata.forEach((listval) => {



            var val = listval;



            var rating = val.rating;



            reviewhtml = reviewhtml + '<div class="reviews-members py-3 border-bottom mb-3"><div class="media">';



            if (val.profile == '' && val.profile == null || val.profile.indexOf('firebasestorage.googleapis.com') == -1) {



                reviewhtml = reviewhtml + '<a href="javascript:void(0);"><img alt="#" src="' + placeholderImageSrc + '" class="mr-3 rounded-pill"></a>';



            } else {

                try {

                    reviewhtml = reviewhtml + '<a href="javascript:void(0);"><img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'" alt="#" src="' + val.profile + '" class="mr-3 rounded-pill"></a>';

                } catch (err) {

                    reviewhtml = reviewhtml + '<a href="javascript:void(0);"><img alt="#" src="' + placeholderImageSrc + '" class="mr-3 rounded-pill"></a>';

                }



            }





            reviewhtml = reviewhtml + '<div class="media-body"><div class="reviews-members-header"><h6 class="mb-0"><a class="text-dark" href="javascript:void(0);">' + val.uname + '</a></h6><div class="star-rating"><div class="d-inline-block" style="font-size: 14px;">';



            if (rating > 1) {



                reviewhtml = reviewhtml + '<i class="feather-star text-warning"></i>';



            } else {



                reviewhtml = reviewhtml + '<i class="feather-star"></i>';



            }



            if (rating > 2 || rating > 1.5) {



                reviewhtml = reviewhtml + '<i class="feather-star text-warning"></i>';



            } else {



                reviewhtml = reviewhtml + '<i class="feather-star"></i>';



            }



            if (rating > 3 || rating > 2.5) {



                reviewhtml = reviewhtml + '<i class="feather-star text-warning"></i>';



            } else {



                reviewhtml = reviewhtml + '<i class="feather-star"></i>';



            }



            if (rating > 4 || rating > 3.5) {



                reviewhtml = reviewhtml + '<i class="feather-star text-warning"></i>';



            } else {



                reviewhtml = reviewhtml + '<i class="feather-star"></i>';



            }



            if (rating > 5 || rating > 4.5) {



                reviewhtml = reviewhtml + '<i class="feather-star text-warning"></i>';



            } else {



                reviewhtml = reviewhtml + '<i class="feather-star"></i>';



            }



            reviewhtml = reviewhtml + '</div></div>';



            reviewhtml = reviewhtml + '</div>';



            reviewhtml = reviewhtml + '</div></div><div class="reviews-members-body w-100 pt-3"><p class="mb-2">' + val.comment + '</p></div></div>';





        });



        return reviewhtml;



    }





    function getMostPopularRestaurantsDetails() {



        var popularRestauranthtml = '';



        popularRestauantRef.limit(15).get().then(async function (popularRestauantSnapshot) {



            most_popular_products = document.getElementById('most_popular_products');



            most_popular_products.innerHTML = '';



            popularRestauranthtml = buildHTMLPopularRestaurant(popularRestauantSnapshot);



            most_popular_products.innerHTML = popularRestauranthtml;



            if ($('.trending-slider').hasClass('slick-initialized')) {



                $('.trending-slider').slick('destroy');



                slicktrendingCarousel();



            }



        })



    }





    function buildHTMLPopularRestaurant(popularRestauantSnapshot) {



        var popularRestaurantHTML = '';



        var allPopulardata = [];



        popularRestauantSnapshot.docs.forEach((listval) => {



            var reviewDatas = listval.data();



            allPopulardata.push(reviewDatas);



        });



        allPopulardata.forEach((listval) => {



            var val = listval;



            var rating = val.rating;



            var vendor_id_single = val.id;



            var view_vendor_details = "/restaurant/" + val.id + "/" + val.restaurant_slug + "/" + val.zone_slug;



            var rating = 0;



            if (val.reviewsSum != 0 && val.reviewsCount != 0) {



                rating = (val.reviewsSum / val.reviewsCount);



                rating = Math.round(rating * 10) / 10;



            }





            popularRestaurantHTML = popularRestaurantHTML + '<div class="siddhi-slider-item"><div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"><div class="list-card-image">';



            popularRestaurantHTML = popularRestaurantHTML + '<div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i>' + rating + ' (' + val.reviewsCount + '+)</span></div>';



            popularRestaurantHTML = popularRestaurantHTML + '<a href="' + view_vendor_details + '"><img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'" alt="#" src="' + val.photo + '" class="img-fluid item-img w-100"></a></div><div class="p-3 position-relative"><div class="list-card-body"><h6 class="mb-1"><a href="' + view_vendor_details + '" class="text-black">' + val.title + '</a></h6><p class="text-gray mb-3"><span class="fa fa-map-marker"></span> ' + val.location + '</p>';



            popularRestaurantHTML = popularRestaurantHTML + '</div>';



            popularRestaurantHTML = popularRestaurantHTML + '</div></div></div>';





        });





        return popularRestaurantHTML;



    }





    function slicktrendingCarousel() {





        $('.trending-slider').slick({



            slidesToShow: 3,



            arrows: true,



            responsive: [{



                breakpoint: 768,



                settings: {



                    arrows: false,



                    centerMode: true,



                    centerPadding: '40px',



                    slidesToShow: 2



                }



            },



                {



                    breakpoint: 650,



                    settings: {



                        arrows: false,



                        centerMode: true,



                        centerPadding: '15px',



                        slidesToShow: 1



                    }



                }



            ]



        });



    }





    async function getRestaurantMap() {





    }



    $(".view_ratings_review").click(function () {

        $('html, body').animate({

            scrollTop: $("#customers_ratings_and_review").offset().top

        }, 2000);

    });



    function buildHTMLCouponList(couponListSnapshot) {

        var html = '';

        var alldata = [];

        couponListSnapshot.docs.forEach((listval) => {

            var datas = listval.data();

            alldata.push(datas);

        });



        alldata.forEach((listval) => {

            var val = listval;

            var date = '';

            var time = '';

            if (val.hasOwnProperty('expiresAt') && val.expiresAt) {

                date = val.expiresAt.toDate().toDateString();

                time = val.expiresAt.toDate().toLocaleTimeString('en-US');

            }



            var price_val = '';



            if (currencyAtRight) {

                if (val.discountType == 'Percent' || val.discountType == 'Percentage') {

                    price_val = val.discount + "%";

                } else {

                    price_val = val.discount + "" + currentCurrency;

                }

            } else {

                if (val.discountType == 'Percent' || val.discountType == 'Percentage') {

                    price_val = val.discount + "%";

                } else {

                    price_val = currentCurrency + "" + val.discount;

                }

            }



            html = html + "<div class='siddhi-slider-item'><div class='list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm'><div class='list-card-image'>";





            if (val.hasOwnProperty('image') && val.image != '' && val.image != null) {

                html = html + "<img onerror='this.onerror=null;this.src=\'" + placeholderImageSrc + '\" alt="#" src="' + val.image + '" class="img-fluid item-img w-100"></a></div><div class="p-3 position-relative"><div class="list-card-body">';

            } else {

                html = html + "<img alt='#' src='" + placeholderImageSrc + "' class='img-fluid item-img w-100'></a></div><div class='p-3 position-relative'><div class='list-card-body'>";

            }





            html = html + '<div class="media-body"><h6 class="date">Expires At: ' + date + ' ' + time + '</h6><div class="offer_coupon_code" ><span class="offercoupan text-gray mb-3 offer_code"><p class="mb-0 badge">' + val.code + '</p><a href="javascript:void(0)" onclick="copyToClipboard(`' + val.code + '`)"><i class="fa fa-copy"></i></a></span></div></div>';



            html = html + '<div class="float-right ml-auto"><span class="price font-weight-bold h4">' + price_val + '</span></div>';





            html = html + "</div></div></div></div>";



        });

        return html;

    }





    function slickcouponCarousel() {



        $('.offers-coupons').slick({

            slidesToShow: 3,

            arrows: true,

            responsive: [{

                breakpoint: 768,

                settings: {

                    arrows: false,

                    centerMode: true,

                    centerPadding: '40px',

                    slidesToShow: 2

                }

            },

                {

                    breakpoint: 650,

                    settings: {

                        arrows: false,

                        centerMode: true,

                        centerPadding: '15px',

                        slidesToShow: 1

                    }

                }

            ]

        });

    }





    function copyToClipboard(text) {

        const elem = document.createElement('textarea');

        elem.value = text;

        document.body.appendChild(elem);

        elem.select();

        document.execCommand('copy');

        document.body.removeChild(elem);

    }



    $(".book_table_btn").click(async function () {

        if (user_uuid == "") {

            window.location.replace("<?php echo route('login');?>");

            return false;

        }

        var occasion = $('input[name="special_occassion"]:checked').val();

        if (occasion == undefined) {

            occasion = "";

        }

        var firstVisit = $('.first_visit').is(':checked');

        var date = new Date($(".event_date").val());

        var time = $("#time").val();

        var totalGuest = $(".total_guest").val();

        var guestFirstName = $("#user_fname").text();

        var guestLastName = $('#user_lname').text();

        var guestEmail = $('#user_email').text();

        var guestPhone = $('#user_phone').text();

        var special_discount = $("#special_discount").text();

        var discount_type = $("#discount_type").text();

        var specialRequest = $(".special_request").val();

        var booked_slot = date + " " + time;

        var id = "<?php echo uniqid();?>";

        var sendnotification = "<?php echo url('/');?>";

        if (user_uuid) {

            var userData = await userDetailsRef.get();

            var userDetails = userData.docs[0].data();

        }

        if(special_discount == null || special_discount == "" ){
            special_discount = 0;
        }

        if(discount_type == null || discount_type == "" ){
            discount_type = "";
        }



        var restaurantData = await vendorDetailsRef.get();

        var restaurantDetails = restaurantData.docs[0].data();

        var createdAt = firebase.firestore.FieldValue.serverTimestamp();

        var vendorID = restaurantDetails.id;

        var fullname = userDetails.firstName + ' ' + userDetails.lastName;

        if(totalGuest==""){
            $("#field_error1").css('display','block');
            $("#field_error1").html("");
            jQuery("#field_error1").html("Please select people."); 
        }
        else if(time==""){
            $("#field_error1").css('display','block');
            $("#field_error1").html("");
            jQuery("#field_error1").html("Please select time."); 
        }
       
        else{
            database.collection('booked_table').doc(id).set({

                'authorID': userDetails.id,

                'author': userDetails,

                'vendor': restaurantDetails,

                'date': date ,

                'totalGuest': totalGuest,

                'guestFirstName':guestFirstName ,

                'guestLastName': guestLastName,

                'guestEmail': guestEmail,

                "guestPhone": guestPhone,

                'discount':special_discount,

                'discountType':discount_type,

                'specialRequest': specialRequest,

                'id': id,

                'firstVisit': firstVisit,

                'occasion': occasion,

                "createdAt": createdAt,

                'vendorID': vendorID,

                'status': 'Order Placed'

                }).then(function (result) {

                    window.location.href = "{{ route('my_dinein') }}";

                });

                $.ajax({

                    method: 'POST',

                    url: '<?php echo route('sendnotification'); ?>',

                    data: {

                        'fcm': fcmToken,

                        'type': 'booktable_request',

                        'authorName': fullname,

                        '_token': '<?php echo csrf_token() ?>',

                        'subject':dineInOrderSubject,

                        'message':dineInOrderMsg

                    }

                    }).done(function (data) {



                }).fail(function (xhr, textStatus, errorThrown) {

                });
           
        }
   
    })
      



    function showAllMenu() {



        var menuPhotoCount = 0;

        var menuCardPhotos = '';

        restaurantMenuPhotosOuter.forEach((photo) => {

            menuPhotoCount++;

            menuCardPhotos = menuCardPhotos + '<div class="col-md-3 menu_space"><span class="image-item" id="photo_menu' + menuPhotoCount + '"><span class="remove-btn" data-id="' + menuPhotoCount + '" data-img="' + photo + '"><img onerror="this.onerror=null;this.src=\'' + placeholderImageSrc + '\'"  width="100px" id="" height="auto" src="' + photo + '"></div>';

        })

        $("#restaurant_menus").html(menuCardPhotos);

    }





</script>



<style>

.profile-image {
    width: 50px;       /* Set the width of the image */
    height: 50px;      /* Set the height of the image */
    border-radius: 50%; /* Make the image circular */
    object-fit: cover;  /* Ensure the image covers the area without distorting */
}

    /* Set the size of the div element that contains the map */

    #map {

        height: 400px;

        /* The height is 400 pixels */

        width: 100%;

        /* The width is the width of the web page */

    }

    .menu_space{

        padding-top: 12px;

    }

</style>

