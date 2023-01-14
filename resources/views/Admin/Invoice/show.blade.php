
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon" />
    <title>Tax Invoice</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
    ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <!-- Stylesheet
    ======================= -->
    <link rel="stylesheet" type="text/css" href="https://harnishdesign.net/demo/html/koice/vendor/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://harnishdesign.net/demo/html/koice/vendor/font-awesome/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://harnishdesign.net/demo/html/koice/css/stylesheet.css"/>
    <style>
        body {
            font-family: 'Tajawal' !important;
        }
        .card-footer , .card-header{
            padding: 0.5rem 1rem;
            background: none;
            border-top: 1px solidrgba(0,0,0,.125);
        }
        .card {
            border: none;
        }
    </style>
</head>
<body>
<!-- Container -->
<div class="container-fluid invoice-container">
    <!-- Header -->
    <header>
        <div class="row align-items-left">
            <div class="col-sm-5 text-left">
                <h4 class="mb-0">Tax Invoice</h4>
                <p class="mb-0" style="font-size: 22px;">فاتورة ضريبية</p>
            </div>
            <div class="col-sm-7 text-left text-sm-start mb-3 mb-sm-0">  </div>

        </div>
        <hr>
    </header>

    <!-- Main Content -->
    <main>

        <div class="row">
            <div class="col-4">
                <strong>Bill to:</strong>
                <strong>العميل</strong>
                <address>
                    {{$data[0]->client_name}}<br />
                    {{$data[0]->client_phone}}<br />
                    {{$data[0]->client_address}}<br />
                    {{$data[0]->client_state}}<br />
                    {{$data[0]->client_city}}
                </address>
            </div>
            <div class="col-4">
                <strong>Invoice number</strong><br />
                <strong>رقم الفاتورة</strong>
                <address>
                    INV-{{$data[0]->order_id}}<br />
                </address>
                <strong>Date</strong>
                <strong>التاريخ</strong>
                <address>
                    {{$data[0]->date}}<br />
                </address>
                <strong>Issue Date</strong>
                <strong>تاريخ الاصدار</strong>
                <address>
                    {{$data[0]->issue_date}}<br />
                </address>
                <strong>Due Date</strong>
                <strong>تاريخ الاصدار</strong>
                <address>
                    {{$data[0]->due_date}}<br />
                </address>
            </div>
            <div class="col-4" style="text-align: right;">
                <strong> {{App\Models\Setting::find(1)->name}}</strong>
                <address>
                    {{App\Models\Setting::find(1)->address}} <br />
                    {{App\Models\Setting::find(1)->phone}}<br />
                    <strong>رقم السجل التجاري</strong><br />
                    1128187727<br />
                </address>
            </div>

        </div>
        <div class="card">

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="card-header">
                        <tr>
                            <td class="col-3"><strong>Description</strong><p>الوصف</p></td>
                            <td class="col-2 text-end"><strong>Quantity</strong><p>الكمية</p></td>
                            <td class="col-2 text-end"><strong>Price</strong><p>السعر</p></td>
                            <td class="col-3 text-end"><strong>Vat</strong><p>الضريبة</p></td>
                            <td class="col-2 text-end"><strong>Amount</strong><p>المجموع</p></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="col-3">{{$item->description_ar}}<br>{{$item->description_en}}</td>
                                <td class="col-2 text-end">{{$item->quantity}}</td>
                                <td class="col-2 text-end">{{$item->price}}</td>
                                <td class="col-3 text-end">{{$item->vat}}</td>
                                <td class="col-2 text-end">{{$item->amount}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot class="card-footer">
                        <tr>
                            <td class="text-center border-bottom-0" colspan="3" rowspan="3">{{ $qrcode }}</td>
                            <td class="text-end"><strong>Sub Total:</strong><p>المجموع الفرعي</p></td>
                            <td class="text-end">{{$item->total_amount}}</td>
                        </tr>
                        <tr>
                            <td class="text-end"><strong>Total VAT:</strong><p>اجمالي ضريبة القيمة المضافة </p></td>
                            <td class="text-end">{{$item->total_vat}}</td>
                        </tr>
                        <tr>
                            <td class="text-end border-bottom-0"><strong>Total:</strong><p>الاجمالي</p></td>
                            <td class="text-end border-bottom-0">{{$item->total_amount + $item->total_vat}}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="text-center">
        {{-- <hr>
        <p><strong>Koice Inc.</strong><br>
          4th Floor, Plot No.22, Above Public Park, 145 Murphy Canyon Rd,<br>
          Suite 100-18, San Diego CA 2028. </p>
        <hr>
        <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p> --}}
        <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none" style="background: #000000;color: #ffffff !important;font-size: 18px;font-weight: bold;border: none !important;padding: 10px 25px;"> طباعه</a></div>
    </footer>
</div>

</body>
</html>
