@extends('style.newIndex')
@section('content')

    <!-- breadcrumb start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">

                        <h2>{{ trans('user.seller_p') }}</h2>

                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        @if (session('lang') == 'ar')

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>/
                            <li class="breadcrumb-item"><a href="#">{{trans('user.policies')}}</a></li>
                            <span  aria-current="page">{{trans('user.seller_p')}}</span>
                        </ol>
                        @else
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>
                            <li class="breadcrumb-item">{{trans('user.policies')}}</li>/
                            <span  aria-current="page">{{trans('user.seller_p')}}</span>
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
            @forelse (\App\Models\Blog::where('name','seller')->get() as $blog)

                <div class="row section-b-space">
                    <div class="col-sm-12">
                        <ul class="comment-section">



                                @if (session('lang')=='ar')


                                    {!! $blog->blog_ar !!}

                                @else
                                    {!! $blog->blog_en !!}

                                @endif


                        </ul>
                    </div>
                </div>
            @empty
            <div class="row">
                <div class="col-sm-12 blog-detail">

                    <h3>{{trans('user.seller_p')}} </h3>
                    <hr>
                    @if(direction()=='ltr')


                    <p> TAFSEEL is a marketplace where you can sell your custom-made fashion directly to the buyers. We want to make sure that you and your buyers have a positive experience on TAFSEEL.   </p>
                    <p> Please read on to find out more about your rights, as well as what is expected of you, as a seller. </p>
                    <p> This policy is a part of our Terms of Use. By opening a TAFSEEL shop, you are agreeing to this policy and our Terms of Use. </p>
                    <p> You can also view fees and payments in Payments and Fees Policies </p>
                    <br>

                    @else


                    <p> تفصيل هو سوق إلكتروني، يمكنك فيه بيع الأزياء المخصصة حسب الطلب والمصممة والمصنوعة من قبلك مباشرة إلى المشترين. نسعى في تفصيل أن نوفر للبائعين وللمشترين تجربة تسوق إيجابية.   </p>
                    <p>  يرجى قراءة هذه السياسات بتمعن لمعرفة المزيد عن حقوقك، وكذلك واجباتك، باعتبارك بائع في منصة تفصيل.  </p>
                    <p> حيث أن هذه السياسة هي جزء من شروط الاستخدام الخاصة بنا، من خلال فتح متجر تفصيل، فإنك توافق على هذه السياسة وعلى جميع شروط الاستخدام الخاصة بنا. </p>
                    <p> كما يمكنك الإطلاع على الرسوم وعمليات الدفع في سيايات الدفع والرسوم </p>
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


                                            <h6>1۔What Can be Sold on TAFSEEL</h6>
                                            <p style="text-align: justify; text-justify: inter-word;">TAFSEEL is a unique marketplace. Buyers come here to purchase custom-made clothing that they might not find anywhere else. It is a marketplace for custom-made fashion. clothes that are made and/or designed by you. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">As a seller, you agree that: </p>

                                            <p style="text-align: justify; text-justify: inter-word;"> ●	All items are made or designed by you.  </p>
                                            <p style="text-align: justify; text-justify: inter-word;"> ●	You are using your own photographs—not stock photos, artistic , artistic renderings, or photos used by other sellers or sites.  </p>
                                            <p style="text-align: justify; text-justify: inter-word;"> ●	All listings are available for purchase at a set price.  </p>
                                            <p style="text-align: justify; text-justify: inter-word;"> ●	If you are using photographs of previous work with options for customization (like color choices) included in the listing, it is clear in your description that the photos shown are just examples.  </p>



                                        @else


                                            <h6>1.1۔ ما يمكنك بيعه على تفصيل</h6>تفصيل هو سوق فريد من نوعه. المشترين يأتون إلى هنا لشراء قطع الملابس التي قد لا يجدونها في أي مكان آخر. إنه سوق للأزياء التي يتم تفصيلها و / أو تصميمها من قبلك. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">باعتبارك بائعًا، فإنك توافق على ما يلي: </p>

                                            <p style="text-align: justify; text-justify: inter-word;"> ●	جميع الأزياء مصنوعة أو مصممة من قبلك.  </p>
                                            <p style="text-align: justify; text-justify: inter-word;"> ●	أنت تستخدم الصور الفوتوغرافية الخاصة بك - ،ليست الرسومات  الفنية، أو الصور المستخدمة من قبل البائعين أو المواقع الأخرى.   </p>
                                            <p style="text-align: justify; text-justify: inter-word;"> ●	جميع القط متاحة للشراء بسعر معين و موضح  علي القطعة. </p>
                                            <p style="text-align: justify; text-justify: inter-word;"> ●	إذا كنت تستخدم صورًا فوتوغرافية لعمل سابق مع خيارات التخصيص (مثل اختيارات الألوان) المضمنة في القائمة، فمن الواضح في وصفك أن الصور المعروضة هي مجرد أمثلة.  </p>


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


                                            <h6>2.What Can't be Sold on TAFSEEL </h6>

                                            <p style="text-align: justify; text-justify: inter-word;"> ●	Selling fast-manufactured fashion is not allowed  </p>
                                            <p style="text-align: justify; text-justify: inter-word;"> ●	Reselling is not allowed on TAFSEEL.    </p>
                                            <p style="text-align: justify; text-justify: inter-word;"> TAFSEEL may remove any listings that violate our policies. Note that fees are non-refundable. TAFSEEL may also suspend or terminate your account for any violations. You’ll still be on the hook to pay any outstanding fees on your TAFSEEL statement. You can find more information in our Fees & Payments Policy.  </p>


                                        @else


                                            <h6>2. ۔ ما لا يمكنك بيعه على تفصيل</h6>

                                            <p style="text-align: justify; text-justify: inter-word;"> ●	لا يسمح ببيع الملابس الجاهزة الصنع  </p>
                                            <p style="text-align: justify; text-justify: inter-word;"> ●	لا يسمح بإعادة البيع على تفصيل.    </p>
                                            <p style="text-align: justify; text-justify: inter-word;"> يجوز لـ تفصيل إزالة أي قوائم تنتهك سياساتنا. كما أن الرسوم غير قابلة للاسترداد. يجوز لـ تفصيل أيضاً تعليق أو إنهاء حسابك لأية انتهاكات. وستظل مطالب بدفع أي رسوم مستحقة على بيان تفصيل الخاص بك. يمكنك العثور على مزيد من المعلومات في سياسة الرسوم والمدفوعات الخاصة بنا. </p>

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


                                            <h6>3. Representing Yourself, Your Shop, and Your Listings Honestly </h6>
                                            <p style="text-align: justify; text-justify: inter-word;">At TAFSEEL, we value transparency. Transparency means that you honestly and accurately represent your items, and your business. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">By selling on TAFSEEL, you agree that you will: </p>
                                            <p style="text-align: justify; text-justify: inter-word;">1.	Provide honest, accurate information in your Shop Policies.  </p>
                                            <p style="text-align: justify; text-justify: inter-word;">2.	Accurately represent your items in listings and listing photos.   </p>
                                            <p style="text-align: justify; text-justify: inter-word;">3.	Respect the intellectual property of others. If you feel someone has violated your intellectual property rights, you can report it to TAFSEEL.</p>
                                            <p style="text-align: justify; text-justify: inter-word;">4.	Not create duplicate shops or take any other action (such as manipulating clicks, carts or sales) for the purpose of manipulating search or circumventing TAFSEEL's policies.</p>
                                            <p style="text-align: justify; text-justify: inter-word;">5.	Not coordinate pricing with other sellers.</p>
                                            <p style="text-align: justify; text-justify: inter-word;">6.	Communicating with Other TAFSEEL Members.</p>


                                        @else


                                            <h6>3. ۔ تمثيل نفسك، متجرك، والقوائم الخاصة بك بصراحة</h6>
                                            <p style="text-align: justify; text-justify: inter-word;"> نحن نقدر الشفافية في تفصيل. ويعني ذلك أنك تمثل البنود الخاصة بك بنزاهة وبدقة. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">من خلال البيع على تفصيل، فإنك توافق على أنك سوف:  </p>
                                            <p style="text-align: justify; text-justify: inter-word;">1.	تقدم معلومات صادقة ودقيقة في سياسات متجرك. </p>
                                            <p style="text-align: justify; text-justify: inter-word;">2.	تمثل بدقة العناصر الخاصة بك في القوائم والصور المعروضة.   </p>
                                            <p style="text-align: justify; text-justify: inter-word;">3.	تحترم الملكية الفكرية للآخرين. إذا كنت تشعر بأن شخصًا ما قد انتهك حقوق الملكية الفكرية الخاصة بك، يمكنك الإبلاغ عنه إلى تفصيل.</p>
                                            <p style="text-align: justify; text-justify: inter-word;">4.	عدم إنشاء متاجر مكررة أو اتخاذ أي إجراء آخر (مثل التلاعب بالنقرات أو عربات البيع) لغرض التلاعب بالبحث أو التحايل على سياسات تفصيل.</p>
                                            <p style="text-align: justify; text-justify: inter-word;">5.	عدم القيام  بتنسيق تسعير مع البائعين الآخرين.</p>
                                            <p style="text-align: justify; text-justify: inter-word;">6.	التواصل مع مستخدمي تفصيل الآخرين</p>

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


                                            <h6>4.Privacy and Protecting Personal Information </h6>
                                            <p style="text-align: justify; text-justify: inter-word;">You are responsible for protecting members’ personal information you receive or process, and you must comply with all relevant legal requirements. This includes applicable data protection and privacy laws that govern the ways in which you can use TAFSEEL user information. These laws may require that you post and comply with your own privacy policy, which must be accessible to TAFSEEL users with whom you interact. Your privacy policy must be compatible with this policy and TAFSEEL’s Terms of Use. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">In particular, when you sell using our Services (subject to this Policy) you may receive and determine what to do with certain personal information, such as when communicating with users and entering into transactions with buyers. This means you process personal information (for example, buyer name, email address, and shipping address) and, to the extent you do so, you are an independent controller of data relating to other users that you may have obtained through the Services. You are responsible for protecting user personal information you receive or process and complying with all relevant legal requirements when you use the Services. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">This includes applicable data protection and privacy laws that govern the ways in which you can use a user’s information. Such laws may require that you post, and comply with, your own privacy policy, which must be accessible to TAFSEEL users you interact with and compatible with this policy and TAFSEEl’s Terms of Use. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">As a data controller (that is someone who decides what personal data is collected and the purpose you’ll use the data for) to the extent that you process user personal information outside of the Services, you may be required under applicable data protection and privacy laws to honor requests received from such users for data access, portability, correction, deletion, and objections to processing.</p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">Also, if you disclose personal information without the buyer’s proper consent, you are responsible for that unauthorized disclosure. This includes, for example, disclosures you make or unintentional data breaches. For example, you may receive a buyer’s email address or other information as a result of entering into a transaction with that buyer. This information may only be used for TAFSEEL-related communications or for TAFSEEL-facilitated transactions. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">You may not use this information for unsolicited commercial messages or unauthorized transactions. Without the buyer’s consent, and subject to other applicable TAFSEEL policies and laws, you may not add any TAFSEEL member to your email or physical mailing list, use that buyer’s identity for marketing, or obtain or retain any payment information. Please bear in mind that you're responsible for knowing the standard of consent required in any given instance. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">If TAFSEEL and you are found to be joint data controllers of personal information, and if TAFSEEL is sued, fined, or otherwise incurs expenses because of something that you did in your capacity as a joint data controller of buyer personal information, you agree to indemnify TAFSEEL for the expenses it occurs in connection with your processing of buyer personal `. </p>
                                            <br>

                                        @else


                                            <h6>4.الخصوصية وحماية المعلومات الشخصية </h6>
                                            <p style="text-align: justify; text-justify: inter-word;"> يجب أن تكون سياسة الخصوصية التابعة لك متوافقة مع سياسة وشروط الاستخدام الخاصة بـ تفصيل.</p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">وعلى سبيل المثال، عند البيع باستخدام خدماتنا (مع مراعاة هذه السياسة) قد تتلقى وتحدد ما يجب فعله مع بعض المعلومات الشخصية، مثل عند التواصل مع المستخدمين والدخول في معاملات مع المشترين. وهذا يعني أنك تعالج المعلومات الشخصية مثل اسم المشتري وعنوان البريد الإلكتروني وعنوان الشحن)، وبقدر ما تفعل ذلك، فأنت تعتبر مراقب مستقل للبيانات المتعلقة بالمستخدمين الآخرين الذين قد تكون حصلت عليهم من خلال الخدمات. فأنت مسؤول عن حماية المعلومات الشخصية للمستخدم التي تتلقاها أو تعالجها والامتثال لجميع المتطلبات القانونية ذات الصلة عند استخدام الخدمات. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">يشمل ذلك قوانين حماية البيانات والخصوصية السارية التي تحكم الطرق التي يمكنك من خلالها استخدام معلومات المستخدم. وقد تتطلب مثل هذه القوانين أن تقوم بنشر سياسة الخصوصية الخاصة بك والامتثال لها، والتي يجب أن تكون في متناول مستخدمي تفصيل الذين تتفاعل معهم ومتوافقة مع هذه السياسة وشروط الاستخدام الخاصة بـ تفصيل. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">باعتبارك متحكم في البيانات (أي شخص يقرر ما هي البيانات الشخصية التي يتم جمعها والغرض الذي ستستخدم البيانات من أجله) إلى الحد الذي تقوم فيه بمعالجة المعلومات الشخصية للمستخدم خارج نطاق الخدمات، قد تكون مطالبًا بموجب قوانين حماية البيانات والخصوصية المعمول بها باحترام الطلبات الواردة من هؤلاء المستخدمين للوصول إلى البيانات وإمكانية النقل والتصحيح والحذف والاعتراضات على المعالجة. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">أيضا، إذا قمت بالكشف عن المعلومات الشخصية دون موافقة المشتري المناسبة، فأنت مسؤول عن ذلك الكشف غير المصرح به. ويشمل ذلك، على سبيل المثال، عمليات الإفصاح التي تقوم بها أو خروقات البيانات غير المقصودة. على سبيل المثال، قد تتلقى عنوان البريد الإلكتروني للمشتري أو معلومات أخرى نتيجة للدخول في معاملة مع ذلك المشتري. قد يتم استخدام هذه المعلومات فقط في الاتصالات المتعلقة بـ تفصيل أو للمعاملات التي يسهلها تفصيل . </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;"> لا يجوز لك استخدام هذه المعلومات في الرسائل التجارية غير المرغوب فيها أو المعاملات غير المصرح بها. دون موافقة المشتري، وتخضع لسياسات وقوانين تفصيل المعمول بها، لا يجوز لك إضافة أي عضو في تفصيل إلى بريدك الإلكتروني أو قائمة البريدية الفعلية، أو استخدام هوية ذلك المشتري للتسويق، أو الحصول على أي معلومات عن الدفع أو الاحتفاظ بها. يرجى أن تضع في اعتبارك أنك مسؤول عن معرفة مستوى الموافقة المطلوبة في أي حالة معينة.  </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">إذا تم رفع دعوى قضائية ، أو تغريم، أو تحمل النفقات ضد تفصيل بسبب شيء فعلته بصفتك مراقب بيانات مشترك للمعلومات الشخصية للمشتري، فإنك توافق على تعويض تفصيل عن النفقات التي تحدث فيما يتعلق بمعالجة المعلومات الشخصية الخاصة بك. </p>
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


                                            <h6>5.Creating and Uploading Content </h6>
                                            <p style="text-align: justify; text-justify: inter-word;">As a member of TAFSEEL, you have the opportunity to create and upload a variety of content, like listings, Messages, text, photos, and videos.</p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">To keep our community safe and respectful, you agree that you will not upload content that is:</p>
                                            <p style="text-align: justify; text-justify: inter-word;">1.	Abusive, threatening, defamatory, or harassing.  </p>
                                            <p style="text-align: justify; text-justify: inter-word;">2.	Obscene or vulgar;   </p>
                                            <p style="text-align: justify; text-justify: inter-word;">3.	In violation of someone else’s privacy or policies.</p>
                                            <p style="text-align: justify; text-justify: inter-word;">3.	False, deceptive, or misleading.</p>


                                        @else


                                            <h6>5. ۔ إنشاء المحتوى وتحميله </h6>
                                            <p style="text-align: justify; text-justify: inter-word;">كعضو في تفصيل ، تستطيع إنشاء وتحميل مجموعة متنوعة من المحتوى، مثل القوائم والرسائل والنصوص والصور ومقاطع الفيديو. </p>
                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">من أجل الحفاظ على سلامة مجتمعنا واحترامه، فإنك توافق على أنك لن تقوم بتحميل يحتوي على:</p>
                                            <p style="text-align: justify; text-justify: inter-word;">1.	الإساءة أو التهديد أو التشهير أو المضايقة  </p>
                                            <p style="text-align: justify; text-justify: inter-word;">2.	فاحشة أو مبتذلة او غير محتشمة، او خادشة للحياء ومغايرة للذوق العام؛   </p>
                                            <p style="text-align: justify; text-justify: inter-word;">3.	اختراق لخصوصية الأخرين أو لسياسة الخصوصية الخاصة بتفصيل</p>
                                            <p style="text-align: justify; text-justify: inter-word;">3.	احتواء التهديدات أو الابتزاز؛</p>

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


                                            <h6>6. Building a Positive Reputation Through our Reviews System</h6>
                                            <p style="text-align: justify; text-justify: inter-word;">Reviews are a great way for you to build a reputation on TAFSEEL. Buyers can leave a comment, of their purchase. On the rare occasion you receive an unfavorable review, you can reach out to the buyer or, leave a response.</p>
                                            <br>

                                            <p style="text-align: justify; text-justify: inter-word;">Reviews and your response to reviews may not:</p>
                                            <p style="text-align: justify; text-justify: inter-word;">1.	Contain private information;  </p>
                                            <p style="text-align: justify; text-justify: inter-word;">2.	Contain obscene, racist, or harassing language or imagery;   </p>
                                            <p style="text-align: justify; text-justify: inter-word;">3.	Contain advertising or spam;</p>
                                            <p style="text-align: justify; text-justify: inter-word;">4.	Be about things outside the seller’s control, such as a shipping carrier, TAFSEEL or a third party;</p>

                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">We expect our sellers to provide a high level of customer service</p>
                                            <br>

                                            <p style="text-align: justify; text-justify: inter-word;">By selling on TAFSEEL, you agree to:</p>
                                            <p style="text-align: justify; text-justify: inter-word;">1.	Honor your shipping and processing times. Sellers are obligated to ship an item or otherwise complete a transaction with a buyer in a prompt manner, unless there is an exceptional circumstance. Please be aware that legal requirements for shipping times vary by country.  </p>
                                            <p style="text-align: justify; text-justify: inter-word;">2.	Respond to Messages in a timely manner.   </p>
                                            <p style="text-align: justify; text-justify: inter-word;">3.	Honor the commitments you make in your shop policies;</p>
                                            <p style="text-align: justify; text-justify: inter-word;">4.	Resolve disagreements or disputes directly with the buyer. In the unlikely event that you can’t reach a resolution, our Dispute Resolution team can help through our case system;</p>

                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">If you are unable to complete an order, you must notify the buyer and cancel the order. As a seller, you must provide great customer service and maintain trust you’re your buyers. </p>



                                        @else


                                            <h6>6. بناء سمعة إيجابية من خلال نظام مراجعاتنا</h6>
                                            <p style="text-align: justify; text-justify: inter-word;">التقييمات هي طريقة رائعة بالنسبة لك لبناء سمعة على تفصيل  يمكن للمشترين ترك تعليق، بعد الشراء. وقد تتلقى نادراً  تقييم أو تعليق سلبي ، يمكنك الوصول إلى المشتري أو/وترك استجابة..</p>
                                            <br>

                                            <p style="text-align: justify; text-justify: inter-word;">يجب ألا تحتوي المراجعات وردك على التعليقات علي:</p>
                                            <p style="text-align: justify; text-justify: inter-word;">1.	على معلومات خاصة; </p>
                                            <p style="text-align: justify; text-justify: inter-word;">2.	على لغة أو صور فاحشة أو عنصرية أو مضايقة؛  </p>
                                            <p style="text-align: justify; text-justify: inter-word;">3.	على إعلانات أو رسائل غير مرغوب فيها؛</p>
                                            <p style="text-align: justify; text-justify: inter-word;">4.	أن تكون عن أشياء خارجة عن سيطرة الطرف الآخر، مثل شركة التوصيل، تفصيل أو طرف ثالث؛</p>

                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">نتوقع من البائعين لدينا لتوفير مستوى عال من خدمة العملاء.</p>
                                            <br>

                                            <p style="text-align: justify; text-justify: inter-word;"> من خلال البيع على تفصيل ، فإنك توافق على:</p>
                                            <p style="text-align: justify; text-justify: inter-word;">1.	ألتزامك بالشحن أو إتمام معاملة مع المشتري بطريقة سريعة، ما لم يكن هناك ظرف استثنائي. يرجى أن تكون على علم بأن المتطلبات القانونية لأوقات الشحن تختلف حسب البلد.</p>
                                            <p style="text-align: justify; text-justify: inter-word;">2.	الاستجابة إلى الرسائل في الوقت المناسب.   </p>
                                            <p style="text-align: justify; text-justify: inter-word;">3.	احترام الالتزامات التي تقدمها في سياسات متجرك.</p>
                                            <p style="text-align: justify; text-justify: inter-word;">4.	حل الخلافات أو النزاعات مباشرة مع المشتري. وفي حال عدم إمكانية الوصول إلى حل، يمكن لفريق تفصيل المساعدة بحل النزاعات .</p>

                                            <br>
                                            <p style="text-align: justify; text-justify: inter-word;">إذا كنت غير قادر على إتمام الطلب، يجب عليك إبلاغ المشتري وإلغاء الطلب. كبائع، يجب عليك تقديم خدمة عملاء رائعة والحفاظ على الثقة التي تقوم بها من مشتري </p>


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

                                            <h6>7. Responding to Requests for Cancellations, Returns, and Exchanges </h6>
                                            <p style="text-align: justify; text-justify: inter-word;">Please be aware that in addition to this policy, each country has its own laws surrounding shipping, cancellations, returns, and exchanges. Please familiarize yourself with the laws of your own country and those of your buyers’ countries.</p>

                                        @else


                                            <h6>7.  ۔ الاستجابة لطلبات الإلغاء والإرجاع والتبادلات </h6>
                                            <p style="text-align: justify; text-justify: inter-word;"> يرجى العلم أنه بالإضافة إلى هذه السياسة، فإن كل بلد لديه قوانينه الخاصة المحيطة الشحن، الإلغاء، العودة، والتبادلات. يرجى الاطلاع على قوانين بلدك وقوانين دول المشترين الخاصة بك.</p>

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

                                            <h6>8.Cancellations </h6>
                                            <p style="text-align: justify; text-justify: inter-word;">If you are unable to complete a transaction, you must notify the buyer via TAFSEEL Messages and cancel the transaction. If the buyer already submitted payment, you must issue a full refund. You are encouraged to keep proof of any refunds in the event a dispute arises.</p>

                                        @else


                                            <h6>8. ۔ الالغاء</h6>
                                            <p style="text-align: justify; text-justify: inter-word;">إذا كنت غير قادر على إتمام المعاملة، يجب عليك إخطار المشتري عبر رسائل تفصيل وإلغاء المعاملة. إذا كان المشتري قد دفع بالفعل ، يجب إرجاع كامل المبلغ. نؤد عي أهمية الاحتفاظ بإثبات أي استرداد في حالة نشوء نزاع.</p>

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
        </div>
    </section>
    <!--Section ends-->

@stop
