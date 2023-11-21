

    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Invoice_</title>
        <style>
            body, html {
                margin: 0px;
                padding: 0px;
            }

            .clearfix::after {
                display: block;
                clear: both;
                content: "";
            }

            .wfte_hidden {
                display: none !important;
            }

            .wfte_text_right {
                text-align: right !important;
            }

            .wfte_text_left {
                text-align: start !important;
            }

            .wfte_text_center {
                text-align: center !important;
            }

            .pagebreak {
                page-break-after: always;
            }

            .no-page-break {
                page-break-after: avoid;
            }
        </style>
        <style id="template_font_style">* { /*font-family:"DeJaVu Sans", monospace;*/
            }

            .template_footer { /*position:absolute;bottom:0px;*/
            }
        </style>
        <style>
            .wfte_row {
                width: 100%;
                display: block;
            }

            .wfte_col-1 {
                width: 100%;
                display: block;
            }

            .wfte_col-2 {
                width: 50%;
                display: block;
            }

            .wfte_col-3 {
                width: 33%;
                display: block;
            }

            .wfte_col-4 {
                width: 25%;
                display: block;
            }

            .wfte_col-6 {
                width: 30%;
                display: block;
            }

            .wfte_col-7 {
                width: 69%;
                display: block;
            }
        </style>
        <style>
            @media print {
                body {
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                }

                #Header, #Footer {
                    display: none !important;
                }

                @page {
                    size: auto;
                    margin: 0;
                }

                body, html {
                    margin: 0;
                    background-color: #FFFFFF;
                }

                table.wfte_product_table tr, table.wfte_product_table tr td, table.wfte_payment_summary_table tr, table.wfte_payment_summary_table tr td {
                    page-break-inside: avoid;
                }
            }

            .wfte_received_seal {
                page-break-inside: avoid;
            }
        </style>

    </head>
    <body>

        <style type="text/css">
            @page {
                margin: 30px 0px;
            }

            body, html {
                margin: 0px;
                padding: 0px;
                font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            }

            .clearfix::after {
                display: block;
                clear: both;
                content: "";
            }

            .wfte_invoice-main {
                color: #202020;
                font-size: 12px;
                font-weight: 400;
                box-sizing: border-box;
                width: 100%;
                padding: 0px 0px 30px 0px;
                margin: 30px 0px;
                background: #fff;
                height: auto;
            }

            .wfte_invoice-main * {
                box-sizing: border-box;
            }

            .template_footer {
                color: #202020;
                font-size: 12px;
                font-weight: 400;
                box-sizing: border-box;
                padding: 30px 0px;
                background: #fff;
                height: auto;
            }

            .template_footer * {
                box-sizing: border-box;
            }


            .wfte_row {
                width: 100%;
                display: block;
            }

            .wfte_col-1 {
                width: 100%;
                display: block;
            }

            .wfte_col-2 {
                width: 50%;
                display: block;
            }

            .wfte_col-3 {
                width: 33%;
                display: block;
            }

            .wfte_col-4 {
                width: 25%;
                display: block;
            }

            .wfte_col-6 {
                width: 30%;
                display: block;
            }

            .wfte_col-7 {
                width: 69%;
                display: block;
            }

            .wfte_padding_left_right {
                padding: 0px 30px;
            }

            .wfte_hr {
                height: 1px;
                font-size: 0px;
                padding: 0px;
                background: #cccccc;
                margin-bottom: 20px;
            }

            .wfte_company_logo_img_box {
                margin-bottom: 10px;
            }

            .wfte_company_logo_img {
                width: 150px;
                max-width: 100%;
            }

            .wfte_doc_title {
                color: #23a8f9;
                font-size: 30px;
                font-weight: bold;
                height: auto;
                width: 100%;
                line-height: 22px;
            }

            .wfte_company_name {
                font-size: 18px;
                font-weight: bold;
            }

            .wfte_company_logo_extra_details {
                font-size: 12px;
                margin-top: 3px;
            }

            .wfte_barcode {
                margin-top: 5px;
            }

            .wfte_invoice_data div span:last-child, .wfte_extra_fields span:last-child {
                font-weight: bold;
            }

            .wfte_invoice_data {
                line-height: 16px;
                font-size: 12px;
            }

            .wfte_shipping_address {
                width: 95%;
            }

            .wfte_billing_address {
                width: 95%;
            }

            .wfte_address-field-header {
                font-weight: bold;
                font-size: 12px;
                background: #eff1f4;
                color: #000;
                padding: 3px;
                padding-left: 0px;
            }

            .wfte_addrss_field_main {
                padding-top: 15px;
            }

            .wfte_product_table {
                width: 100%;
                border-collapse: collapse;
                margin: 0px;
            }

            .wfte_payment_summary_table_body .wfte_right_column {
                text-align: left;
            }

            .wfte_payment_summary_table {
                margin-bottom: 10px;
            }

            .wfte_product_table_head_bg {
                background-color: #eff1f4;
            }

            .wfte_table_head_color {
                color: #2e2e2e;
            }

            .wfte_product_table_head {
            }

            .wfte_product_table_head th {
                height: 36px;
                padding: 0px 5px;
                font-size: .75rem;
                text-align: start;
                line-height: 10px;
                border-bottom: solid 1px #cccccc;
                border-top: solid 1px #cccccc;
                font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            }

            .wfte_product_table_body td, .wfte_payment_summary_table_body td {
                font-size: 12px;
                line-height: 15px;
            }

            .wfte_product_table_body td {
                padding: 5px 5px;
                border-bottom: solid 1px #cccccc;
            }

            .wfte_product_table .wfte_right_column {
                width: 15%;
            }

            .wfte_payment_summary_table .wfte_left_column {
                width: 60%;
            }

            .wfte_product_table_body .product_td b {
                font-weight: normal;
            }

            .wfte_product_table_head_product {
                width: 30%;
            }

            .wfte_payment_summary_table_body td {
                padding: 5px 5px;
                border: none;
            }

            .wfte_product_table_payment_total td {
                font-size: 13px;
                color: #000;
                height: 28px;
                border-bottom: solid 1px #cccccc;
                border-top: solid 1px #cccccc;
            }

            .wfte_product_table_payment_total td:nth-child(3) {
                font-weight: bold;
            }

            .product_td b {
                line-height: 15px;
            }

            /* for mPdf */
            .wfte_invoice_data {
                border: solid 0px #fff;
            }

            .wfte_invoice_data td, .wfte_extra_fields td {
                font-size: 12px;
                padding: 0px;
                font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
                line-height: 14px;
            }

            .wfte_invoice_data tr td:nth-child(2), .wfte_extra_fields tr td:nth-child(2) {
                font-weight: bold;
            }

            .wfte_signature {
                width: 100%;
                height: auto;
                min-height: 60px;
                padding: 5px 0px;
            }

            .wfte_signature_label {
                font-size: 12px;
            }

            .wfte_image_signature_box {
                display: inline-block;
            }

            .wfte_return_policy {
                width: 100%;
                height: auto;
                border-bottom: solid 1px #dfd5d5;
                padding: 5px 0px;
                margin-top: 5px;
            }

            .wfte_footer {
                width: 100%;
                height: auto;
                padding: 5px 0px;
                margin-top: 5px;
                font-size: 12px;
            }

            .wfte_received_seal {
                position: absolute;
                z-index: 10;
                margin-top: 110px;
                margin-left: 0px;
                width: 130px;
                border-radius: 5px;
                font-size: 22px;
                height: 40px;
                line-height: 28px;
                border: solid 5px #00ccc5;
                color: #00ccc5;
                font-weight: 900;
                text-align: center;
                transform: rotate(-45deg);
                opacity: .5;
            }

            .float_left {
                float: left;
            }

            .float_right {
                float: right;
            }

            .wfte_product_table_category_row td {
                padding: 10px 5px;
            }
        </style>
        @foreach($orders as $order)
            <div class="wfte_adc_main_body"><!-- DC ready -->

            <div class="wfte_rtl_main wfte_invoice-main">
                <div class="wfte_row wfte_padding_left_right float_left clearfix">
                    <div class="wfte_col-6 float_left">
                        <div class="wfte_doc_title wfte_template_element wfte_text_left" data-hover-id="doc_title"
                             style="font-size: 17px;">online extra
                        </div>
                    </div>

                    <div class="wfte_col-7 float_right">
                        <div class="wfte_company_logo wfte_text_right wfte_template_element wfte_hidden"
                             data-hover-id="company_logo">
                            <div class="wfte_company_logo_img_box">
                                <img src=""
                                     class="wfte_company_logo_img">
                            </div>
                            <div class="wfte_company_name wfte_hidden"></div>
                            <div class="wfte_company_logo_extra_details"></div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="clearfix"></div>
                <div class="wfte_row wfte_padding_left_right clearfix" style="padding-top: 15px;">
                    <div class="wfte_col-2 float_left wfte_text_left">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="wfte_row wfte_hr clearfix"></div>
                <div class="clearfix"></div>
                <div class="wfte_row wfte_padding_left_right clearfix">
                    <div class="wfte_col-3 float_left wfte_text_left">
                        <div class="wfte_billing_address wfte_template_element" data-hover-id="billing_address">
                            <div class="wfte_address-field-header wfte_billing_address_label">عنوان وصول الفواتير:</div>
                            <div class="wfte_billing_address_val">
                                {{$order->postMetaBillingFirstName->meta_value??''}} {{$order->postMetaBillingLastName->meta_value??''}}
                                <br>
                                {{$order->postMetaBillingAddressOne->meta_value??''}}
                                <br>
                                {{$order->postMetaBillingCity->meta_value??''}}
                            </div>
                        </div>
                        <div class="wfte_invoice_data">
                            <div class="wfte_tel">
                                <span class="wfte_tel_label">الهاتف: </span>
                                <span class="wfte_tel_val" style="font-weight:normal;">
                                    {{$order->postMetaBillingPhone->meta_value??''}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="wfte_col-3 float_left wfte_text_left">
                        <div class="wfte_shipping_address wfte_template_element" data-hover-id="shipping_address">
                            <div class="wfte_address-field-header wfte_shipping_address_label">عنوان الشحن:</div>
                            <div class="wfte_shipping_address_val">

                                {{$order->postMetaShippingFirstName->meta_value??''}} {{$order->postMetaShippingLastName->meta_value??''}}
                                <br>
                                {{$order->postMetaShippingAddressOne->meta_value??''}}
                                <br>
                                {{$order->postMetaShippingCity->meta_value??''}}

                            </div>
                        </div>
                    </div>
                    <div class="wfte_col-3 float_right wfte_text_right">
                        <div class="wfte_invoice_data">
                            <div class="wfte_invoice_date wfte_template_element wfte_hidden" data-invoice_date-format="m-d-Y"
                                 data-hover-id="invoice_date">
                                <span class="wfte_invoice_date_label">تاريخ الفاتورة: </span>
                                <span class="wfte_invoice_date_val" style="font-weight: bold;"></span>
                            </div>
                            <div class="wfte_invoice_number wfte_template_element" data-hover-id="invoice_number">
                                <span class="wfte_invoice_number_label">فاتورة: </span>
                                <span class="wfte_invoice_number_val" style="font-weight: bold;">
                                    {{$order->ID}}
                                </span>
                            </div>
                            <div class="wfte_order_number wfte_template_element wfte_hidden" data-hover-id="order_number">
                                <span class="wfte_order_number_label">رقم الطلب: </span>
                                <span class="wfte_order_number_val" style="font-weight: bold;">{{$order->ID}}</span>
                            </div>
                            <div class="wfte_order_date wfte_template_element" data-order_date-format="m-d-Y"
                                 data-hover-id="order_date">
                                <span class="wfte_order_date_label">تاريخ الطلب: </span>
                                <span class="wfte_order_date_val" style="font-weight: bold;">
                                    {{$order->post_date?\Carbon\Carbon::parse($order->post_date)->format('Y-m-d'):''}}
                                    <br>
                                    <br>
                                        <img
                                            src="data:image/png;base64,{!! DNS1D::getBarcodePNG($order->ID, 'C128') !!}"
                                            alt="barcode"/>
                                    </br>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="wfte_row wfte_padding_left_right clearfix">
                    <div class="wfte_col-2 float_left">
                    </div>
                    <div class="wfte_col-2 float_right">
                        <div class="wfte_received_seal wfte_template_element wfte_hidden" data-hover-id="received_seal"><span
                                class="wfte_received_seal_text">RECEIVED</span></div>
                    </div>
                </div>
                <div class="wfte_row wfte_padding_left_right clearfix" style="padding-top: 30px;">
                    <div class="wfte_col-2 float_left wfte_text_left">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="wfte_row wfte_padding_left_right clearfix">
                    <div class="wfte_col-1">

                        <table class="wfte_product_table wfte_side_padding_table wfte_template_element"
                               data-hover-id="product_table">
                            <thead class="wfte_product_table_head wfte_table_head_color wfte_product_table_head_bg">
                            <tr>
                                <th class="wfte_product_table_head_serial_no wfte_product_table_head_bg wfte_table_head_color"
                                    col-type="serial_no">S.NO
                                </th>
                                <th class="wfte_product_table_head_image wfte_product_table_head_bg wfte_table_head_color"
                                    col-type="image">IMAGE
                                </th>
                                <th class="wfte_product_table_head_sku wfte_product_table_head_bg wfte_table_head_color"
                                    col-type="sku">SKU
                                </th>
                                <th class="wfte_product_table_head_product wfte_product_table_head_bg wfte_table_head_color"
                                    col-type="product">PRODUCT
                                </th>
                                <th class="wfte_product_table_head_quantity wfte_product_table_head_bg wfte_table_head_color wfte_text_center"
                                    col-type="quantity">QUANTITY
                                </th>
                                <th class="wfte_product_table_head_price wfte_product_table_head_bg wfte_table_head_color"
                                    col-type="price">PRICE
                                </th>
                                <th class="wfte_product_table_head_total_price wfte_product_table_head_bg wfte_table_head_color wfte_right_column"
                                    col-type="total_price">TOTAL PRICE
                                </th>
                                <th class="wfte_product_table_head_tax wfte_product_table_head_bg wfte_table_head_color wfte_hidden"
                                    col-type="-tax">TOTAL TAX
                                </th>
                            </tr>
                            </thead>
                            <tbody class="wfte_product_table_body wfte_table_body_color">
                            @foreach($order->orderItems as $orderItem)
                                @foreach($orderItem->productOrderItems as $productOrderItem)
                                    <tr>
                                        <td class=" serial_no_td ">1</td>
                                        <td class=" image_td "><img
                                                src="{{App\Http\Helpers\ProductHelper::image($productOrderItem->product_id)->guid??''}}"
                                                style="border-radius:25%;max-width:30px; max-height:30px;"
                                                class="wfte_product_image_thumb"></td>
                                        <td class=" sku_td ">{{$productOrderItem->product->sku->meta_value??''}}</td>
                                        <td class=" product_td ">
                                            {{$orderItem->order_item_name}}
                                        </td>
                                        <td class=" quantity_td wfte_text_center">{{$productOrderItem->product_qty}}</td>
                                        <td class=" price_td ">
                                            <span>
                                                {{App\Http\Helpers\GeneralHelper::priceCurrency($productOrderItem->product_net_revenue/$productOrderItem->product_qty,$order->postMetaCurrency->meta_value)}}
                                            </span>
                                        </td>
                                        <td class=" total_price_td ">
                                            <span>
                                                {{App\Http\Helpers\GeneralHelper::priceCurrency($productOrderItem->product_net_revenue,$order->postMetaCurrency->meta_value)}}
                                            </span>
                                        </td>
                                        <td class="wfte_hidden -tax_td ">-</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>

                        <table class="wfte_payment_summary_table wfte_product_table wfte_side_padding_table">
                            <tbody class="wfte_payment_summary_table_body wfte_table_body_color">
                            <tr class="wfte_payment_summary_table_row wfte_product_table_subtotal">
                                <td colspan="2" class="wfte_product_table_subtotal_label wfte_text_right">المجموع الفرعي</td>
                                <td class="wfte_right_column wfte_text_left"><span>{{App\Http\Helpers\GeneralHelper::priceCurrency($order->orderStatus->total_sales,$order->postMetaCurrency->meta_value)}}</span></td>
                            </tr>
                            <tr class="wfte_payment_summary_table_row wfte_product_table_shipping">
                                <td colspan="2" class="wfte_product_table_shipping_label wfte_text_right">الشحن</td>

                                <td class="wfte_right_column wfte_text_left">
                                    @if ($order->postShippingPrice->meta_value>0)
                                        {{$order->postShippingPrice->meta_value}}
                                    @else
                                        شحن مجاني
                                    @endif
                                </td>
                            </tr>
                            <tr class="wfte_payment_summary_table_row wfte_product_table_cart_discount wfte_hidden">
                                <td colspan="2" class="wfte_product_table_cart_discount_label wfte_text_right">سلة الخصم</td>
                                <td class="wfte_right_column wfte_text_left"></td>
                            </tr>
                            <tr class="wfte_payment_summary_table_row wfte_product_table_order_discount wfte_hidden">
                                <td colspan="2" class="wfte_product_table_order_discount_label wfte_text_right">اطلب تخفيض</td>
                                <td class="wfte_right_column wfte_text_left"></td>
                            </tr>

                            <tr class="wfte_payment_summary_table_row wfte_product_table_fee wfte_hidden">
                                <td colspan="2" class="wfte_product_table_fee_label wfte_text_right">رسوم</td>
                                <td class="wfte_right_column wfte_text_left"></td>
                            </tr>
                            <tr class="wfte_payment_summary_table_row wfte_product_table_payment_total">
                                <td class="wfte_left_column"></td>
                                <td class="wfte_product_table_payment_total_label wfte_text_right">مجموع</td>
                                <td class="wfte_product_table_payment_total_val wfte_right_column wfte_text_left">
                                    <span>
                                        {{App\Http\Helpers\GeneralHelper::priceCurrency($order->orderStatus->total_sales,$order->postMetaCurrency->meta_value)}}
                                    </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="wfte_row wfte_padding_left_right clearfix" style="margin-top: 15px;">
                    <div class="wfte_col-2 float_left wfte_text_left">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="wfte_row wfte_padding_left_right clearfix">
                    <div class="wfte_col-1 float_left">
                        <div class="wfte_invoice_data">
                            <div class="wfte_product_table_payment_method">
                                <span class="wfte_product_table_payment_method_label"
                                      style="font-weight:normal;">طريقة الدفع: </span>
                                <span style="font-weight:normal;">الدفع عند الأستلام</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="wfte_row wfte_padding_left_right clearfix">
                    <div class="wfte_col-1">
                        <div class="wfte_barcode float_right wfte_text_right wfte_template_element wfte_hidden"
                             data-hover-id="barcode">
                            <img src="" class="wfte_hidden wfte_hidden wfte_hidden wfte_hidden wfte_hidden">
                            <img
                                src=""
                                class="wfte_img_barcode" style="">
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="wfte_padding_left_right template_footer clearfix">
                <div class="wfte_col-1">
                    <div class="wfte_footer clearfix wfte_template_element wfte_hidden" data-hover-id="footer">

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </body>
    </html>


