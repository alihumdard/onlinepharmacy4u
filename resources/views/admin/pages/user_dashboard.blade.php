<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <style>
    .navbar-toggler {
        display: none;
    }
    .menu {
        display: block; 
    }
    @media (max-width: 1024px) { 
        .navbar-toggler {
            display: block; 
        }
        .menu {
            display: none; 
        }
        .menu.show {
            display: block; 
        }
        .p-2 {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        .fa{
          margin-bottom: 762px;
        }
}
@media (max-width: 320px){
  .p-2 {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        .fa{
          margin-bottom: 0;
        }
}
@media (max-width: 768px){
  .fa{
          margin-bottom: 0;
        }
  .p-2{
    padding: 0.5rem;
  }
}
  
</style>
</head>
<body class="bg-blue-100 p-4">
<div class="flex flex-col lg:flex-row bg-blue-100 p-4 space-y-4 lg:space-y-0 lg:space-x-4">
    <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars float-left" aria-hidden="true"></i>
    </button>
    <div id="navbarNav" class="menu bg-white p-4 rounded-lg shadow w-full lg:w-1/4">
        <ul class="space-y-4">
            <li class="flex items-center space-x-2">
                <i class="fa fa-user" aria-hidden="true"></i>
                <a href="#"><span class="text-teal-500 text-lg">My Account</span></a>
            </li>
            <li class="flex items-center space-x-2">
            <i class="fas fa-file-alt"></i>
                <a href="#"><span>My Prescription Orders</span></a>
            </li>
            <li class="flex items-center space-x-2">
            <i class="fas fa-user-friends"></i>
            <a href="#"><span>My Online Clinic Orders</span></a>
            </li>
            <li class="flex items-center space-x-2">
            <i class="fas fa-cart-arrow-down"></i>
            <a href="#"><span>My Shop Orders</span></a>
            </li>
            <li class="flex items-center space-x-2">
            <i class="fas fa-user-check"></i>
            <a href="#"><span>Account Verification</span></a>
            </li>
        </ul>
    </div>

    <div class="flex-1 space-y-4">
        <h2 class="text-2xl font-bold">My Profile</h2>
        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="bg-teal-500 text-white p-2 rounded-t-lg">Customer Details</h3>
            <div class="p-4 space-y-4">
                <div>
                    <label class="block font-bold">Email</label>
                    <p>justhamzaaa@gmail.com</p>
                </div>
                <div>
                    <label class="block font-bold">Mobile</label>
                    <p>Mobile</p>
                </div>
                <div>
                    <label class="block font-bold">Password</label>
                    <button class="bg-white border border-teal-500 text-teal-500 py-1 px-2 rounded">Change Password</button>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="bg-teal-500 text-white p-2 rounded-t-lg">Email Recommendations & Reminders</h3>
            <div class="p-4 space-y-4">
                <p>Pharmaceutical products come with a recommended days supply.</p>
                <ul class="list-disc list-inside">
                    <li>If you have opted in to receive reminders with your order, we may sometimes email you a notification when we believe you are running out of them.</li>
                    <li>We may also send you emails to remind you irrelevant to you.</li>
                </ul>
                <p>You can opt in or out of these emails below:</p>
                <div>
                    <input type="radio" id="reminders_yes" name="reminders" value="yes" />
                    <label for="reminders_yes">Yes, send me reminders</label>
                </div>
                <div>
                    <input type="radio" id="reminders_no" name="reminders" value="no" />
                    <label for="reminders_no">No, I don't need notifications.</label>
                </div>
                <button class="bg-teal-500 text-white py-1 px-4 rounded">Update</button>
            </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="bg-teal-500 text-white p-2 rounded-t-lg">Stock Subscription Details</h3>
            <div class="p-4">
                <p>There are no active subscriptions.</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow w-full lg:w-1/4">
        <form class="space-y-4">
            <div>
                <label class="block font-bold">First Name</label>
                <input type="text" class="w-full border rounded p-2" value="Hamza" />
            </div>
            <div>
                <label class="block font-bold">Last Name</label>
                <input type="text" class="w-full border rounded p-2" value="Sharif" />
            </div>
            <div>
                <label class="block font-bold">What is your date of birth?</label>
                <div class="flex space-x-2">
                    <select class="border rounded p-2">
                        <option>02</option>
                    </select>
                    <select class="border rounded p-2">
                        <option>November</option>
                    </select>
                    <select class="border rounded p-2">
                        <option>1999</option>
                    </select>
                </div>
                <p class="text-sm text-zinc-500">For example: 31 12 1970</p>
            </div>
            <div>
                <label class="block font-bold">Select Gender</label>
                <select class="w-full border rounded p-2">
                    <option>Select Gender</option>
                </select>
                <p class="text-sm text-zinc-500">Transgender patients must select their biological gender - we apologise to any patients with objections. If you are transgender please contact us after registering to avoid any delays in receiving your order due to identity checks.</p>
            </div>
            <div>
                <label class="block font-bold">Mobile</label>
                <input type="text" class="w-full border rounded p-2" />
            </div>
            <div class="space-y-2">
                <div>
                    <input type="checkbox" id="change_email" />
                    <label for="change_email">Change Email</label>
                </div>
                <div>
                    <input type="checkbox" id="change_password" />
                    <label for="change_password">Change Password</label>
                </div>
                <div class="flex justify-between mt-4">
                    <button class="bg-teal-500 text-white px-4 py-2 rounded-lg mt-2">Save</button>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-2">Back</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="bg-blue-100 p-6">
  <div class="bg-teal-500 text-white p-4 rounded-t-lg">Address Book</div>
  <div class="bg-white p-4 rounded-b-lg shadow-md">
    <div class="mb-4">
      <h3 class="text-teal-500 font-semibold">Default Billing Address</h3>
      <p>
        Hamza Sharif<br />31 Whitworth Rise<br />Nottingham, Nottinghamshire, NG59AG<br />United
        Kingdom<br />T: 07478213982
      </p>
      <button class="bg-blue-500 text-white px-2 py-1 rounded-lg mt-2">Edit</button>
    </div>
    <div>
      <h3 class="text-teal-500 font-semibold">Default Shipping Address</h3>
      <p>
        Hamza Sharif<br />31 Whitworth Rise<br />Nottingham, Nottinghamshire, NG59AG<br />United
        Kingdom<br />T: 07478213982
      </p>
      <button class="bg-blue-500 text-white px-2 py-1 rounded-lg mt-2">Edit</button>
    </div>
  </div>
  <div class="bg-teal-500 text-white p-4 mt-6 rounded-t-lg">Additional Address Entries</div>
  <div class="bg-white p-4 rounded-b-lg shadow-md">
    <p class="text-zinc-500">You have no other address entries in your address book.</p>
    <div class="flex justify-end mt-4">
      <button class="bg-teal-500 text-white px-4 py-2 rounded-lg mr-2">Add New Address</button>
      <button class="border border-zinc-300 text-zinc-500 px-4 py-2 rounded-lg">Back</button>
    </div>
  </div>
  <div class="bg-white p-6 mt-6 rounded-lg shadow-md">
    <p class="text-center text-white-500 mb-4">
      Sign up to our email newsletter to get personalised offers, vouchers, health advice, new
      product launch news and more!
    </p>
    <div class="flex flex-col md:flex-row justify-center items-center">
      <input
        type="text"
        placeholder="Your first name"
        class="border border-zinc-300 rounded-lg px-4 py-2 mb-2 md:mb-0 md:mr-2 w-full md:w-auto"
      />
      <input
        type="email"
        placeholder="Your email address"
        class="border border-zinc-300 rounded-lg px-4 py-2 mb-2 md:mb-0 md:mr-2 w-full md:w-auto"
      />
      <button class="bg-teal-500 text-white px-4 py-2 rounded-lg">Sign up</button>
    </div>
  </div>
</div>
<script>
    document.querySelector('.navbar-toggler').addEventListener('click', function() {
        var navbar = document.getElementById('navbarNav');
        navbar.classList.toggle('show');
    });
</script>
</body>
</html>