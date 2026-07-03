<?php
$content = file_get_contents('resources/views/pages/islamic-date/hub.blade.php');
echo "Number of @php: " . substr_count($content, '@php') . "\n";
echo "Number of @endphp: " . substr_count($content, '@endphp') . "\n";
echo "Number of @for: " . substr_count($content, '@for') . "\n";
echo "Number of @endfor: " . substr_count($content, '@endfor') . "\n";
echo "Number of @foreach: " . substr_count($content, '@foreach') . "\n";
echo "Number of @endforeach: " . substr_count($content, '@endforeach') . "\n";
echo "Number of @extends: " . substr_count($content, '@extends') . "\n";
echo "Number of @section: " . substr_count($content, '@section') . "\n";
echo "Number of @endsection: " . substr_count($content, '@endsection') . "\n";
