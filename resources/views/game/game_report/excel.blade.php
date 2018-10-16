<html>
<body>
<table width="100%" align="center">
    <caption id="cap"  >
        <table border="0" align="center">
            <tr>
                <th>LOTTO STARS</th>
            </tr>

            <tr>
                <th >GAME SALES REPORT FROM {{$dateFrom}} TO {{$dateTo}}</th>
            </tr>

        </table>

    </caption>
    @php($i = 1)
    @php($totalSales = 0.0)
    @php(($totalWon = 0.0))
    @if(count($Transactions)>0)
        <thead>
        <tr id="report">
            <th>S/N</th>
            <th>Date Played</th>
            {{--<th>Merchant Name</th>--}}
            <th>Agent Name</th>
            <th>Agent Id</th>
            <th>Serial no.</th>
            <th>Game Name</th>
            <th>Game Option</th>
            <th>Draw Type</th>
            <th>Unit Stake</th>
            <th>Sales Amount</th>
            <th>Amount Won</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Transactions as $transaction)
            @if($transaction->user->name != null)
                @php($totalSales+=$transaction->total_amount)
                @php($totalWon+=$transaction->winning_amount)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$transaction->created_at}}</td>
                    <td>{{$transaction->user->name}}</td>
                    {{--<td>{{$transaction->agent_name}}</td>--}}
                    <td>{{$transaction->ticket_id}}</td>
                    <td>{{$transaction->serial_no}}</td>
                    <td>{{$transaction->game_name->name}}</td>
                    <td>{{$transaction->game_type_option->name}}</td>
                    <td>{{$transaction->draw_type}}</td>
                    <td>N{{number_format($transaction->unit_stake, 2, '.', ',')}}</td>
                    <td>N{{number_format($transaction->total_amount, 2, '.', ',')}}</td>
                    <td>N{{number_format($transaction->winning_amount, 2, '.', ',')}}</td>
                </tr>
            @endif
            @php($i++)
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>TOTAL AMOUNT</b></td>
            <td><b>{{number_format($totalSales, 2, '.', ',')}}</b></td>
            <td><b>N{{number_format($totalWon, 2, '.', ',')}}</b></td>
        </tr>
        </tbody>
    @endif
</table>
</body>
</html>