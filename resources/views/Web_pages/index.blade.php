@extends('Web_pages.layout.main')
@section('main-container')
    <style>
        #calculate-distance-btn {
            /* /* width: 100px; */
            height: 30px;
            /* //border-radius: 10%; */
            padding: 0;
            font-size: 0.75rem;
            /* Adjust font size as needed */
        }
    </style>

    <div class="site-blocks-cover overlay" id="home" style="background-image: url('{{ asset('images/hero_bg_1.jpg') }}');"
        data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">


                    <h2 class="text-white font-weight-light mb-5 text-uppercase font-weight-bold">
                        UEFARUK LTD INTERNATIONAL CARRIER AND DOMESTIC DELIVERIES</h2>
                    <!-- <p><a href="#" class="btn btn-primary py-3 px-5 text-white">Get Started!</a></p> -->

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center no-gutters align-items-stretch overlap-section">
            <div class="col-md-2">
                <div class="feature-1 pricing h-100 text-center">
                    <div class="icon">
                        <span class="icon-dollar"></span>
                    </div>
                    <h2 class="my-4 heading">Best Prices</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis ipsum odio minima tempora animi
                        iure.</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="free-quote bg-dark h-100">
                    <h2 class="my-4 heading  text-center">CALCULATE YOUR DELIVERY COST</h2>
                    <form method="POST" id="city-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="collection_address">Collection Address</label>
                                    <input required type="text" class="form-control btn-block" id="collection-input"
                                        name="location" placeholder="Tower bridge london">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="delivery_address">Delivery Address</label>
                                    <input required type="text" class="form-control btn-block" id="delivery-input"
                                        name="delivery_address" placeholder="St paul cathedral">
                                </div>
                            </div>
                            <div class="col-md-12" id="distance-result" name="distance-result">
                                {{-- <label style="color:white; text-decoration:italic">
                                    The distance between the addresses is <b> 253 miles</b>
                                </label> --}}
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vehicle">MPG of Vehicle</label>
                                    <!-- <input type="text" class="form-control btn-block" id="delivery_address" name="delivery_address" placeholder="Enter Name"> -->
                                    <select required class="form-control" name="vehicle">
                                        <option selected>Select a vehicle</option>
                                        <option value="49.9">Bettle (49.9m)</option>
                                        <option value="20.0">Cyber Truck (20.0m)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fuel_rate">Fuel</label>
                                    <!-- <input type="text" class="form-control btn-block" id="delivery_address" name="delivery_address" placeholder="Enter Name"> -->
                                    <select required class="form-control" name="fuel_rate">
                                        <option value="" selected disabled>Select fuel rate</option>
                                        <option value="6.7599">Diesel 6.7/gal</option>
                                        <option value="6.3535">Unleaded 6.3/gal</option>
                                        <option value="6.9902">Super Unleaded 6.9/gal</option>
                                        <option value="7.5505">Premium Diesel 7.5/gal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="weight">Delivery weight(KG)</label>
                                    <input type="text" class="form-control btn-block" id="weight" name="weight"
                                        placeholder="49.2 KG">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="delivery_location">Delivery region</label>
                                    <select required class="form-control" name="deliveryRegionCost">
                                        <option value="" selected disabled>Select region</option>
                                        <option value="2.99">london </option>
                                        <option value="7.99">inside M25</option>
                                        <option value="8.99">Outside M25</option>
                                        <option value="82.34">European Delivery</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="oneOffFee">One off fee</label>
                                    <input type="text" readonly class="form-control btn-block" id="oneOffFee"
                                        name="one_off_fee" placeholder="£7.99">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p id="totalCal" name="totalCal"></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary text-white py-2 px-4 btn-block" id="#myModal"
                                value="Calculate Cost">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
                <div class="feature-3 pricing h-100 text-center">
                    <div class="icon">
                        <span class="icon-phone"></span>
                    </div>
                    <h2 class="my-4 heading">24/7 Support</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis ipsum odio minima tempora animi
                        iure.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section" id="about">
        <div class="container">
            <div class="row mb-5">

                <div class="col-md-5 ml-auto mb-5 order-md-2" data-aos="fade">
                    <img src="{{ asset('images/img_1.jpg') }}" alt="Image" class="img-fluid rounded">
                </div>
                <div class="col-md-6 order-md-1" data-aos="fade">
                    <div class="text-left pb-1 border-primary mb-4">
                        <h2 class="text-primary">About Us</h2>
                    </div>
                    <p>Welcome to courier service we can deliver packages from home & business to destinations within Europe
                        and the United Kingdom over 24h a day till they arrive at destination. You are welcome to specify
                        date and time convenient to you. We can arrange full vat receipts also dedicate time to explain our
                        policies please feel free to use website for your own discretion thank you for taking your time to
                        read our manifesto. </p>
                    {{-- <p class="mb-5">Error minus sint nobis dolor laborum architecto, quaerat. Voluptatum porro expedita
                        labore esse velit veniam laborum quo obcaecati similique iusto delectus quasi!</p> --}}

                    <div class="row">
                        <div class="col-md-12 mb-md-5 mb-0 col-lg-6">
                            <div class="unit-4">
                                <div class="unit-4-icon mb-3 mr-4"><span
                                        class="text-primary flaticon-frontal-truck"></span></div>
                                <div>
                                    <h3>Ground Shipping</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis.</p>
                                    <p class="mb-0"><a href="#">Learn More</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-md-5 mb-0 col-lg-6">
                            <div class="unit-4">
                                <div class="unit-4-icon mb-3 mr-4"><span class="text-primary flaticon-travel"></span>
                                </div>
                                <div>
                                    <h3>Air Freight</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis.</p>
                                    <p class="mb-0"><a href="#">Learn More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="site-section" id="wwf">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="mb-0 text-primary">What We Offer</h2>
                    <p class="color-black-opacity-5">Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="unit-4 d-flex">
                        <div class="unit-4-icon mr-4"><span class="text-primary flaticon-travel"></span></div>
                        <div>
                            <h3>Air Freight</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae
                                eligendi at.</p>
                            <p class="mb-0"><a href="#">Learn More</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="unit-4 d-flex">
                        <div class="unit-4-icon mr-4"><span class="text-primary flaticon-sea-ship-with-containers"></span>
                        </div>
                        <div>
                            <h3>Ocean Freight</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae
                                eligendi at.</p>
                            <p class="mb-0"><a href="#">Learn More</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="unit-4 d-flex">
                        <div class="unit-4-icon mr-4"><span class="text-primary flaticon-frontal-truck"></span></div>
                        <div>
                            <h3>Ground Shipping</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae
                                eligendi at.</p>
                            <p class="mb-0"><a href="#">Learn More</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="site-section block-13" id="gallery">
        <!-- <div class="container"></div> -->


        <div class="owl-carousel nonloop-block-13">
            <div>
                <a href="#" class="unit-1 text-center">
                    <img src="{{ asset('images/img_1.jpg') }}" alt="Image" class="img-fluid">
                    {{-- <div class="unit-1-text">
              <h3 class="unit-1-heading">Storage</h3>
              <p class="px-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tempore ullam minus voluptate libero.</p>
            </div> --}}
                </a>
            </div>

            <div>
                <a href="#" class="unit-1 text-center">
                    <img src="{{ asset('images/img_2.jpg') }}" alt="Image" class="img-fluid">
                    {{-- <div class="unit-1-text">
              <h3 class="unit-1-heading">Air Transports</h3>
              <p class="px-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tempore ullam minus voluptate libero.</p>
            </div> --}}
                </a>
            </div>

            <div>
                <a href="#" class="unit-1 text-center">
                    <img src="{{ asset('images/img_3.jpg') }}" alt="Image" class="img-fluid">
                    {{-- <div class="unit-1-text">
              <h3 class="unit-1-heading">Cargo Transports</h3>
              <p class="px-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tempore ullam minus voluptate libero.</p>
            </div> --}}
                </a>
            </div>

            <div>
                <a href="#" class="unit-1 text-center">
                    <img src="{{ asset('images/img_4.jpg') }}" alt="Image" class="img-fluid">
                    {{-- <div class="unit-1-text">
              <h3 class="unit-1-heading">Cargo Ship</h3>
              <p class="px-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tempore ullam minus voluptate libero.</p>
            </div> --}}
                </a>
            </div>

            <div>
                <a href="#" class="unit-1 text-center">
                    <img src="{{ asset('images/img_5.jpg') }}" alt="Image" class="img-fluid">
                    {{-- <div class="unit-1-text">
              <h3 class="unit-1-heading">Ware Housing</h3>
              <p class="px-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tempore ullam minus voluptate libero.</p>
            </div> --}}
                </a>
            </div>

            {{-- <div class="modal-body">
                <h5>Popover in a modal</h5>
                <p>This <a href="#" role="button" class="btn btn-secondary popover-test" title="Popover title"
                        data-content="Popover body content is set in this attribute.">button</a> triggers a popover on
                    click.</p>
                <hr>
                <h5>Tooltips in a modal</h5>
                <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#"
                        class="tooltip-test" title="Tooltip">that link</a> have tooltips on hover.</p>
            </div> --}}
        </div>
    </div>
    {{-- @include('frontend.layout.gellery') --}}
    <div class="site-section bg-light" id="contact">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary">Contact Us</h2>
                    <!-- <p class="color-black-opacity-5">See Our Daily News &amp; Updates</p> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4 mb-3 bg-white">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2477.30990056128!2d-0.07964800000000001!3d51.6175321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761fc097d76953%3A0x327ff174837a2498!2sUEFARUK%20LTD.INT!5e0!3m2!1sen!2sae!4v1707760606617!5m2!1sen!2sae"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="#" class="p-5 bg-white">


                                <div class="row form-group">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="text-black" for="fname">First Name</label>
                                        <input type="text" id="fname" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-black" for="lname">Last Name</label>
                                        <input type="text" id="lname" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="text-black" for="email">Email</label>
                                        <input type="email" id="email" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-md-12">
                                        <label class="text-black" for="subject">Subject</label>
                                        <input type="subject" id="subject" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="text-black" for="message">Message</label>
                                        <textarea name="message" id="message" cols="30" rows="7" class="form-control"
                                            placeholder="Write your notes or questions here..."></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="submit" value="Send Message"
                                            class="btn btn-primary py-2 px-4 text-white">
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-4 mb-3 bg-white">
                                <p class="mb-0 font-weight-bold">Address</p>
                                <p class="mb-4">17 Oakfield Gardens, Edmonton, London, N18 1PR,UK</p>

                                <p class="mb-0 font-weight-bold">For local deliveries within the UK</p>
                                <p class="mb-4"><a href="#">07459 969255</a></p>

                                <p class="mb-0 font-weight-bold">For International Deliveries</p>
                                <p class="mb-4"><a href="#">02045427340</a></p>

                                <p class="mb-0 font-weight-bold">Email Address</p>
                                <p class="mb-0"><a href="#">uefaruk@outlook.com</a></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="p-4 mb-3 bg-white">
                                <h2> Opening Hours: </h2>
                                <p class="mb-0"> <span class="font-weight-bold"> Mon: </span> 9:00 am – 5:00 pm </p>
                                <p class="mb-0"> <span class="font-weight-bold"> Tue: </span> 9:00 am – 5:00 pm </p>
                                <p class="mb-0"> <span class="font-weight-bold"> Wed: </span> Open 24 hours </p>
                                <p class="mb-0"> <span class="font-weight-bold"> Thu: </span> Open 24 hours </p>
                                <p class="mb-0"> <span class="font-weight-bold"> Fri: </span> Open 24 hours </p>
                                <p class="mb-0"> <span class="font-weight-bold"> Sat: </span> 9:00 am – 11:00 pm </p>
                                <p class="mb-0"> <span class="font-weight-bold"> Sun: </span> 9:00 am – 11:00 pm </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add this div for the modal -->
    <div class="modal show fadein fade-in" id="quoteModal" tabindex="-1" role="dialog"
        aria-labelledby="quoteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-center" id="quoteModalLabel">Your Quote Details</h5>
                    <button type="button" class="close text-white" id="close-model" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Quote details will be dynamically inserted here -->
                    <div id="quoteDetails">
                        <!-- Your quote details will be dynamically inserted here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>

                    <button type="submit" class="btn btn-primary text-white" id="submit-request">
                        Submit Request
                        <div class="spinner-border spinner-border-sm d-none" id="submit-request-btn-spinner"
                            role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                    {{-- <button type="button" class="btn btn-primary"  id="quoteModalSubmitButton" data-dismiss="modal">Submit</button> --}}

                    <!-- Additional buttons here if needed -->
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="quoteModalSuccess" tabindex="-1" role="dialog" aria-labelledby="quoteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-center" id="quoteModalLabel">Your Quote Send Successfully</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- Additional buttons here if needed -->
                </div>
            </div>
        </div>
    </div> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRLpEElN2a7VRuc0Y9ffQgioh8JrqftyM&libraries=places">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {



            $('#myModal').on('shown.bs.modal', function() {
                $('#myInput').trigger('focus')
            })

            var collectionInput = document.getElementById('collection-input');
            var deliveryInput = document.getElementById('delivery-input');
            var distanceResult = $('#distance-result');

            // Initialize place autocomplete for collection and delivery input fields
            var autocompleteCollection = new google.maps.places.Autocomplete(collectionInput);
            var autocompleteDelivery = new google.maps.places.Autocomplete(deliveryInput);

            // Function to calculate distance
            function calculateDistance(origin, destination, resultElement) {
                var service = new google.maps.DistanceMatrixService();
                service.getDistanceMatrix({
                        origins: [origin],
                        destinations: [destination],
                        travelMode: 'DRIVING'
                    },
                    function(response, status) {
                        if (status === 'OK') {

                            console.log('GEO=> ', response.rows[0].elements[0]);
                            var distance = response.rows[0].elements[0].distance.value; // Distance in meters
                            var distanceMiles = (distance * 0.000621371).toFixed(
                                2); // Convert km to miles and round to 2 decimal places
                            resultElement.html(' The distance between the addresses is <b> ' + distanceMiles +
                                '</b> miles');
                        } else {
                            resultElement.html('Error: ' + status);
                        }
                    }
                );
            }

            // Event listener for input fields
            autocompleteCollection.addListener('place_changed', function() {
                var place = autocompleteCollection.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }
                calculateDistance(place.formatted_address, deliveryInput.value, distanceResult);
            });

            autocompleteDelivery.addListener('place_changed', function() {
                var place = autocompleteDelivery.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }
                calculateDistance(collectionInput.value, place.formatted_address, distanceResult);
            });
        });

        $(document).ready(function() {

            $('select[name="deliveryRegionCost"]').on('change', function() {

                const oneOffFee = $(this).val();

                $('input[name=one_off_fee]').val(oneOffFee);


            });

            // Function to calculate total cost
            function calculateTotalCost(distanceMiles, vehicleMPG, fuelRate, deliveryRegionCost) {
                // Convert distance from string to float
                console.log('Invalid distance:', distanceMiles);
                // distance =  101.88;

                // // Check if distance is a valid number
                if (isNaN(distanceMiles)) {
                    console.log('Invalid distance:', distanceMiles);
                    return; // Exit function if distance is invalid
                }

                // Check if vehicleMPG is a valid number
                if (isNaN(vehicleMPG)) {
                    console.log('Invalid vehicleMPG:', vehicleMPG);
                    return; // Exit function if vehicleMPG is invalid
                }

                // Check if fuelRate is a valid number
                if (isNaN(fuelRate)) {
                    console.log('Invalid fuelRate:', fuelRate);
                    return; // Exit function if fuelRate is invalid
                }

                // Check if deliveryRegionCost is a valid number
                if (isNaN(deliveryRegionCost)) {
                    console.log('Invalid deliveryRegionCost:', deliveryRegionCost);
                    return; // Exit function if deliveryRegionCost is invalid
                }
                var fuelCost = vehicleMPG * fuelRate;
                console.log('fuelCost: ', fuelCost);

                // Calculate fuel consumption
                var fuelConsumption = distanceMiles / fuelCost;
                console.log('fuel Consumption: ', fuelConsumption);

                // Calculate fuel cost

                // Calculate total cost including delivery region
                var totalCost = fuelConsumption + parseFloat(deliveryRegionCost);
                console.log('fuel totalCost: ', totalCost);

                return totalCost.toFixed(2); // Round to 2 decimal places
            }
            $('#close-model').modal('hide');
            $('#city-form').submit(function(event) {
                event.preventDefault(); // Prevent form submission

                // Retrieve the distance value from the text content
                var distanceText = $('#distance-result').text().trim(); // Get the text content
                console.log('Distance text:', distanceText); // Log distance text
                var distanceArray = distanceText.split(' '); // Split text by space
                console.log('Distance array:', distanceArray); // Log distance array
                var distance = parseFloat(distanceArray[7]); // Extract and parse the distance value
                console.log('Parsed distance:', distance); // Log parsed distance
                var distanceMatches = distanceText.match(/\d+(\.\d+)?/);
                var distance = distanceMatches ? parseFloat(distanceMatches[0]) : NaN;

                // Check if distance is a valid number
                if (isNaN(distance)) {
                    console.log('Invalid distance: GG', distance);
                    return; // Exit function if distance is invalid
                }

                var vehicleMPG = parseFloat($('select[name="vehicle"]').val());
                var fuelRate = parseFloat($('select[name="fuel_rate"]').val());
                var deliveryRegionCost = parseFloat($('select[name="deliveryRegionCost"]').val());
                var collectionCity = $('#collection-input').val();
                var deliveryCity = $('#delivery-input').val();

                // Calculate total cost
                var totalCost = calculateTotalCost(distance, vehicleMPG, fuelRate, deliveryRegionCost);
                console.log('Total cost:', totalCost); // Log total cost

                // Display total cost
                $('#totalCal').text('Total Cost: £' + totalCost);
                // Display total cost
                $('#totalCal').text('Total Cost: £' + totalCost);
                // Prepare quote details HTML
                var quoteDetailsHTML = `
                    <p><span style="font-weight:bold">Collection Address:</span> <label> ${collectionCity}</span></p>
                    <p><span style="font-weight:bold">Delivery Address:</span> <label id="deliveryCity">${deliveryCity}</span></p>
                    <p > <span style="font-weight:bold"> Distance:</span> ${distance} miles</p>
                    <p > <span style="font-weight:bold"> Vehicle MPG:</span> ${vehicleMPG}</p>
                    <p > <span style="font-weight:bold"> Fuel Rate:</span> ${fuelRate}</p>
                    <p > <span style="font-weight:bold"> Delivery Region Cost:</span> ${deliveryRegionCost}</p>
                    <p > <span style="font-weight:bold"> Total Cost:</span> ${totalCost}</p>
                `;

                // Insert quote details HTML into modal body
                $('#quoteDetails').html(quoteDetailsHTML);

                // Show the modal
                $('#quoteModal').modal('show');
            });

        });


        $('#submit-request').on('click', function() {

            var formData = $('#city-form').serialize();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $clickedButtonDom = $(this);

            $.ajax({
                url: '/send-email',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                beforeSend: function() {

                    $clickedButtonDom.addClass('disabled');
                    $('#submit-request-btn-spinner').removeClass('d-none');
                },
                success: function(response) {

                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                    // $clickedButtonDom.removeClass('disabled');
                    // $('#submit-request-btn-spinner').add('d-none');

                    toastr.success('Request submitted successfully.');

                    // setTimeout(() => {
                    //     $('#quoteModal').modal('hide');
                    //     $('#email-alert').addClass('d-none');
                    // }, 3000);
                    // alert("Email sent successfully.");
                },
                error: function(xhr, status, error) {

                    $('#submit-request-btn-spinner').addClass('d-none');
                    $clickedButtonDom.removeClass('disabled');

                    toastr.error('Server error. Unable to submit the request');
                    console.error('Error sending form data:', error);

                }
            });

        });

        document.addEventListener("DOMContentLoaded", function() {
            const navLinks = document.querySelectorAll('header nav ul li a');

            navLinks.forEach(function(navLink) {
                navLink.addEventListener('click', function(event) {
                    event.preventDefault();

                    const targetId = this.getAttribute('href').substring(1);
                    const targetSection = document.getElementById(targetId);

                    if (targetSection) {
                        window.scrollTo({
                            top: targetSection.offsetTop,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });

        // Save Quation
        $(document).ready(function() {
            $('#submit-request').click(function(e) {
                e.preventDefault();

                // Serialize form data
                var formData = $('#city-form').serialize();

                // Send AJAX request
                $.ajax({
                    type: 'POST',
                    url: '/calc_deli_cost',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        $('#quoteModal').modal('hide');
                        // Handle success action, like showing a success message
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText, error);
                        // Handle error action, like showing an error message
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
