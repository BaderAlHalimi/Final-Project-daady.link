<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('logo.png') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fuggles&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <style>
        .navitemborder {
            border-bottom: 1px solid gray;
        }

        .navitemborder:hover {
            /* border-bottom: 1px solid white; */
            background-color: rgb(230, 230, 230);
            transition: 0.5s;
            border-radius: 6px;
        }

        #editLinkPreview1 {
            position: fixed;
            z-index: 10;
            /* top: 25%; */
            /* left: 15%; */
        }

        #editLinkPreview {
            position: fixed;
            display: none;
            background-color: rgba(128, 128, 128, 0.6);
            width: 100%;
            z-index: 10;
            height: 100vh;
        }

        .drop-container {
            position: relative;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 150px;
            padding: 20px;
            border-radius: 10px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            /* border: 1px solid #bfbebe; */
            color: #444;
            cursor: pointer;
            transition: background .2s ease-in-out, border .2s ease-in-out;
        }

        .drop-container:hover {
            background: #eee;
            border-color: #111;
        }

        .drop-container:hover .drop-title {
            color: #222;
        }

        .drop-title {
            color: #444;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            transition: color .2s ease-in-out;
        }

        .scroll {
            overflow: scroll;
            max-height: 97vh;
        }

        @media screen and (min-width: 1000px) {
            #editLinkPreview1 {
                top: 10%;
            }

            .scroll {
                overflow: hidden;
                max-height: 100vh;
            }
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white">

    <div class="min-h-screen bg-gray-100">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex ms-4 items-center">
                            <a href="{{ route('dashboard') }}">
                                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main style="text-align: justify;" class="bg-white container p-5 mt-5">
            {{-- {!! $slot !!} --}}
            <h2 class="fs-2 fw-bold mb-4">Privacy Policy</h2>
            <h4 class="fs-3 fw-bold mb-2">Welcome to <a href="{{ route('home') }}">https://daady.link/</a> (the "Website", “Our
                site”)</h4>
            <p class="text- fs-5 mb-3">
                Information related to cookies and other similar technologies you can find in our Cookies Policy, which
                together with this Privacy Policy forms the part of our Terms of Use. So, we encourage you to take some
                time
                to read this Privacy Policy and our Cookie Policy, along with our Terms of Use, in order to be sure that
                you
                understand our personal information related policies and are comfortable with providing us with your
                personal data.
            </p>
            <p class="text- fs-5 mb-3 bg-light">
                If, while reading this Privacy Policy, you find some undefined terms, it has the same meaning as in our
                Terms of Use.
            </p>
            <p class="text- fs-5 mb-3 bg-light">
                If you for some reason(s) do not agree with any provision of this Privacy Policy, then you should not
                access
                or use the Website and our Services.
            </p>
            <p class="text- fs-5 mb-3 bg-light">
                If you have any questions and/or concerns about this Privacy Policy, you can contact us at any time
            </p>
            <h4 class="fs-3 fw-bold mb-2">
                GDPR Compliance</h4>
            <p class="text- fs-5 mb-3">
                Under EU data protection law, with regards to the processing of our direct clients’ personal data we act
                as
                a "controller", i.e. the person responsible for information you provide. According to General Data
                Protection Regulation (EU) 2016/679 of 27 April 2016 ("GDPR") controller is a person that determines the
                purposes and the means of processing of your personal data.
            </p>
            <p class="text- fs-5 mb-3">
                GDPR is a system of standards and rules for collection, processing and deleting personal data of
                customers.
                Due to the principles, which the GDPR system is based on, each customer allows to collect and process
                his/her personal information. In addition, companies are obliged to provide the transparent, clear and
                defined possibility for its customers to manage it.
            </p>
            <p class="text- fs-5 mb-3">

                In this regulation the GDPR developers define two active users of personal data – controller and
                processor
                of data. daady.link is a controller of clients’ data and the processor of their subscribers’ data.
            </p>
            <p class="text- fs-5 mb-3">

                Moreover, the regulation defines the information which is considered to be «personal data» and subjects
                to
                the regulation according to the GDPR. In terms of the service daady.link usage, personal data of our
                clients
                is their account data – obligatory (e-mail address as a login in the service) and additional (name,
                phone
                number, Skype name) and online-identifiers of the web session (browser, geolocation, type and
                operational
                system of device, IP-address, cookies). Apart from, the service processes the subscribers’ data, while
                getting their encrypted unique client identifier (regID) and other information about the web session
                (browser type, IP-address, geolocation, cookies, type of device and operational system).
            </p>
            <p class="text- fs-5 mb-3">
                daady.link receives personal data exclusively for smooth work of the service, maintaining the on-time
                and
                guaranteed communication with a client and performing its functions according to the services it
                provides.
                daady.link does not receive and save data which is unnecessary and does not take part in the service
                performance.
            </p>
            <p class="text- fs-5 mb-3">
                Data, which daady.link receives, is available for a client exclusively in his/her personal account
                («Account
                settings») and for the service specialists (technical, financial specialists and client managers) to let
                them perform their duties in terms of ensuring the functioning of the service. In this way, clients have
                the
                right to access their data which they provide to the service, transfer it, edit or delete in the
                appropriate
                way.
            </p>
            <p class="text- fs-5 mb-3">

                Data is received provided that the client has allowed it during the process of registration his/her
                account
                (by agreeing to the daady.link terms of use). When making changes in the daady.link Terms of Use, the
                service informs its clients about the changes and update the information on Website including the date
                of
                these updates. Customer data and personal information of subscribers are stored by the «throughout the
                lifetime» principle – it is saving during the lifetime of the client. The client may send a request for
                editing or deleting the personal data only from his/her e-mail address, which is the identifier of
                client’s
                account in the service.
            </p>
            <h4 class="fs-3 fw-bold mb-2">
                If you are a daady.link customer and have any specific questions regarding your data or if you wish to
                correct, update, modify or delete your personal data stored by us, you should contact the customer
                success
                team .
            </h4>
            <p class="text- fs-5 mb-3">
                Why we collect and process your personal data
                We are extremely serious about your privacy and use your personal data only for legitimate reasons and
                in
                accordance with personal data protection law, for purposes such as:
            </p>
            <ol class="list-group list-group-numbered mb-3">
                <li class="list-group-item"> to provide you with the Services you request;</li>
                <li class="list-group-item"> to ensure that our Website content is presented on your device in the most
                    effective way;</li>
                <li class="list-group-item"> to contact you in relation to our Services process;</li>
                <li class="list-group-item"> to carry out our obligations arising from any contracts entered into
                    between you and daady.link;</li>
                <li class="list-group-item"> to manage your Profile, including processing payments and refunds and
                    providing notifications;</li>
                <li class="list-group-item"> to keep our Website safe and secure;</li>
                <li class="list-group-item"> to notify you about changes in our Services;</li>
                <li class="list-group-item"> to respond to, and handle any comments, queries or complaints addressed by
                    you regarding the Website and our Services, and any similar comments, queries or complaints from
                    other customers;</li>
                <li class="list-group-item"> to conduct research, statistical and behavioral analysis;</li>
                <li class="list-group-item"> to contact you for marketing purposes, where applicable;</li>
                <li class="list-group-item"> to administer our Website and for internal operations, including
                    troubleshooting, data analysis, testing, research, statistical and survey purposes;</li>
                <li class="list-group-item"> to make suggestions and recommendations to you and other customers of
                    Website about services that may interest you or them.</li>
            </ol>
            <h4 class="fs-3 fw-bold mb-2">
                Collected data
            </h4>
            <p class="text- fs-5 mb-3">
                As you visit daady.link , We may collect information through the commonly used information-gathering
                tools,
                such as cookies and website navigation information such as browser type and language, IP address, the
                actions you take on the Website.
            </p>
            <h4 class="fs-3 fw-bold mb-2">
                We collect account information for each User, including:
            </h4>
            <p class="text- fs-5 mb-3">
                Basic account information like name, email address;
                Data and configurations required for technical purposes (e.g. senders and notifications);
                Log information required for debugging, security and development in general;
                Billing information required for invoices and payments. We rely on third-party services, so they may
                receives the encrypted information about the payment instrument and client’s e-mail, which identifies
                the
                client.
                <br>
                Data collected on Our Users’ final users <br>
                Data collected on Our Users' users may include:
            </p>
            <ol class="list-group list-group-numbered mb-3">
                <li class="list-group-item"> Technical data related to the notifications, messages or emails; </li>
                <li class="list-group-item"> Technical and non-technical data provided by Our Users (e.g. phone numbers,
                    tags and user aliases); </li>
                <li class="list-group-item"> We do not perform any kind of profiling. We don't extract any specific
                    meaning from any data used by Our
                    Users for targeting of their marketing campaigns.</li>
                <li class="list-group-item"> We collect final users’ information when they use Our Users’ websites. This
                    information may include but is not limited to anonymized IP addresses, location, system
                    configuration information, and URLs of
                    Our Users’ website accessed by final users. We collect and use this data to operate, maintain, and
                    improve our services.</li>
            </ol>


            <h4 class="fs-3 fw-bold mb-2">
                Third-party services
            </h4>
            <p class="text- fs-5 mb-3">
                We may use third party services such as:
            </p>
            <ol class="list-group list-group-numbered mb-3">
                <li class="list-group-item">
                    Hosting providers Microsoft Azure and AWS. The servers are located mainly in the territory of
                    European
                    Union.</li>
                <li class="list-group-item">
                    Messaging service providers (e.g. Viber, Telegram).
                </li>
                <li class="list-group-item">
                    Proprietary push notifications infrastructures (e.g. APNS, FCM, Mozilla autopush).
                    Payment processors.
                </li>
                <li class="list-group-item">
                    We do not sell, trade or otherwise transfer Our Users' data or their users' data to any third
                    parties
                    for
                    commercial purposes.
                </li>
            </ol>
            <h4 class="fs-3 fw-bold mb-2">
                Data protection and security
            </h4>
            <p class="text- fs-5 mb-3">
                daady.link is committed to ensuring that your data is secure. We use appropriate administrative and
                technical measures to protect data about Our Users. The measures We use, are designed to provide a level
                of
                security appropriate to the risk of processing Our Users' and their users' personal data.
            </p>
            <h4 class="fs-3 fw-bold mb-2">
                Children’s personal data
            </h4>
            <p class="text- fs-5 mb-3">
                daady.link is not intended for use by children. We do not knowingly collect any personal data from
                children
                under the age of 16. If You are under the age of 16, please do not submit any personal data through Our
                Site
                or Service.
            </p>
            <h4 class="fs-3 fw-bold mb-2">
                Changes to our privacy policy
            </h4>
            <p class="text- fs-5 mb-3">
                We may change this Privacy Policy as it may be necessary, or as it may be required by law. Any
                changes
                will
                be posted on the Website and You will be deemed to have accepted the terms of the Privacy Policy on
                Your
                first use of the Website following the alterations. We recommend that You read this page regularly
                to
                keep
                informed.
            </p>
            <p class="text-muted fs-5 mb-3 mt-5 fw-bold">
                Last updated: June 1, 2019
            </p>
        </main>
        <br><br>
    </div>
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
</body>

</html>
