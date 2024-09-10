<div>
    @if($listOfBookings)
        <table>
            <tbody>
                @foreach($listOfBookings as $index => $entry)
                    <tr class="text-gray-600">
                        <td>
                            <span class="text-gray-400">{!! '&larr;' !!}</span>
                            <span>{{ $entry['date'] }}</span>
                        </td>
                        <td>{{ ' - ' }}</td>
                        <td>{{ $entry['time'] }}</td>
                    </tr>
                    <tr>
                        <td class="text-gray-400 {{ $loop->first && $entry['event'] === 'In' ? 'pb-6' : '' }}">
                            {{ $entry['message'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
