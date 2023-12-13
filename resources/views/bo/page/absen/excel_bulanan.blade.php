<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            @foreach ($dates as $date)
            <th colspan="2">{{ \Carbon\Carbon::parse($date)->isoFormat('DD MMMM YYYY') }}</th>
            @endforeach
        </tr>
        <tr>
            <th></th>
            @foreach ($dates as $date)
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->nama }}</td>
                @foreach ($dates as $date)
                    <td>
                        @php
                        $formattedDate = \Carbon\Carbon::parse($date)->format('Y-m-d');
                        $presents = optional($user->present);
                        $present = $presents->firstWhere('tanggal', $formattedDate);
                    @endphp
    
                        {{ $present->jam_masuk ? $present->jam_masuk : '-' }}
                    </td>
                    <td>
                        {{ $present->jam_keluar ? $present->jam_keluar : '-' }}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>    
</table>
