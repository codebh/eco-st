@extends('style.newIndex')
@section('content')
    <!-- breadcrumb start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ trans('user.communications_p') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        @if (session('lang') == 'ar')

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>/
                            <li class="breadcrumb-item"><a href="#">{{trans('user.policies')}}</a></li>
                            <span  aria-current="page">{{trans('user.communications_p')}}</span>
                        </ol>
                        @else
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>
                            <li class="breadcrumb-item">{{trans('user.policies')}}</li>/
                            <span  aria-current="page">{{trans('user.communications_p')}}</span>
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
    @forelse (\App\Models\Blog::where('name','communications')->get() as $blog)

        <div class="row section-b-space">
            <div class="col-sm-12">


                        @if (session('lang')=='ar')


                            {!! $blog->blog_ar !!}

                        @else
                            {!! $blog->blog_en !!}

                        @endif


            </div>
        </div>
    @empty
            <div class="row">
                <div class="col-sm-12 blog-detail">

                    @if(direction()=='ltr')

                        <h3>Electronic and communications Policy</h3>

                        <p> This policy is a part of our Terms of Use. By using any of Tafseel’s services, you’re agreeing to this policy and our Terms of Use.</p>


                    @else

                        <h3>الاتصالات الإلكترونية مع تفصيل</h3>

                        <p> هذه السياسة هي جزء من شروط الاستخدام الخاصة بنا. باستخدامك أي من خدمات تفصيل، فإنك توافق على هذه السياسة وشروط الاستخدام الخاصة بنا.</p>

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

                                            <h6>1.nformation Tafseel Will Send You</h6>
                                            <p style="text-align: justify; text-justify: inter-word;">
                                                Tafseel will need to send you important messages about your use of Tafseel platform. This policy covers these messages, including the terms, policies and user agreements applicable to your use of the Services, billing statements, transaction information, privacy disclosures, and other legal documents that will be provided to you electronically (collectively, the “Electronic Communications”).    </p>

                                        @else

                                            <h6>1.المعلومات المرسلة من تفصيل</h6>
                                            <p style="text-align: justify; text-justify: inter-word;">
                                                سوف تحتاج تفصيل إلى إرسال رسائل مهمة لك حول استخدامك للمنصة. تغطي هذه السياسة هذه الرسائل، بما في ذلك الشروط والسياسات واتفاقيات المستخدم التي تنطبق على استخدامك للخدمات، وبيانات الفواتير، ومعلومات المعاملات، والإفصاح عن الخصوصية، وغيرها من المستندات القانونية التي سيتم تقديمها لك إلكترونيًا (الي نطلق عليها"الاتصالات الإلكترونية"). </p>

                                        @endif

                                    </div>
                                </div>
                            </li>
                        </div>


                        <li>
                            <div class="media">
                                <div class="media-body">
                                    @if(direction()=='ltr')


                                        <h6>2. Communications Will Be Sent Electronically </h6>
                                        <p style="text-align: justify; text-justify: inter-word;">
                                            Under this policy, you give your consent for Tafseel to provide you with the Electronic Communications (including all legal terms and legally-required disclosures) electronically. You also agree that your agreement with electronic terms and disclosures has the same legal effect as if you had signed an agreement on paper. For example, if language appearing next to a button on Tafseel's website informs you that you will agree to certain terms by clicking the button, then your click of the button will have the same legal effect as signing an agreement on paper..</p>

                                    @else

                                        <h6>2.ستُرسل الرسائل إلكترونياً </h6>
                                        <p style="text-align: justify; text-justify: inter-word;">
                                            وبموجب هذه السياسة، فإنك تعطي موافقتك على تفصيل لتزويدك بالاتصالات الإلكترونية (بما في ذلك جميع الشروط القانونية والإفصاحات المطلوبة قانونيا) إلكترونيا. كما توافق على أن اتفاقك وموافقتك على الشروط والإفصاحات الإلكترونية له نفس التأثير القانوني كما لو كنت قد وقعت على اتفاقية على الورق. على سبيل المثال، إذا كانت اللغة التي تظهر بجوار زر على موقع تفصيل على الويب تبلغك بأنك ستوافق على شروط معينة من خلال النقر على الزر، فإن النقر على الزر سيكون له نفس التأثير القانوني الذي يحدث عند توقيع اتفاقية على الورق.</p>

                                    @endif

                                </div>
                            </div>
                        </li>


                        <div class="row">
                            <li>
                                <div class="media">
                                    <div class="media-body">

                                        @if(direction()=='ltr')

                                            <h6>3.Delivery of Information </h6>
                                            <p style="text-align: justify; text-justify: inter-word;">Tafseel may provide you with Electronic Communications by:
                                                (a) emailing them to you at the email address listed in your Tafseel account.
                                                (b) posting them on the Tafseel  website or mobile applications.
                                                or (c) making them available via a website designated in an email notice to you.</p>

                                        @else

                                            <h6>3.تسليم المعلومات. </h6>
                                            <p style="text-align: justify; text-justify: inter-word;">قد توفر لك شركة تفصيل اتصالات إلكترونية من خلال (أ) إرسالها إليك عبر البريد الإلكتروني على عنوان البريد الإلكتروني المدرج في حساب تفصيل، أو (ب) نشرها على موقع تفصيل ، أو (ج) إتاحتها عبر موقع إلكتروني معين في إشعار بالبريد الإلكتروني لك.</p>

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



                                            <h6>4.Technical Requirements to Receive Electronic Communications </h6>
                                            <p style="text-align: justify; text-justify: inter-word;">In order to receive Electronic Communications, you must have the following:
                                                -A connection to the internet;
                                                -An internet browser
                                                -An active email address.
                                                -And an active mobile number</p>

                                        @else

                                            <h6>4.المتطلبات الفنية لاستقبال الاتصالات الالكترونية</h6>
                                            <p style="text-align: justify; text-justify: inter-word;">من أجل الحصول على الاتصالات الإلكترونية، يجب أن يكون لديك ما يلي:
                                                ∙	جهاز كمبيوتر أو جهاز محمول؛
                                                ∙	اتصال بالإنترنت؛
                                                ∙	متصفح إنترنت
                                                ∙	وعنوان بريد إلكتروني نشط
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


                                            <h6>5. Updating Your Contact Information </h6>
                                            <p style="text-align: justify; text-justify: inter-word;">
                                                To ensure that you receive Electronic Communications,
                                                you should make sure that the contact information in your Tafseel account is accurate.Tafseel is not responsible for your failure to receive Electronic Communications if you failed to update your contact information.</p>


                                        @else


                                            <h6>5. حديث معلومات الاتصال الخاصة بك </h6>
                                            <p style="text-align: justify; text-justify: inter-word;">
                                                لضمان تلقيك للاتصالات الإلكترونية، يجب التأكد من أن معلومات الاتصال في حسابك بدقة. تفصيل ليست مسؤولة عن فشلك في تلقي الاتصالات الإلكترونية إذا فشلت في تحديث معلومات الاتصال الخاصة بك.</p>

                                        @endif



                                    </div>
                                </div>
                            </li>
                        </div>


                    </ul>
                </div>
            </div>
        </div>
        <!--Section ends-->
        @endforelse
    </div>
</section>
@stop
