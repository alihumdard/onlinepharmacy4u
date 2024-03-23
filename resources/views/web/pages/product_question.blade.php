@extends('web.layouts.default')
@section('title', 'product_question')
@section('content')

<style>
            #multi-step-form {
                max-width: 700px;
                margin: 0 auto;
                padding: 20px;
                border-radius: 8px;
                background-color: #fff;
            }
            .card{
                border: none; 
                box-shadow: 2px 2px 10px #b1adad;
            }

            .form-check {
                border: 1px solid #ced4da;
                /* default border color */
                /* margin: 10px; */
                padding: 25px;
                margin-bottom: 10px;
            }

            .text{
                margin: 10px;
                text-align: center;
            }
            .text h2{
                margin-top: 35px;
                margin-bottom: 35px;
            }
            .text p{
                margin-bottom: 30px;
            }
            /* Step Container */
            .step {
                display: none;
            }

            .step.active {
                display: block;
            }

            /* Progress Bar */
            #progress {
                margin-top: 20px;
                font-weight: bold;
            }

            #progress-bar {
                width: 100%;
                background-color: #ddd;
                border-radius: 5px;
                overflow: hidden;
            }

            #progress-bar-fill {
                background-color: #007bff;
                height: 10px;
                width: 0%;
                transition: width 0.3s ease-in-out;
            }

            /* Navigation Buttons */
            #navigation-buttons {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
                margin-bottom: 10px;
            }

            #navigation-buttons button {
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s, transform 0.3s;
            }

            #navigation-buttons button:hover {
                background-color: #0056b3;
                transform: translateY(-2px);
            }

        </style>
  
        <div class="container mb-80">
            <form id="multi-step-form">
                <div class="card mt-150">
                    <div class="card-body">

                        <!-- Step 1: Yes or No -->
                        <div class="step active" id="step1">
                            <div class="text">
                                <h2>Do You Agree To The Following?</h2>
                                <p>
                                    <li>
                                        You agree to our terms and conditions, privacy policy and acceptable use policy
                                        •
                                        You will read the Patient Information Leaflet supplied with your medication •
                                        The
                                        treatment is solely for your own use • You are aware you will be subject to a
                                        soft
                                        check to validate your identity via Onfido • You have answered all the above
                                        questions accurately and truthfully • You understand the prescriber will take
                                        your
                                        answers in good faith and base their prescribing decisions accordingly, and that
                                        incorrect information can be hazardous to your health • You will inform your GP
                                        of
                                        this purchase if appropriate • You give permission to access your NHS Summary
                                        Care
                                        Record by our responsible pharmacist in order to identify you correctly, check
                                        your
                                        medical history and provide the best possible care.
                                    </li>
                                </p>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="proceed" value="yes" id="yes">
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="proceed" value="no" id="no">
                                <label class="form-check-label" for="no">No</label>
                            </div>
                            <p id="proceed-text" style="display: none; color: #1f0661;"><b>Please proceed. </b></p>
                        </div>

                        <!-- step 2 -->
                        <div class="step" id="step2">

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="proceed" value="yes">
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="proceed" value="no">
                                <label class="form-check-label" for="no">No</label>
                            </div>
                        </div>
                        <!-- Step 3: Image Upload -->
                        <div class="step" id="step3">
                            <label>Upload Image:</label><br>
                            <input type="file" name="image">
                        </div>

                        <!-- Step 4: Textarea -->
                        <div class="step" id="step4">
                            <label>Write something:</label><br>
                            <textarea class="form-control" id="booking_instruction"
                                name="booking_instruction"></textarea>
                        </div>
                         <!-- Step 5: input field -->
                         <div class="step" id="step5">
                            <label class="m-3">Enter height and weight</label><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Weight">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Height">
                                </div>
                            </div>
                        </div>
                        <!-- Progress -->
                        <div id="progress" class="d-none">Progress:
                            <div id="progress-bar">
                                <div id="progress-bar-fill"></div>
                            </div>
                            <span id="progress-percent">0%</span>
                        </div>

                        <!-- Navigation Buttons -->
                        <div id="navigation-buttons">
                            <button type="button" onclick="prevStep()" style="display: none;">Back</button>
                            <button type="button" onclick="nextStep()">Next</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script>
            let currentStep = 1;
            const totalSteps = document.querySelectorAll('.step').length;
            const navigationButtons = document.getElementById('navigation-buttons');

            function nextStep() {
                if (currentStep === 1 && document.querySelector('input[name="proceed"]:checked').value === "no") {
                    document.getElementById("proceed-text").style.display = "block";
                    return;
                }
                document.getElementById(`step${currentStep}`).classList.remove('active');
                currentStep++;
                document.getElementById(`step${currentStep}`).classList.add('active');
                updateProgress();
                toggleButtons();
            }

            function prevStep() {
                document.getElementById(`step${currentStep}`).classList.remove('active');
                currentStep--;
                document.getElementById(`step${currentStep}`).classList.add('active');
                updateProgress();
                toggleButtons();
            }

            function toggleButtons() {
                const backButton = document.querySelector('#navigation-buttons button:first-child');
                const nextButton = document.querySelector('#navigation-buttons button:last-child');

                backButton.style.display = currentStep === 1 ? 'none' : 'block';
                nextButton.textContent = currentStep === totalSteps ? 'Submit' : 'Next';
            }

            function updateProgress() {
                const progressPercent = Math.ceil((currentStep / totalSteps) * 100);
                document.getElementById("progress-bar-fill").style.width = `${progressPercent}%`;
                document.getElementById("progress-percent").textContent = `${progressPercent}%`;
            }
        </script>
    </body>

</html>


@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce