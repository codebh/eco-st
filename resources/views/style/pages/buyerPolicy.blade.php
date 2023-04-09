@extends('style.newIndex')
@section('content')
    <!-- breadcrumb start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">

<h2>{{ trans('user.buyer_p') }}</h2>



                    </div>
                </div>
               <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        @if (session('lang') == 'ar')

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>/
                            <li class="breadcrumb-item"><a href="#">{{trans('user.policies')}}</a></li>
                            <span  aria-current="page">{{trans('user.buyer_p')}}</span>
                        </ol>
                        @else
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>
                            <li class="breadcrumb-item">{{trans('user.policies')}}</li>/
                            <span  aria-current="page">{{trans('user.buyer_p')}}</span>
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

            @forelse (\App\Models\Blog::where('name','buyerPolicy')->get() as $blog)

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
                <div class="row section-b-space">
                    <div class="col-sm-12">
                        <ul class="comment-section">
                            <div class="row">
                                <li>
                                    <div class="media">
                                        <div class="media-body ">


                                            @if(direction()=='ltr')


                                                <h6>1. Understanding TAFSEEL’s Limitations as a Venue</h6>

                                                <p style="text-align: justify; text-justify: inter-word;"> ●	You are not buying directly from TAFSEEL, but from one of the many talented sellers on TAFSEEL;  </p>
                                                <p style="text-align: justify; text-justify: inter-word;"> ●	TAFSEEL does not pre-screen sellers and therefore does not guarantee or endorse any items sold on TAFSEEL or any content posted by sellers (such as photographs or language used in listings or shop policies);  </p>
                                                <p style="text-align: justify; text-justify: inter-word;"> ●	TAFSEEL seller on has their own processing times, and shop policies.  </p>

                                            @else

                                                <h6>1. Understanding TAFSEEL’s Limitations as a Venue</h6>

                                                <h6>1.	فهم نظام تفصيل كمنصة بيع</h6>

                                                <p style="text-align: justify; text-justify: inter-word;"> ●	أنت لا تشتري مباشرة من تفصيل، ولكن من واحد من العديد من البائعين الموهوبين على تفصيل.  </p>
                                                <p style="text-align: justify; text-justify: inter-word;"> ●	تفصيل لاتتفقد البائعين من خلف الشاشة، وبالتالي لا تقدم أي ضمان على أي سلع تباع على تفصيل أو أي محتوى ينشره البائعون (مثل الصور الفوتوغرافية أو اللغة المستخدمة في القوائم أو سياسات المحل)  </p>
                                                <p style="text-align: justify; text-justify: inter-word;"> ●	البائعين في تفصيل لديهم أوقات النحضير الخاصة بهم، وسياسات متجر. </p>

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


                                                <h6>2. Purchasing an Item on TAFSEEL</h6>
                                                <p style="text-align: justify; text-justify: inter-word;">When you buy from a shop on TAFSEEL, you’re directly supporting an independent business, each with its unique listings, policies, processing times and payment systems.</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> By making a purchase from a seller on TAFSEEL, you agree that you have:</p>

                                                <p style="text-align: justify; text-justify: inter-word;"> ●	Read the item description and shop policies before making a purchase;  </p>
                                                <p style="text-align: justify; text-justify: inter-word;"> ●	Submitted appropriate payment for item(s) purchased; and   </p>
                                                <p style="text-align: justify; text-justify: inter-word;"> ●	Provided accurate delivery information to the seller.   </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> You also agree to comply with our  TAFSEEL Payments Policy  when you use TAFSEEL Payments.  </p>

                                            @else

                                                <h6>2. Purchasing an Item on TAFSEEL</h6>
                                                <p style="text-align: justify; text-justify: inter-word;">When you buy from a shop on TAFSEEL, you’re directly supporting an independent business, each with its unique listings, policies, processing times and payment systems.</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> By making a purchase from a seller on TAFSEEL, you agree that you have:</p>


                                                <h6>2.شراء عنصر على تفصيل</h6>
                                                <p style="text-align: justify; text-justify: inter-word;">عندما تشتري من متجر على تفصيل، فإنك تدعم مباشرةً محل مستقل، لكل منها قوائم وسياسات فريدة وأوقات معالجة وأنظمة دفع.</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> من خلال إجراء عملية شراء من بائع على تفصيل ، فإنك توافق على أنك:</p>

                                                <p style="text-align: justify; text-justify: inter-word;"> ●	قرأت وصف السلعة وسياسات المتجر قبل إجراء عملية الشراء؛  </p>
                                                <p style="text-align: justify; text-justify: inter-word;"> ●	قدمت الدفع المناسب عن شراء القطع ؛ و  </p>
                                                <p style="text-align: justify; text-justify: inter-word;"> ●	قدمت معلومات دقيقة إلى البائع  عن عنوان تسليم الطلب.   </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> كما أنك توافق على الالتزام  بسياسة الدفع الخاصة بـ تفصيل عند الدفع عن طريق تفصيل </p>

                                            @endif

                                        </div>
                                    </div>
                                </li>
                            </div>


                            <div class="row">
                                <li>
                                    <div class="media">
                                        <div class="media-body">

                                        </div>
                                    </div>
                                </li>
                            </div>






                                            @if(direction()=='ltr')

                                                <h6>3. Comments</h6>
                                                <p style="text-align: justify; text-justify: inter-word;">Comments are a great way to learn about a seller’s items, help good sellers build a strong reputation, or help warn other buyers about an experience. Comments will be publicly displayed on the seller's listing and review pages. </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">By leaving a comment or photograph, you acknowledge that your content may not: </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">1.	Contain private information;  </p>
                                                <p style="text-align: justify; text-justify: inter-word;">2.	Contain obscene, racist, or harassing language or imagery;   </p>
                                                <p style="text-align: justify; text-justify: inter-word;">3.	Contain prohibited medical drug claims;.</p>
                                                <p style="text-align: justify; text-justify: inter-word;">4.	Contain advertising or spam;</p>
                                                <p style="text-align: justify; text-justify: inter-word;">5.	Be about things outside the seller’s control, such as a delivery carrier, TAFSEEL, or a third party.</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> By uploading a photograph to one of TAFSEEL’s websites or TAFSEEL 's mobile app, you warrant that:  </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">1.	You own the photographs, or you have the rights or permission to use the photograph; and </p>
                                                <p style="text-align: justify; text-justify: inter-word;"> 2.	You understand that, as stated in TAFSEEL’s Terms of Use., TAFSEEL has license to use any content you provide to TAFSEEL. </p>
                                                <p style="text-align: justify; text-justify: inter-word;">3.	Sellers may respond to comments. Sellers responses must also comply with this policy. Sellers may hide photographs that they do not feel accurately represent their brand, or they may report reviews that violate our Terms of Use.</p>
                                                <p style="text-align: justify; text-justify: inter-word;">4.	We reserve the right to remove reviews or photographs that violate our policies or Terms of Use.</p>
                                                <p style="text-align: justify; text-justify: inter-word;">5.	The comments must not contain and Abusive, threatening, defamatory, or harassing content, and must not be In violation of someone else’s privacy.</p>

                                            @else


                                                <h6>3. Comments</h6>
                                                <p style="text-align: justify; text-justify: inter-word;">Comments are a great way to learn about a seller’s items, help good sellers build a strong reputation, or help warn other buyers about an experience. Comments will be publicly displayed on the seller's listing and review pages. </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">By leaving a comment or photograph, you acknowledge that your content may not: </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">1.	Contain private information;  </p>
                                                <p style="text-align: justify; text-justify: inter-word;">2.	Contain obscene, racist, or harassing language or imagery;   </p>
                                                <p style="text-align: justify; text-justify: inter-word;">3.	Contain prohibited medical drug claims;.</p>
                                                <p style="text-align: justify; text-justify: inter-word;">4.	Contain advertising or spam;</p>
                                                <p style="text-align: justify; text-justify: inter-word;">5.	Be about things outside the seller’s control, such as a delivery carrier, TAFSEEL, or a third party.</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> By uploading a photograph to one of TAFSEEL’s websites or TAFSEEL 's mobile app, you warrant that:  </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">1.	You own the photographs, or you have the rights or permission to use the photograph; and </p>
                                                <p style="text-align: justify; text-justify: inter-word;"> 2.	You understand that, as stated in TAFSEEL’s Terms of Use., TAFSEEL has license to use any content you provide to TAFSEEL. </p>
                                                <p style="text-align: justify; text-justify: inter-word;">3.	Sellers may respond to comments. Sellers responses must also comply with this policy. Sellers may hide photographs that they do not feel accurately represent their brand, or they may report reviews that violate our Terms of Use.</p>
                                                <p style="text-align: justify; text-justify: inter-word;">4.	We reserve the right to remove reviews or photographs that violate our policies or Terms of Use.</p>
                                                <p style="text-align: justify; text-justify: inter-word;">5.	The comments must not contain and Abusive, threatening, defamatory, or harassing content, and must not be In violation of someone else’s privacy.</p>


                                                <h6>3. التعليقات </h6>
                                                <p style="text-align: justify; text-justify: inter-word;">التعليقات هي وسيلة رائعة لمعرفة المزيد عن القطع المعروضة من قبل البائع ، وتساعد البائعين على بناء سمعة جيدة، أو تساعد المشترين. سيتم عرض التعليقات  بشكل علني على صفحات قائمة ومراجعة البائع. </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">من خلال ترك تعليق ، فإنك تقر بأن المحتوى الخاص بك في التعليق لا يجوز أن: </p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">1.	 يحتوي على معلومات خاصة؛  </p>
                                                <p style="text-align: justify; text-justify: inter-word;">2.	يحتوي على لغة أو صور فاحشة أو عنصرية أو مضايقة؛</p>
                                                <p style="text-align: justify; text-justify: inter-word;">3.	يحتوي على مطالبات طبية محظورة ؛.</p>
                                                <p style="text-align: justify; text-justify: inter-word;">4.	يحتوي على إعلانات أو رسائل غير مرغوب فيها؛;</p>
                                                <p style="text-align: justify; text-justify: inter-word;">5.	أن تكون عن أشياء خارجة عن سيطرة البائع، مثل الناقل التسليم، تفصيل، أو طرف ثالث..</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;"> من خلال تحميل صورة فوتوغرافية إلى منصفة تفصيل ، فإنك تضمن ما يلي:</p>
                                                <br>
                                                <p style="text-align: justify; text-justify: inter-word;">1.	تملك الصورة أو لديك حقوق أو إذن لاستخدام الصورة. و </p>
                                                <p style="text-align: justify; text-justify: inter-word;">2.	أنت تدرك أنه كما هو مذكور في شروط الاستخدام الخاصة بـ تفصيل ، فإن تفصيل لديه ترخيص لاستخدام أي محتوى تقدمه لـ تفصيل.</p>
                                                <p style="text-align: justify; text-justify: inter-word;">3.	قد يستجيب البائعون للتعليقات. يجب أن تمتثل ردود البائعين على المراجعات أيضًا مع هذه السياسة. قد يقوم البائعون بإخفاء صور فوتوغرافية لا يشعرون أنها تمثل علامتهم التجارية بدقة، أو قد يبلغون عن مراجعات تنتهك شروط الاستخدام الخاصة بنا..</p>
                                                <p style="text-align: justify; text-justify: inter-word;">4.	نحن نحتفظ بالحق في إزالة المراجعات أو الصور الفوتوغرافية التي تنتهك سياساتنا أو شروط الاستخدام..</p>
                                                <p style="text-align: justify; text-justify: inter-word;">5.	يجب ألا تحتوي التعليقات على محتوى كاذب أو فيه الإساءة أو التهديد أو التشهير أو المضايقة. أو فيه انتهاك لخصوصية شخص آخر.</p>

                                            @endif


                                        </div>
                                    </div>

                                </li>
                            </div>

                        </ul>
                    </div>
                </div>
            @endforelse
        </div>

    </section>

    <!--Section ends-->

@stop
