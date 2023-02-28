@extends('layouts.app')
@section('content')
    <?php use Illuminate\Support\Carbon; ?>
    <div class="d-flex p-2 bd-highlight mb-3">
        <a href="{{ route('booking.create') }}" class="btn btn-dark">Add Book</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Client Name</th>
            <th>Room number</th>
            <th>Price</th>
            <th>Duration</th>
            <th>Booking At</th>
            <th>Occupied From</th>
            <th>Occupied To</th>
            <th>Features</th>
        </tr>
        </thead>
        <tbody>
        @php($n=1)
        @foreach ($bookings as $booking)
        <tr>
            <td>{{ $n++ }}</td>
            <td>{{ $booking->id }}</td>
            <td>{{ $booking->Client->name }}</td>
            <td>{{ $booking->Room->name }}</td>
            <td>{{ $booking->price }}</td>
            <td>
                {{date_diff(date_create($booking->from), date_create($booking->to))->format('%a')}}
            </td>
            <td>{{ $booking->created_at->format('d/m/Y') }}</td>
            <td>{{ Carbon::parse($booking->from)->format('d/m/Y') }}</td>
            <td>{{ Carbon::parse($booking->to)->format('d/m/Y') }}</td>
            <td>
                @foreach($booking->Feature as $feature)
                    <span class="btn btn-success ml-1 my-1 py-0 px-1" >{{ $feature->name }}</span>
                @endforeach
            </td>
        </tr>

        @endforeach
        </tbody>
    </table>
    @endsection
