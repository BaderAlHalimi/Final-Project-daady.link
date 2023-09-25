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
            <h2 class="fs-2 fw-bold mb-4">Term Of Use</h2>
            {{-- <h4 class="fs-3 fw-bold mb-2">Welcome to <a href="{{ route('home') }}">https://daady.link/</a> (the "Website", “Our --}}
            <p class="text- fs-5 mb-3">
                This web page represents a legal document that serves as our Terms of Service and it governs the legal
                terms of our website, <a href="{{ route('home') }}">https://daady.link/</a>, sub-domains, and any
                associated web-based and mobile
                applications (collectively, "Website"), as owned and operated by <a
                    href="{{ route('home') }}">daady.link</a>.
            </p>
            <p class="text- fs-5 mb-3">
                <span class="fw-bold">Capitalized terms</span>, unless otherwise defined, have the meaning specified
                within the Definitions section
                below. This Terms of Service, along with our Privacy Policy, any mobile license agreement, and other
                posted guidelines within our Website, collectively "Legal Terms", constitute the entire and only
                agreement between you and <a href="{{ route('home') }}">daady.link</a>, and supersede all other
                agreements, representations, warranties
                and understandings with respect to our Website and the subject matter contained herein. We may amend our
                Legal Terms at any time without specific notice to you. The latest copies of our Legal Terms will be
                posted on our Website, and you should review all Legal Terms prior to using our Website. After any
                revisions to our Legal Terms are posted, you agree to be bound to any such changes to them. Therefore,
                it is important for you to periodically review our Legal Terms to make sure you still agree to them.
            </p>
            <p class="text- fs-5 mb-3">
                <span class="fw-bold">By using our Website</span>, including but not limited to signing in the
                <a href="{{ route('home') }}">daady.link</a> service, you agree to fully
                comply with and be bound by our Legal Terms. Please review them carefully. Installing the code on your
                site with the further collection of subscribers is a confirmation of the fact that you assume the
                responsibility for all actions on the Website and the consequences of using the <a
                    href="{{ route('home') }}">daady.link</a> service
                associated with the work of its scripts and functions within the framework of your site. If you do not
                accept our Legal Terms, do not access and use our Website. If you have already accessed our Website and
                do not accept our Legal Terms, you should immediately discontinue use of our Website.
            </p>
            <p class="text- fs-5 mb-3">
                The last update to our Terms of Service was posted on 15.08.2018.
            </p>
            <h4 class="fs-3 fw-bold mb-2">
                Definitions
            </h4>
            <ol class="list-group list-group-numbered mb-3">
                <li class="list-group-item">
                    The terms "us" or "we" or "our" refers to <a href="{{ route('home') }}">daady.link</a>, the owner
                    of the
                    Website
                </li>
                <li class="list-group-item">
                    A "Visitor" is someone who merely browses our Website but has not registered as Member.
                </li>
                <li class="list-group-item">
                    A "Member" is an individual that has registered with us to use our Service.
                </li>
                <li class="list-group-item">
                    Our "Service" represents the collective functionality and features as offered through our Website to
                    our Members.
                </li>
                <li class="list-group-item">
                    A "User" is a collective identifier that refers to either a Visitor or a Member.
                </li>
                <li class="list-group-item">
                    All text, information, graphics, audio, video, and data offered through our Website are collectively
                    known as our "Content".
                </li>
            </ol>
            <h4 class="fs-3 fw-bold mb-2">
                Legal Compliance
            </h4>
            <p class="text- fs-5 mb-3">
                You agree to comply with all applicable domestic and international laws, statutes, ordinances, and
                regulations regarding your use of our Website. <a href="{{ route('home') }}">daady.link</a> reserves
                the right to investigate complaints
                or reported violations of our Legal Terms and to take any action we deem appropriate, including but not
                limited to canceling your Member account, reporting any suspected unlawful activity to law enforcement
                officials, regulators, or other third parties and disclosing any information necessary or appropriate to
                such persons or entities relating to your profile, email addresses, usage history, posted materials, IP
                addresses and traffic information, as allowed under our Privacy Policy.
            </p>
            <h4 class="fs-3 fw-bold mb-2">
                Intellectual Property
            </h4>
            <p class="text- fs-5 mb-3">
                Our Website may contain our service marks or trademarks as well as those of our affiliates or other
                companies, in the form of words, graphics, and logos. Your use of our Website does not constitute any
                right or license for you to use such service marks/trademarks, without the prior written permission of
                the corresponding service mark/trademark owner. Our Website is also protected under international
                copyright laws. The copying, redistribution, use or publication by you of any portion of our Website is
                strictly prohibited. Your use of our Website does not grant you ownership rights of any kind in our
                Website.
            </p>
            <h4 class="fs-3 fw-bold mb-2">
                General Terms
            </h4>
            <p class="text- fs-5 mb-3">
                Our Legal Terms shall be treated as though it were executed and performed Europe and shall be governed
                by and construed in accordance with the laws of Europe, without regard to conflict of law principles. In
                addition, you agree to submit to the personal jurisdiction and venue of such courts. Any cause of action
                by you with respect to our Website, must be instituted within one (1) year after the cause of action
                arose or be forever waived and barred. Should any part of our Legal Terms be held invalid or
                unenforceable, that portion shall be construed consistent with applicable law and the remaining portions
                shall remain in full force and effect. To the extent that any Content in our Website conflicts or is
                inconsistent with our Legal Terms, our Legal Terms shall take precedence. Our failure to enforce any
                provision of our Legal Terms shall not be deemed a waiver of such provision nor of the right to enforce
                such provision. The rights of <a href="{{ route('home') }}">daady.link</a> under our Legal Terms shall
                survive the termination of our
                Legal Terms.
            </p>
            <h4 class="fs-3 fw-bold mb-2">
                Payment for services
            </h4>
            <p class="text- fs-5 mb-3">
                A payment conducted in your personal account of the <a href="{{ route('home') }}">daady.link</a>
                service via billing system is the
                evidence of providing the services to the User by <a href="{{ route('home') }}">daady.link</a> in full
                scope, acceptation thereof and the
                confirmation of mutual settlements between Parties, including the absence of any claims and requirements
                from the User for the previous periods.
            </p>
            <h4 class="fs-3 fw-bold mb-2">
                Cancellation policy for paying customers
            </h4>
            <p class="text- fs-5 mb-3">
                A customer can cancel subscription anytime using the payment service, he`s used for ordering the
                subscription. No refunds or credits for partial months or years of service will be made to a customer
                upon cancellation.
            </p>
            <h4 class="fs-3 fw-bold mb-2">
                GDPR compliance
            </h4>
            <p class="text- fs-5 mb-3">
                <a href="{{ route('home') }}">daady.link</a> is a service which works on different markets throughout
                the world, including
                customers-residents of EU. In particular, <a href="{{ route('home') }}">daady.link</a> provides access
                to its services to the customers in
                such local language versions as: English. EU policy in terms of customers’ personal data protection due
                to the accepted standards has taken shape in form of GDPR rules (General Data Protection Regulation).
            </p>
            <p class="text- fs-5 mb-3">
                GDPR is a system of standards and rules for collection, processing and deleting personal data of
                customers. Due to the principles, which the GDPR system is based on, each customer allows to collect and
                process his/her personal information. In addition, companies are obliged to provide the transparent,
                clear and defined possibility for its customers to manage it.
            </p>
            <p class="text- fs-5 mb-3">
                In this regulation the GDPR developers define two active users of personal data – controller and
                processor of data. <a href="{{ route('home') }}">daady.link</a> is the controller of clients’ data and
                the processor of their subscribers’
                data.
            </p>
            <p class="text- fs-5 mb-3">
                Moreover, the regulation defines the information which is considered to be «personal data» and subjects
                to the regulation according to the GDPR. In terms of the service <a
                    href="{{ route('home') }}">daady.link</a> usage, personal data of our
                clients is their account data – obligatory (e-mail address as a login in the service) and additional
                (name, phone number, Skype name) and online-identifiers of the web session (browser, geolocation, type
                and operational system of device, IP-address, cookies). Apart from, the service processes the
                subscribers’ data, while getting their encrypted unique client identifier (regID) and other information
                about the web session (browser type, IP-address, geolocation, cookies, type of device and operational
                system).
            </p>
            <p class="text- fs-5 mb-3">
                <a href="{{ route('home') }}">daady.link</a> receives personal data exclusively for smooth work of the
                service, maintaining the on-time
                and guaranteed communication with a client and performing its functions according to the services it
                provides. <a href="{{ route('home') }}">daady.link</a> does not receive and save data which is
                unnecessary and does not take part in the
                service performance.
            </p>
            <p class="text- fs-5 mb-3">
                Data, which <a href="{{ route('home') }}">daady.link</a> receives, is available for a client
                exclusively in his/her personal account
                («Account settings») and for the service specialists (technical, financial specialists and client
                managers) to let them perform their duties in terms of ensuring the functioning of the service. In this
                way, clients have the right to access their data which they provide to the service, transfer it, edit or
                delete in the appropriate way.
            </p>
            <p class="text- fs-5 mb-3">
                Data is received provided that the client has allowed it during the process of registration his/her
                account (by agreeing to the <a href="{{ route('home') }}">daady.link</a> terms of use). When making
                changes in the <a href="{{ route('home') }}">daady.link</a> Terms of
                Use, the service informs its clients about the changes and update the information on the website
                including the date of these updates. Customer data and personal information of subscribers are stored by
                the «throughout the lifetime» principle – it is saving during the lifetime of the client. The client may
                send a request for editing or deleting the personal data only from his/her e-mail address, which is the
                identifier of client’s account in the service.
            </p>
            <p class="text- fs-5 mb-3">
                Payment data of <a href="{{ route('home') }}">daady.link</a> client is available to the financial
                specialists of the service and to the
                payment service, which is processing the payment. The payment service receives the encrypted information
                about the payment instrument, client’s e-mail, which identifies the client and the IP-address of the web
                session.
            </p>
            {{-- <h4 class="fs-3 fw-bold mb-2">Welcome to <a href="{{ route('home') }}">https://daady.link/</a> (the "Website", “Our
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
            </ol> --}}
        </main>
        <br><br>
    </div>
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
</body>

</html>
