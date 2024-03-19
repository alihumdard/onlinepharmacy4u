<?php

return [

    'USER_STATUS' => [
        'Active'     => 1,
        'Pending'    => 2,
        'Suspend'    => 3,
        'Unverified' => 4,
        'Deleted'     => 5
    ],

    'STATUS' => [
        'Active' => 1,
        'Deactive' => 2,
        'Deleted' => 3
    ],

    'CONSULTATION_QUESTIONS' => [
        [
            'id' => 1,
            'title' => 'Why do you want to lose weight?',
            'desc' => 'It is important we understand the motives for trying to mange your weight as this can dictate the type of treatment plan we offer and more specifically the advice we give you for length of treatment and goals.',
            'created_by' => 1
        ],
        [
            'id' => 2,
            'title' => 'Could you please indicate a general well being score?',
            'desc' => 'How well do you feel generally speaking.',
            'created_by' => 1
        ],
        [
            'id' => 3,
            'title' => 'Can you please upload a photograph of yourself?',
            'desc' => 'So we can make an assessment of the suitability of the requested treatment. We ideally need an image showing the entire body.You can be fully clothed, as long as the clothing is not too loose fitting.',
            'created_by' => 1
        ],        [
            'id' => 4,
            'title' => 'Do you have any allergies?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 5,
            'title' => 'Please tell us about your other reasons for wanting to manage your weight?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 6,
            'title' => 'Please tell us more about your allergies?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 7,
            'title' => 'Have you had your blood pressure measured in the last 6 months?',
            'desc' => 'If you struggle with weight management, we advise to have your blood pressure checked at least every 6 months with your NHS GP.',
            'created_by' => 1
        ],        [
            'id' => 8,
            'title' => 'What was the reading / measurement of the last 6 months?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 9,
            'title' => 'Have you had your blood sugar measured in the last 6 months?',
            'desc' => 'We recommend all patients struggling with weight management have their blood sugar measured at least every 6 months. The reading is known as HbA1c.',
            'created_by' => 1
        ],        [
            'id' => 10,
            'title' => 'Have you been prescribed anything to treat your high blood pressure?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 11,
            'title' => 'What was the reading / measurement?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 12,
            'title' => 'Do you have any medical conditions?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 13,
            'title' => 'Tell us a little more about your medical conditions.',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 14,
            'title' => 'Do you take any medication?',
            'desc' => 'Please include any prescribed or bought medicines, & vitamins/supplements.',
            'created_by' => 1
        ],        [
            'id' => 15,
            'title' => 'Please list the medications or supplements you currently take.',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 16,
            'title' => 'Do any of the following apply to you?',
            'desc' => 'Taking levothyroxine, liothyronine or any other thyroid hormone.</br>Taking carbimazole, propylthiouracil or any other anti-thyroid medication.</br>Have a diagnosis of thyroid disease including an under or over-active thyroid gland, Hashimotos or Graves disease.',
            'created_by' => 1
        ],        [
            'id' => 17,
            'title' => "Please read the information listed and click yes if you are happy to proceed.",
            'desc' => 'Just to inform you that patients with thyroid disease are more likely to develop neck swelling whilst on GLP1 type medication such as semaglutide (Wegovy, Ozempic, Rybelsus) or liraglutide (Saxenda). This may also be the case with GLP1/GIP treatments such as Mounjaro. This is a rare side effect, but you may need closer monitoring of your condition by your GP, and stop using this treatment should you experience this side effect.',
            'created_by' => 1
        ],        [
            'id' => 18,
            'title' => 'One of the following apply to you?',
            'desc' => 'A personal diagnosis of Medullary Thyroid Cancer (MTC), or any member of your family having this.</br>A diagnosis of Multiple Endocrine Neoplasiam Type 2 (MEN2).</br>A diagnosis of diabetic eye disease (Diabetic Retinopathy).',
            'created_by' => 1
        ],        [
            'id' => 19,
            'title' => 'Have you ever been told you have any problems with your liver or kidneys?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 20,
            'title' => 'Have you ever been told you have any problems with your liver or kidneys? Details ',
            'desc' => 'Please provide details.',
            'created_by' => 1
        ],        [
            'id' => 21,
            'title' => 'Your mental health can be impacted by your weight. Tell us about your mental health and wellbeing. Which of the below applies to you?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 22,
            'title' => 'Please tell us more about you mental health? details.',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 23,
            'title' => 'Have you had any significant weight loss in the last 6 months?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 24,
            'title' => 'Please tell us more about you mental health?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 25,
            'title' => 'What are your primary concerns regarding your weight?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 26,
            'title' => 'Please let us know about your other concerns?',
            'desc' => '',
            'created_by' => 1
        ],        [
            'id' => 27,
            'title' => 'What is your target weight?',
            'desc' => "(If you don't have one please write Don't know)",
            'created_by' => 1
        ],

        [
            'id' => 28,
            'title' => 'Smoking?',
            'desc' => 'Smoking and obesity are both high risk factors for heart disease and other serious illness.',
            'created_by' => 1
        ],

        [
            'id' => 29,
            'title' => 'Drinking Alcohol?',
            'desc' => 'Drinking alcohol regularly contributes to obesity and can lead to further health complications such as heart disease & stroke.',
            'created_by' => 1
        ],
        [
            'id' => 30,
            'title' => 'Tell us about Takeaways / Fast food.',
            'desc' => 'Takeaways and fast food are typically high in fat and salt which can contribute to obesity as well as high blood pressure and heart disease.',
            'created_by' => 1
        ],
        [
            'id' => 31,
            'title' => 'Tell us about unhealthy snacks (crisps, chocolate, cakes or biscuits).',
            'desc' => 'These foods are high in fats and sugar contributing to obesity and other illnesses such as high blood pressure and heart disease.',
            'created_by' => 1
        ],
        [
            'id' => 32,
            'title' => 'Do you do any moderate exercise?',
            'desc' => "Moderate Exercise - Moderate activity will raise your heart rate, and make you breathe faster and feel warmer. One way to tell if you're working at a moderate intensity level is if you can still talk, but not sing. If the heart rate monitor says you're working at 50 to 60% of your max heart rate, then the exercise is considered moderate I do 75 mins of moderate.",
            'created_by' => 1
        ],
        [
            'id' => 33,
            'title' => 'Is your exercise ever vigorous intensity?',
            'desc' => "Vigorous intensity activity makes you breathe hard and fast. If you're working at this level, you will not be able to say more than a few words without pausing for breath. If the heart rate monitor shows that you're working at 70 to 85% of your heart rate then it's vigorous exercise.",
            'created_by' => 1
        ],
        [
            'id' => 34,
            'title' => 'Have you taken any weight loss medication before?',
            'desc' => '',
            'created_by' => 1
        ],
        [
            'id' => 35,
            'title' => 'Please let us know about previous attempts to manage your weight?',
            'desc' => 'Please tick any that apply to you',
            'created_by' => 1
        ],
        [
            'id' => 36,
            'title' => 'Is there anything else about yourself or your medical history that you think our specialists should know about?',
            'desc' => '',
            'created_by' => 1
        ],
        [
            'id' => 37,
            'title' => 'Are you aware that you should never take more than one weight management medicine at a time? Do you agree to ensure you stop taking all other weight management medication before initiating myBMI treatment plan?',
            'desc' => 'You should never take more than one weight management medicine at one time. Before starting a myBMI treatment plan you should stop taking any other weight management medication. MyBMI treatment plans on their own are enough to manage weight.',
            'created_by' => 1
        ],
        [
            'id' => 38,
            'title' => 'Are you aware that you should never take more than one weight management medicine at a time? details.',
            'desc' => 'Please provide details.',
            'created_by' => 1
        ],
        [
            'id' => 39,
            'title' => 'Are you aware of these potential effects of GLP1 weight loss injections and tablets?',
            'desc' => '<p>GLP1 treatments include Wegovy, Saxenda and other injections and tablets that contain Semaglutide. GLP1/GIP Treatments include Mounjaro.</p><br>
        <p>GLP1 and GLP1/GIP treatments, as one of their actions, slow down gastric emptying, which can help make you feel full. This can cause nausea and acid reflux. But if you experience severe stomach pains, vomiting, nausea, and feeling very full long after a meal is finished, then this may be a sign of gastroparesis, or ‘stomach paralysis’. This is an uncommon side effect of weight loss injections, but you should stop using this treatment if this occurs and seek medical attention.</p><br>
        <p>These injections can cause acid reflux as one of their side effects. If you suffer from gastric conditions such as gastritis, Barrett’s oesophagus or a hiatus hernia, these symptoms could be more significant. If affected by these conditions, please discuss starting weight loss injections with your GP or specialist before commencing treatment.</p><br>
        <p>Acute pancreatitis is an uncommon side effect of this treatment. Patients should look out for the signs of pancreatitis whilst using this injection. These include severe, persistent abdominal pain that radiates to the back, tenderness when touching the abdomen, rapid heartbeat, fever, nausea and vomiting. If you suspect pancreatitis, stop using this treatment and seek medical attention.</p><br>',
            'created_by' => 1
        ],
        [
            'id' => 40,
            'title' => 'Do you agree to the following?',
            'desc' => '<h3>Do you agree to the following?</h3>
        <p>You will read the "Patient Information Leaflet" supplied with your medication.</p><br>
        <p>You have answered all of the questions accurately and truthfully.</p><br>
        <p>You have the capacity to make decisions about your own care and are not under the guardianship of anyone.</p><br>
        <p>You have read our privacy policy and our Terms & Conditions.</p><br>
        <p>You have ensured that the delivery address you will select is safe to accept medicines by post, with no access for children, vulnerable adults or pets.</p>',
            'created_by' => 1
        ],
        [
            'id' => 41,
            'title' => 'Would you like us to contact your doctor informing them of what medicine we have provided after your treatment plan is shipped?',
            'desc' => 'This is optional for most conditions, however for some chronic conditions we cannot treat you unless we have permission to inform your NHS GP.',
            'created_by' => 1
        ],
        [
            'id' => 42,
            'title' => 'Please provide the name and address of your GP Surgery?',
            'desc' => 'GP Surgery name: address',
            'created_by' => 1
        ],
        [
            'id' => 43,
            'title' => 'Do you consent to our clinicians viewing your NHS medical record through the NHS Summary Care Record Online Service? This can help our clinicians ensure we are providing the right treatment for you.?',
            'desc' => 'This is optional for most conditions, however for some chronic conditions we cannot treat you without seeing this.',
            'created_by' => 1
        ]
    ],

    'PRODUCT_TEMPLATES' => [
        1 => 'Pharmacy Medicine',
        2 => 'Prescription Medicines',
        3 => 'Over the Counter Medicines'
    ],
];
