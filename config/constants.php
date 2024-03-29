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

    'P_MED_GENERAL_QUESTIONS' => [
        [
            'id' => 1,
            'title' => 'Who will use this medicine?',
            'desc' => '',
            'order' => '1',
        ],
        [
            'id' => 2,
            'title' => 'Will the user(s) of this medicine be:',
            'desc' => '',
            'order' => '2',
        ],
        [
            'id' => 3,
            'title' => 'What will this medicine be used for?',
            'desc' => '',
            'order' => '3',
        ],
        [
            'id' => 4,
            'title' => 'How long have the symptoms been present?',
            'desc' => '',
            'order' => '4',
        ],
        [
            'id' => 5,
            'title' => 'Have any medicine been already taken to treat these symptoms?',
            'desc' => '',
            'order' => '5',
        ],
        [
            'id' => 6,
            'title' => 'Does the person who will use this medicine have any medical conditions?',
            'desc' => '',
            'order' => '6',
        ],
        [
            'id' => 7,
            'title' => 'Is the person who will use this medicine currently taking any medication?',
            'desc' => '',
            'order' => '7',
        ],        [
            'id' => 8,
            'title' => 'Do you have any questions or concerns about this medicine that you would like to make the pharmacy team aware of?',
            'desc' => '',
            'order' => '8',
        ],        [
            'id' => 9,
            'title' => 'Have you read the information on the product page and will you read the Patient Information Leafiet before taking the medicine?',
            'desc' => '',
            'order' => '9',
        ],        [
            'id' => 10,
            'title' => 'This medicine should only be used for short term relief.If your symptoms persist you should  consult your GP.By confirming below, you are stating that you understand this medicine is for short term use only.',
            'desc' => '',
            'order' => '10',
        ]
    ],

    'PRESCRIPTION_MED_GENERAL_QUESTIONS' => [
        [
            'id' => 1,
            'title' => 'Are you registered with a GP practice in the UK?',
            'desc' => '',
            'order' => '1',
        ],
        [
            'id' => 2,
            'title' => 'Why are you not registered with a GP practice?',
            'desc' => '',
            'order' => '2',
        ],
        [
            'id' => 3,
            'title' => 'Do you give us consent to write to your GP to share information of the supply & information we hold about you? (Please note that certain medication will require us to share this information if you choose NO your medication could get rejected)',
            'desc' => '',
            'order' => '3',
        ],
        [
            'id' => 4,
            'title' => 'Please enter the name of your GP practice.',
            'desc' => '',
            'order' => '4',
        ],
        [
            'id' => 5,
            'title' => 'Do you believe you have the capacity to make decisions about your own healthcare?',
            'desc' => '',
            'order' => '5',
        ],
        [
            'id' => 6,
            'title' => 'Have you been diagnosed with any medical conditions?',
            'desc' => '',
            'order' => '6',
        ],
        [
            'id' => 7,
            'title' => '1. Please provide more information, including diagnosis, symptoms and treatment.',
            'desc' => '',
            'order' => '7',
        ],
        [
            'id' => 8,
            'title' => 'Have you ever been diagnosed with a mental health condition?',
            'desc' => '',
            'order' => '8',
        ],
        [
            'id' => 9,
            'title' => '3. Please provide more information, including diagnosis, symptoms and treatment?',
            'desc' => '',
            'order' => '9',
        ],
        [
            'id' => 10,
            'title' => 'Are you currently taking any medication? This includes prescription-only, over-the-counter and homeopathic medicines.',
            'desc' => '',
            'order' => '10',
        ],
        [
            'id' => 11,
            'title' => 'Which medication, what strength and how often are you taking it?',
            'desc' => '',
            'order' => '11',
        ],
        [
            'id' => 12,
            'title' => 'Do you suffer from any allergies?',
            'desc' => '',
            'order' => '12',
        ],
        [
            'id' => 13,
            'title' => 'What allergies do you have and what are the symptoms you experience from an allergic reaction?',
            'desc' => '',
            'order' => '13',
        ],
        [
            'id' => 14,
            'title' => 'Is there anything else you would like to include for the prescriber?',
            'desc' => '',
            'order' => '14',
        ],
        [
            'id' => 15,
            'title' => 'Please provide further information:',
            'desc' => '',
            'order' => '15',
        ],
        [
            'id' => 16,
            'title' => 'What is your height?',
            'desc' => '',
            'order' => '16',
        ],
        [
            'id' => 17,
            'title' => 'What is your weight?',
            'desc' => '',
            'order' => '17',
        ],
        [
            'id' => 18,
            'title' => 'Full Name (Legal Name):',
            'desc' => '',
            'order' => '18',
        ],
        [
            'id' => 19,
            'title' => 'Date of Birth (DD/MM/YYYY):',
            'desc' => '',
            'order' => '19',
        ],
    ],

    'PRODUCT_TEMPLATES' => [
        1 => 'Pharmacy Medicine',
        2 => 'Prescription Medicines',
        3 => 'Over the Counter Medicines'
    ],

    'PHARMACY_MEDECINE' => 1,
    'PRESCRIPTION_MEDICINE' => 2,
    'COUNTER_MEDICINE' => 3,
];
