@extends('layouts.app')

@section('title', 'Convert')

@section('content')

        <div>
            <input type="text" id="amount">
        </div>
        <div>
            from:
            <select id="symbol">
                <option value="">Please Choose on...</option>
                @foreach($coins as $coin)
                    <option
                        value="{{ $coin['symbol'] }}"
                    >{{ $coin['name'] }}</option>
                @endforeach
            </select>
            convert to:
            <select id="convert">
                <option value="">Please Choose on...</option>
                @foreach($coins as $coin)
                    <option
                        value="{{ $coin['symbol'] }}"
                    >{{ $coin['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div id="result"></div>
        </div>
        <div class="form-group">
            <button class="form-control" type="button" onclick="convert()">
                submit
            </button>
        </div>

    <script>
        function convert() {
            const amount = document.getElementById('amount').value;
            const symbol = document.getElementById('symbol').value;
            const convert = document.getElementById('convert').value;
            axios.post(
                '/converts',
                {
                    amount,
                    symbol,
                    convert
                }
            ).then(({data: {data: {price}}}) => {
                document.getElementById('result').innerText = price
            })
            .catch(console.error);
        }
    </script>
@endsection
