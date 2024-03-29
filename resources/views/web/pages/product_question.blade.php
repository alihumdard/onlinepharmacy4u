@extends('web.layouts.default')
@section('title', 'Product Questions')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
    button {
        background: #db8181;
        /* border: none; */
        margin-left: 5px;
        border: 1px solid #9e9a9a !important;
    }

    .green-active-button {
        background-color: #00c4a3;
        color: white;
        border-radius: 15px;
    }

    .green-active-button:hover {
        background-color: #00c4a3;
        color: white;
        border-radius: 15px;
    }

    .blue-active-button {
        background-color: #3c7ce7;
        color: white;
        border-radius: 15px;
    }

    .blue-active-button:hover {
        background-color: #3c7ce7;
        color: white;
        border-radius: 15px;
    }


    input[type="text"] {
        border: 1px solid #ccc;
        border-radius: 3px;
        padding: 5px;
        width: 60px;
    }

    .text h2 {
        font-weight: bold;
        /* font-size: 15px; */
    }

    .text p {
        /* font-weight: bold; */
        font-size: 20px;
        font-weight: 300;
    }

    .form-group {
        background-color: #e9f1ff;
        margin-bottom: 20px;
        padding-right: 10px;
        padding-left: 15px;
        border-radius: 10px;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    /* col-md-5 */
    .trackcompleted h1 {
        color: #fff;
        margin: 10px;
    }

    .trackcompleted li {
        /* color: #fff; */
        margin-top: 52px;
    }

    .trackcompleted p {
        margin: 10px;
        margin-top: 10px;
        color: #fff;
    }

    .trackcompleted span {
        font-weight: 600;
        text-align: center;
    }

    .firstconsultationcontinue button:hover {
        background-color: #00c4a3;
        color: #fff;
    }

    .secondconsultationcontinue button:hover {
        background-color: #00c4a3;
        color: #fff;
    }

    .createaccount button:hover {
        background-color: #00c4a3;
        color: #fff;
    }

    .productcategory button:hover {
        background-color: #00c4a3;
        color: #fff;
    }

    /* thank function style  */
    .wrapper-1 {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .wrapper-2 {
        padding: 30px;
        text-align: center;
    }

    .wrapper-2 .text-thank {
        font-family: 'Kaushan Script', cursive;
        font-size: 4em;
        letter-spacing: 3px;
        color: #5892FF;
        margin: 0;
        margin-bottom: 20px;
    }

    .wrapper-2 p {
        margin: 0;
        font-size: 1.3em;
        color: #aaa;
        font-family: 'Source Sans Pro', sans-serif;
        letter-spacing: 1px;
    }

    .go-home {
        color: #fff;
        background: #5892FF;
        border: none;
        padding: 10px 50px;
        margin: 30px 0;
        border-radius: 30px;
        text-transform: capitalize;
        box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
    }

    .footer-like {
        margin-top: auto;
        background: #D7E6FE;
        padding: 6px;
        text-align: center;
    }

    .footer-like p {
        margin: 0;
        padding: 4px;
        color: #5892FF;
        font-family: 'Source Sans Pro', sans-serif;
        letter-spacing: 1px;
    }

    .footer-like p a {
        text-decoration: none;
        color: #5892FF;
        font-weight: 600;
    }

    @media (min-width:360px) {
        .text-thank {
            font-size: 4.5em;
        }

        .go-home {
            margin-bottom: 20px;
        }
    }

    @media (min-width:600px) {
        .content {
            max-width: 1000px;
            margin: 0 auto;
        }

        .wrapper-1 {
            height: initial;
            max-width: 620px;
            margin: 0 auto;
            margin-top: 50px;
            box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
        }

    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">

            <div class="firstconsultationstart">
                <div class="text">
                    <h2>General Health Questions</h2>
                    <p>The information you provide us is treated with the utmost confidentiality and will be
                        reviewed by a GPhC
                        registered independent prescriber. The questions listed are to provide the prescriber
                        with
                        an appropriate
                        level of information to make an informed decision on whether the treatment is suitable
                        or
                        not.</p>
                </div>
                <form action="#">
                    <div class="form-group q1">
                        <div class="d-flex align-items-center ">
                            <p class="me-auto">Are you registered with a GP practice in the UK?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>

                        </div>
                        <div class="d-flex flex-column align-items-center d-none shahroz">
                            <p class="m-2">Why are you not registered with a GP practice?</p>
                            <textarea class="form-control" name="textarea" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group q2">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Do you give us consent to write to your GP to share information
                                of
                                the supply &
                                information we hold about you? (Please note that certain medication will require
                                us
                                to share this
                                information if you choose NO your medication could get rejected)</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                        <div class="d-flex flex-column align-items-center d-none shahroz">
                            <p class="m-2">Please enter the name of your GP practice.</p>
                            <textarea class="form-control" name="textarea" rows="5"></textarea>
                            <p class="mt-2 mb-2">Can't find your GP practice? <button class="text-white p-2" style=" border-radius: 5px;">Enter address manually</button></p>
                        </div>
                    </div>
                    <!-- Other form groups here -->

                    <div class="form-group" id="q3">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Do you believe you have the capacity to make decisions about your
                                own
                                healthcare?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                    </div>
                    <div class="form-group q4">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Have you been diagnosed with any medical conditions?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                        <div class="d-flex flex-column align-items-center d-none shahroz">
                            <p class="m-2">Please provide more information, including diagnosis, symptoms and
                                treatment.</p>
                            <textarea class="form-control" name="textarea" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group q5" id="q5">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Have you ever been diagnosed with a mental health condition?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                        <div class="d-flex flex-column align-items-center d-none shahroz">
                            <p class="m-2">Please provide more information, including diagnosis, symptoms and
                                treatment.</p>
                            <textarea class="form-control" name="textarea" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group q6" id="q6">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Are you currently taking any medication? This includes
                                prescription-only, over-the-counter and homeopathic medicines.</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                        <div class="d-flex flex-column align-items-center d-none shahroz">
                            <p class="m-2">Which medication, what strength and how often are you taking it?</p>
                            <textarea class="form-control" name="textarea" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group q7" id="q7">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Do you suffer from any allergies?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                        <div class="d-flex flex-column align-items-center d-none shahroz">
                            <p class="m-2">What allergies do you have and what are the symptoms you experience
                                from
                                an allergic reaction?</p>
                            <textarea class="form-control" name="textarea" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group q8" id="q8">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Is there anything else you would like to include for the
                                prescriber?
                            </p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                        <div class="d-flex flex-column align-items-center d-none shahroz">
                            <p class="m-2">Please provide further information:</p>
                            <textarea class="form-control" name="textarea" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group" id="q9">
                        <div class="d-flex flex-column align-items-end">
                            <p class="me-auto">What is your height?</p>
                            <div class="d-flex justify-content-end" style="line-height: 0;">
                                <p class="me-2 align-self-end">Feet</p> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                <p class="me-2 align-self-end">Inches</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-end mb-2">
                                <input type="text" class="me-2" placeholder="6">
                                <input type="text" placeholder="6">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="q10">
                        <div class="d-flex flex-column align-items-end" style="line-height: 0;">
                            <p class="me-auto">What is your weight?</p>
                            <div class="d-flex justify-content-end">
                                <p class="me-2 align-self-end">stone</p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <p class="me-2 align-self-end">pounds</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-end mb-2">
                                <input type="text" class="me-2" placeholder="6">
                                <input type="text" placeholder="6">
                            </div>
                        </div>
                    </div>
                    <div class="form-group q11" id="q11">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Full Name (Legal Name):</p>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <input class="form-control" name="name" rows="5"></input>
                        </div>
                    </div>
                    <div class="form-group q12" id="q12">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Date of Birth (DD/MM/YYYY):
                            </p>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <input class="form-control" name="text" rows="5"></input>
                        </div>
                    </div>
                    <div class="d-flex align-items-center m-3 mb-5 firstconsultationcontinue">
                        <button type="button" class="btn btn-lg ">Continue consultation</button>
                    </div>
                </form>
            </div>

            <div class=" d-none secondConsultationStart">
                <div class="text">
                    <h2>Condition Specific Questions</h2>
                    <p>The information you provide us is treated with the utmost confidentiality and will be
                        reviewed by a GPhC registered independent prescriber. The questions listed are to
                        provide the prescriber with an appropriate level of information to make an informed
                        decision on whether the treatment is suitable or not.</p>
                </div>
                <form action="#">

                    <div class="form-group q2">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Do you suffer from any heart, liver or kidney problems?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                        <div class="d-flex flex-column align-items-center d-none shahroz">
                            <p class="m-2">Please provide further details</p>
                            <textarea class="form-control" name="textarea" rows="5"></textarea>

                        </div>
                    </div>
                    <!-- Other form groups here -->

                    <div class="form-group q3" id="q3">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Have you ever had a heart attack or stroke?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                        <div class="d-flex flex-column align-items-center d-none shahroz">
                            <p class="m-2">When was this? (month/year)</p>
                            <textarea class="form-control" name="textarea" rows="5"></textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Do you suffer from low blood pressure (below 90-50) or experience
                                faints or collapsing because of it?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Can you always get an erection when you want?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Has your GP ever advised you that you are not fit enough for any
                                physical or sexual activity?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>

                    </div>
                    <div class="form-group q7" id="q7">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Do you suffer from any condition affecting the shape of your
                                penis?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                        <div class="d-flex flex-column align-items-center d-none shahroz">
                            <p class="m-2">Please provide more information about your condition.</p>
                            <textarea class="form-control" name="textarea" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group" id="q8">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Have you ever experienced an erection lasting longer than 4
                                hours?
                            </p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>

                    </div>
                    <div class="form-group" id="q9">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Do you suffer from any eye conditions such as non-arteritic
                                ischaemic optic neuropathy, retinal problems or retinitis pigmentosa?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                    </div>
                    <div class="form-group" id="q10">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Do you suffer from stomach-duodenal ulcers or blood conditions
                                such as sickle cell, haemophilia or bleeding disorders?
                            </p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>

                    </div>
                    <div class="form-group" id="q11">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Do you suffer from diabetes?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                    </div>
                    <div class="form-group q12" id="q12">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Have you tried any erectile dysfunction medication before?</p>
                            <button type="button" class="btn btn-lg yesButton">Yes</button>
                            <button type="button" class="btn btn-lg noButton">No</button>
                        </div>
                        <div class="d-flex flex-column align-items-center d-none shahroz">
                            <p class="m-2">When was this? (month/year)</p>
                            <textarea class="form-control" name="textarea" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group" id="q13">
                        <div class="d-flex flex-column align-items-center">
                            <p class="me-auto">Do you agree to the following?</p>
                            <ul>
                                <li>You agree to our terms and conditions, privacy policy and acceptable use
                                    policy</li>
                                <li>You will read the Patient Information Leaflet supplied with your medication
                                </li>
                                <li>The treatment is solely for your own use</li>
                                <li>You are aware you will be subject to a soft check to validate your identity
                                    via Onfido</li>
                                <li>You have answered all the above questions accurately and truthfully</li>
                                <li>You understand the prescriber will take your answers in good faith and base
                                    their prescribing decisions accordingly, and that incorrect information can
                                    be hazardous to your health</li>
                                <li>You will inform your GP of this purchase if appropriate</li>
                                <li>You give permission to access your NHS Summary Care Record by our
                                    responsible pharmacist in order to identify you correctly, check your
                                    medical history and provide the best possible care</li>
                            </ul>
                            <div class="d-flex flex-row align-items-end">
                                <button type="button" class="btn btn-lg yesButton">Yes</button>
                                <button type="button" class="btn btn-lg noButton">No</button>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex align-items-center m-3 mb-5 secondconsultationcontinue">
                        <button type="button" class="btn btn-lg back">Back</button>
                        <button type="button" class="btn btn-lg next">Continue consultation</button>
                    </div>
                </form>
            </div>

            <div class="  d-none thirdaccountcreate">
                <div class="text">
                    <h2>Account Creation</h2>
                    <p>Already registered? <button>Login here</button></p>
                    <p>Issuing a prescription requires your full name and date of birth as it appears on your
                        ID.</p>
                </div>
                <form action="#">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <p class="">First Name</p>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <input class="form-control" name="name" rows="5"></input>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <p class="">last Name</p>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <input class="form-control" name="name" rows="5"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <p>Gender</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-lg yesButton">Male</button>
                                    <button type="button" class="btn btn-lg noButton">Female</button>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <p>Date of Birth (eg: 25 01 1985)</p>
                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <input class="form-control" name="name" rows="5" placeholder="DD"></input>
                                    <span>&nbsp;</span> <!-- Add space -->
                                    <input class="form-control" name="name" rows="5" placeholder="MM"></input>
                                    <span>&nbsp;</span> <!-- Add space -->
                                    <input class="form-control" name="name" rows="5" placeholder="YYYY"></input>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="q12">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Mobile number
                            </p>
                        </div>
                        <div class="d-flex align-items-center">
                            <input class="form-control" name="text" rows="5"></input>
                        </div>
                    </div>
                    <div class="form-group" id="q12">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Email address
                            </p>
                        </div>
                        <div class="d-flex align-items-center">
                            <input class="form-control" name="text" rows="5"></input>
                        </div>
                    </div>
                    <div class="form-group" id="q12">
                        <div class="d-flex align-items-center">
                            <p class="me-auto">Password
                            </p>
                        </div>
                        <div class="d-flex align-items-center">
                            <input class="form-control" name="text" rows="5"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="d-flex ">
                            <p>
                                <input type="checkbox"> I agree to the Terms & Conditions , Privacy Policy , and
                                Acceptable Use Policy
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center m-3 mb-5 createaccount">
                        <button type="button" class="btn btn-lg back">Back</button>
                        <button type="button" class="btn btn-lg next">Create Account</button>
                    </div>
                </form>
            </div>

            <div class="d-none fourthproductcategory">
                <div class="text">
                    <h1>Choose a treatment</h1>
                </div>
                <div class="d-flex align-items-center m-3 mb-5 productcategory">
                    <button type="button" class="btn btn-lg back">Back</button>
                    <button type="button" class="btn btn-lg next">Next</button>
                </div>
            </div>

            <div class="d-none fifththanks">
                <div class=content>
                    <div class="wrapper-1">
                        <div class="wrapper-2">
                            <h1 class="text-thank">Thank you !</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam earum molestiae natus architecto! Nam, eaque. </p>
                            <button class="go-home">
                                go home
                            </button>
                        </div>
                        <div class="footer-like">
                            <p>Email not received?
                                <a href="#">Click here to send again</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- second div  -->
        <div class="col-md-4 bg-info mb-5">
            <div class="trackcompleted">
                <div class="text">
                    <h1>How it works</h1>
                    <hr>
                </div>
                <div class="q1complete">
                    <div class="mt-5" style="width: 30px; height: 30px; background: #00c4a3; color: #fff; text-align: center; border-radius: 10px; ">
                        &#49;</div> <span>Complete a consultation</span>
                    <p>You will need to begin by completing an ailment-based consultation. This will be a set of
                        questions related to your symptoms, medical history and any other information our
                        prescribers might need to be able to recommend a suitable treatment.</p>
                </div>
                <div class="q2complete">
                    <div class="mt-5" style="width: 30px; height: 30px; background: #00c4a3; color: #fff; text-align: center; border-radius: 10px; ">
                        &#50;</div> <span>Browse treatments</span>
                    <p>Explore our wide range of medications, diagnostic tools and over the counter treatments
                        to learn more about how they work, what they are used for and how much they cost.</p>
                </div>
                <div class="q3complete">
                    <div class="mt-5" style="width: 30px; height: 30px; background: #00c4a3; color: #fff; text-align: center; border-radius: 10px; ">
                        &#51;</div> <span>Wait for a prescriber to review your request</span>
                    <p>You can either wait on our website or you can leave the page and wait for a notification
                        from us to let you know that a prescriber has finished reviewing your consultation.</p>
                </div>
                <div class="q4complete">
                    <div class="mt-5" style="width: 30px; height: 30px; background: #00c4a3; color: #fff; text-align: center; border-radius: 10px; ">
                        &#52;</div> <span>Purchase treatment</span>
                    <p>From our selection of available prescription-only and over-the-counter products, the
                        prescriber will let you know which ones they have approved for your condition. From
                        here, you can select your chosen option and continue to payment to complete your order.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@pushOnce('scripts')
<script>
    $(document).ready(function() {
        const $yesButtons = $('.yesButton');
        const $noButtons = $('.noButton');
        const $firstConsultationContinueButton = $('.firstconsultationcontinue button');
        const $secondConsultationContinueButton = $('.secondconsultationcontinue button');
        const $createAccountButton = $('.createaccount .next');
        const $productcategorybutton = $('.productcategory .next');

        const $backButtons = $('.back');
        const $firstConsultationStart = $('.firstconsultationstart');
        const $secondConsultationStart = $('.secondConsultationStart'); // Corrected typo
        const $thirdAccountCreate = $('.thirdaccountcreate');
        const $fourthcategory = $('.fourthproductcategory');
        const $fifththanks = $('.fifththanks'); // Added fifth step

        function handleClick(event) {
            const $button = $(event.target);
            const $formGroup = $button.closest('.form-group');
            const $shahroz = $formGroup.find('.shahroz');

            if ($formGroup.hasClass('q1') || $formGroup.hasClass('q2') || $formGroup.hasClass('q3') || $formGroup.hasClass('q4') || $formGroup.hasClass('q5') || $formGroup.hasClass('q6') || $formGroup.hasClass('q7') || $formGroup.hasClass('q8') || $formGroup.hasClass('q12')) {
                // Show or hide textarea based on button clicked
                $shahroz.toggleClass('d-none', !$button.hasClass('yesButton'));
            }

            // Add or remove button color classes
            $formGroup.find('button').removeClass('green-active-button blue-active-button');
            $button.addClass($button.hasClass('yesButton') ? 'green-active-button' : 'blue-active-button');
        }

        $yesButtons.on('click', handleClick);
        $noButtons.on('click', handleClick);

        // initial hide 
        $secondConsultationStart.addClass('d-none');
        $thirdAccountCreate.addClass('d-none');
        $fourthcategory.addClass('d-none');
        $fifththanks.addClass('d-none');

        // Event listener for the "First Consultation Continue" button
        $firstConsultationContinueButton.on('click', function() {
            $firstConsultationStart.addClass('d-none');
            $secondConsultationStart.removeClass('d-none');
            $thirdAccountCreate.addClass('d-none');
        });

        // Event listener for the "Second Consultation Continue" button
        $secondConsultationContinueButton.on('click', function() {
            $secondConsultationStart.addClass('d-none');
            $thirdAccountCreate.removeClass('d-none');
            $firstConsultationStart.addClass('d-none');
        });

        // Event listener for the "third Create Account" button in the third step
        $createAccountButton.on('click', function() {
            $thirdAccountCreate.addClass('d-none');
            $fourthcategory.removeClass('d-none');
            $secondConsultationStart.addClass('d-none');
            $firstConsultationStart.addClass('d-none');
        });

        // Event listener for the "fourth Create Account" button in the third step
        $productcategorybutton.on('click', function() {
            $fourthcategory.addClass('d-none');
            $fifththanks.removeClass('d-none');
            $thirdAccountCreate.addClass('d-none');
            $secondConsultationStart.addClass('d-none');
            $firstConsultationStart.addClass('d-none');
        });

        // Event listeners for the back buttons
        $backButtons.each(function(index) {
            $(this).on('click', function() {
                if (index === 0) {
                    // If the first back button is clicked, go back to the first step
                    $secondConsultationStart.addClass('d-none');
                    $firstConsultationStart.removeClass('d-none');
                    $thirdAccountCreate.addClass('d-none');
                    $fourthcategory.addClass('d-none');
                    $fifththanks.addClass('d-none');
                } else if (index === 1) {
                    // If the second back button is clicked, go back to the second step
                    $thirdAccountCreate.addClass('d-none');
                    $secondConsultationStart.removeClass('d-none');
                    $firstConsultationStart.addClass('d-none');
                    $fourthcategory.addClass('d-none');
                    $fifththanks.addClass('d-none');
                } else if (index === 2) {
                    // If the third back button is clicked, go back to the third step
                    $fourthcategory.addClass('d-none');
                    $thirdAccountCreate.removeClass('d-none');
                    $secondConsultationStart.addClass('d-none');
                    $firstConsultationStart.addClass('d-none');
                    $fifththanks.addClass('d-none');
                } else if (index === 3) {
                    // If the fourth back button is clicked, go back to the third step
                    $fourthcategory.removeClass('d-none');
                    $thirdAccountCreate.addClass('d-none');
                    $secondConsultationStart.addClass('d-none');
                    $firstConsultationStart.addClass('d-none');
                    $fifththanks.addClass('d-none');
                }
            });
        });

        // Event listener for the "Continue consultation" button in the second step
        $('.secondconsultationcontinue .next').on('click', function() {
            $secondConsultationStart.addClass('d-none');
            $thirdAccountCreate.removeClass('d-none');
            $firstConsultationStart.addClass('d-none');
        });

        // Event listener for the "Create Account" button in the third step
        $('.thirdcreateaccountbutton').on('click', function() {
            $fourthcategory.removeClass('d-none');
            $secondConsultationStart.addClass('d-none');
            $thirdAccountCreate.addClass('d-none');
            $firstConsultationStart.addClass('d-none');
        });

        // Event listener for the "Back" button in the fourth step
        $('.fourthproductcategory .next').on('click', function() {
            $thirdAccountCreate.addClass('d-none');
            $fourthcategory.addClass('d-none');
            $secondConsultationStart.addClass('d-none');
            $firstConsultationStart.addClass('d-none');
            $fifththanks.removeClass('d-none');
        });
    });
</script>

@endPushOnce