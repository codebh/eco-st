@extends('style.newIndex')
@section('content')
    <!-- breadcrumb start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ trans('user.privacy_p') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        @if (session('lang') == 'ar')

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>/
                            <li class="breadcrumb-item"><a href="#">{{trans('user.policies')}}</a></li>
                            <span  aria-current="page">{{trans('user.privacy_p')}}</span>
                        </ol>
                        @else
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>
                            <li class="breadcrumb-item">{{trans('user.policies')}}</li>/
                            <span  aria-current="page">{{trans('user.privacy_p')}}</span>
                        </ol>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end-->


    <!--section start-->
    <section class="blog-detail-page section-b-space ratio2_3">
        <div class="container">
            @forelse (\App\Models\Blog::where('name','privacy')->get() as $blog)
                <div class="row">
                    @if (session('lang')=='ar')


                        {!! $blog->blog_ar !!}

                    @else
                        {!! $blog->blog_en !!}

                    @endif
                </div>
                @empty
                <div class="row">
                    <div class="col-sm-12 blog-detail">


                        @if(direction()=='ltr')


                            <h3> Privacy Policy</h3>

                            <p>At Tafseel, we care about privacy. We believe in transparency, and we’re committed to being upfront about our privacy practices, including how we treat your personal information.We know you care about your privacy too. This policy explains our privacy practices for TAFSEEL website, mobile app, and all TAFSEEL services. </p>

                            <br>

                        @else


                            <h3> سياسة الخصوصية</h3>

                            <p>
                                نهتم نحن في تفصيل بالخصوصية، و نؤمن بالشفافية، وملتزمون بأن نكون صريحين بشأن ممارسات الخصوصية لدينا، بما في ذلك كيفية تعاملنا مع معلوماتك الشخصية. نحن نعلم أنك تهتم بخصوصيتك أيضًا، توضح هذه السياسة ممارسات الخصوصية لمنصة تفصيل وجميع خدماتها
                                .</p>
                            <br>
                        @endif



                    </div>

                </div>
                <div class="row section-b-space">
                    <div class="col-sm-12">
                        <ul class="comment-section">
                            <div class="row">
                                <li>
                                    <div class="media">
                                        <div class="media-body ">

                                            @if(direction()=='ltr')


                                                <h6>1. Our Privacy Policy</h6>
                                                <p style="text-align: justify; text-justify: inter-word;">We process your personal information to run our business and provide our users with the Services. By accepting our Terms of use (by acknowledging this policy), you confirm that you have read and understand this policy, including how and why we use your information. If you don’t want us to collect or process your personal information in the ways described in this policy, you shouldn’t use the Services. We are not responsible for the content or the privacy policies or practices of any of our members, websites hosted through Tafseel, or third-party websites and apps. </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">Tafseel’s Terms of use require all account owners to be at least 18 years of age. Minors under 18 years of age and at least 13 years of age are permitted to use TAFSEEL’s Services only if they have permission and direct supervision by the owner of the account. Children under age 13 are not permitted to use the Services. You are responsible for any and all account activity conducted by a minor on your account.  </p>

                                            @else


                                                <h6>1. سياسة الخصوصية الخاصة بنا</h6>
                                                <p style="text-align: justify; text-justify: inter-word;">نقوم في تفصيل بمعالجة معلوماتك الشخصية لإدارة أعمالنا وتزويد مستخدمينا بالخدمات. من خلال قبولك لشروط الاستخدام الخاصة بنا، ومن خلال الاعتراف بهذه السياسة، فإنك تؤكد أنك قد قرأت هذه السياسة وفهمتها، بما في ذلك كيفية وسبب استخدامنا لمعلوماتك. إذا كنت لا تريد منا جمع معلوماتك الشخصية أو معالجتها بالطرق الموضحة في هذه السياسة، فلا ينبغي عليك استخدام الخدمات. نحن لسنا مسؤولين عن المحتوى أو سياسات الخصوصية أو ممارسات أي من أعضائنا، والمواقع التي يتم استضافتها من خلال تفصيل، أو مواقع الويب والتطبيقات التابعة لجهات خارجية.</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">شروط الاستخدام تتطلب أن يكون عمر جميع مالكي الحسابات 18 سنة على الأقل. لا يسمح للقاصرين الذين تقل أعمارهم عن 18 سنة ولا يقل عمرهم عن 13 سنة باستخدام خدمات تفصيل إلا إذا كان لديهم إذن وإشراف مباشر من قبل صاحب الحساب. لا يُسمح للأطفال دون سن 13 استخدام الخدمات. أنت مسؤول عن أي نشاط حساب وكلّه يقوم به قاصر على حسابك.</p>

                                            @endif


                                        </div>
                                    </div>
                                </li>
                            </div>


                            <div class="row">
                                <li>
                                    <div class="media">
                                        <div class="media-body">


                                            @if(direction()=='ltr')

                                                <h6>2. Information Collected or Received </h6>

                                                <p style="text-align: justify; text-justify: inter-word;">In the course of providing our Services, we collect or receive your personal information in a few different ways. We obtain the categories of personal information listed below from the following sources: directly from you, for example, from forms you complete or during registration; indirectly from you based on your activity and interaction with our Services, or from the device or browser you use to access the Services; from our vendors and suppliers that help provide TAFSEEL services you may interact with (such as, for example, for payments or customer support), and from our third party advertising and marketing partners. </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> Often, you choose what information to provide, but sometimes we require certain information to provide you the Services. TAFSEEL uses the personal information it receives and collects in accordance with the purposes described in this policy.</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">You can also choose to provide information to a third party, TAFSEEL does not have a direct partner relationship with these third parties and their processing of information is subject to their own privacy policies. You should understand the privacy and security practices of any third party before you share information with them.  </p>
                                                <br>

                                                <p style="text-align: justify; text-justify: inter-word;"> 2.1Registration, Account Setup, Service Usage.</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> In order to use the Services, you will need to submit a valid email address. If you register, you will need to submit a name associated with your account. You may modify that name through your account settings. You need to provide this information to enable us to provide you with the Services. Additional information, such as a shop name, billing and payment information (including billing contact name, address, telephone number, credit card information), a telephone number, and/or a physical postal address, may be necessary in order for us to provide a particular service. For example, we need a physical postal address when you are buying something on the Site for delivery. </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">As a TAFSEEL seller, if you choose to use our payment service, TAFSEEL may requires your full name, date of birth, bank account information, credit card information, and/or other proof of identification in order to verify your identity, provide this service to you, and comply with applicable law. </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">For both buyers and sellers, TAFSEEL requires this information from you in order to provide you with the Services (including, to verify ownership of an account, to mitigate fraud and abuse, to comply with regulatory obligations, or to complete a transaction as a buyer or seller). We may store credit card information for both billing and payment purposes.</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> TAFSEEL may contact individual shop owners confidentially to request more information about their shops or items listed through the Services or may request information from buyers to ensure compliance with our policies and applicable law.
                                                    In order to use certain  services on TAFSEEL, you may be required to complete an application; information that you submit through the application process will not be displayed publicly and will only be used internally by TAFSEEL and its service providers, unless otherwise specified </p>

                                                <br>

                                                <p style="text-align: justify; text-justify: inter-word;"> 2.2Profile</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> You may provide your name and other personal information (such as birthday, gender, location) in connection with your account and activity. name associated with your account (which you may modify in your account settings) is publicly displayed and connected to your TAFSEEL activity.  </p>
                                                <br>

                                                <p style="text-align: justify; text-justify: inter-word;"> 2.3 Automated Information</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> TAFSEEL automatically receives and records information from your browser or your mobile device when you visit the Site, use the Apps, or use certain features of the Services, such as your IP address or unique device identifier, cookies, and data about which pages you visit and how you interact with those pages in order to allow us to operate and provide the Services. This information is stored in log files and is collected automatically. </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">TAFSEEL may also receive similar information (like, for example, IP addresses and actions taken on the device) provided by a connected Internet of Things device such as a voice-activated assistant or Smart TV. We may combine this information from your browser or your mobile device with other information that we or our advertising or marketing partners collect about you, including across devices. This information is used to prevent fraud and to keep the Services secure, to analyze and understand how the Services work for members and visitors, and to provide advertising, including across your devices, and a more personalized experience for members and visitors</p>
                                                <br>

                                                <p style="text-align: justify; text-justify: inter-word;"> 2.4 Data from TAFSEEL Vendors and Suppliers</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> We also receive information from our vendors and suppliers about you. This information can include customer service interactions, payments information, delivery information </p>
                                                <br>

                                                <p style="text-align: justify; text-justify: inter-word;"> 2.5 Data from Advertising and Marketing Partners</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> As described below, TAFSEEL receives information from our advertising and marketing partners about you. This information can include attribution information via cookies, or UTM tags in URLs to determine where a visit to TAFSEEL comes from, responses to marketing emails and advertisements, responses to offers, and audience information from partners who you have given consent to share that information with us.</p>
                                                <br>

                                                <p style="text-align: justify; text-justify: inter-word;"> 2.6 Location Information </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> We collect information about your use of the Services for advertising, for analytics, to serve content, and to protect the Services. This can include your IP address, browser information (including referrers), device information, and when enabled by you, location information provided by your device). When you use the Apps, you can choose to share your geolocation details with TAFSEEL in order to use functions like our local marketplace.
                                                    We obtain location information you provide in your profile or your IP address.
                                                </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">With your consent, we may also determine location by using other information from your device, such as precise location information from GPS or information about wireless networks or cell towers near your mobile device. We use and store information about your location to provide features and to improve and customize the Services, for example, for TAFSEEL’s internal analytics and performance monitoring; localization, regional requirements, and policies for the Services; for local content, search results, and recommendations; for delivery and mapping services; and (using non-precise location information) marketing. If you have consented to share your precise device location details but would no longer like to continue sharing that information with us, you may revoke your consent to the sharing of that information through the settings on the Apps or on your mobile device. </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">Certain non-precise location services, such as for security and localized policies based on your IP address or submitted address, are critical for the Site to function. We will only share your geolocation details with third parties (like our mapping, payments, or, to the extent applicable, advertising providers) in order to provide you with the Services. You may also choose to enable the Apps to access your mobile device’s camera to upload photographs to TAFSEEL.</p>
                                                <br>

                                                <p style="text-align: justify; text-justify: inter-word;"> 2.7 Analytics Information</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> We use data analytics software to ensure Site and App functionality and to improve the Services. This software records information such as how often you use the Apps, what happens within the Apps, aggregated usage, performance data, app errors and debugging information, and where the Apps were downloaded from. We do not link the information we store within the analytics software to any personally identifiable information that you submit within the mobile application.  </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> 2.8 Information from Third Parties </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">  Some members or visitors may choose to connect to TAFSEEL or register a TAFSEEL account using an external third-party application, such as Facebook, or Google. Connecting your TAFSEEL account to third-party applications or services is optional. If you choose to connect your account to a third-party application, TAFSEEL can receive information from that application. We may also collect public information in order to connect with you, such as when we communicate with you over social media. We may use that information as part of providing the Services to you. You can also choose to share some of your activity on TAFSEEL on certain social media networks which are connected to your TAFSEEL account, and you can revoke your permission anytime in your account settings.</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">Certain third-party applications that you use to create or sign in to your account may provide you with the option to discontinue receiving messages from us or allows you to forward those messages to another email address. If we are unable to send you critical messages about your account, we may suspend or terminate your account. </p>
                                                <br>

                                                <p style="text-align: justify; text-justify: inter-word;"> 2.9 Non-Member Information</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> TAFSEEL receives or obtains information (for example, an email address or IP address) about a person who is not yet a registered TAFSEEL member (a “non-member”) in connection with certain TAFSEEL features, such as when a non-member chooses to subscribe to an TAFSEEL newsletter, a member invites a non-member to visit the Site, a member uploads non-member information using the contact uploader feature, a non-member engages in a transaction, a member sends a gift card code to a non-member, or a non-member uses Guest Checkout to make a purchase.  </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">Non-member information is used only for the purposes disclosed when it was submitted to TAFSEEL, for purposes necessary to the functioning of TAFSEEL’s Services or where TAFSEEL has a legitimate interest.</p>
                                                <br>

                                        </div>
                                    </div>
                                </li>


                                @else


                                    <h6>2.المعلومات التي يتم جمعها أو استلامها </h6>

                                    <p style="text-align: justify; text-justify: inter-word;">في سياق تقديم خدماتنا، نقوم بجمع أو استلام معلوماتك الشخصية بطرق مختلفة. نحصل على فئات المعلومات الشخصية المذكورة من المصادر التالية: مباشرة منك، على سبيل المثال، من النماذج التي قمت بإكمالها أو أثناء التسجيل. منك بشكل غير مباشر بناءً على نشاطك وتفاعلك مع خدماتنا، أو من الجهاز أو المتصفح الذي تستخدمه للوصول إلى الخدمات؛ من موردينا الذين يساعدون في تقديم خدمات تفصيل التي قد تتفاعل معها (على سبيل المثال، للمدفوعات أو دعم العملاء)، ومن شركائنا في مجال الإعلان والتسويق.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> في كثير من الأحيان، يمكنك اختيار المعلومات التي يجب توفيرها، ولكن في بعض الأحيان نحتاج إلى معلومات معينة لتزويدك بالخدمات. تستخدم تفصيل المعلومات الشخصية التي تتلقاها وتجمعها وفقًا للأغراض الموضحة في هذه السياسة.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">يمكنك أيضا اختيار تقديم معلومات إلى طرف ثالث، تفصيل ليس لديها علاقة شراكة مباشرة مع هذه الأطراف، ومعالجتها للمعلومات تخضع لسياسات الخصوصية الخاصة بهم. يجب عليك فهم الخصوصية وشروط الاستخدام لأي طرف ثالث قبل مشاركة المعلومات معهم.  </p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;"> 2.1التسجيل، إعداد الحساب، استخدام الخدمة</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> من أجل استخدام  خدمات تفصيل، سوف تحتاج إلى إرسال عنوان بريد إلكتروني صالع وفعال. إذا قمت بالتسجيل، فستحتاج إلى إرسال اسم مرتبط بحسابك. يمكنك تعديل هذا الاسم من خلال إعدادات الحساب. هذه المعلومات مهمة لتمكننا من تزويدك بالخدمات. وقد هناك تكون المعلومات الإضافية، مثل اسم المحل، الفواتير ومعلومات الدفع (بما في ذلك اسم جهة الاتصال بالفوترة، العنوان، رقم الهاتف، معلومات بطاقة الائتمان)، رقم الهاتف و/أو عنوان بريدي فعلي، ضرورية من أجل تقديم خدمة معينة. لتسليم الطلب لى سبيل المثال . </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">كبائع في تفصيل، إذا اخترت استخدام خدمة الدفع الخاصة بنا، قد تطلب تفصيل اسمك الكامل وتاريخ ميلادك ومعلومات الحساب المصرفي ومعلومات بطاقة الائتمان و/أو أي إثبات آخر لإثبات هويتك، وتقديم هذه الخدمة لك، والامتثال للقانون المعمول به. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">بالنسبة للمشتري والبائع، تطلب تفصيل هذه المعلومات منك من أجل تزويدك بالخدمات (بما في ذلك، للتحقق من ملكية حساب ما، والتخفيف من الغش وسوء الاستخدام، والامتثال للالتزامات التنظيمية، أو إتمام معاملة كمشتري أو بائع. قد نقوم بتخزين معلومات بطاقة الائتمان لكل من الفواتير والدفع..</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> قد يتم التواصل مع أصحاب المحلات الفردية بشكل سري لطلب مزيد من المعلومات حول المحلات التجارية أو البنود المدرجة من خلال الخدمات، أو قد طلب معلومات من المشترين لضمان الامتثال لسياساتنا والقانون المعمول به.
                                        من أجل استخدام خدمات معينة على تفصيل ، قد يطلب منك إكمال الطلب. المعلومات التي تقدمها من خلال عملية تقديم الطلب لن يتم عرضها علناً وسوف تستخدم فقط داخلياً من قبل تفصيل ومقدمي خدماتها، ما لم ينص على خلاف ذلك.
                                    </p>

                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;"> 2.2 الملف الشخصي</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> يمكنك تقديم اسمك ومعلوماتك الشخصية أخرى (مثل تاريخ الميلاد والجنس والموقع) فيما يتعلق بحسابك ونشاطك. يتم عرض اسم الحساب(والذي قد تقوم بتعديله في إعدادات حسابك) بشكل عام وهومتصل بنشاطك في تفصيل </p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;"> 2.3 معلومة تلقائية </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">
                                        تتلقى تفصيل بشكل تلقائي المعلومات من المتصفح أو الجهاز المحمول الخاص بك، عندما تقوم بزيارة الموقع، أو استخدامه، مثل عنوان IP الخاص بك أو معرف الجهاز ، الكوكيز، والبيانات حول الصفحات التي تزورها وكيفية تفاعلك مع تلك الصفحات من أجل السماح لنا بالعمل وتقديم الخدمات. يتم تخزين هذه المعلومات في ملفات السجل ويتم تجميعها تلقائياً. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">
                                        قد تتلقى تفصيل أيضًا معلومات اخرى مثل، عناوين IP والإجراءات المتخذة على الجهاز التي يوفرها جهاز. قد نجمع هذه المعلومات من متصفحك أو جهازك المحمول مع معلومات أخرى نجمعها نحن أو شركاؤنا في الإعلان والتسويق عنك،  وتستخدم هذه المعلومات لمنع الاحتيال والحفاظ على الخدمات آمنة، لتحليل وفهم كيفية عمل الخدمات للأعضاء والزوار، وتقديم الإعلانات، بما في ذلك عبر الأجهزة الخاصة بك، وتجربة أكثر تخصيصا للأعضاء والزوار.

                                    </p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;"> 2.4 بيانات من تفصيل البائعين</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> كما نتلقى معلومات من البائعين عنك. يمكن أن تتضمن هذه المعلومات تفاعلات خدمة العملاء ومعلومات الدفع والتسليم.</p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;"> 2.5 بيانات من شركاء الإعلان والتسويق</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> تتلقى تفصيل معلومات من شركاء الإعلان والتسويق عن المستخدمين. يمكن أن تتضمن هذه معلومات الإسناد عبر ملفات تعريف الارتباط، أو علامات UTM في عناوين URL لتحديد المكان الذي تأتي منه زيارة تفصيل ، والردود على رسائل البريد الإلكتروني والإعلانات التسويقية، والاستجابات للعروض، ومعلومات الجمهور من الشركاء الذين وافقت على مشاركة تلك المعلومات معنا.</p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;"> 2.6 معلومات الموقع </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> يتم جمع معلومات حول استخدامك للخدمات في الإعلانات لغرض التحليلات وخدمة المحتوى وحماية الخدمات. ويمكن أن يتضمن ذلك عنوان IP الخاص بك، ومعلومات المتصفح ، ومعلومات الجهاز، و معلومات الموقع التي يوفرها جهازك. عند استخدام التطبيقات، يمكنك اختيار مشاركة تفاصيل تحديد الموقع الجغرافي مع من أجل استخدام بعض الأدوات .
                                        نحصل على معلومات الموقع التي تقدمها في ملفك الشخصي أو عنوان IP الخاص بك. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">
                                        قد نقوم أيضاً بتحديدالموقع باستخدام معلومات أخرى من جهازك-بموافقتك-، مثل معلومات الموقع الدقيقة من نظام تحديد المواقع العالمي (GPS). نستخدم ونخزن المعلومات حول موقعك لتوفير الميزات وتحسين وتخصيص الخدمات، على سبيل المثال، للتحليلات الداخلية ومراقبة الأداء في تفصيل ؛ التعريب والمتطلبات الإقليمية والسياسات الخاصة بالخدمات؛ للمحتوى المحلي ونتائج البحث والتوصيات؛ لخدمات التسليم ورسم الخرائط؛ والتسويق. إذا كنت قد وافقت على مشاركة تفاصيل موقع الجهاز ولكنك لم تعد ترغب في الاستمرار في مشاركة تلك المعلومات معنا، يمكنك إلغاء موافقتك على مشاركة تلك المعلومات من خلال الإعدادات على التطبيقات أو على جهازك المحمول. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">بعض خدمات الموقع غير الدقيقة تعتبر ذات أهمية حاسمة بالنسبة للموقع لكي يعمل. سنشارك تفاصيل تحديد الموقع الجغرافي مع أطراف ثالثة (مثل الخرائط أو المدفوعات أو، بقدر ما ينطبق ذلك) من أجل توفير الخدمات لك. يمكنك أيضًا اختيار تمكين التطبيقات من الوصول إلى كاميرا جهازك المحمول لتحميل الصور إلى تفصيل..</p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;"> 2.7 معلومات التحليلات</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">نحن نستخدم برنامج تحليل البيانات لضمان وظائف الموقع والتطبيق ولتحسين الخدمات. يقوم هذا البرنامج بتسجيل معلومات مثل عدد مرات استخدام التطبيقات، وما يحدث داخل التطبيقات، والاستخدام ، وبيانات الأداء، وأخطاء التطبيقات، ومعلومات التصحيح، والمكان الذي تم تنزيل التطبيقات منه. لا يتم نربط المعلومات المخزنة داخل برنامج التحليلات بأي معلومات شخصية يتم تحديدها والتي ترسلها داخل تطبيق الهاتف المحمول.   </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> 2.8 المعلومات من أطراف ثالثة </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> قد يختار بعض الأعضاء أو الزوار الاتصال بـ تفصيل أو تسجيل حساب تفصيل باستخدام تطبيق خارجي من جهة خارجية، مثل فيسبوك أو جوجل. إن توصيل حساب تفصيل الخاص بك بتطبيقات أو خدمات الجهات الأخرى أمر اختياري. إذا اخترت ربط حسابك بتطبيق من جهة خارجية، يمكن لـ تفصيل الحصول على معلومات من هذا التطبيق. قد نقوم أيضا بجمع المعلومات العامة من أجل التواصل معك، مثل عندما نتواصل معك عبر وسائل التواصل الاجتماعي. قد نستخدم هذه المعلومات كجزء من تقديم الخدمات لك. يمكنك أيضا اختيار مشاركة بعض من نشاطك على تفصيل على بعض شبكات التواصل الاجتماعي التي ترتبط بحسابك تفصيل ، ويمكنك إلغاء إذنك في أي وقت في إعدادات حسابك. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">قد توفر لك بعض تطبيقات الجهات الخارجية التي تستخدمها لإنشاء أو تسجيل الدخول إلى حسابك خيار التوقف عن تلقي الرسائل منا أو تسمح لك بإعادة توجيه هذه الرسائل إلى عنوان بريد إلكتروني آخر. إذا لم نتمكن من إرسال رسائل هامة إليك حول حسابك، فقد نقوم بتعليق حسابك أو إنهائه. </p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;"> 2.9 معلومات غير الأعضاء</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> تفصيل تتلقى أو تحصل على معلومات (على سبيل المثال، عنوان البريد الإلكتروني أو عنوان آي بي) عن شخص لم يتم بعد عضو تفصيل ("غير عضو") فيما يتعلق ببعض مميزات تفصيل ، مثل عندما يختار غير العضو الاشتراك في رسالة إخبارية، يقوم عضو بدعوة غير عضو لزيارة الموقع، أو يقوم عضو بتحميل معلومات غير عضو باستخدام ميزة تحميل جهة الاتصال، أو مشاركة غير عضو في معاملة، أو إرسال رمز بطاقة هدية إلى غير عضو، أو استخدام خاصية الدفع كزائر لإجراء عملية شراء. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">يتم استخدام المعلومات غير الأعضاء فقط للأغراض التي يتم الكشف عنها عند تقديمها إلى تفصيل، أو لأغراض ضرورية لعمل خدمات تفصيل أو حيث يكون لـ تفصيل مصلحة مشروعة.</p>
                                    <br>

                            </div>
                    </div>
                    </li>

                    @endif


                </div>


                <div class="row">
                    <li>
                        <div class="media">
                            <div class="media-body">


                                @if(direction()=='ltr')


                                    <h6>3. Messages from Tafseel </h6>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> On occasion, TAFSEEL will need to contact you. Primarily, these messages are delivered by email, TAFSEEL Messages, or by push notifications for a variety of reasons, including marketing, transactions, and service update purposes. If you no longer wish to receive push notifications, you can disable them at device level. You can opt out of receiving marketing communications via email or Messages in your account settings or by following the unsubscribe link in any marketing email you receive. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> To ensure you properly receive notifications, we will need to collect certain information about your device, such as operating system and user identification information. Every account is required to keep a valid email address on file to receive messages. TAFSEEL may also contact you by telephone to provide member support or for transaction-related purposes if you request that we call you.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">Additionally, and with your consent where required by applicable law, TAFSEEL may send you an SMS (or similar) message, or reach out to you by telephone, in order to provide you with customer support, for research or feedback, or to provide you with information about products and features that you may find of interest. You can update your contact preferences in your account settings.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">Some messages from TAFSEEL are service-related and necessary for members and Guest Checkout users. You understand and agree that TAFSEEL can send you non-marketing emails, messages, such as those related to transactions, your account, security, or product changes. Examples of service-related messages include an email address confirmation/welcome email when you register your account, notification of an order, service availability, modification of key features or functions, relaying Messages with buyers, and correspondence with TAFSEELS’s Support team. You can unsubscribe at any time from marketing emails or messages through the opt-out link included in marketing emails or messages.</p>

                                @else

                            </div>

                                    <h6>3. رسائل من تفصيل</h6>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> في بعض الأحيان، قد تكون تفصيل بحاجة للاتصال بكم  لأسباب متنوعة -كأن يتم تسليم هذه الرسائل عن طريق البريد الإلكتروني، رسائل تفصيل، أو عن طريق الإشعارات- ، بما في ذلك التسويق والمعاملات وأغراض تحديث الخدمة. إذا لم تعد ترغب في تلقي الإشعارات، يمكنك تعطيلها على اعدادات جهازك. ويمكنك إلغاء الاشتراك في تلقي الرسائل التسويقية عبر البريد الإلكتروني أو الرسائل في إعدادات حسابك أو باتباع رابط إلغاء الاشتراك في أي بريد إلكتروني تسويقي تتلقاه. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> لضمان تلقي إشعارات بشكل صحيح، سنحتاج إلى جمع معلومات معينة حول جهازك، مثل نظام التشغيل ومعلومات تعريف المستخدم. كل حساب مطالب للحفاظ على عنوان بريد إلكتروني صالح في الملف لتلقي الرسائل. كما يمكن لـ تفصيل الاتصال بك عبر الهاتف لتقديم الدعم أو لأغراض تتعلق بالمعاملات إذا لزم الاتصال بك.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">بالإضافة إلى ذلك، وبموافقتك حيثما يقتضي القانون المعمول به، قد يتم ارسال رسالة اس ام اس (أو ما شابه ذلك)، أو التواصل معك عبر الهاتف، من أجل تزويدك بدعم العملاء، للبحث أو الملاحظات، أو لتزويدك بمعلومات حول المنتجات والميزات التي قد تكون ذات أهمية. يمكنك تحديث اعدادات جهات الاتصال في حسابك.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">بعض الرسائل من تفصيل تتعلق بالخدمة وهي ضرورية للأعضاء والمستخدمين. أنت تفهم وتوافق على أن تفصيل قد ترسل لك رسائل البريد الإلكتروني غير التسويقية،  مثل الرسائل المتعلقة بالمعاملات، بحسابك، بالأمن، أو تغييرات المنتج. ومثل رسالة تأكيد عنوان بريد إلكتروني/ترحيب عند تسجيل حسابك، والإخطار بأمر، وتوفر الخدمة، وتعديل الميزات أو الوظائف الرئيسية، وترحيل الرسائل مع المشترين، والمراسلات مع فريق الدعم التابع لـ تفصيل.</p>

                                @endif

                            </div>


                        </div>
                    </li>
                </div>



                <div class="row">

                    <li>
                        <div class="media">
                            <div class="media-body text-justify">


                                @if(direction()=='ltr')

                                    <h6>4.Information Uses, Sharing, & Disclosure</h6>
                                    <p style="text-align: justify; text-justify: inter-word;">We respect your privacy. TAFSEEL will not disclose your name, email address or other personal information to third parties without your consent, except as specified in this policy.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">4.1 Our Legitimate Interests</p>
                                    <p style="text-align: justify; text-justify: inter-word;">Where we process your information on the basis of legitimate interests, we do so as follows:</p>
                                    <br>


                                    <p style="text-align: justify; text-justify: inter-word;"> 4.1.1 Providing and Improving our Services</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> We use your information to improve and customize our Services, including sharing your information for such purposes, and we do so as it is necessary to pursue our legitimate interests of improving our Services for our users. This is also necessary to enable us to pursue our legitimate interests in understanding how our Services are being used, and to explore and unlock ways to develop and grow our business.  </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">It is also necessary to allow us to pursue our legitimate interests in improving our Services, efficiency, interest in Services for users, and obtaining insights into usage patterns of our Services. As a core part of our Services, we have a legitimate interest in customizing your on-site experience to help you search for and discover relevant items and recommended purchases, including using this information to help sellers find the best ways to market and sell their products on TAFSEEL. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">4.1.2 Providing Marketing Communications.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">We rely on our legitimate interest to send you marketing messages (where permitted independent of consent) and for TAFSEEL’s advertising programs (including TAFSEEL’s on-site advertising and marketing).</p>

                                    <br>


                                    <p style="text-align: justify; text-justify: inter-word;">4.1.3 Keeping our Services Safe and Secure</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">We use your information for safety and security purposes, which can include sharing your information for such purposes, and we do so because it is necessary to pursue our legitimate interests or those of a third party in ensuring the security of our Services, preventing harm to individuals or property, or crime, enforcing or defending legal rights, or preventing damage to TAFSEEL’s systems, or those of our users or our partners. This includes enhancing protection of our community against spam, harassment, intellectual property infringement, crime, and security risks of all kinds. We use your information to provide and improve the Services, for billing and payments, for identification and authentication, and for general research and aggregate reporting. </p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;">4.1.4 Buying and Selling</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> As part of the buying and selling process, TAFSEEEL will facilitate the sharing of information between the two members involved in the transaction, such as the other TAFSEEL member's delivery address and payment status. This can also involve us sharing your information with some of our third-party partners such as  delivery and payment partners to enable us to provide the Service to you. Such partners will process your personal information in accordance with their own privacy policies. In some instances, while they are subject to TAFSEEL’s privacy and security requirements for vendors, these partners, not TAFSEEL, are responsible for the protection of personal information under their control.  </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> By making a sale or a purchase on TAFSEEL, you are directing us to share your information in this way. Since this is an important part of the Services we provide, we need to do this in order to perform our obligations under our Terms of Use.   </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> We expect you to respect the privacy of the member whose information you have received. As described in TAFSEEL’s Terms of Use, you have a limited license to use that information only for TAFSEEL’s-related communications or for TAFSEEL’s-facilitated transactions. TAFSEEL has not granted a license to you to use the information for unauthorized transactions or sending unsolicited commercial messages in violation of any applicable laws.  </p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;"> 4.1.5 Service Providers</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> TAFSEEL also needs to engage third-party companies and individuals (such as research companies, and analytics and security providers) to help us operate, provide, and market the Services. These third parties have only limited access to your information, may use your information only to perform these tasks on our behalf, and are obligated to TAFSEEL not to disclose or use your information for other purposes. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> Our engagement of service providers is often necessary for us to provide the Services to you, particularly where such companies play important roles like helping us keep our Service operating and secure. In some other cases, these service providers aren’t strictly necessary for us to provide the Services, but help us make it better, like by helping us conduct research into how we could better serve our users. In these latter cases, we have a legitimate interest in working with service providers to make our Services better.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> Third-party plug-ins also collect information about your use of the Site. For example, when you load a page on TAFSEEL that has a social plug-in from a third-party site or service, such as a “Like” or “Send” button, you are also loading content from that third-party site. That site may request cookies directly from your browser. These interactions are subject to the privacy policy of the third-party site. In addition, certain cookies and other similar technologies on the Site are used by third parties for targeted online marketing and other purposes. These technologies allow a partner to recognize your computer or mobile device each time you use the Services. Please be aware that when you use third-party sites or services, their own terms and privacy policies will govern your use of those sites or services. TAFSEEL chooses and manages these third-party technologies placed on its Sites and Apps. However, these are third-party technologies, and they are subject to that third party's privacy policy. We rely on your consent to drop and read these cookies when not technically necessary or when not required based on another purpose such as legitimate interest.</p>
                                    <br>


                                    <p style="text-align: justify; text-justify: inter-word;"> 4.1.1 Providing and Improving our Services</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> We use your information to improve and customize our Services, including sharing your information for such purposes, and we do so as it is necessary to pursue our legitimate interests of improving our Services for our users. This is also necessary to enable us to pursue our legitimate interests in understanding how our Services are being used, and to explore and unlock ways to develop and grow our business.  </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">It is also necessary to allow us to pursue our legitimate interests in improving our Services, efficiency, interest in Services for users, and obtaining insights into usage patterns of our Services. As a core part of our Services, we have a legitimate interest in customizing your on-site experience to help you search for and discover relevant items and recommended purchases, including using this information to help sellers find the best ways to market and sell their products on TAFSEEL. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">4.1.2 Providing Marketing Communications.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">We rely on our legitimate interest to send you marketing messages (where permitted independent of consent) and for TAFSEEL’s advertising programs (including TAFSEEL’s on-site advertising and marketing).</p>

                                    <br>

                                @else

                                    <h6>4.استخدامات المعلومات، والمشاركة</h6>
                                    <p style="text-align: justify; text-justify: inter-word;">نحن نحترم خصوصيتك. لن تكشف تفصيل عن اسمك أو عنوان بريدك الإلكتروني أو أي معلومات شخصية أخرى إلى أطراف ثالثة دون موافقتك، باستثناء ما هو محدد في هذه السياسة.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">4.1 مصالحنا المشروعة</p>
                                    <p style="text-align: justify; text-justify: inter-word;">عندما نعالج معلوماتك على أساس المصالح المشروعة، فإننا نقوم بذلك على النحو التالي:</p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;">4.1.4 Buying and Selling</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> As part of the buying and selling process, TAFSEEEL will facilitate the sharing of information between the two members involved in the transaction, such as the other TAFSEEL member's delivery address and payment status. This can also involve us sharing your information with some of our third-party partners such as  delivery and payment partners to enable us to provide the Service to you. Such partners will process your personal information in accordance with their own privacy policies. In some instances, while they are subject to TAFSEEL’s privacy and security requirements for vendors, these partners, not TAFSEEL, are responsible for the protection of personal information under their control.  </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> By making a sale or a purchase on TAFSEEL, you are directing us to share your information in this way. Since this is an important part of the Services we provide, we need to do this in order to perform our obligations under our Terms of Use.   </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> We expect you to respect the privacy of the member whose information you have received. As described in TAFSEEL’s Terms of Use, you have a limited license to use that information only for TAFSEEL’s-related communications or for TAFSEEL’s-facilitated transactions. TAFSEEL has not granted a license to you to use the information for unauthorized transactions or sending unsolicited commercial messages in violation of any applicable laws.  </p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;"> 4.1.1 تقديم وتحسين خدماتناs</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> نحن نستخدم معلوماتك لتحسين وتخصيص خدماتنا، بما في ذلك مشاركة معلوماتك لهذه الأغراض، حيث أنه من الضروري السعي لتحقيق مصالحنا المشروعة لتحسين خدماتنا لمستخدمينا. وهذا ضروري أيضاً لتمكيننا من متابعة مصالحنا المشروعة في فهم كيفية استخدام خدماتنا، واستكشاف وفتح طرق لتطوير أعمالنا وتنميتها.  </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">وضروري أيضًا السماح لنا بمتابعة اهتماماتنا المشروعة في تحسين خدماتنا وكفاءتها واهتمامنا بالخدمات للمستخدمين والحصول على رؤى حول أنماط استخدام خدماتنا. كما لدينا مصلحة مشروعة في تخصيص تجربتك في الموقع لمساعدتك في البحث عن واكتشاف العناصر ذات الصلة والمشتريات الموصى بها، بما في ذلك استخدام هذه المعلومات لمساعدة البائعين على العثور على أفضل الطرق لتسويق وبيع منتجاتهم على تفصيل.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">4.1.2 توفير الاتصالات التسويقية.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">نحن نعتمد على مصلحتنا المشروعة لإرسال رسائل وإعلانات تسويقية لك  (بما في ذلك الإعلان والتسويق في الموقع من تفصيل).</p>

                                    <br>


                                    <p style="text-align: justify; text-justify: inter-word;">4.1.3 الحفاظ على خدماتنا آمنة وسليمة</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">نحن نستخدم معلوماتك لأغراض السلامة والأمن، والتي يمكن أن تشمل مشاركة معلوماتك لهذه الأغراض، ونحن نفعل ذلك لأنه من الضروري السعي لتحقيق مصالحنا المشروعة أو مصالح طرف ثالث في ضمان أمن خدماتنا، ومنع الإضرار بالأفراد أو الممتلكات، أو الجريمة، وإنفاذ الحقوق القانونية أو الدفاع عنها، أو منع الضرر الذي يلحق بأنظمة تفصيل، أو تلك الخاصة بالمستخدمين أو شركائنا. وهذا يشمل تعزيز حماية مجتمعنا من البريد المزعج، والتحرش، وانتهاك الملكية الفكرية، والجريمة، والمخاطر الأمنية من جميع الأنواع. نحن نستخدم معلوماتك لتوفير وتحسين الخدمات، والفواتير والمدفوعات، لتحديد الهوية والمصادقة، وللبحث العام وإعداد التقارير المجمعة. </p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;">4.1.4 بيع وشراء</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> كجزء من عملية البيع والشراء، ستقوم تفصيل بتسهيل تبادل المعلومات بين العضوين المشاركين في عملية البيع، مثل عنوان التسليم وحالة الدفع الخاصة بالأعضاء الآخرين في تفصيل . وقد يشمل ذلك أيضًا مشاركة معلوماتك مع بعض شركائنا من الأطراف الثالثة مثل الدفع لتمكيننا من تقديم الخدمة لك. سيقوم هؤلاء الشركاء بمعالجة معلوماتك الشخصية وفقًا لسياسات الخصوصية الخاصة بهم.، فإن هؤلاء الشركاء، وليس تفصيل ، مسؤولون عن حماية المعلومات الشخصية تحت سيطرتهم. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> ومن خلال إجراء عملية بيع أو شراء على تفصيل، فأنت توجهنا لمشاركة معلوماتك بهذه الطريقة. وبما أن هذا جزء مهم من الخدمات التي نقدمها، فإننا بحاجة إلى القيام بذلك من أجل تنفيذ التزاماتنا بموجب شروط الاستخدام. </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> نتوقع منك احترام خصوصية العضو الذي تلقيت معلوماته. كما هو موضح في شروط استخدام تفصيل ، فلديك ترخيص محدود لاستخدام تلك المعلومات فقط للاتصالات المتعلقة بـ تفصيل أو للمعاملات التي يسهلها تفصيل. لم تمنح تفصيل ترخيصًا لك لاستخدام المعلومات في المعاملات غير المصرح بها أو إرسال رسائل تجارية غير مرغوب فيها في انتهاك لأي قوانين سارية المفعول</p>
                                    <br>

                                    <p style="text-align: justify; text-justify: inter-word;"> 4.1.5 مقدموا الخدمات</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> تحتاج تفصيل إلى إشراك شركات و أفراد من أطراف ثالثة (مثل شركات الأبحاث، والتحليلات، ومقدمي الخدمات الأمنية) لمساعدتنا في تشغيل الخدمات وتوفيرها وتسويقها. هذه الأطراف الثالثة لديها وصول محدود إلى معلوماتك، قد تستخدم معلوماتك فقط لأداء هذه المهام نيابة عنا، وهي ملزمة لـ تفصيل بعدم الكشف عن معلوماتك أو استخدامها لأغراض أخرى.  </p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;"> غالبًا ما يكون التزامنا بمزودي الخدمات ضروريًا بالنسبة لنا لتوفير الخدمات لك، خاصةً عندما تلعب مثل هذه الشركات أدوارًا مهمة مثل مساعدتنا في الحفاظ على تشغيل خدماتنا وأمنها. في بعض الحالات الأخرى، لا يكون مقدمو الخدمة هؤلاء ضروريين تمامًا بالنسبة لنا لتقديم الخدمات، ولكن يساعدوننا على تحسينها، مثل مساعدتنا في إجراء أبحاث حول كيفية تقديم خدمة أفضل لمستخدمينا، وهي مصلحة مشروعة في العمل مع مقدمي الخدمات لجعل خدماتنا أفضل.</p>
                                    <br>
                                    <p style="text-align: justify; text-justify: inter-word;">  كما تقوم المكونات الإضافية التابعة لجهات خارجية بجمع معلومات حول استخدامك للموقع. على سبيل المثال، عند تحميل صفحة على تفصيل يحتوي على مكون اجتماعي من موقع أو خدمة خارجية، مثل زر "إعجاب" أو "إرسال"، أنت أيضاً تحمل المحتوى من موقع جهة خارجية. قد يطلب هذا الموقع ملفات تعريف الارتباط مباشرة من المتصفح الخاص بك. تخضع هذه التفاعلات لسياسة الخصوصية لموقع الطرف الثالث. بالإضافة إلى ذلك، يتم استخدام بعض ملفات تعريف الارتباط والتقنيات المماثلة الأخرى على الموقع من قبل أطراف ثالثة لأغراض التسويق المستهدف عبر الإنترنت وأغراض أخرى. تسمح هذه التقنيات للشريك بالتعرف على جهاز الكمبيوتر أو الجهاز المحمول في كل مرة تستخدم فيها الخدمات. يرجى العلم أنه عند استخدام مواقع أو خدمات طرف ثالث، فإن شروطها وسياسات الخصوصية الخاصة بها ستحكم استخدامك لتلك المواقع أو الخدمات. تختار تفصيل وتدير هذه التقنيات الخاصة بـغيرها الموضوعة على مواقعها وتطبيقاتها. ومع ذلك، هذه هي تقنيات طرف ثالث، وأنها تخضع لسياسة الخصوصية لهذا الطرف الثالث. نحن نعتمد على موافقتك على إسقاط وقراءة ملفات تعريف الارتباط هذه عندما لا يكون ذلك ضروريًا من الناحية الفنية أو عندما لا تكون مطلوبة بناءً على غرض آخر مثل المصلحة المشروعة</p>
                                    <br>


                                @endif


                            </div>
                        </div>
                    </li>

                </div>


                <div class="row">
                    <li>
                        <div class="media">
                            <div class="media-body">


                                @if(direction()=='ltr')

                                    <h6>5. Privacy Policy Changes </h6>
                                    <p style="text-align: justify; text-justify: inter-word;">We may amend or update this policy from time to time. If we believe that the changes are material, we’ll let you know by doing one (or more) of the following: (i) posting the changes on or through the Services, (ii) sending you an email or message about the changes, or (iii) posting an update in the version notes on the Apps’ platform. We encourage you to check back regularly and review any updates.</p>


                                @else

                                    <h6>5. تغيرات سياسة الخصوصية </h6>
                                    <p style="text-align: justify; text-justify: inter-word;">قد نقوم بتعديل هذه السياسة أو تحديثها من وقت لآخر. إذا كنا نعتقد أن التغييرات جوهرية، فسنعلمك من خلال تنفيذ واحد (أو أكثر) مما يلي: (1) نشر التغييرات على الخدمات أو من خلالها، و (2) إرسال رسالة بريد إلكتروني أو رسالة حول التغييرات، أو (3) نشر تحديث في ملاحظات الإصدار . نحن نشجعك على مراجعة بشكل منتظم ومراجعة أي تحديثات.</p>

                                @endif



                            </div>
                        </div>
                    </li>
                </div>



                <div class="row">
                    <li>
                        <div class="media">
                            <div class="media-body">


                                @if(direction()=='ltr')

                                    <h6>6. Contact</h6>

                                    <p style="text-align: justify; text-justify: inter-word;">If you have any questions contact TAFSEEL’s Support team.</p>


                                @else

                                    <h6>6. الاتصال</h6>

                                    <p style="text-align: justify; text-justify: inter-word;">إذا كان لديك أي أسئلة لا تتردد بالتواصل معنا.</p>


                                @endif

                            </div>
                        </div>
                    </li>
                </div>

                @endforelse

            </ul>
        </div>
        </div>
        </div>
        </div>
    </section>
    <!--Section ends-->

@stop
