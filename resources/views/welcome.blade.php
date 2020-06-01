@extends('layouts.app')

@section('title', 'Corrency')

@section('content')
    <table class="table table-odd table-light" border="1" style="padding: 8px 16px;">
        <thead>
            <tr>
                <td>name</td>
                <td>symbol</td>
                <td>slug</td>
                <td>last updated</td>
                <td>date added</td>
                <td>num market pairs</td>
                <td>tags</td>
                <td>max supply</td>
                <td>circulating supply</td>
                <td>total supply</td>
                <td>platform</td>
                <td>cmc rank</td>
                <td>quote</td>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['symbol'] }}</td>
                <td>{{ $item['slug'] }}</td>
                <td>{{ $item['last_updated'] }}</td>
                <td>{{ $item['date_added'] }}</td>
                <td>{{ $item['num_market_pairs'] }}</td>
                <td>{{ $item['tags'] }}</td>
                <td>{{ $item['max_supply'] }}</td>
                <td>{{ $item['circulating_supply'] }}</td>
                <td>{{ $item['total_supply'] }}</td>
                <td>{{ $item['platform'] }}</td>
                <td>{{ $item['cmc_rank'] }}</td>
                <td>{{ $item['quote'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
