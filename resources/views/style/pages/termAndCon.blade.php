@extends('style.newIndex')
@section('content')
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ trans('user.term_c') }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item ml-3"><a href="{{'/'}}">{{trans('user.home_page')}}</a></li> /
                        <span style="margin-right: 3px;" >{{trans('user.term_c')}}</span>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


    <!--section start-->
    <section class="blog-detail-page section-b-space ratio2_3">
        <div class="container">

            <div class="row section-b-space">
                <div class="col-sm-12">
                    <ul class="comment-section">
                     @forelse (\App\Models\Blog::where('name','term')->get() as $blog)
                            <div class="row">
                                @if (session('lang')=='ar')


                                    {!! $blog->blog_ar !!}

                                @else
                                    {!! $blog->blog_en !!}

                                @endif
                            </div>
                     @empty
                                <div class="row">
                                    <li>
                                        <div class="media">
                                            <div class="media-body ">
                                                @if(direction()=='ltr')

                                                    <h6>1.accepting these terms</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;">this contract sets
                                                        out your rights and responsibilities when you use tafseel website, our
                                                        mobile apps, and the other services provided by tafseel (we’ll refer to
                                                        all of these collectively as our “services”), so please read it
                                                        carefully. by using any of our services (even just browsing our
                                                        website), you’re agreeing to the terms. if you don’t agree with the
                                                        terms, you may not use our services.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">by agreeing to the
                                                        terms, you agree to resolve all disputes through binding individual
                                                        arbitration, which means that you waive any right to have those disputes
                                                        decided by a judge or jury. please note that section 10. (disputes with
                                                        tafseel) contains an arbitration clause and class action waiver. </p>

                                                @else
                                                    <h6>1.قبول هذه الشروط</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        يحدد هذا العقد و البنود المذكورة فيه حقوقك ومسؤولياتك عند استخدامك لمنصة تفصيل الإلكترونية و والخدمات الأخرى التي تقدمها المنصة (سنشير إلى كل هذه مجتمعة باسم "خدماتنا")، لذا يرجى قرائتها بعناية. باستخدامك أي من خدماتنا (حتى مجرد تصفح أحد مواقعنا الإلكترونية)، فإنك توافق على جميع هذه الشروط. إذا كنت لا توافق على أي من الشروط، فلا يجوز لك استخدام خدماتنا.
                                                    </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        بالموافقة على هذه الشروط، فإنك توافق على حل جميع النزاعات من خلال التحكيم الفردي الملزم، مما يعني أنك تتنازل عن أي حق في أن يتم البت في تلك النزاعات من قبل قاضي أو هيئة محلفين. يرجى مراجعة القسم 10 – (النزاعات مع تفصيل)
                                                    </p>

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
                                                    <h6>2. those other documents</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;"> tafseel’s services
                                                        connect sellers and customers, to make, sell, and buy custom-made fashion.
                                                        here is a handy guide to help you understand the specific rules that are
                                                        relevant for you, depending on how you use the services:</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">our rules for
                                                        everyone. if you use any of our services, you agree to these terms, and our
                                                        privacy policy. </p>
                                                    <br>


                                                    <p style="text-align: justify; text-justify: inter-word;">• tafseel rules for
                                                        sellers.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">if you list any items
                                                        for sale through our services, these policies apply to you.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">•tafseel rules for
                                                        buyers.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">if you use our
                                                        services to browse or shop, these policies apply to you.</p>



                                                @else
                                                    <h6>2.السياسات الأخرى</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        تقوم خدمات تفصيل بربط البائعين والزبائن، لبيع وشراء الأزياء المصنوعة حسب الطلب. هذه السياسات مفيدة لمساعدتك على فهم القواعد المحددة المتعلقة بك، اعتمادًا على كيفية استخدامك للخدمات منصة تفصيل
                                                    </p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        ملاحظة: قواعدنا للجميع. إذا كنت تستخدم أي من خدماتنا، فإنك توافق على هذه الشروط، وسياسة الخصوصيةالخاصة بنا
                                                    </p>
                                                    <br>


                                                    <p style="text-align: justify; text-justify: inter-word;">• سياسة تفصيل للبائعين.
                                                    </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">إذا قمت بإدراج أي قطع للبيع من خلال خدماتنا، فإن هذه السياسات تنطبق عليك. </p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">•سياسة تفصيل للمشترين.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">إذا كنت تستخدم خدماتنا للتصفح أو التسوق، فإن هذه السياسات تنطبق عليك. </p>

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

                                                    <h6>3.your privacy</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;"> our privacy policy
                                                        details how your information is used when you use our services(. by using
                                                        our services, you are also agreeing that we can process your information in
                                                        the ways set out in the privacy policy.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">both tafseel and
                                                        sellers process members’ personal information (for example, buyer name,
                                                        email address, and delivery address). this means that each party is
                                                        responsible for the personal information it processes in providing the
                                                        services. for example, if a seller accidentally discloses a buyer’s name and
                                                        email address when fulfilling another buyer’s order, the seller, not
                                                        tafseel, will be responsible for that unauthorized disclosure. </p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">if, however, tafseel
                                                        and sellers are found to be joint data controllers of buyers’ personal
                                                        information, and if tafseel is sued, fined, or otherwise incurs expenses
                                                        because of something that you did as a joint data controller of buyer
                                                        personal information, you agree to indemnify tafseel for the expenses it
                                                        occurs in connection with your processing of buyer personal information.</p>


                                                @else
                                                    <h6>3.خصوصيتك</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;"> سياسة الخصوصية الخاصة بنا تبين كيفية استخدام معلوماتك عند استخدامك لخدماتنا. باستخدام خدماتنا، فإنك توافق أيضًا على أنه يمكننا معالجة معلوماتك بالطرق المحددة في سياسة الخصوصية.
                                                    </p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        يقوم كل من تفصيل والبائعين بمعالجة المعلومات الشخصية للأعضاء (على سبيل المثال، اسم المشتري وعنوان البريد الإلكتروني وعنوان التسليم).وهذا يعني أن كل طرف مسؤول عن المعلومات الشخصية التي يعالجها في تقديم الخدمات. على سبيل المثال، إذا كشف البائع عن طريق الخطأ عن اسم المشتري وعنوان البريد الإلكتروني عند الوفاء بطلب المشتري الآخر، فإن البائع، وليس تفصيل، سيكون مسؤولاً عن هذا الكشف غير المصرح به.
                                                    </p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        ومع ذلك، إذا تم رفع دعوى قضائية ضد تفصيل حول معلومات المشتركين ، أو تغريم، أو تحمل النفقات بسبب شيء فعلته تفصيل كمتحكم ببيانات مشترك من المعلومات الشخصية للمشتري، فإنك توافق على تعويض تفصيل عن النفقات التي تحدث فيما يتعلق بمعالجة المعلومات الشخصية للمشتري.
                                                    </p>

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
                                                    <h6>4. your account with tafseel</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;"> you’ll need to create
                                                        an account with tafseel to use some of our services. here are a few rules
                                                        about accounts with tafseel:</p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">4.1 you must be 18
                                                        years or older to use our services.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">minors under 18 and at
                                                        least 13 years of age are only permitted to use our services through an
                                                        account owned by a parent or legal guardian with their appropriate
                                                        permission and under their direct supervision. children under 13 years are
                                                        not permitted to use tafseel or the services. you are responsible for any
                                                        and all account activity conducted by a minor on your account.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">4.2 be honest with
                                                        us.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">provide accurate
                                                        information about yourself. it is prohibited to use false information or
                                                        impersonate another person or company through your account.</p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">4.3 choose an
                                                        appropriate name.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">if you decide to not
                                                        have your full name serve as the name associated with your account, you may
                                                        not use language that is offensive, vulgar, infringes someone’s intellectual
                                                        property rights, or otherwise violates the terms.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">4.4 you are
                                                        responsible for your account.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">you are solely
                                                        responsible for any activity on your account. if you are sharing an account
                                                        with other people, then the person whose financial information is on the
                                                        account will ultimately be responsible for all activity. if you are
                                                        registering as a business entity(seller), you personally guarantee that you
                                                        have the authority to agree to the terms on behalf of the business. also,
                                                        your accounts are not transferable.</p>

                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">4.5 protect your
                                                        password.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">as we mentioned above,
                                                        you are solely responsible for any activity on your account, so it is
                                                        important to keep your account password secure.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">4.6 our
                                                        relationship.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;"> these terms don't
                                                        create any agency, partnership, joint venture, employment, or franchisee
                                                        relationship between you and tafseel.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;"> contact us if you
                                                        have should any questions about registering an account with tafseel.</p>



                                                @else
                                                    <h6>4. حسابك مع تفصيل</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;"> ستحتاج إلى إنشاء حساب في تفصيل لاستخدام بعض خدماتنا. فيما يلي بعض القواعد حول الحسابات مع تفصيل:</p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">4.1  يجب أن يكون عمرك 18 سنة أو أكثر لاستخدام خدماتنا.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">لا يُسمح للقاصرين الذين تقل أعمارهم عن 18 عامًا أو 13 عامًا على الأقل باستخدام خدماتنا إلا من خلال حساب يملكه أحد الوالدين أو الوصي القانوني مع الحصول على إذن مناسب وتحت إشرافهم المباشر. لا يُسمح للأطفال دون سن 13 سنة باستخدام تفصيل أو الخدمات. أنت مسؤول عن أي وكل نشاط يقوم به قاصر على حسابك.
                                                    </p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">4.2  كن صادقا معنا.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        قدم معلومات دقيقة عن نفسك. يحظر استخدام معلومات خاطئة أو انتحال شخصية آخرى أو شركة أخرى من خلال حسابك.
                                                    </p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">4.3 ختر اسم مناسباً. .</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">ذا قررت عدم استخدام اسمك الكامل كإسم مرتبط بحسابك، فلا يجوز لك استخدام لغة مسيئة أو مبتذلة أو تنتهك حقوق الملكية الفكرية لشخص ما أو تنتهك الشروط.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">4.4 أنت مسؤول عن حسابك.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        أنت وحدك المسؤول عن أي نشاط على حسابك. إذا كنت تشارك حسابًا مع أشخاص آخرين، فسيتولى الشخص الذي تكون معلوماته المالية على الحساب المسؤولية النهائية عن جميع الأنشطة. إذا كنت تسجل ككيان تجاري(بائع)، فإنك تضمن شخصياً أن لديك السلطة للموافقة على الشروط نيابة عن الشركة. كما أن حساباتك غير قابلة للتحويل.</p>

                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">4.5 حماية كلمة المرور الخاصة بك.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">كما ذكرنا أعلاه، أنت وحدك المسؤول عن أي نشاط على حسابك، لذا من المهم الحفاظ على كلمة مرور حسابك آمنة..</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">4.6 علاقتنا.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">  هذه الشروط لا تنشئ أي وكالة أو شراكة أو مشروع مشترك أو وظيفة أو علاقة امتياز بينك وبين تفصيل.
                                                    </p>
                                                    <p style="text-align: justify; text-justify: inter-word;"> اتصل بنا إذا كان لديك أي أسئلة حول تسجيل حساب مع تفصيل
                                                        .</p>

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

                                                    <h6>5.your content</h6>

                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        content that you post
                                                        using our services is your content (so let’s refer to it as “your content”).
                                                        we don’t make any claim to it, which includes anything you post using our
                                                        services (like shop names, profile pictures, listing photos, listing
                                                        descriptions, reviews, comments, videos, usernames, etc.).</p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">5.1 responsibility for
                                                        your content.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        you understand that
                                                        you are solely responsible for your content. you represent that you have all
                                                        necessary rights to your content and that you are not infringing or
                                                        violating any third party’s rights by posting it. children under 13 years
                                                        are not permitted to use tafseel or the services. you are responsible for
                                                        any and all account activity conducted by a minor on your account.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">5.2 permission to use
                                                        your content.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        by posting your
                                                        content through our services, you grant tafseel a license to use it. we
                                                        don’t claim any ownership to your content, but we have your permission to
                                                        use it to help tafseel function and grow. that way, we won’t infringe any
                                                        rights you have in your content and we can help promote your stuff. for
                                                        example, you acknowledge and agree tafseel may offer you or other tafseel
                                                        buyers promotions on the site, from time to time, that may relate to your
                                                        listings.</p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">5.3 rights you grant
                                                        tafaseel. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        by posting your
                                                        content, you grant tafseel a non-exclusive, worldwide, royalty-free,
                                                        irrevocable, sub-licensable, perpetual license to use, display, edit,
                                                        modify, reproduce, distribute, store, and prepare derivative works of your
                                                        content.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        this allows us to
                                                        provide the services and to promote tafseel, your tafseel shop, or the
                                                        services in general, in any formats and through any channels, including
                                                        across any tafseel services, our partners, or third-party website or
                                                        advertising medium. you agree not to assert any moral rights or rights of
                                                        publicity against us for using your content. you also recognize our
                                                        legitimate interest in using it, in accordance with the scope of this
                                                        license, to the extent your content contains any personal information.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        that sounds like a
                                                        lot, but it is necessary for us to keep tafseel going. consider these
                                                        examples: if you upload a photo of a listing on your tafaseel shop, we have
                                                        permission to display it to buyers, and we can resize it so it looks good to
                                                        a buyer; if you post a description in english, we can translate it into; and
                                                        if you post a beautiful photo of your latest design, we can feature it on
                                                        our homepage, in one of our blogs or even on a billboard to help promote
                                                        your business and tafseel.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">5.4 reporting
                                                        unauthorized content.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        tafseel has great
                                                        respect for intellectual property rights, and is committed to following
                                                        appropriate legal procedures to remove infringing content from the services.
                                                        contact us to resolve if content that you own or have rights to has been
                                                        posted to the services without your permission and you want it removed. if
                                                        your content is alleged to infringe another person’s intellectual property,
                                                        we will take appropriate action, such as disabling it if we receive proper
                                                        notice or terminating your account if you are found to be a repeat
                                                        infringer. we will notify you if any of that happens.</p>

                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">5.5 inappropriate,
                                                        false, or misleading content.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">there are certain
                                                        types of content we do not want posted on tafseel’s services (for legal
                                                        reasons or otherwise). you agree that you will not post any content that is
                                                        abusive, threatening, defamatory, obscene, vulgar, or otherwise offensive or
                                                        in violation any part of our terms. you also agree not to post any content
                                                        that is false and misleading or uses the services in a manner that is
                                                        fraudulent or deceptive.</p>

                                                @else
                                                    <h6>5.المحتوى الخاص بك</h6>

                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        المحتوى الذي تنشره باستخدام خدماتنا هو المحتوى الخاص بك (لذا دعنا نشير إليه باسم "المحتوى الخاص بك"). نحن لا نقدم أي مطالبات عليه، والتي تشمل أي شيء تقوم بنشره باستخدام خدماتنا (مثل أسماء المتاجر، صور الملف الشخصي، سرد الصور، أوصاف القائمة، التعليقات، التعليقات، مقاطع الفيديو، أسماء المستخدمين، إلخ).</p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">5.1 المسؤولية على المحتوى الخاص بك. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        أنت تدرك أنك وحدك المسؤول عن المحتوى الخاص بك. وتقر بأن لديك جميع الحقوق الضرورية للمحتوى الخاص بك وأنك لا تنتهك حقوق أي طرف ثالث من خلال نشره.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">5.2 الإذن باستخدام المحتوى الخاص بك. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        من خلال نشر المحتوى الخاص بك من خلال خدماتنا، فإنك تمنح تفصيل ترخيصًا لاستخدامه. نحن لا ندعي أي ملكية لمحتواك، ولكن لدينا إذن منك لاستخدامها لمساعدة تفصيل على العمل والنمو. وبهذه الطريقة، لن ننتهك أي حقوق لديك في المحتوى الخاص بك، ويمكننا المساعدة في الترويج لمحتوياتك. على سبيل المثال، أنت تقر وتوافق على أن تفصيل قد تقدم لك أو لبائعين تفصيل عروض ترويجية على الموقع - من وقت لآخر- قد تتعلق بالقطع الخاصة بك
                                                        .</p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">5.3 الحقوق التي تمنحها لـ تفصيل. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">من خلال نشر المحتوى الخاص بك، فإنك تمنح منصة تفصيل ترخيصًا غير حصري، وغير محدود، وغير قابل للإلغاء، وغير قابل للترخيص من الباطن، ودائم الاستخدام لعرض وتعديل وإعادة إنتاج وتوزيع وتخزين وإعداد الأعمال المشتقة من المحتوى الخاص بك.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        وهذا يسمح لنا بتقديم الخدمات والترويج لـ تفصيل أو المتجر الخاص بك أو الخدمات بشكل عام، بأي شكل من الأشكال ومن خلال أي قنوات، بما في ذلك عبر أي خدمات تفصيل أو شركاؤنا أو موقع طرف ثالث أو وسيلة إعلانية. وأنت توافق على عدم تأكيد أي حقوق أخلاقية أو حقوق الدعاية ضدنا لاستخدام المحتوى الخاص بك. كما أنك تقر أيضاً بمهمتنا المشروعة في استخدامها، وفقاً لنطاق هذا الترخيص، إلى الحد الذي يحتوي فيه المحتوى الخاص بك على أي معلومات شخصية.
                                                    </p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">قد هذا يبدو كثيرًا ، ولكن من الضروري بالنسبة لنا أن نستمر في تفصيل. على سبيل المثال: إذا قمت بتحميل صورة في القائمة على متجر تفصيل الخاص بك، لدينا إذن لعرضها على المشترين، ويمكننا تغيير حجم الصورة بحيث تبدو القطعة جيدة للمشتري. إذا قمت بنشر وصف باللغة الإنجليزية، يمكننا ترجمته إلى اللغة العربية ؛ وإذا قمت بنشر صورة جميلة من أحدث التصميمات الخاصة بك، يمكننا أن نظهرها على صفحتنا الرئيسية، في واحدة من منصات العرض لدينا أو حتى على لوحة للمساعدة في تعزيز عملك و عمل تفصيل.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">5.4 لإبلاغ عن المحتوى غير المصرح به. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">تحترم تفصيل حقوق الملكية الفكرية، وتلتزم باتباع الإجراءات القانونية المناسبة لإزالة المحتوى المخالف من الخدمات. اتصل بنا لحل المحتوى الذي تمتلكه أو لديك حقوق فيه تم نشره على الخدمات دون إذنك وتريد إزالته. إذا كان يُزعم أن المحتوى الخاص بك ينتهك الملكية الفكرية لشخص آخر، فسيتم اتخاذ الإجراء المناسب، مثل تعطيله إذا تلقينا إشعارًا مناسبًا أو إنهاء حسابك إذا تبين أنك من المنتهكين المتكررين. سنعلمك إذا حدث أي من ذلك.</p>

                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">5.5 محتوى غير لائق أو زائف أو مضلل. .</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">هناك أنواع معينة من المحتوى الذي لا نريد نشره على خدمات تفصيل (لأسباب قانونية أو غير ذلك). أنت توافق على أنك لن تنشر أي محتوى مسيء أو تهديدي أو تشهيري أو فاحش أو مبتذل أو مسيئ أو مخالف للذوق العام أو لأي جزء من شروطنا. كما أنك توافق على عدم نشر أي محتوى غير صحيح ومضلل أو يستخدم الخدمات بطريقة احتيالية أو خادعة.</p>

                                                @endif

                                                <br>

                                            </div>

                                        </div>
                                    </li>
                                </div>

                                <div class="row">
                                    <li>
                                        <div class="media">
                                            <div class="media-body">
                                                @if(direction()=='ltr')

                                                    <h6>6. your use of our services </h6>

                                                    <p style="text-align: justify; text-justify: inter-word;"> we grant you a
                                                        limited, non-exclusive, non-transferable, and revocable license to use our
                                                        services - subject to the terms and the following restrictions in
                                                        particular:</p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        6.1 don’t use our
                                                        services to break the law.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">you agree that you
                                                        will not violate any laws in connection with your use of the services. this
                                                        includes any local, regional, and international laws that may apply to you.
                                                        and you may not engage in fraud (including false claims or infringement
                                                        notices), theft, or any other unlawful acts or crimes against tafseel,
                                                        another tafseel user, or a third party.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        6.2 pay your
                                                        bills.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        you are responsible
                                                        for paying all fees that you owe to tafseel. your fees, bills, and how you
                                                        can pay them are fully explained in our fees & payments policy.</p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        6.3 don’t steal our
                                                        stuff. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        you agree not to
                                                        crawl, scrape, or spider any page of the services or to reverse engineer or
                                                        attempt to obtain the source code of the services.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        6.4 don’t try to harm
                                                        our systems.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        you agree not to
                                                        interfere with or try to disrupt our services, for example by distributing a
                                                        virus or other harmful computer code.</p>

                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        6.5 share your
                                                        ideas.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">we love your
                                                        suggestions and ideas! they can help us improve your experience and our
                                                        services. any unsolicited ideas or other materials you submit to tafseel
                                                        (not including your content or items you sell through our services) are
                                                        considered non-confidential and non-proprietary to you. you grant us a
                                                        non-exclusive, worldwide, royalty-free, irrevocable, sub-licensable,
                                                        perpetual license to use and publish those ideas and materials for any
                                                        purpose, without compensation to you.</p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">6.6 talk to us
                                                        online.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        from time to time,
                                                        tafseel will provide you with certain legal information. by using our
                                                        services, you’re agreeing to our electronic communications policy, which
                                                        describes how we provide that information to you. it says that we can send
                                                        you information electronically (such as by email) instead of mailing you
                                                        paper copies (it is better for the environment), and that your electronic
                                                        agreement is the same as your signature on paper.</p>

                                                @else
                                                    <h6>6. استخدامك لخدماتنا  </h6>

                                                    <p style="text-align: justify; text-justify: inter-word;"> نحن نمنحك ترخيصًا محدودًا وغير حصري وغير قابل للتحويل وقابلًا للإلغاء لاستخدام خدماتنا - مع مراعاة الشروط والقيود التالية على وجه الخصوص:
                                                    </p>

                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">6.1 لا تستخدم خدماتنا لخرق القانون. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">أنت توافق على أنك لن تنتهك أي قوانين فيما يتعلق باستخدامك للخدمات. وهذا يشمل أي قوانين محلية وإقليمية ودولية قد تنطبق عليك. ولا يجوز لك الانخراط في الاحتيال (بما في ذلك المطالبات الكاذبة أو إشعارات التعدي)، والسرقة، أو أي أعمال غير قانونية أخرى أو جرائم ضد تفصيل، أو مستخدم آخر في تفصيل، أو طرف ثالث.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">6.2 دفع الفواتير الخاصة بك.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">أنت مسؤول عن دفع جميع رسوم تفصيل، والفواتير ، وكيف يمكنك دفعها موضحة بالكامل في سياسة الرسوم والمدفوعات الخاصة بنا.</p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">6.3  لا تسرقوا منا. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">نت توافق على عدم الإضرار بخدمات تفصيل او محاولة الحصول على شفرة المصدر الخاصة بالخدمات. </p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">6.4 لا تحاول أن تضر أنظمتنا.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">نت توافق على عدم التدخل في خدماتنا أو محاولة تعطيلها، على سبيل المثال عن طريق توزيع فيروس أو رمز كمبيوتر ضار آخر</p>

                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">6.5 مشاركة أفكارك..</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">نحن نحب اقتراحاتك وأفكارك! يمكنهم مساعدتنا في تحسين تجربتك وخدماتنا. أي أفكار غير مرغوب فيها أو مواد أخرى ترسلها إلى تفصيل (لا تشمل المحتوى الخاص بك أو العناصر التي تبيعها من خلال خدماتنا) تعتبر غير سرية وغير مملوكة لك. أنت تمنحنا ترخيصًا دائمًا غير حصري، عالميًا، وغير قابل للإلغاء، وغير قابل للترخيص من الباطن، لاستخدام ونشر تلك الأفكار والمواد لأي غرض، دون تعويض لك.</p>
                                                    <br>

                                                    <p style="text-align: justify; text-justify: inter-word;">6.6 التحدث إلينا على الانترنت.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">من وقت لآخر، تفصيل سوف توفر لك معلومات قانونية معينة. باستخدامك لخدماتنا، فإنك توافق على سياسة الاتصالات الإلكترونية الخاصة بنا، والتي تصف كيفية تقديمنا لتلك المعلومات لك. وتقول إننا يمكن أن نرسل لك المعلومات إلكترونيا (مثل البريد الإلكتروني) بدلا من إرسال نسخ ورقية إليك بالبريد (أفضل للبيئة)، وأن اتفاقيتك الإلكترونية هي نفسها توقيعك على الورق</p>

                                                @endif

                                                <br>

                                            </div>

                                        </div>
                                    </li>
                                </div>


                                <div class="row">
                                    <li>
                                        <div class="media">
                                            <div class="media-body">
                                                @if(direction()=='ltr')

                                                    <h6>7. termination</h6>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">7.1 termination by
                                                        you.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">you may terminate your
                                                        account with tafseel at any time from your account settings. terminating
                                                        your account will not affect the availability of some of your content that
                                                        you posted through the services prior to termination, and you’ll still have
                                                        to pay any outstanding bills.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">7.2 termination by
                                                        tafseel.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">we may terminate or
                                                        suspend your account (and any related accounts) and your access to the
                                                        services at any time, for any reason, and without advance notice. if we do
                                                        so, it’s important to understand that you don’t have a contractual or legal
                                                        right to continue to use our services, for example, to sell or buy on our
                                                        websites or mobile app. tafseel may refuse service to anyone, at any time,
                                                        for any reason.if you or tafseel
                                                        terminate your account, you may lose any information associated with your
                                                        account, including your content.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">7.3 we may discontinue
                                                        the services. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">tafseel reserves the
                                                        right to change, suspend, or discontinue any of the services at any time,
                                                        for any reason. we will not be liable to you for the effect that any changes
                                                        to the services may have on you, including your income or your ability to
                                                        generate revenue through the services.</p>
                                                    <br>

                                                @else

                                                    <h6>7. 	الإنهاء</h6>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word; font-weight: bold">7.1 الإنهاء من قبلك</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">يمكنك إنهاء حسابك مع تفصيل في أي وقت من إعدادات حسابك. لن يؤثر إنهاء حسابك على توفر بعض المحتوى الذي قمت بنشره من خلال الخدمات قبل الإنهاء، وسيظل عليك دفع أي فواتير مستحقة.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">7.2 الإنهاء بواسطة تفصيل.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">يجوز لنا إنهاء أو تعليق حسابك (وأي حسابات ذات صلة) ومنع وصولك إلى الخدمات في أي وقت ولأي سبب ودون إشعار مسبق. إذا فعلنا ذلك، فمن المهم أن نفهم أنه ليس لديك حق تعاقدي أو قانوني في الاستمرار في استخدام خدماتنا، على سبيل المثال، للبيع أو الشراء على منصتنا . يجوز لـ تفصيل رفض الخدمة لأي شخص في أي وقت ولأي سبب كان.
                                                        إذا قمت أنت أو تفصيل بإنهاء حسابك، فقد تفقد أي معلومات مرتبطة بحسابك، بما في ذلك المحتوى الخاص بك.
                                                        .</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">7.3 wقد نقوم بإيقاف الخدمات  </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">تحتفظ تفصيل بحق تغيير أو تعليق أو إيقاف أي من الخدمات في أي وقت ولأي سبب. لن نكون مسؤولين تجاهك عن التأثير الذي قد تحدثه أي تغييرات على الخدمات عليك، بما في ذلك دخلك أو قدرتك على توليد إيرادات من خلال الخدمات.</p>
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


                                                    <h6>8. warranties and limitation of liability (or the things you can’t sue us
                                                        for)</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        8.1 items you
                                                        purchase.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">you understand that
                                                        tafseel does not manufacture, store, or inspect any of the items sold
                                                        through our services. we provide the venue; the items in our marketplaces
                                                        are produced, listed, and sold directly by independent sellers, so tafseel
                                                        can not and does not make any warranties about their quality, safety, or
                                                        even their legality.any legal claim related to an item you purchase must be brought directly against the seller
                                                        of the item. you release tafseel from any claims related to items sold
                                                        through our services, including for defective items, misrepresentations by
                                                        sellers, or items that caused physical injury (like product liability
                                                        claims).</p>

                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.2 content you
                                                        access.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">
                                                        you may come across
                                                        materials that you find offensive or inappropriate while using our services.
                                                        we make no representations concerning any content posted by users through
                                                        the services. tafseel is not responsible for the accuracy, copyright
                                                        compliance, legality, or decency of content posted by users that you
                                                        accessed through the services. you release us from all liability relating to
                                                        that content.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.3 people you
                                                        interact with. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">you can use the
                                                        services to interact with other individuals, either online or in person.
                                                        however, you understand that we do not screen users of our services, and you
                                                        release us from all liability relating to your interactions with other
                                                        users. please be careful and exercise caution and good judgment in all
                                                        interactions with others, especially if you are meeting someone in
                                                        person.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.4 third-party
                                                        services. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">our services may
                                                        contain links to third-party websites or services that we do not own or
                                                        control (for example, links to facebook, twitter instagram, and online
                                                        payment gates). you may also need to use a third party’s product or service
                                                        in order to use some of our services (like a compatible mobile device to use
                                                        our mobile apps). when you access these third-party services, you do so at
                                                        your own risk. the third parties may require you to accept their own terms
                                                        of use. tafseel is not a party to those agreements; they are solely between
                                                        you and the third party.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.5 gift cards and
                                                        promotions.</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">you acknowledge that
                                                        tafseel does not make any warranties with respect to your gift card balance
                                                        and is not responsible for any unauthorized access to, or alteration, theft,
                                                        or destruction of a gift card or gift card code that results from any action
                                                        by you or a third party. you also acknowledge that we may suspend or
                                                        prohibit use of your gift card if your gift card or gift card code has been
                                                        reported lost or stolen, or if we believe your gift card balance is being
                                                        used suspiciously, fraudulently, or in an otherwise unauthorized manner. if
                                                        your gift card code stops working, your only remedy is for us to issue you a
                                                        replacement gift card code. by participating in a special offer or
                                                        promotion, you agree that you may not later claim that the rules of that
                                                        special offer or promotion were ambiguous.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.5.1 warranties. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">tafseel is dedicated
                                                        to making our services the best they can be, but we’re not perfect and
                                                        sometimes things can go wrong. you understand that our services are provided
                                                        “as is” and without any kind of warranty (express or implied). we are
                                                        expressly disclaiming any warranties of title, non-infringement,
                                                        merchantability, and fitness for a particular purpose, as well as any
                                                        warranties implied by a course of performance, course of dealing, or usage
                                                        of trade.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.5.2 we do not
                                                        guarantee that: </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">(i) the services will
                                                        be secure or available at any particular time or location; (ii) any defects
                                                        or errors will be corrected; (iii) the services will be free of viruses or
                                                        other harmful materials; or (iv) the results of using the services will meet
                                                        your expectations. you use the services solely at your own risk.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.5.3 liability
                                                        limits. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">to the fullest extent
                                                        permitted by law, neither , nor our employees or directors shall be liable
                                                        to you for any lost profits or revenues, or for any consequential,
                                                        incidental, indirect, special, or punitive damages arising out of or in
                                                        connection with the services or these terms.</p>
                                                    <br>


                                                @else


                                                    <h6>8.	الضمانات وتحديد المسؤولية (أو الأشياء التي لا يمكنك مقاضاتنا من أجلها)</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.1العناصر التي قمت بشرائها. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">أنت تدرك أن تفصيل لا تقوم بتصنيع أو تخزين أو فحص أي من العناصر التي تباع من خلال خدماتنا. نحن نقدم المكان؛ القطع المعروضة يتم إنتاجها، وإدراجها، وبيعها مباشرة من قبل البائعين المستقلين، لذلك تفصيل لا تقدم أي ضمانات حول جودتها، وسلامتها، أو حتى شرعيتها. يجب أن يتم رفع أي مطالبة قانونية تتعلق بقطعة تشتريها مباشرة ضد بائع القطعة. أنت تحرر تفصيل من أي مطالبات تتعلق بالمواد التي تباع من خلال خدماتنا، بما في ذلك للقطع المعيبة، أو التزييف من قبل البائعين .</p>

                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.2 المحتوى الذي يمكنك الوصول إليه </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">قد تصادف مواد مسيئة أو غير ملائمة أثناء استخدامك لخدماتنا. نحن لا نقدم أي مسولية بشأن أي محتوى يتم نشره من قبل المستخدمين من خلال الخدمات. تفصيل ليست مسؤولة عن الدقة، الامتثال لحقوق الطبع والنشر، الشرعية، أو لياقة المحتوى المنشور من قبل المستخدمين التي قمت بالوصول إليها من خلال الخدمات. أنت تحررنا من جميع التبعات المتعلقة بهذا المحتوى</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.3 الأشخاص الذين تتفاعل معهم. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">يمكنك استخدام الخدمات للتفاعل مع الأفراد الآخرين، سواء عبر الإنترنت أو شخصياً. ومع ذلك، أنت تدرك أننا لا نقوم بفحص مستخدمي خدماتنا، وأنت تحررنا من جميع المسؤولية المتعلقة بتفاعلاتك مع المستخدمين الآخرين. يرجى توخي الحذر وحسن التقدير في جميع التفاعلات مع الآخرين، خاصة إذا كنت تقابل شخصًا ما شخصيًا. </p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.4خدمات الطرف الثالث. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">قد تحتوي خدماتنا على روابط لمواقع ويب أو خدمات خاصة بلجهات الخارجية لا نملكها أو نتحكم فيها (على سبيل المثال، روابط إلى فيسبوك وتويتر إنستغرام وبوابات الدفع عبر الإنترنت). قد تحتاج أيضًا إلى استخدام منتج أو خدمة طرف ثالث لاستخدام بعض خدماتنا . عند الوصول إلى خدمات الجهات الأخرى هذه، فإنك تقوم بذلك على مسؤوليتك الخاصة. قد يطلب منك الأطراف الثالثة قبول شروط الاستخدام الخاصة بهم. وهذه الاتفاقات ليست طرفا في هذه الاتفاقات؛ بل هي طرف في الاتفاقات التي أبرمتها اللجنة. فهي فقط بينك وبين الطرف الثالث.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.5بطاقات الهدايا والعروض الترويجية..</p>
                                                    <p style="text-align: justify; text-justify: inter-word;">أنت تقر بأن تفصيل لا تقدم أي ضمانات فيما يتعلق برصيد بطاقة الهدايا الخاصة بك وليست مسؤولة عن أي وصول غير مصرح به أو تغيير أو سرقة أو إتلاف بطاقة هدية أو رمز بطاقة هدية التي تنتج عن أي إجراء من قبلك أو طرف ثالث. كما تقرّ أيضًا بأننا قد نمنع استخدام بطاقة الهدايا الخاصة بك أو حظرها إذا تم الإبلاغ عن فقدان أو سرقة بطاقة الهدايا الخاصة بك، أو إذا كنا نعتقد أن رصيد بطاقة الهدايا الخاص بك يتم استخدامه بشكل مريب أو احتيالي أو بطريقة غير مصرح بها. إذا توقف رمز بطاقة الهدايا عن العمل، فإن علاجك الوحيد هو أن ونصدر لك رمز بطاقة الهدايا البديل. من خلال المشاركة في عرض خاص أو عرض ترويجي خاص، فإنك توافق على أنه لا يجوز لك المطالبة فيما بعد بأن قواعد هذا العرض أو العرض الخاص كانت غامضة.

                                                    </p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.5.1 الضمانات. </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">إننا في تفصيل تسعى لجعل خدماتنا أفضل ما يمكن أن تكون، ولكننا لسنا مثاليين وفي بعض الأحيان يمكن أن تسوء الأمور. أنت تدرك أن خدماتنا تقدم "كما هي" وبدون أي نوع من الضمان (صريح أو ضمني). نحن نخلي صراحة عن أي ضمانات من العنوان، وعدم التعدي، والاتجار، والملاءمة لغرض معين، فضلا عن أي ضمانات التي تنطوي عليها دورة الأداء، ومسار التعامل وسير العمليات.</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.5.2 نحن لا نضمن:  </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">(1) أن تكون الخدمات آمنة أو متاحة في أي وقت أو مكان معين؛ (2) يتم تصحيح أي عيوب أو أخطاء؛ (3) أن تكون الخدمات خالية من الفيروسات أو المواد الضارة الأخرى؛ أو (4) نتائج استخدام الخدمات سوف تلبي توقعاتك. يمكنك استخدام الخدمات فقط على مسؤوليتك الخاصة. </p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;">8.5.3حدود المسؤولية.  </p>
                                                    <p style="text-align: justify; text-justify: inter-word;">إلى أقصى حد يسمح به القانون، لا يتحمل أي من موظفينا أو مديرينا المسؤولية تجاهك عن أي أرباح أو إيرادات مفقودة، أو عن أي أضرار تبعية أو عرضية أو غير مباشرة أو خاصة أو عقابية ناشئة عن أو فيما يتعلق بالخدمات أو هذه الشروط. </p>
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

                                                    <h6>9. disputes with other users</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;"> if you find yourself
                                                        in a dispute with another user of tafseels’s services or a third party, we
                                                        encourage you to contact the other party and try to resolve the dispute
                                                        amicably. you release tafseel from any claims, demands, and damages arising
                                                        out of disputes with other users or parties.</p>


                                                @else

                                                    <h6>9. 	النزاعات مع مستخدمين آخرين</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;">إذا وجدت نفسك في نزاع مع مستخدم آخر لخدمات تفصيل أو طرف ثالث، فإننا نشجعك على الاتصال بالطرف الآخر ومحاولة حل النزاع وديا. أنت تحرر تفصيل من أي مطالبات أو مطالب أو أضرار ناشئة عن نزاعات مع مستخدمين آخرين أو أطراف أخرى.

                                                    </p>

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

                                                    <h6>10. disputes with tafseel</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;"> if you are upset with
                                                        us, let us know, and hopefully we can resolve your issue. but if we cannot,
                                                        then these rules will govern any legal dispute involving our services:</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;"> if we make any
                                                        changes to this “disputes with tafseel” section after the date you last
                                                        accepted the terms, those changes will not apply to any claims filed in a
                                                        legal proceeding against tafseel prior to the date the changes became
                                                        effective. tafseel will notify you of substantive changes to the “disputes
                                                        with tafseel” section at least 30 days prior to the date the change will
                                                        become effective. if you do not agree to the modified terms, you may send
                                                        tafseel a written notification (including email) or close your account
                                                        within those 30 days. by rejecting a modified term or permanently closing
                                                        your account, you agree to arbitrate any disputes between you and tafseel in
                                                        accordance with the provisions of this “disputes with tafseel” section as of
                                                        the date you last accepted the terms, including any changes made prior to
                                                        your rejection. if you reopen your closed account or create a new account,
                                                        you agree to be bound by the current version of the terms.</p>


                                                @else

                                                    <h6>10. 	نزاعات مع تفصيل</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;"> إذا كنت مستاء منا، فاسمح لنا أن نعرف، ونأمل أن نتمكن من حل مشكلتك. ولكن إذا لم نتمكن من ذلك، فإن هذه القواعد سوف تحكم أي نزاع قانوني ينطوي على خدماتنا:</p>
                                                    <br>
                                                    <p style="text-align: justify; text-justify: inter-word;"> إذا قمنا بإجراء أي تغييرات على قسم "المنازعات مع تفصيل" بعد آخر تاريخ قبلت فيه الشروط، لن تنطبق هذه التغييرات على أي مطالبات مقدمة في إجراء قانوني ضد تفصيل قبل تاريخ بدء سريان التغييرات. سوف تقوم تفصيل بإخطارك بالتغييرات الجوهرية " قبل 30 يومًا على الأقل من تاريخ بدء سريان التغيير. إذا كنت لا توافق على الشروط المعدلة، يمكنك إرسال إشعار خطي إلى تفصيل (بما في ذلك البريد الإلكتروني) أو إغلاق حسابك خلال تلك الأيام الثلاثين. برفضك لمدة معدلة أو إغلاق حسابك بشكل دائم، فإنك توافق على التحكيم في أي نزاعات بينك وبين تفصيل وفقاً لأحكام هذا القسم "النزاعات مع تفصيل" اعتباراً من تاريخ قبولك للشروط، بما في ذلك أي تغييرات تم إجراؤها قبل الرفض. إذا قمت بإعادة فتح حسابك المغلق أو إنشاء حساب جديد، فإنك توافق على الالتزام بالنسخة الحالية من الشروط.</p>


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

                                                    <h6>11. changes to the terms</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;"> we may update these
                                                        terms from time to time. if we believe that the changes are material, we
                                                        will definitely let you know by posting the changes through the services
                                                        and/or sending you an email or message about the changes. that way you can
                                                        decide whether you want to continue using the services. changes will be
                                                        effective upon the posting of the changes unless otherwise specified. you
                                                        are responsible for reviewing and becoming familiar with any changes. your
                                                        use of the services following the changes constitutes your acceptance of the
                                                        updated terms.</p>

                                                @else

                                                    <h6>11.	التغييرات التي تطرأ على الشروط</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;">قد نقوم بتحديث هذه الشروط من وقت لآخر. إذا كنا نعتقد أن التغييرات جوهرية، سنعلمك بالتأكيد بنشر التغييرات من خلال الخدمات و/أو إرسال رسالة بريد إلكتروني أو رسالة إليك حول التغييرات. و بهذه الطريقة يمكنك أن تقرر ما إذا كنت تريد الاستمرار في استخدام الخدمات. وستكون التغييرات نافذة المفعول عند نشر التغييرات ما لم يُحدد خلاف ذلك. أنت مسؤول عن مراجعة أي تغييرات والتعرف عليها. يشكل استخدامك للخدمات بعد التغييرات قبولك للشروط المحدّثة.</p>

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

                                                    <h6>12. some finer legal points</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;"> the terms, including
                                                        all the policies that make up the terms, supersede any other agreement
                                                        between you and tafseel regarding the services. if any part of the terms is
                                                        found to be unenforceable, that part will be limited to the minimum extent
                                                        necessary so that the terms will otherwise remain in full force and effect.
                                                        our failure to enforce any part of the terms is not a waiver of our right to
                                                        later enforce that or any other part of the terms. we may assign any of our
                                                        rights and obligations under the terms.</p>


                                                @else

                                                    <h6>12. 	بعض النقاط القانونية الدقيقة</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;">تحل هذه الشروط، بما في ذلك جميع السياسات التي تشكل البنود، محل أي اتفاقية أخرى بينك وبين تفصيل بشأن الخدمات. إذا تبين أن أي جزء من البنود غير قابل للتنفيذ، فإن هذا الجزء سوف يقتصر على الحد الأدنى اللازم بحيث تبقى الشروط سارية المفعول بالكامل. إن فشلنا في فرض أي جزء من الشروط فرن ذلك ليس تنازلاً عن حقنا في تنفيذ هذا أو أي جزء آخر من الشروط في وقت لاحق. يجوز لنا التنازل عن أي من حقوقنا والتزاماتنا بموجب الشروط.</p>


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

                                                    <h6>13. contact information</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;"> if you have any
                                                        questions about the terms, please email us at info@tafseel.net</p>

                                                @else

                                                    <h6>13. 	معلومات الاتصال</h6>
                                                    <p style="text-align: justify; text-justify: inter-word;">إذا كان لديك أي أسئلة حول الشروط، يرجى مراسلتنا عبر البريد الإلكتروني
                                                        info@tafseel.net
                                                    </p>

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
@endsection
