{{-- Reusable Calendar Grid Component --}}
{{-- Usage: @include('islamic-calendar.partials._month-grid', ['monthData' => $monthData, 'monthName' => 'January', 'year' => 2026]) --}}

<div class="calendar-grid-wrapper">
    <div class="calendar-grid-header">
        <h3 class="calendar-grid-title">{{ $monthName ?? $monthData['month_name'] }} {{ $year }}</h3>
    </div>
    <div class="calendar-grid">
        <div class="calendar-grid-row calendar-grid-header-row">
            <div class="cal-cell cal-header">Sun</div>
            <div class="cal-cell cal-header">Mon</div>
            <div class="cal-cell cal-header">Tue</div>
            <div class="cal-cell cal-header">Wed</div>
            <div class="cal-cell cal-header">Thu</div>
            <div class="cal-cell cal-header">Fri</div>
            <div class="cal-cell cal-header">Sat</div>
        </div>

        @php
            $days = $monthData['days'] ?? [];
            $firstDow = $monthData['first_dow'] ?? 0;
            $cellCount = 0;
        @endphp

        <div class="calendar-grid-row">
            {{-- Empty cells before first day --}}
            @for($i = 0; $i < $firstDow; $i++)
                <div class="cal-cell cal-empty"></div>
                @php $cellCount++; @endphp
            @endfor

            @foreach($days as $day)
                @if($cellCount > 0 && $cellCount % 7 === 0)
                    </div><div class="calendar-grid-row">
                @endif
                <div class="cal-cell {{ $day['is_today'] ? 'cal-today' : '' }} {{ $day['is_friday'] ? 'cal-friday' : '' }}"
                     @if(isset($yearEvents))
                        @foreach($yearEvents as $evt)
                            @if($evt->gregorian_date && $evt->gregorian_date->month == ($monthData['month_num'] ?? 0) && $evt->gregorian_date->day == $day['gregorian_day'])
                                data-event="{{ $evt->event_name }}"
                                data-event-type="{{ $evt->event_type }}"
                            @endif
                        @endforeach
                     @endif
                >
                    <span class="cal-greg">{{ $day['gregorian_day'] }}</span>
                    <span class="cal-hijri">{{ $day['hijri_day'] }}</span>
                    @if($day['hijri_day'] == 1)
                        <span class="cal-hijri-month" title="{{ $day['hijri_month_name'] }}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 94%; left: 3%; text-align: center;">{{ $day['hijri_month_name'] }}</span>
                    @endif
                    @if(isset($yearEvents))
                        @foreach($yearEvents as $evt)
                            @if($evt->gregorian_date && $evt->gregorian_date->month == ($monthData['month_num'] ?? 0) && $evt->gregorian_date->day == $day['gregorian_day'])
                                <span class="cal-event-badge cal-event-{{ $evt->event_type }}" title="{{ $evt->event_name }}">●</span>
                            @endif
                        @endforeach
                    @endif
                </div>
                @php $cellCount++; @endphp
            @endforeach

            {{-- Fill remaining cells --}}
            @while($cellCount % 7 !== 0)
                <div class="cal-cell cal-empty"></div>
                @php $cellCount++; @endphp
            @endwhile
        </div>
    </div>
</div>
