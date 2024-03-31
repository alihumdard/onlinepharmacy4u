@extends('web.layouts.default')
@section('title', 'Identity Verification')
@section('content')


<div class="ltn__utilize-overlay"></div>

<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-image " data-bs-bg="img/banner/verifications.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title mt-5 text-black"> Identity Verification</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/" class="text-black"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li class="text-black"> Identity Verification</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<div class="container">
    <p>Online Pharmacy 4U uses Onfido Limited for verification that patients are real - this is a CQC regulatory requirement. Customers who have previously ordered will be checked again.</p>
    <p>Only three data sources are required for Onfido's verification: credit agencies, voting register, and telephone database.</p>
    <p>Onfido Limited (Company No: 07479524), ("Onfido") will validate the information you provide (as the person who signs this Declaration of Consent). It will use the information for identity verification purposes and in accordance with this Declaration of Consent. Onfido and credit reference agencies have access to your personal information. Onfido outlines your rights. <a href="https://onfido.com/privacy/">Privacy Policy.</a> Onfido may be contacted at: Onfido Ltd, 40 Long Acre, Covent Garden, London WC2E 9LG.</p>
    <h6>As follows:</h6>
    <p>(a) I give Onfido, or any of their agents, permission to search my personal information, including consumer credit records searches.</p>
    <p>(b) I have read Onfido's Privacy Policy and I agree to all my personal information being processed in accordance with Onfido's <a href="https://onfido.com/privacy/"> Privacy Policy.</a></p>
    <p>(c) I agree to release Onfido and its officers and employees agents from any claims for direct, indirect or consequential damages. I also agree to indemnify Onfido, its directors, officers, employees, agents, customers and employees from any and all claims and liabilities, damages or losses arising out or in connection with the use of Onfido’s website (and any other online properties), or any services offered by Onfido.</p>
    <p>(d) I certify that I have used all due skill, care, and knowledge to ensure the accuracy and completeness of the information I provide. I also agree to this Declaration of Consent.</p>
    <p>For any questions regarding the ID verification process, please contact the Superintendent Pharmacist at 01623 572757. Thank you for your understanding.</p>
</div>



@stop

@pushOnce('scripts')
<script>

</script>
@endPushOnce