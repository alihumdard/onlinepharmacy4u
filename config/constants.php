<?php
// config\constants.php
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
            'title' => 'What is the age of the person who is going to be taking this medication ?',
            'desc' => '',
            'order' => '3',
        ],
        [
            'id' => 4,
            'title' => 'What will this medicine be used for?',
            'desc' => '',
            'order' => '4',
        ],
        [
            'id' => 5,
            'title' => 'How long have the symptoms been present?',
            'desc' => '',
            'order' => '5',
        ],

        [
            'id' => 6,
            'title' => 'Have any medicine been already taken to treat these symptoms?',
            'desc' => '',
            'order' => '6',
        ],
        [
            'id' => 7,
            'title' => 'Additional Details of symptoms',
            'desc' => '',
            'order' => '7',
        ],

        [
            'id' => 8,
            'title' => 'Does the person who will use this medicine have any medical conditions?',
            'desc' => '',
            'order' => '8',
        ],
        [
            'id' => 9,
            'title' => 'Additional Details of medical conditions',
            'desc' => '',
            'order' => '9',
        ],
        [
            'id' => 10,
            'title' => 'Is the person who will use this medicine currently taking any medication?',
            'desc' => '',
            'order' => '10',
        ],        [
            'id' => 11,
            'title' => 'Do you have any questions or concerns about this medicine that you would like to make the pharmacy team aware of?',
            'desc' => '',
            'order' => '11',
        ],        [
            'id' => 12,
            'title' => 'Have you read the information on the product page and will you read the Patient Information Leafiet before taking the medicine?',
            'desc' => '',
            'order' => '12',
        ],        [
            'id' => 13,
            'title' => 'This medicine should only be used for short term relief.If your symptoms persist you should  consult your GP.By confirming below, you are stating that you understand this medicine is for short term use only.',
            'desc' => '',
            'order' => '13',
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
            'title' => 'Do you give us consent to write to your GP to share information of the supply & information we hold about you?',
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
            'title' => 'Please provide more information, including diagnosis, symptoms and treatment.',
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
            'title' => 'Please provide more information, including diagnosis, symptoms and treatment?',
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
        1 => 'Pharmacy Medicine(P.Med)',
        2 => 'Prescription Medicine(POM)',
        3 => 'Over the Counter Medicines'
    ],

    'PHARMACY_MEDECINE' => 1,
    'PRESCRIPTION_MEDICINE' => 2,
    'COUNTER_MEDICINE' => 3,


     'ukCities' => [
        "London", "Birmingham", "Manchester", "Liverpool", "Glasgow", "Newcastle", "Sheffield", "Leeds",
        "Bristol",
        "Edinburgh", "Leicester", "Coventry", "Bradford", "Cardiff", "Belfast", "Nottingham",
        "Kingston upon Hull",
        "Plymouth", "Southampton", "Reading", "Aberdeen", "Portsmouth", "York", "Swansea",
        "Milton Keynes", "Derby",
        "Stoke-on-Trent", "Northampton", "Luton", "Wolverhampton", "Wigan", "Norwich", "Chester",
        "Cambridge",
        "Oxford", "Dundee", "Inverness", "Exeter", "Swindon", "Derry", "Lisburn", "Newry", "Armagh",
        "Londonderry", "Bangor", "Craigavon", "Ballymena", "Newtownabbey", "Coleraine", "Limavady",
        "Ballyclare",
        "Cookstown", "Strabane", "Holywood", "Warrenpoint", "Larne", "Banbridge", "Donaghadee",
        "Downpatrick",
        "Carrickfergus", "Portadown", "Lurgan", "Portrush", "Comber", "Ballymoney", "Crumlin",
        "Maghera",
        "Whitehead", "Enniskillen", "Dungannon", "Randalstown", "Moira", "Dromore", "Saintfield",
        "Kilkeel",
        "Ballycastle", "Rathfriland", "Killyleagh", "Crossgar", "Strangford", "Cullybackey", "Keady",
        "Bushmills",
        "Cushendall", "Greenisland", "Rostrevor", "Portaferry", "Glenavy", "Bessbrook", "Portstewart",
        "Clogher",
        "Donaghcloney", "Blackrock", "Belleek", "Castlederg", "Coalisland", "Carnlough", "Clough",
        "Waringstown",
        "Magherafelt", "Glenarm", "Loughbrickland", "Greyabbey", "Broughshane", "Ballyronan",
        "Millisle", "Gilford",
        "Ballygowan", "Castlewellan", "Portglenone", "Aughnacloy", "Gortin", "Eglinton", "Sion Mills",
        "Ballycarry",
        "Castlederg", "Ederney", "Irvinestown", "Ballinderry", "Macosquin", "Donaghmore", "Aghagallon",
        "Kilrea",
        "Ballygawley", "Portballintrae", "Cloughmills", "Cushendun", "Ballykelly", "Dunloy", "Aghalee",
        "Moneymore",
        "Tandragee", "Belleek", "Moy", "Garvagh", "Newtownhamilton", "Loughgall", "Lisnaskea",
        "Lisbellaw",
        "Ballinamallard", "Derrygonnelly", "Belcoo", "Antrim", "Crumlin", "Draperstown", "Dundrum",
        "Portaferry",
        "Comber", "Newtownards", "Saintfield", "Bangor", "Portaferry", "Dungiven", "Ederney", "Fintona",
        "Kesh",
        "Lisnaskea", "Macosquin", "Maghera", "Moneymore", "Portglenone", "Ballynure", "Greenisland",
        "Newtownabbey",
        "Holywood", "Ballynahinch", "Newcastle", "Annalong", "Hillsborough", "Moira", "Waringstown",
        "Richhill",
        "Keady", "Tandragee", "Markethill", "Cullybackey", "Broughshane", "Ahoghill", "Portglenone",
        "Cushendall",
        "Waterfoot", "Cullybackey", "Glenavy", "Crumlin", "Ballynure", "Greenisland", "Newtownabbey",
        "Holywood",
        "Ballynahinch", "Newcastle", "Annalong", "Hillsborough", "Moira", "Waringstown", "Richhill",
        "Keady",
        "Tandragee", "Markethill", "Cullybackey", "Broughshane", "Ahoghill", "Newtownards", "Portrush",
        "Rathlin Island",
        "Coleraine", "Castlerock", "Limavady", "Ballykelly", "Dungiven", "Maghera", "Kilrea",
        "Bushmills", "Portstewart",
        "Ballymoney", "Ballintoy", "Cushendun", "Carnlough", "Glenarm", "Larne", "Ballygally",
        "Islandmagee",
        "Whitehead", "Carrickfergus", "Newtownabbey", "Greenisland", "Antrim", "Crumlin", "Randalstown",
        "Ballyclare",
        "Larne", "Magherafelt", "Coagh", "Tamlaght", "Bellaghy", "Portglenone", "Glenarm", "Carnlough",
        "Ballymena",
        "Larne", "Ballyclare", "Randalstown", "Crumlin", "Antrim", "Ballymoney", "Coleraine",
        "Portstewart",
        "Portrush", "Limavady", "Dungiven", "Maghera", "Castledawson", "Toomebridge", "Moneymore",
        "Magherafelt",
        "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore", "Magherafelt", "Cookstown", "Coagh",
        "Tamlaght",
        "Bellaghy", "Portglenone", "Magherafelt", "Toomebridge", "Ballyronan", "Maghera", "Ballymena",
        "Ballymoney",
        "Bushmills", "Portstewart", "Portrush", "Limavady", "Dungiven", "Maghera", "Castledawson",
        "Toomebridge",
        "Moneymore", "Magherafelt", "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore",
        "Magherafelt",
        "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore", "Magherafelt", "Cookstown", "Coagh",
        "Tamlaght",
        "Bellaghy", "Portglenone", "Magherafelt", "Toomebridge", "Ballyronan", "Maghera", "Ballymena",
        "Ballymoney",
        "Bushmills", "Portstewart", "Portrush", "Limavady", "Dungiven", "Maghera", "Castledawson",
        "Toomebridge",
        "Moneymore", "Magherafelt", "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore",
        "Magherafelt",
        "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore", "Magherafelt", "Cookstown", "Coagh",
        "Tamlaght",
        "Bellaghy", "Portglenone", "Magherafelt", "Toomebridge", "Ballyronan", "Maghera", "Ballymena",
        "Ballymoney",
        "Bushmills", "Portstewart", "Portrush", "Limavady", "Dungiven", "Maghera", "Castledawson",
        "Toomebridge",
        "Moneymore", "Magherafelt", "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore",
        "Magherafelt",
        "Cookstown", "Coagh", "Tamlaght", "Bellaghy", "Moneymore", "Magherafelt", "Cookstown", "Coagh",
        "Tamlaght",
        "Bellaghy", "Portglenone", "Magherafelt", "Toomebridge", "Ballyronan", "Maghera", "Ballymena",
        "Ballymoney",
        "Bushmills", "Portstewart", "Portrush", "Limavady", "Dungiven", "Maghera", "Castledawson",
        "Toomebridge",
        "Moneymore", "Magherafelt", "Cookstown", "Coagh", "Tamlaght"
     ],

     'ukPostalcode' => [
        "AB10 1XG", "AB11 5QN", "AB12 3CD", "AB15 6YZ", "AB16 5EF", // Aberdeen
        "B1 1AA", "B1 2AB", "B2 3CD", "B4 5EF", "B5 6YZ", // Birmingham
        "BH1 1AA", "BH2 2AB", "BH3 3CD", "BH4 5EF", "BH5 6YZ", // Bournemouth
        "BS1 1AA", "BS2 2AB", "BS3 3CD", "BS4 5EF", "BS5 6YZ", // Bristol
        "CA1 1AA", "CA2 2AB", "CA3 3CD", "CA4 5EF", "CA5 6YZ", // Carlisle
        "CH1 1AA", "CH2 2AB", "CH3 3CD", "CH4 5EF", "CH5 6YZ", // Chester
        "CV1 1AA", "CV2 2AB", "CV3 3CD", "CV4 5EF", "CV5 6YZ", // Coventry
        "CR0 1AA", "CR2 2AB", "CR4 3CD", "CR7 5EF", "CR8 6YZ", // Croydon
        "DY1 1AA", "DY2 2AB", "DY4 3CD", "DY5 5EF", "DY8 6YZ", // Dudley
        "DA1 1AA", "DA2 2AB", "DA5 3CD", "DA7 5EF", "DA8 6YZ", // Dartford
        "DH1 1AA", "DH2 2AB", "DH3 3CD", "DH4 5EF", "DH5 6YZ", // Durham
        "EH1 1AA", "EH2 2AB", "EH3 3CD", "EH4 5EF", "EH5 6YZ", // Edinburgh
        "EN1 1AA", "EN2 2AB", "EN3 3CD", "EN4 5EF", "EN5 6YZ", // Enfield
        "FY1 1AA", "FY2 2AB", "FY4 3CD", "FY5 5EF", "FY6 6YZ", // Blackpool (FY)
        "GL1 1AA", "GL2 2AB", "GL3 3CD", "GL4 5EF", "GL5 6YZ", // Gloucester
        "G1 1AA", "G2 2AB", "G3 3CD", "G4 5EF", "G5 6YZ", // Glasgow
        "GU1 1AA", "GU2 2AB", "GU3 3CD", "GU4 5EF", "GU5 6YZ", // Guildford
        "HA0 1AA", "HA1 2AB", "HA2 3CD", "HA3 5EF", "HA4 6YZ", // Harrow
        "HD1 1AA", "HD2 2AB", "HD3 3CD", "HD4 5EF", "HD5 6YZ", // Huddersfield
        "IP1 1AA", "IP2 2AB", "IP3 3CD", "IP4 5EF", "IP5 6YZ", // Ipswich
        "KA1 1AA", "KA2 2AB", "KA3 3CD", "KA4 5EF", "KA5 6YZ", // Kilmarnock
        "KT1 1AA", "KT2 2AB", "KT3 3CD", "KT4 5EF", "KT5 6YZ", // Kingston upon Thames
        "L1 1AA", "L2 2AB", "L3 3CD", "L4 5EF", "L5 6YZ", // Liverpool
        "LE1 1AA", "LE2 2AB", "LE3 3CD", "LE4 5EF", "LE5 6YZ", // Leicester
        "LN1 1AA", "LN2 2AB", "LN3 3CD", "LN4 5EF", "LN5 6YZ", // Lincoln
        "LS1 1AA", "LS2 2AB", "LS3 3CD", "LS4 5EF", "LS5 6YZ", // Leeds
        "LU1 1AA", "LU2 2AB", "LU3 3CD", "LU4 5EF", "LU5 6YZ", // Luton
        "M1 1AA", "M2 2AB", "M3 3CD", "M4 5EF", "M5 6YZ", // Manchester
        "ME1 1AA", "ME2 2AB", "ME3 3CD", "ME4 5EF", "ME5 6YZ", // Medway
        "NE1 1AA", "NE2 2AB", "NE3 3CD", "NE4 5EF", "NE5 6YZ", // Newcastle upon Tyne
        "NG1 1AA", "NG2 2AB", "NG3 3CD", "NG4 5EF", "NG5 6YZ", // Nottingham
        "NP1 1AA", "NP2 2AB", "NP3 3CD", "NP4 5EF", "NP5 6YZ", // Newport
        "NR1 1AA", "NR2 2AB", "NR3 3CD", "NR4 5EF", "NR5 6YZ", // Norwich
        "OL1 1AA", "OL2 2AB", "OL3 3CD", "OL4 5EF", "OL5 6YZ", // Oldham
        "OX1 1AA", "OX2 2AB", "OX3 3CD", "OX4 5EF", "OX5 6YZ", // Oxford
        "PE1 1AA", "PE2 2AB", "PE3 3CD", "PE4 5EF", "PE5 6YZ", // Peterborough
        "PO1 1AA", "PO2 2AB", "PO3 3CD", "PO4 5EF", "PO5 6YZ", // Portsmouth
        "RG1 1AA", "RG2 2AB", "RG3 3CD", "RG4 5EF", "RG5 6YZ", // Reading
        "RH1 1AA", "RH2 2AB", "RH3 3CD", "RH4 5EF", "RH5 6YZ", // Redhill
        "S1 1AA", "S2 2AB", "S3 3CD", "S4 5EF", "S5 6YZ", // Sheffield
        "SM1 1AA", "SM2 2AB", "SM3 3CD", "SM4 5EF", "SM5 6YZ", // Sutton
        "SO14 1AA", "SO15 2AB", "SO16 3CD", "SO17 5EF", "SO18 6YZ", // Southampton
        "SP1 1AA", "SP2 2AB", "SP3 3CD", "SP4 5EF", "SP5 6YZ", // Salisbury
        "ST1 1AA", "ST2 2AB", "ST3 3CD", "ST4 5EF", "ST5 6YZ", // Stoke-on-Trent
        "SW1A 1AA", "SW1B 2AB", "SW1C 3CD", "SW1D 5EF", "SW1E 6YZ", // London (Westminster)
        "TN1 1AA", "TN2 2AB", "TN3 3CD", "TN4 5EF", "TN5 6YZ", // Tunbridge Wells
        "TS1 1AA", "TS2 2AB", "TS3 3CD", "TS4 5EF", "TS5 6YZ", // Teesside
        "TW1 1AA", "TW2 2AB", "TW3 3CD", "TW4 5EF", "TW5 6YZ", // Twickenham
        "WA1 1AA", "WA2 2AB", "WA3 3CD", "WA4 5EF", "WA5 6YZ", // Warrington
        "WF1 1AA", "WF2 2AB", "WF3 3CD", "WF4 5EF", "WF5 6YZ", // Wakefield
     ],

];
