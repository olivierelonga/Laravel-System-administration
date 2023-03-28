<style>
    /* Housekeeping */
    body{
        font-size:12px;
    }
    .spreadSheetGroup{
        /*font:0.75em/1.5 sans-serif;
        font-size:14px;
      */
        color:#333;
        background-color:#fff;
        padding:1em;
    }



    /* Tables */
    .spreadSheetGroup table{
        width:100%;
        margin-bottom:1em;
        border-collapse: collapse;
    }
    .spreadSheetGroup .proposedWork th{
        background-color:#eee;
    }
    .tableBorder th{
        background-color:#eee;
    }
    .spreadSheetGroup th,
    .spreadSheetGroup tbody td{
        padding:0.5em;

    }
    .spreadSheetGroup tfoot td{
        padding:0.5em;

    }
    .spreadSheetGroup td:focus {
        border:1px solid #fff;
        -webkit-box-shadow:inset 0px 0px 0px 2px #5292F7;
        -moz-box-shadow:inset 0px 0px 0px 2px #5292F7;
        box-shadow:inset 0px 0px 0px 2px #5292F7;
        outline: none;
    }
    .spreadSheetGroup .spreadSheetTitle{
        font-weight: bold;
    }
    .spreadSheetGroup tr td{
        text-align:center;
    }
    /*
    .spreadSheetGroup tr td:nth-child(2){
      text-align:left;
      width:100%;
    }
    */

    /*
    .documentArea.active tr td.calculation{
      background-color:#fafafa;
      text-align:right;
      cursor: not-allowed;
    }
    */
    .spreadSheetGroup .calculation::before, .spreadSheetGroup .groupTotal::before{
        /*content: "$";*/
    }
    .spreadSheetGroup .trAdd{
        background-color: #007bff !important;
        color:#fff;
        font-weight:800;
        cursor: pointer;
    }
    .spreadSheetGroup .tdDelete{
        background-color: #eee;
        color:#888;
        font-weight:800;
        cursor: pointer;
    }
    .spreadSheetGroup .tdDelete:hover{
        background-color: #df5640;
        color:#fff;
        border-color: #ce3118;
    }
    .documentControls{
        text-align:right;
    }
    .spreadSheetTitle span{
        padding-right:10px;
    }

    .spreadSheetTitle a{
        font-weight: normal;
        padding: 0 12px;
    }
    .spreadSheetTitle a:hover, .spreadSheetTitle a:focus, .spreadSheetTitle a:active{
        text-decoration:none;
    }
    .spreadSheetGroup .groupTotal{
        text-align:right;
    }



    table.style1 tr td:first-child{
        font-weight:bold;
        white-space:nowrap;
        text-align:right;
    }
    table.style1 tr td:last-child{
        border-bottom:1px solid #000;
    }



    table.proposedWork td,
    table.proposedWork th,
    table.exclusions td,
    table.exclusions th{
        border:1px solid #000;
    }
    table.proposedWork thead th, table.exclusions thead th{
        font-weight:bold;
    }
    table.proposedWork td,
    table.proposedWork th:first-child,
    table.exclusions th, table.exclusions td{
        text-align:left;
        vertical-align:top;
    }
    table.proposedWork td.description{
        width:80%;
    }

    table.proposedWork td.amountColumn, table.proposedWork th.amountColumn,
    table.proposedWork td:last-child, table.proposedWork th:last-child{
        text-align:center;
        vertical-align:top;
        white-space:nowrap;
    }

    .amount:before, .total:before{
        content: "R";
    }
    table.proposedWork tfoot td:first-child{
        border:none;
        text-align:right;
    }
    table.proposedWork tfoot tr:last-child td{
        font-size:16px;
        font-weight:bold;
    }

    table.style1 tr td:last-child{
        width:100%;
    }
    table.style1 td:last-child{
        text-align:left;
    }
    td.tdDelete{
        width:1%;
    }

    table.coResponse td{text-align:left}
    table.shipToFrom td, table.shipToFrom th{text-align:left}

    .docEdit{border:0 !important}

    .tableBorder td, .tableBorder th{
        border:1px solid #000;
    }
    .tableBorder th, .tableBorder td{text-align:center}

    table.proposedWork td, table.proposedWork th{text-align:center}
    table.proposedWork td.description{text-align:left}
