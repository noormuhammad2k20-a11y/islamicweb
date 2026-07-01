@extends('layouts.app')

@section('title', 'Qibla Direction Finder — Noor-e-Islam')
@section('meta_description', 'GPS + compass UI for Qibla')

@section('content')
<section class="section" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="section-inner">
        <x-page-header title="Qibla Direction Finder" desc="GPS + compass UI for Qibla" icon="fa-compass" />

                <div style="text-align: center; padding: 40px; background: #fff; border-radius: 12px; box-shadow: var(--shadow-sm);">
            <div id="qibla-compass" style="width: 250px; height: 250px; border-radius: 50%; border: 4px solid var(--primary); margin: 0 auto 30px; position: relative; display: flex; align-items: center; justify-content: center; background: url('https://upload.wikimedia.org/wikipedia/commons/4/4e/Compass_rose_brown.svg') no-repeat center center; background-size: cover;">
                <div id="qibla-needle" style="width: 4px; height: 120px; background: var(--gold); position: absolute; bottom: 50%; left: calc(50% - 2px); transform-origin: bottom center; transition: transform 0.5s ease; border-radius: 4px 4px 0 0;"></div>
                <div style="width: 16px; height: 16px; background: var(--primary-dark); border-radius: 50%; position: absolute; z-index: 2;"></div>
            </div>
            <button onclick="findQibla()" class="btn-primary" style="margin-bottom: 20px;"><i class="fas fa-location-arrow"></i> Find Qibla Direction</button>
            <p id="qibla-status" style="color: var(--text-medium);">Allow location access to find your Qibla direction.</p>
        </div>
        <script>
            function findQibla() {
                const status = document.getElementById('qibla-status');
                const needle = document.getElementById('qibla-needle');
                status.innerText = "Locating...";
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition((position) => {
                        const lat = position.coords.latitude;
                        const lon = position.coords.longitude;
                        // Rough calculation for Mecca (21.4225° N, 39.8262° E)
                        const meccaLat = 21.4225 * Math.PI / 180;
                        const meccaLon = 39.8262 * Math.PI / 180;
                        const userLat = lat * Math.PI / 180;
                        const userLon = lon * Math.PI / 180;
                        const dLon = meccaLon - userLon;
                        const y = Math.sin(dLon) * Math.cos(meccaLat);
                        const x = Math.cos(userLat) * Math.sin(meccaLat) - Math.sin(userLat) * Math.cos(meccaLat) * Math.cos(dLon);
                        let brng = Math.atan2(y, x);
                        brng = brng * 180 / Math.PI;
                        brng = (brng + 360) % 360;
                        
                        needle.style.transform = `rotate(${brng}deg)`;
                        status.innerHTML = `Qibla Direction: <strong>${brng.toFixed(2)}°</strong> from True North.`;
                    }, (error) => {
                        status.innerText = "Unable to retrieve your location.";
                    });
                } else {
                    status.innerText = "Geolocation is not supported by this browser.";
                }
            }
        </script>
    </div>
</section>
@endsection