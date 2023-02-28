@if (sizeOf($events) != 0)
    @foreach ($events as $event)
        <li class="bg-white border shadow-md p-3 rounded-lg mb-3">
            <div class="hover:cursor-pointer" onclick="showHide('event-detail-{{ $loop->iteration }}')">
                <div class="text-lg font-medium truncate">{{ $event->name }}</div>
                <div class="text-gray-600">{{ date('l, j F Y | H:i', strtotime($event->time)) }}</div>
                <div class="bg-gray-600 my-2 py-1 rounded-md text-center text-white">
                    {{ strtotime($event->time) > time() ? ReadableTimeLength(strtotime($event->time) - time(), ' - ', true) : 'Sudah Dimulai' }}
                </div>
            </div>

            <div class="border-t-2 mt-1 hidden pt-2" id="event-detail-{{ $loop->iteration }}">
                <div class="text-center font-medium mb-1">{{ $event->name }}</div>
                <div class="text-black mb-1">Lokasi : {{ $event->location }}</div>
                <div class="text-black">{{ $event->body }}</div>
            </div>
        </li>
    @endforeach
@else
    <li class="bg-white p-4 text-center font-medium rounded-xl shadow-md">Tidak ada</li>
@endif