</style>

<div class="document active">
<div class="spreadSheetGroup">


    <table class="shipToFrom">
        <thead style="font-weight:bold">
        <tr>
           <img src="{{asset('img/header.png')}}" style="width:100%" />
        </tr>
        <tr>

            @foreach($display_innvoice as $display_innvoice)
            <th> P.O Number : {{ $display_innvoice->purchase_order_number }}</th>
            <th>DELIVERED TO</th>
        </tr>
        <tr>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="width:50%">
               To: <br/>
                Name:   {{ $display_innvoice->name }}<br/>
                Company :  {{ $display_innvoice->reg_name }}<br/>
                Address : {{ $display_innvoice->physical_address }}<br/>
                City :  Johannesburg<br/>
                Phone :  {{ $display_innvoice->phone }}<br/>

            </td>
            <td  style="width:50%">
                Name:   Winnie Ngonyama<br/>
                Company :  Mineworkers Provident Fund<br/>
                Address :  26 Ameshoff Street <br/>
                City :  Johannesburg<br/>
                Phone :  010100300<br/>
            </td>
        </tr>
        </tbody>
    </table>

    <hr style="visibility:hidden"/>

  
   

    <table class="proposedWork" width="100%" style="margin-top:20px">
        <thead>
        <th>QUANTITY</th>
        <th>ITEMS  </th>
        <th>DESCRIPTION</th>
        <th>UNIT PRICE</th>
        <th class="amountColumn">TOTAL</th>
        <th class="docEdit trAdd">+</th>
        </thead>
        <tbody>
           
            <?php $sum = 0; ?>
            @foreach($display_innvoice as $item)  
        <tr>
            <td contenteditable="true">{{$item->item_quantity}}</td>
            <td class="unit" contenteditable="true">{{$item->item}}</td>
            <td contenteditable="true" class="description">{{$item->item_description}}</td>
            <td class="amount" contenteditable="true">{{$item->item_amount}}</td>
            <td class="amount amountColumn rowTotal" contenteditable="true"><?php $sum+= $item->item_amount * $item->item_quantity ?>{{$item->item_amount * $item->item_quantity}}</td>
          
            <td class="docEdit tdDelete">X</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none;text-align:right">SUBTOTAL:</td>
            <td class="amount subtotal"><?php echo  $sum ?> </td>
            <td class="docEdit"></td>
        </tr>
        <tr>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none;text-align:right">VAT TAX:</td>
            <td class="amount" contenteditable="true"> <?php echo $vat = $sum * 15 /100 ?></td>
            <td class="docEdit"></td>
        </tr>

        <tr>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none"></td>
            <td style="border:none;text-align:right">TOTAL:</td>
            <td class="total amount" contenteditable="true"><?php echo $vat + $sum ?></td>
            <td class="docEdit"></td>
        </tr>
        </tfoot>
    </table>
 


    <table width="100%">
        <tbody>
        <tr>
            <td style="50%" style="vertical-align:top">
                <table style="width:100%">
                    <tbody>
                    <tr>
                        <td style="text-align:left">

                            <p> 1. Please send a delivery note, invoice and contract.</br>
                             2. Enter this purchase order in accordance with the prices, terms,delivery method, and specifications listed,</br>
                            3. Please notify us immediately if you are unable to deliver as specified,</br>
                            4. Send all the correspondence to:</br>
                            Name:	Linah Hamese</br>
                            <p>Email:	accounts@mineworkers.co.za</p>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td style="padding-left:40px; width:50%; vertical-align:top">
                <table style="width:100%">
                    <tbody>
                    <tr>

                    <tr>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>



</div>
</div>



