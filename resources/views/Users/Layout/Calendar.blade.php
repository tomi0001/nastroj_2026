<script src="https://cdn.jsdelivr.net/npm/simple-calendar-js/dist/simple-calendar-js.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-calendar-js/dist/simple-calendar-js.min.css" />

<div id="calendar" class="calendar"></div>

@props(['year' => '{{ $year }}', 'month' => '{{ $month }}', 'day' => '{{ $day }}', 'userName' => 'Guest'])

<script>
    const calendar = new SimpleCalendarJs('#calendar', {
        mode: 'date-picker',
        defaultView: 'month',
        monthTimedEventStyle: 'block',
        weekStartsOn: 1, // 0 = Sunday, 1 = Monday
        locale: 'pl-PL',
        use24Hour: true,
        showTimeInItems: false,
        defaultDate: new Date({{ $year }}, {{ $month }} - 1, {{ $day }}),

        fetchEvents: async (start, end) => {
            // Fetch events from your API
            const response = await fetch(`/api/events?start=${start}&end=${end}`);
            return response.json();
        },

        onEventClick: (event) => {
            console.log('Event clicked:', event);
        },
        onSlotClick: (date) => {
            window.location.href =
                "{{ route('profile.main') }}/" + date.getFullYear() + '/' + (date.getMonth() + 1) + '/' + date.getDate();
        },
        onDateSelect: (date) => {
            window.location.href =
                "{{ route('profile.main') }}/" + date.getFullYear() + '/' + (date.getMonth() + 1) + '/' + date.getDate();
        },
    });
    data = new Date();
    // if ({{ $year }} == data.getFullYear() && {{ $month }} == data.getMonth() + 1) {
    //     calendar.setSelectedDate(new Date({{ $year }}, {{ $month }} - 1, {{ $day }}));
    // }
    calendar.setSelectedDate(new Date({{ $year }}, {{ $month }} - 1, {{ $day }}));
</script>
