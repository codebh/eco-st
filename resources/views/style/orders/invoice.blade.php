

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="multikart">
  <meta name="keywords" content="multikart">
  <meta name="author" content="multikart">
  <link rel="icon" href="{{asset('img/s_logo.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('img/s_logo.png')}}" type="image/x-icon">
  <title>Tafseel -invoice </title>

  <!--Google font-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" type="text/css" href="{{ asset('design/theme/assets/css/vendors/fontawesome.css') }}">

  <!-- Animate icon -->
  <link rel="stylesheet" type="text/css" href="{{ asset('design/theme/assets/css/vendors/animate.css') }}">

  <!-- Themify icon -->
  <link rel="stylesheet" type="text/css" href="{{ asset('design/theme/assets/css/vendors/themify-icons.css') }}">

  <!-- Bootstrap css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('design/theme/assets/css/vendors/bootstrap.css') }}">

  <!-- Theme css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('design/theme/assets/css/style.css') }}">


</head>

<body class="theme-color-1 bg-light">


  <!-- invoice 1 start -->
  <section class="theme-invoice-1 section-b-space">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 m-auto">
          <div class="invoice-wrapper">
            <div class="invoice-header">
              <div class="upper-icon" style="background-color:#726189 ">
                <img src="{{ asset('design/theme/assets/images/invoice/invoice.svg') }}" class="img-fluid" alt="">
              </div>
              <div class="row header-content">
                <div class="col-md-6">
                    <img src="{{ asset('img/theme/logo/logo03.png') }}" style="height: 60px;" class="img-fluid" alt="">
                    <div class="mt-md-4 mt-3">
                    <h4 class="mb-2">
                      tafseel
                    </h4>
                    <h4 class="mb-0">info@tafseel.net</h4>
                  </div>
                </div>
                <div class="col-md-6 text-md-end mt-md-0 mt-4">
                  <h2>invoice</h2>
                  {{-- <div class="mt-md-4 mt-3">
                    <h4 class="mb-2">
                      2664  Tail Ends Road, ORADELL
                    </h4>
                    <h4 class="mb-0">New Jersey, 07649</h4>
                  </div> --}}
                </div>
              </div>
              <div class="detail-bottom">
                <ul>
                  <li><span style="color:#726189; font-weight:700">invoice no :</span><h4> {{$order->id}}</h4></li>
                  <li><span style="color:#726189; font-weight:700">issue date :</span><h4> {{$order->created_at->format('y-m-d')}}</h4></li>
                </ul>
                <ul>
                    <li><span style="color:#726189; font-weight:700">mobile:</span><h4> {{$order->billing_phone}}</h4></li>

                    <li><span style="color:#726189; font-weight:700">email :</span><h4> {{$order->billing_email}}</h4></li>
                  </ul>
              </div>
            </div>
            <div class="invoice-body table-responsive-md">
              <table class="table table-borderless mb-0" style="color:#726189;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">shop</th>
                    <th scope="col">color</th>
                    <th scope="col">price</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach (\App\Models\OrderProduct::where('order_id',$order->id)->where('user_id',auth()->user()->id)->get() as $item )

                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$item->product->title}}</td>
                      <td>{{ $item->store->name}}</td>
                      <td>{{ $item->color}}</td>
                      <td>{{presentLang($item->price)}}</td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2"></td>
                    <td class="font-bold text-dark" colspan="2">SUBTOTAL</td>
                    <td class="font-bold " style="color:#726189;">{{presentLang($item->order->billing_subtotal)}}</td>
                  </tr>
                  <tr>
                    <td colspan="2"></td>
                    <td class="font-bold text-dark" colspan="2">DELIVERY</td>
                    <td class="font-bold " style="color:#726189;">{{presentLang($item->order->billing_delivery)}}</td>
                  </tr>
                  @if ($item->order->billing_discount_code !== null)

                  <tr>
                    <td colspan="2"></td>
                    <td class="font-bold text-dark" colspan="2">DISCOUNT({{$item->order->billing_discount_code }})</td>
                    <td class="font-bold text-theme">{{presentLang($item->order->billing_discount)}}</td>
                  </tr>
                  @endif
                  <tr>
                    <td colspan="2"></td>
                    <td class="font-bold text-dark" colspan="2">TOTAL</td>
                    <td class="font-bold " style="color:#726189;">{{presentLang($item->order->billing_total)}}</td>
                  </tr>
                </tfoot>
              </table>
            </div>
            {{-- <div class="invoice-footer text-end">
              <div class="authorise-sign">
                <img src="../assets/images/invoice/sign.png" class="img-fluid" alt="sing">
                <span class="line"></span>
                <h6>Authorised Sign</h6>
              </div>
              {{-- <div class="buttons">
                <a href="#" class="btn black-btn btn-solid rounded-2 me-2" onclick="window.print();">export as PDF</a>
                <a href="#" class="btn btn-solid rounded-2" onclick="window.print();">print</a>
              </div> --}}
            {{-- </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- invoice 1 end -->


  <!-- latest jquery-->
  <script src="{{ asset('design/theme/assets/js/jquery-3.3.1.min.js') }}"></script>

  <!-- Bootstrap js-->
  <script src="{{ asset('design/theme/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script>
    window.addEventListener("load", window.print());
  </script>
</body>

</html>
