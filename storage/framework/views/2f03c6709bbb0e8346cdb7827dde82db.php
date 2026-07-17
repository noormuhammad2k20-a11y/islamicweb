<?php $__env->startSection('seo'); ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($seo)): ?>
<title><?php echo e($seo['title']); ?></title>
<meta name="description" content="<?php echo e($seo['description']); ?>">
<link rel="canonical" href="<?php echo e($seo['canonical']); ?>">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Qibla Direction Finder",
  "description": "<?php echo e($seo['description']); ?>",
  "url": "<?php echo e($seo['canonical']); ?>",
  "applicationCategory": "Utility",
  "operatingSystem": "All"
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo e(url('/')); ?>" },
    { "@type": "ListItem", "position": 2, "name": "Tools", "item": "<?php echo e(url('/tools')); ?>" },
    { "@type": "ListItem", "position": 3, "name": "Qibla Direction", "item": "<?php echo e(url('/tools/qibla-direction')); ?>" }
    <?php if(isset($countryName)): ?>, { "@type": "ListItem", "position": 4, "name": "<?php echo e($countryName); ?>", "item": "<?php echo e(url('/tools/qibla-direction/'.Str::slug($countryName))); ?>" } <?php endif; ?>
    <?php if(isset($stateName)): ?>, { "@type": "ListItem", "position": 5, "name": "<?php echo e($stateName); ?>", "item": "<?php echo e(url('/tools/qibla-direction/'.Str::slug($countryName).'/'.Str::slug($stateName))); ?>" } <?php endif; ?>
    <?php if(isset($cityName)): ?>, { "@type": "ListItem", "position": 6, "name": "<?php echo e($cityName); ?>", "item": "<?php echo e($seo['canonical']); ?>" } <?php endif; ?>
  ]
}
</script>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($faqs) && count($faqs) > 0): ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    {
      "@type": "Question",
      "name": "<?php echo e($faq['q']); ?>",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "<?php echo e($faq['a']); ?>"
      }
    }<?php echo e($i < count($faqs) - 1 ? ',' : ''); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  ]
}
</script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php else: ?>
<title>Qibla Direction Finder Online - Exact Kaaba Compass | Noor-e-Islam</title>
<meta name="description" content="Find the exact Qibla direction online from anywhere in the world using our live GPS compass and interactive map. Get accurate Kaaba bearing, prayer times, and distance.">
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Required CDNs for Maps and Calculations -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        --bg-main: #F7F8FA;
        --bg-alt: #FFFFFF;
        --navy: #0A1F3F;
        --navy-mid: #0F2D52;
        --navy-light: #14466E;
        --navy-tint: #E4EBF3;
        --gold: #C9A84C;
        --gold-light: #E4D08C;
        --gold-dark: #8A6E2F;
        --gold-tint: #FBF8EE;
        --gold-gradient: linear-gradient(135deg, #C9A84C 0%, #E4D08C 50%, #C9A84C 100%);
        --text-dark: #0C1425;
        --text-medium: #4A5568;
        --text-light: #8E9AB0;
        --text-faint: #B8C2D4;
        --white: #ffffff;
        --border: #DFE5ED;
        --border-light: #EDF0F5;
        --shadow-xs: 0 1px 3px rgba(10, 31, 63, 0.04);
        --shadow-sm: 0 4px 12px rgba(10, 31, 63, 0.05);
        --shadow-md: 0 8px 30px rgba(10, 31, 63, 0.07);
        --shadow-lg: 0 16px 48px rgba(10, 31, 63, 0.10);
        --shadow-xl: 0 24px 64px rgba(10, 31, 63, 0.14);
        --shadow-gold: 0 8px 32px rgba(201, 168, 76, 0.15);
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    .qibla-section { background: var(--bg-main); padding: 60px 0; position: relative; overflow: hidden; }
    .qibla-section::before { content: ""; position: absolute; top: 10%; right: -5%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(10, 31, 63, 0.04), transparent 60%); border-radius: 50%; pointer-events: none; z-index: 0; }
    .qibla-section .section-inner { max-width: 1140px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 1; }

    /* Page Header */
    .page-header { text-align: center; margin-bottom: 50px; }
    .page-header h1 { font-family: 'Cormorant Garamond', serif; font-size: 3rem; color: var(--navy); margin-bottom: 12px; font-weight: 700; line-height: 1.1; }
    .page-header h1 span { color: var(--gold-dark); font-style: italic; }
    .page-header p { font-size: 1.05rem; color: var(--text-medium); max-width: 600px; margin: 0 auto; line-height: 1.85; }
    .gold-divider { width: 60px; height: 3px; background: var(--gold-gradient); border-radius: 2px; margin: 0 auto 25px; box-shadow: 0 0 12px rgba(201, 168, 76, 0.25); }

    /* Breadcrumbs */
    .custom-breadcrumb { margin-bottom: 30px; display: flex; justify-content: center; }
    .custom-breadcrumb ol { list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; align-items: center; gap: 10px; font-family: 'Outfit', sans-serif; font-size: .9rem; font-weight: 500; }
    .custom-breadcrumb li { display: flex; align-items: center; color: var(--text-medium); }
    .custom-breadcrumb a { color: var(--navy-light); text-decoration: none; transition: var(--tr-fast); }
    .custom-breadcrumb a:hover { color: var(--gold-dark); text-decoration: underline; }
    .custom-breadcrumb i { font-size: .7rem; color: var(--text-faint); margin: 0 4px; }
    .custom-breadcrumb [aria-current="page"] { color: var(--gold-dark); font-weight: 600; }

    .dashboard-panel { display: grid; grid-template-columns: 1fr 350px; gap: 30px; margin-top: 30px; }
    
    .tool-card { 
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        box-shadow: var(--shadow-sm); padding: 30px; position: relative; overflow: hidden; transition: var(--tr);
    }
    .tool-card::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr); }
    .tool-card:hover { box-shadow: var(--shadow-md); border-color: var(--navy-tint); }
    .tool-card:hover::before { transform: scaleX(1); }

    .card-title { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 700; color: var(--navy); margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--border-light); display: flex; align-items: center; gap: 10px; }
    .card-title i { color: var(--gold); }

    .stat-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin-top: 20px; }
    .stat-box { 
        background: var(--bg-main); padding: 18px; border-radius: var(--radius-sm); 
        text-align: center; border: 1px solid var(--border-light); transition: var(--tr-fast);
    }
    .stat-box:hover { background: var(--gold-tint); border-color: var(--gold); }
    .stat-label { font-family: 'Outfit', sans-serif; font-size: .75rem; color: var(--text-light); text-transform: uppercase; font-weight: 700; letter-spacing: 1px; margin-bottom: 8px; }
    .stat-val { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 700; color: var(--navy); line-height: 1; }

    .search-bar { display: flex; gap: 12px; margin-bottom: 25px; }
    .search-input { 
        flex: 1; padding: 14px 20px; border: 1px solid var(--border); border-radius: var(--radius-full);
        background: var(--bg-main); color: var(--text-dark); font-family: 'Outfit', sans-serif; font-size: .95rem; outline: none; transition: var(--tr);
    }
    .search-input:focus { border-color: var(--gold); background: var(--white); box-shadow: 0 0 0 4px rgba(201, 168, 76, 0.1); }

    .btn-primary { 
        background: linear-gradient(145deg, var(--navy), var(--navy-mid)); color: var(--white); border: 1px solid transparent;
        padding: 12px 24px; border-radius: var(--radius-full); font-family: 'Outfit', sans-serif; font-weight: 600; font-size: .85rem;
        cursor: pointer; transition: var(--tr); display: inline-flex; align-items: center; gap: 8px; box-shadow: var(--shadow-sm); text-decoration: none;
    }
    .btn-primary:hover { box-shadow: var(--shadow-md); filter: brightness(1.1); }
    
    .btn-secondary { 
        background: var(--white); color: var(--navy); border: 1px solid var(--border);
        padding: 12px 24px; border-radius: var(--radius-full); font-family: 'Outfit', sans-serif; font-weight: 600; font-size: .85rem;
        cursor: pointer; transition: var(--tr); display: inline-flex; align-items: center; gap: 8px; box-shadow: var(--shadow-xs); text-decoration: none;
    }
    .btn-secondary:hover { border-color: var(--navy); background: var(--navy-tint); }

    .view-toggle { display: flex; gap: 10px; margin-bottom: 25px; justify-content: center; }
    #qibla-map { height: 400px; width: 100%; border-radius: var(--radius-md); display: none; border: 1px solid var(--border-light); }
    
    .content-section { 
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md); padding: 50px; margin-top: 40px; position: relative; overflow: hidden; 
    }
    .content-section::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--gold-gradient); }
    .content-title { 
        font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: var(--navy); margin-bottom: 20px; margin-top: 40px;
        font-weight: 700; line-height: 1.2; position: relative; padding-bottom: 10px; border-bottom: 1px solid var(--border-light);
    }
    .content-title:first-child { margin-top: 0; }
    .content-section p { color: var(--text-medium); line-height: 1.8; font-size: 1rem; margin-bottom: 15px; }
    .content-section strong { color: var(--text-dark); font-weight: 600; }
    .content-section ul { list-style: none; padding: 0; margin: 0 0 20px 0; }
    .content-section ul li { position: relative; padding-left: 25px; margin-bottom: 12px; color: var(--text-medium); font-size: 1rem; line-height: 1.7; }
    .content-section ul li::before { content: "\f00c"; font-family: "Font Awesome 6 Free"; font-weight: 900; color: var(--gold); position: absolute; left: 0; top: 2px; font-size: .9rem; }

    .faq-item { border-bottom: 1px solid var(--border-light); padding: 20px 0; }
    .faq-item:last-child { border-bottom: none; }
    .faq-q { font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; font-weight: 600; color: var(--navy); cursor: pointer; display: flex; justify-content: space-between; align-items: center; transition: var(--tr-fast); }
    .faq-q:hover { color: var(--gold-dark); }
    .faq-q i { color: var(--gold); transition: transform 0.3s; font-size: 1rem; }
    .faq-a { padding-top: 15px; color: var(--text-medium); display: none; line-height: 1.8; font-size: .95rem; }
    
    .api-card { 
        border-left: 4px solid var(--gold); padding: 20px; background: var(--gold-tint); 
        margin-bottom: 15px; border-radius: 0 var(--radius-sm) var(--radius-sm) 0; color: var(--text-medium); 
    }
    .api-card strong { color: var(--navy); font-family: 'Cormorant Garamond', serif; font-size: 1.1rem; }
    
    .mosque-list { list-style: none; padding: 0; margin: 0; }
    .mosque-list li { padding: 15px 0; border-bottom: 1px solid var(--border-light); display: flex; justify-content: space-between; align-items: center; }
    .mosque-list li:last-child { border-bottom: none; }
    .mosque-list li strong { color: var(--navy); font-family: 'Cormorant Garamond', serif; font-size: 1.1rem; }
    .mosque-list li span { color: var(--text-light); font-size: .85rem; }
    
    .timeline { border-left: 3px solid var(--gold); padding-left: 25px; margin: 25px 0; }
    .timeline-item { margin-bottom: 25px; position: relative; color: var(--text-medium); }
    .timeline-item strong { color: var(--navy); font-family: 'Cormorant Garamond', serif; font-size: 1.1rem; display: block; margin-bottom: 5px; }
    .timeline-item::before { content: ''; position: absolute; left: -32px; top: 5px; width: 12px; height: 12px; border-radius: 50%; background: var(--navy); border: 2px solid var(--white); box-shadow: 0 0 0 2px var(--gold); }

    .grid-3 { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; margin-top: 20px; }
    .country-card { 
        padding: 18px; border: 1px solid var(--border-light); border-radius: var(--radius-sm); 
        text-align: center; text-decoration: none; color: var(--navy); background: var(--white); 
        font-family: 'Cormorant Garamond', serif; font-size: 1.1rem; font-weight: 600; transition: var(--tr); 
    }
    .country-card:hover { box-shadow: var(--shadow-sm); border-color: var(--gold); color: var(--gold-dark); }

    @media (max-width: 900px) {
        .dashboard-panel { grid-template-columns: 1fr; }
        .content-section { padding: 30px; }
        .page-header h1 { font-size: 2.2rem; }
    }
</style>

<section class="qibla-section">
    <div class="section-inner">
        <nav aria-label="breadcrumb" class="custom-breadcrumb">
            <ol>
                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li><a href="<?php echo e(url('/tools')); ?>">Tools</a></li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li><a href="<?php echo e(url('/tools/qibla-direction')); ?>">Qibla Direction</a></li>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($countryName)): ?>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li><a href="<?php echo e(url('/tools/qibla-direction/'.Str::slug($countryName))); ?>"><?php echo e($countryName); ?></a></li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($stateName)): ?>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li><a href="<?php echo e(url('/tools/qibla-direction/'.Str::slug($countryName).'/'.Str::slug($stateName))); ?>"><?php echo e($stateName); ?></a></li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($cityName)): ?>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li aria-current="page"><?php echo e($cityName); ?></li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ol>
        </nav>

        <div class="page-header">
            <h1>Qibla Direction <span>Finder</span></h1>
            <div class="gold-divider"></div>
            <p>Find the exact direction of the Kaaba from <?php echo e($locationName ?? 'your location'); ?> with high-precision GPS and interactive maps.</p>
        </div>

        <div class="dashboard-panel">
            
            <div class="tool-card">
                
                <div class="search-bar">
                    <input type="text" id="loc-input" class="search-input" placeholder="Search by city or country..." value="<?php echo e($locationName ?? ''); ?>">
                    <button onclick="searchLocation()" class="btn-primary"><i class="fas fa-search"></i> Search</button>
                    <button onclick="findQiblaGPS()" class="btn-secondary" title="Use GPS"><i class="fas fa-crosshairs"></i> Detect</button>
                </div>

                <div class="view-toggle">
                    <button onclick="toggleView('compass')" class="btn-primary" id="btn-compass">Compass View</button>
                    <button onclick="toggleView('map')" class="btn-secondary" id="btn-map">Map View</button>
                </div>

                
                <div id="view-compass" style="text-align: center; padding: 20px 0;">
                    <div id="qibla-compass" style="width: 280px; height: 280px; border-radius: 50%; border: 4px solid var(--navy); margin: 0 auto 30px; position: relative; display: flex; align-items: center; justify-content: center; background: url('https://upload.wikimedia.org/wikipedia/commons/4/4e/Compass_rose_brown.svg') no-repeat center center; background-size: cover; box-shadow: var(--shadow-lg);">
                        <div id="north-needle" style="width: 4px; height: 130px; background: red; position: absolute; bottom: 50%; left: calc(50% - 2px); transform-origin: bottom center; transition: transform 0.1s ease-out; border-radius: 4px 4px 0 0; opacity: 0.5;"></div>
                        <div id="qibla-needle" style="width: 6px; height: 140px; background: var(--gold); position: absolute; bottom: 50%; left: calc(50% - 3px); transform-origin: bottom center; transition: transform 0.1s ease-out; border-radius: 4px 4px 0 0; z-index: 5;">
                            <div style="position: absolute; top: -20px; left: -10px; width: 26px; height: 26px; background: var(--gold); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px;"><i class="fas fa-kaaba"></i></div>
                        </div>
                        <div style="width: 20px; height: 20px; background: var(--navy-mid); border-radius: 50%; position: absolute; z-index: 10; border: 3px solid white;"></div>
                    </div>
                    <p id="qibla-status" style="color: var(--text-medium); font-weight: 500;">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($bearing)): ?>
                            Qibla Direction: <strong><?php echo e(round($bearing, 2)); ?>°</strong> from North.<br>
                            <span style="font-size: 0.85rem; color: red;">(Please calibrate your compass by moving your phone in a figure-8 motion)</span>
                        <?php else: ?>
                            Allow location access or search to find your Qibla direction.
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </p>
                </div>

                
                <div id="view-map" style="display: none;">
                    <div id="qibla-map"></div>
                    <p style="text-align: center; margin-top: 15px; font-size: 0.85rem; color: var(--text-light);">The red line shows the shortest path (Great Circle) to the Kaaba.</p>
                </div>

            </div>

            
            <div style="display: flex; flex-direction: column; gap: 20px;">
                <div class="tool-card">
                    <h3 class="card-title"><i class="fas fa-info-circle"></i> Calculation Result</h3>
                    <div class="stat-grid">
                        <div class="stat-box">
                            <div class="stat-label">Qibla Bearing</div>
                            <div class="stat-val" id="res-bearing"><?php echo e(isset($bearing) ? round($bearing, 2) . '°' : '--'); ?></div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-label">Distance</div>
                            <div class="stat-val" id="res-dist"><?php echo e(isset($distance) ? number_format($distance) . ' km' : '--'); ?></div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-label">Latitude</div>
                            <div class="stat-val" id="res-lat"><?php echo e(isset($lat) ? round($lat, 4) : '--'); ?></div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-label">Longitude</div>
                            <div class="stat-val" id="res-lon"><?php echo e(isset($lon) ? round($lon, 4) : '--'); ?></div>
                        </div>
                    </div>
                    <div style="margin-top: 20px; display: flex; gap: 10px;">
                        <button onclick="copyResults()" class="btn-secondary" style="flex: 1; justify-content: center;"><i class="fas fa-copy"></i> Copy</button>
                        <a href="https://wa.me/?text=Check out the Qibla direction from my location!" target="_blank" class="btn-primary" style="flex: 1; justify-content: center; background: #25D366; border-color: #25D366;"><i class="fab fa-whatsapp"></i> Share</a>
                    </div>
                </div>

                
                <div class="tool-card">
                    <h4 class="card-title" style="font-size: 1.2rem;"><i class="fas fa-shield-alt"></i> Accuracy Status</h4>
                    <div style="font-size: 0.9rem; color: var(--text-medium); line-height: 1.8;">
                        <p><strong style="color: var(--navy);">GPS Accuracy:</strong> <span id="acc-gps">High (Via Server/Coords)</span></p>
                        <p><strong style="color: var(--navy);">Browser Support:</strong> <span id="acc-browser">Detecting...</span></p>
                        <p><strong style="color: var(--navy);">Compass Status:</strong> <span id="acc-compass">Waiting for sensor...</span></p>
                        <p><strong style="color: var(--navy);">Location Method:</strong> <?php echo e(isset($cityName) ? 'Geocoding API' : 'IP Fallback'); ?></p>
                        <p><strong style="color: var(--navy);">True North:</strong> 0°</p>
                        <p><strong style="color: var(--navy);">Calculation Precision:</strong> Exact (Great Circle)</p>
                    </div>
                </div>
            </div>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($prayerData)): ?>
        <div class="dashboard-panel" style="margin-top: 20px;">
            <div class="tool-card" style="grid-column: 1 / -1;">
                <h4 class="card-title"><i class="fas fa-clock"></i> Prayer Times in <?php echo e($locationName ?? 'your area'); ?></h4>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($prayerData)): ?>
                    <div style="background: var(--gold-tint); padding: 15px; border-radius: var(--radius-sm); margin-bottom: 20px; text-align: center; border: 1px solid rgba(201, 168, 76, 0.15);">
                        <strong style="color: var(--navy);">Hijri Date:</strong> <?php echo e($prayerData['date']['hijri']['day']); ?> <?php echo e($prayerData['date']['hijri']['month']['en']); ?> <?php echo e($prayerData['date']['hijri']['year']); ?><br>
                        <strong style="color: var(--navy);">Gregorian:</strong> <?php echo e($prayerData['date']['readable']); ?>

                    </div>
                    <ul class="mosque-list" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; border: none;">
                        <li style="border: 1px solid var(--border-light); padding: 15px; border-radius: var(--radius-sm); display: flex; flex-direction: column; align-items: center; justify-content: center; background: var(--bg-main);">
                            <span style="margin-bottom: 5px;">Fajr</span> <strong><?php echo e($prayerData['timings']['Fajr']); ?></strong>
                        </li>
                        <li style="border: 1px solid var(--border-light); padding: 15px; border-radius: var(--radius-sm); display: flex; flex-direction: column; align-items: center; justify-content: center; background: var(--bg-main);">
                            <span style="margin-bottom: 5px;">Sunrise</span> <strong><?php echo e($prayerData['timings']['Sunrise']); ?></strong>
                        </li>
                        <li style="border: 1px solid var(--border-light); padding: 15px; border-radius: var(--radius-sm); display: flex; flex-direction: column; align-items: center; justify-content: center; background: var(--bg-main);">
                            <span style="margin-bottom: 5px;">Dhuhr</span> <strong><?php echo e($prayerData['timings']['Dhuhr']); ?></strong>
                        </li>
                        <li style="border: 1px solid var(--border-light); padding: 15px; border-radius: var(--radius-sm); display: flex; flex-direction: column; align-items: center; justify-content: center; background: var(--bg-main);">
                            <span style="margin-bottom: 5px;">Asr</span> <strong><?php echo e($prayerData['timings']['Asr']); ?></strong>
                        </li>
                        <li style="border: 1px solid var(--border-light); padding: 15px; border-radius: var(--radius-sm); display: flex; flex-direction: column; align-items: center; justify-content: center; background: var(--bg-main);">
                            <span style="margin-bottom: 5px;">Maghrib</span> <strong><?php echo e($prayerData['timings']['Maghrib']); ?></strong>
                        </li>
                        <li style="border: 1px solid var(--border-light); padding: 15px; border-radius: var(--radius-sm); display: flex; flex-direction: column; align-items: center; justify-content: center; background: var(--bg-main);">
                            <span style="margin-bottom: 5px;">Isha</span> <strong><?php echo e($prayerData['timings']['Isha']); ?></strong>
                        </li>
                    </ul>
                <?php else: ?>
                    <p style="color: var(--text-medium);">Prayer times could not be loaded for this location.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="dashboard-panel" style="margin-top: 20px;">
            <div class="tool-card">
                <h4 class="card-title"><i class="fas fa-map-marker-alt"></i> Location Details</h4>
                <div style="font-size: 0.95rem; line-height: 2; color: var(--text-medium);">
                    <strong style="color: var(--navy);">Country:</strong> <span id="det-country"><?php echo e($countryName ?? 'Unknown'); ?></span><br>
                    <strong style="color: var(--navy);">Province/State:</strong> <span id="det-state"><?php echo e($stateName ?? 'N/A'); ?></span><br>
                    <strong style="color: var(--navy);">City:</strong> <span id="det-city"><?php echo e($cityName ?? 'N/A'); ?></span><br>
                    <strong style="color: var(--navy);">Timezone:</strong> <?php echo e(isset($prayerData['meta']['timezone']) ? $prayerData['meta']['timezone'] : 'Auto'); ?><br>
                    <strong style="color: var(--navy);">Latitude:</strong> <?php echo e(isset($lat) ? round($lat, 4) : '--'); ?><br>
                    <strong style="color: var(--navy);">Longitude:</strong> <?php echo e(isset($lon) ? round($lon, 4) : '--'); ?><br>
                    <strong style="color: var(--navy);">Source:</strong> Nominatim Geocoding API / IP Fallback
                </div>
            </div>
            <div class="tool-card">
                <h4 class="card-title"><i class="fas fa-kaaba"></i> Kaaba Information</h4>
                <div style="font-size: 0.95rem; line-height: 2; color: var(--text-medium);">
                    <strong style="color: var(--navy);">Coordinates:</strong> 21.4225° N, 39.8262° E<br>
                    <strong style="color: var(--navy);">Location:</strong> Masjid al-Haram, Makkah, Saudi Arabia<br>
                    <strong style="color: var(--navy);">Elevation:</strong> ~277 meters<br>
                    <strong style="color: var(--navy);">Dimensions:</strong> Approx 13.1m (Height) × 11.0m × 12.8m<br>
                    <strong style="color: var(--navy);">Significance:</strong> The House of Allah, built by Prophet Ibrahim (AS) and Ismail (AS). The focal point of Islamic prayer.
                </div>
            </div>
        </div>

        
        <div class="content-section">
            
            <h2 class="content-title">Accurate Qibla Direction in <?php echo e($locationName ?? 'Your Location'); ?></h2>
            <p style="font-size: 1.1rem;">Are you looking for the exact <strong>Qibla direction in <?php echo e($locationName ?? 'your area'); ?></strong>? Whether you are at home, traveling, or at work, finding the correct <strong>direction of the Kaaba (Mecca)</strong> is essential for offering your daily Islamic prayers (<em>Salah</em> or <em>Namaz</em>). Our online <strong>Qibla compass</strong> provides the most precise <strong>Kiblah bearing</strong> using advanced GPS technology, interactive maps, and the Great Circle navigation formula. Simply use our live tracker to align yourself towards Masjid al-Haram in Saudi Arabia, ensuring your prayers are offered with complete confidence and accuracy.</p>

            <h2 class="content-title">What is the Qibla (Kiblah)?</h2>
            <p>The <strong>Qibla</strong> (Arabic: قِبْلَة) is the direction that Muslims face when performing their daily prayers (Salah). It points directly towards the <strong>Kaaba</strong>, a sacred building located in the center of the Masjid al-Haram in Makkah, Saudi Arabia.</p>
            <p>Facing the Qibla is a fundamental requirement for the validity of prayers. It symbolizes unity among Muslims worldwide, as millions of believers bow towards the exact same focal point regardless of their geographic location.</p>
            
            <h2 class="content-title">Why Muslims Face the Kaaba</h2>
            <ul>
                <li><strong>Obedience to Allah:</strong> Facing the Kaaba is a direct command from Allah in the Quran.</li>
                <li><strong>Unity of the Ummah:</strong> It creates a unified physical direction for the global Muslim community.</li>
                <li><strong>Salah & Janazah:</strong> It is obligatory for the five daily prayers, and Muslims are buried facing the Qibla.</li>
                <li><strong>Mosque Construction:</strong> Every mosque in the world is architecturally oriented towards this point.</li>
            </ul>

            <h2 class="content-title">Quranic Evidence</h2>
            <div style="background: var(--gold-tint); border-left: 4px solid var(--gold); padding: 25px; border-radius: 0 var(--radius-sm) var(--radius-sm) 0; margin-bottom: 25px; text-align: center;">
                <p style="font-family: 'Scheherazade New', serif; font-size: 2rem; text-align: center; color: var(--navy); line-height: 2; margin-bottom: 15px; direction: rtl;">قَدْ نَرَىٰ تَقَلُّبَ وَجْهِكَ فِي السَّمَاءِ ۖ فَلَنُوَلِّيَنَّكَ قِبْلَةً تَرْضَاهَا ۚ فَوَلِّ وَجْهَكَ شَطْرَ الْمَسْجِدِ الْحَرَامِ</p>
                <p style="text-align: center; color: var(--text-medium); font-size: .95rem; margin: 0;">"We have certainly seen the turning of your face, [O Muhammad], toward the heaven, and We will surely turn you to a qiblah with which you will be pleased. So turn your face toward al-Masjid al-Haram..." <br><strong style="color: var(--gold-dark);">— Surah Al-Baqarah (2:144)</strong></p>
            </div>

            <h2 class="content-title">Authentic Hadith Section</h2>
            <div class="api-card">
                <strong>Sahih al-Bukhari (399):</strong> Narrated Al-Bara: "We prayed along with the Prophet (ﷺ) facing Jerusalem for sixteen or seventeen months. Then Allah ordered him to turn his face towards the Qibla (in Mecca)."
            </div>
            <div class="api-card">
                <strong>Sahih Muslim (527):</strong> It is narrated on the authority of Ibn Umar that as the people were praying at Quba', a man came to them and said: "It has been revealed to the Messenger of Allah (ﷺ) during the night that he should face the Kaaba." So they turned their faces towards the Kaaba while they were bowing.
            </div>

            <h2 class="content-title">History of the Qibla Direction</h2>
            <div class="timeline">
                <div class="timeline-item">
                    <strong>Before Hijrah:</strong> The Prophet Muhammad (ﷺ) prayed towards Jerusalem (Bayt al-Maqdis) while still in Makkah, keeping the Kaaba between him and Jerusalem when possible.
                </div>
                <div class="timeline-item">
                    <strong>Madinah Period:</strong> After migrating to Madinah, the early Muslims continued to pray towards Jerusalem for 16 to 17 months.
                </div>
                <div class="timeline-item">
                    <strong>Change of Qibla (2 AH):</strong> The divine revelation came down in Masjid al-Qiblatayn ordering the shift towards the Sacred Mosque (Masjid al-Haram) in Makkah, permanently establishing it as the definitive <strong>Namaz direction</strong> for all Muslims until the end of times.
                </div>
            </div>

            <h2 class="content-title">Islamic Rulings (Fiqh of Qibla for Travelers)</h2>
            <ul>
                <li><strong>Unable to Determine Direction:</strong> If you are lost, have no tools, or lack internet, you must use your best judgment (Ijtihad). If you later discover you were wrong, your prayer is still valid.</li>
                <li><strong>Travelers & Airplanes:</strong> If praying obligatory (Fard) prayers on a plane or train, you must attempt to face the Qibla. If it turns, you turn with it if possible. For voluntary (Nafl) prayers while traveling, one may pray in the direction the vehicle is moving.</li>
                <li><strong>Hospitals:</strong> If a patient is unable to turn in their bed due to severe illness, they pray as they are.</li>
            </ul>

            <h2 class="content-title">Methodology & Calculation</h2>
            <p>Historically, Muslims used astrolabes, the position of the sun, and the stars to determine the direction of Makkah. Today, we use the <strong>Great Circle (Haversine) Formula</strong>.</p>
            <p>Because the Earth is a sphere, the shortest distance between two points is not a straight flat line, but an arc called a Great Circle. The Qibla bearing is calculated by finding the initial bearing along the shortest route from your GPS coordinates to the Kaaba's WGS84 coordinates.</p>
            
            <div style="background: var(--bg-main); padding: 20px; border-radius: var(--radius-sm); font-family: monospace; font-size: 0.9rem; overflow-x: auto; margin-top: 15px; border: 1px solid var(--border-light); color: var(--text-medium);">
                Formula: tan(θ) = sin(Δλ) / (cos(φ1) × tan(φ2) − sin(φ1) × cos(Δλ))<br>
                Where φ is Latitude, λ is Longitude.
            </div>
            
            <h2 class="content-title">Compass Information & Troubleshooting Guide</h2>
            <p><strong>Calibration:</strong> Digital compasses rely on your device's magnetometer. If the compass needle is erratic or spinning, calibrate it by waving your phone in a horizontal figure-8 motion.</p>
            <p><strong>Magnetic Interference:</strong> Metal cases, laptops, and concrete rebar indoors will severely disrupt the sensor. For perfect accuracy, step outdoors.</p>
            <p><strong>Browser Compatibility:</strong> The Live Compass requires a mobile device with a gyroscope and magnetometer, running Chrome, Safari, or Firefox with granted sensor permissions. Desktop browsers will not display the live compass accurately; please use the Map View.</p>

            <h2 class="content-title">Frequently Asked Questions (FAQs)</h2>
            <div class="faq-container">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($faqs) && count($faqs) > 0): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="faq-item">
                        <div class="faq-q" onclick="toggleFaq(this)"><?php echo e($faq['q']); ?> <i class="fas fa-chevron-down"></i></div>
                        <div class="faq-a"><?php echo e($faq['a']); ?></div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <div class="faq-item">
                    <div class="faq-q" onclick="toggleFaq(this)">Why does the map show a curved line instead of a straight one? <i class="fas fa-chevron-down"></i></div>
                    <div class="faq-a">Maps are 2D projections of a 3D Earth. The shortest path between two points on a sphere looks curved when drawn on a flat map. This is known as a Great Circle path, and it provides the absolute most direct bearing to face Makkah.</div>
                </div>
            </div>
            
            <h2 class="content-title">Programmatic SEO: Qibla Around the World</h2>
            <div class="grid-3">
                <a href="<?php echo e(url('/tools/qibla-direction/pakistan')); ?>" class="country-card">Pakistan</a>
                <a href="<?php echo e(url('/tools/qibla-direction/india')); ?>" class="country-card">India</a>
                <a href="<?php echo e(url('/tools/qibla-direction/saudi-arabia')); ?>" class="country-card">Saudi Arabia</a>
                <a href="<?php echo e(url('/tools/qibla-direction/united-arab-emirates')); ?>" class="country-card">UAE</a>
                <a href="<?php echo e(url('/tools/qibla-direction/united-kingdom')); ?>" class="country-card">United Kingdom</a>
                <a href="<?php echo e(url('/tools/qibla-direction/united-states')); ?>" class="country-card">United States</a>
            </div>

            <h2 class="content-title">Related Resources</h2>
            <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-top: 20px;">
                <a href="<?php echo e(url('/prayer-times')); ?>" class="btn-secondary"><i class="fas fa-clock"></i> Prayer Times</a>
                <a href="<?php echo e(url('/tools/ramadan-calendar-generator')); ?>" class="btn-secondary"><i class="fas fa-calendar-alt"></i> Ramadan Calendar</a>
                <a href="<?php echo e(url('/tools/islamic-event-finder')); ?>" class="btn-secondary"><i class="fas fa-star-and-crescent"></i> Islamic Events</a>
                <a href="<?php echo e(url('/islamic-calendar')); ?>" class="btn-secondary"><i class="fas fa-calendar-day"></i> Islamic Calendar</a>
                <a href="<?php echo e(url('/zakat-calculator')); ?>" class="btn-secondary"><i class="fas fa-calculator"></i> Zakat Calculator</a>
                <a href="<?php echo e(url('/hijri-converter')); ?>" class="btn-secondary"><i class="fas fa-sync-alt"></i> Hijri Converter</a>
                <a href="<?php echo e(url('/99-names-of-allah')); ?>" class="btn-secondary"><i class="fas fa-hand-holding-heart"></i> 99 Names of Allah</a>
                <a href="<?php echo e(url('/wazaif')); ?>" class="btn-secondary"><i class="fas fa-book-open"></i> Quran & Wazaif</a>
            </div>
        </div>

    </div>
</section>

<script>
    // Global State
    let meccaLat = 21.4225;
    let meccaLon = 39.8262;
    let currentLat = <?php echo e(isset($lat) ? $lat : 'null'); ?>;
    let currentLon = <?php echo e(isset($lon) ? $lon : 'null'); ?>;
    let targetBearing = <?php echo e(isset($bearing) ? $bearing : 'null'); ?>;
    let map = null;
    let polyline = null;
    let userMarker = null;

    // View Toggle
    function toggleView(view) {
        document.getElementById('view-compass').style.display = view === 'compass' ? 'block' : 'none';
        document.getElementById('view-map').style.display = view === 'map' ? 'block' : 'none';
        document.getElementById('btn-compass').className = view === 'compass' ? 'btn-primary' : 'btn-secondary';
        document.getElementById('btn-map').className = view === 'map' ? 'btn-primary' : 'btn-secondary';
        
        if(view === 'map' && currentLat !== null) {
            initMap(currentLat, currentLon);
            setTimeout(() => { if(map) map.invalidateSize(); }, 100);
        }
    }

    // FAQ Toggle
    function toggleFaq(el) {
        const answer = el.nextElementSibling;
        const icon = el.querySelector('i');
        if(answer.style.display === 'block') {
            answer.style.display = 'none';
            icon.className = 'fas fa-chevron-down';
        } else {
            answer.style.display = 'block';
            icon.className = 'fas fa-chevron-up';
        }
    }

    // Core Calculation Logic
    function calculateQibla(lat, lon) {
        currentLat = lat;
        currentLon = lon;
        
        const mLatR = meccaLat * Math.PI / 180;
        const mLonR = meccaLon * Math.PI / 180;
        const uLatR = lat * Math.PI / 180;
        const uLonR = lon * Math.PI / 180;
        
        const dLon = mLonR - uLonR;
        const y = Math.sin(dLon) * Math.cos(mLatR);
        const x = Math.cos(uLatR) * Math.sin(mLatR) - Math.sin(uLatR) * Math.cos(mLatR) * Math.cos(dLon);
        let brng = Math.atan2(y, x);
        brng = brng * 180 / Math.PI;
        targetBearing = (brng + 360) % 360;

        // Haversine Distance
        const R = 6371; 
        const dLat = (meccaLat - lat) * Math.PI / 180;
        const dLonDeg = (meccaLon - lon) * Math.PI / 180;
        const a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(uLatR) * Math.cos(mLatR) * Math.sin(dLonDeg/2) * Math.sin(dLonDeg/2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        const distance = R * c;

        // Update UI Stats
        document.getElementById('res-bearing').innerText = targetBearing.toFixed(2) + '°';
        document.getElementById('res-dist').innerText = distance.toLocaleString(undefined, {maximumFractionDigits: 0}) + ' km';
        document.getElementById('res-lat').innerText = lat.toFixed(4);
        document.getElementById('res-lon').innerText = lon.toFixed(4);
        document.getElementById('qibla-status').innerHTML = `Qibla Direction: <strong>${targetBearing.toFixed(2)}°</strong>. (Calibrate phone for accuracy)`;

        if(document.getElementById('view-map').style.display === 'block') {
            initMap(lat, lon);
        }
        
        requestDeviceOrientation();
    }

    // Device Orientation API
    function requestDeviceOrientation() {
        document.getElementById('acc-browser').innerText = 'Supported';
        document.getElementById('acc-compass').innerText = 'Initializing...';
        
        if (typeof DeviceOrientationEvent !== 'undefined' && typeof DeviceOrientationEvent.requestPermission === 'function') {
            DeviceOrientationEvent.requestPermission()
                .then(permissionState => {
                    if (permissionState === 'granted') {
                        document.getElementById('acc-compass').innerText = 'Active (iOS)';
                        window.addEventListener('deviceorientationabsolute', handleOrientation);
                        window.addEventListener('deviceorientation', handleOrientation);
                    } else {
                        document.getElementById('acc-compass').innerText = 'Permission Denied';
                    }
                })
                .catch(console.error);
        } else {
            document.getElementById('acc-compass').innerText = 'Active (Android/Other)';
            window.addEventListener('deviceorientationabsolute', handleOrientation);
            window.addEventListener('deviceorientation', handleOrientation);
        }
    }

    function handleOrientation(event) {
        if(targetBearing === null) return;
        
        let compassHeading = event.webkitCompassHeading || Math.abs(event.alpha - 360);
        if(!compassHeading) {
            document.getElementById('acc-compass').innerText = 'No Heading Data (Desktop?)';
            return;
        }
        
        document.getElementById('acc-compass').innerText = 'Live Reading Active';
        
        const qiblaNeedle = document.getElementById('qibla-needle');
        const northNeedle = document.getElementById('north-needle');
        
        northNeedle.style.transform = `rotate(${-compassHeading}deg)`;
        qiblaNeedle.style.transform = `rotate(${targetBearing - compassHeading}deg)`;
    }

    // GPS Trigger
    function findQiblaGPS() {
        document.getElementById('qibla-status').innerText = "Acquiring GPS Signal...";
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                document.getElementById('acc-gps').innerText = "High Precision (HTML5 GPS)";
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                calculateQibla(lat, lon);
                document.getElementById('loc-input').value = "GPS Location";
                
                // Reverse Geocode to update Location Details
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`)
                    .then(res => res.json())
                    .then(data => {
                        if(data && data.address) {
                            const cty = data.address.city || data.address.town || data.address.village || 'N/A';
                            const st = data.address.state || data.address.region || 'N/A';
                            const cntry = data.address.country || 'Unknown';
                            document.getElementById('det-city').innerText = cty;
                            document.getElementById('det-state').innerText = st;
                            document.getElementById('det-country').innerText = cntry;
                        }
                    }).catch(e => console.log('Reverse geocode failed', e));

            }, (error) => {
                alert("Location access denied or unavailable.");
                document.getElementById('qibla-status').innerText = "Location Error. Please search manually.";
                document.getElementById('acc-gps').innerText = "Permission Denied";
            });
        } else {
            alert("Geolocation is not supported by your browser.");
            document.getElementById('acc-gps').innerText = "Not Supported";
        }
    }

    // Search Trigger (Nominatim)
    function searchLocation() {
        const query = document.getElementById('loc-input').value;
        if(!query) return;
        
        document.getElementById('qibla-status').innerText = "Searching...";
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=1`)
            .then(res => res.json())
            .then(data => {
                if(data && data.length > 0) {
                    document.getElementById('acc-gps').innerText = "Geocoded Data";
                    calculateQibla(parseFloat(data[0].lat), parseFloat(data[0].lon));
                    window.location.href = '/tools/qibla-direction/' + query.toLowerCase().replace(/ /g, '-').replace(/,/g, '');
                } else {
                    alert("Location not found. Try entering City, Country.");
                }
            })
            .catch(err => alert("Search failed. Check your connection."));
    }

    // Map Initialization
    function initMap(lat, lon) {
        if(map === null) {
            map = L.map('qibla-map').setView([lat, lon], 4);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);
            
            L.marker([meccaLat, meccaLon], {title: 'The Kaaba'}).addTo(map).bindPopup('The Kaaba (Qibla)');
        }
        
        if(userMarker) map.removeLayer(userMarker);
        if(polyline) map.removeLayer(polyline);
        
        userMarker = L.marker([lat, lon]).addTo(map).bindPopup('Your Location').openPopup();
        polyline = L.polyline([[lat, lon], [meccaLat, meccaLon]], {color: 'red', weight: 3, dashArray: '5, 10'}).addTo(map);
        map.fitBounds(polyline.getBounds());
    }

    // Copy Results
    function copyResults() {
        if(!currentLat) return alert('Calculate Qibla first.');
        const text = `My Qibla Result:\nBearing: ${targetBearing.toFixed(2)}°\nDistance to Kaaba: ${document.getElementById('res-dist').innerText}\nCoordinates: ${currentLat.toFixed(4)}, ${currentLon.toFixed(4)}\nGenerated by Noor-e-Islam Qibla Tool`;
        navigator.clipboard.writeText(text).then(() => alert('Copied to clipboard!'));
    }

    // Auto-init if pre-populated from Backend
    <?php if(isset($lat) && isset($lon)): ?>
        document.addEventListener('DOMContentLoaded', () => {
            requestDeviceOrientation();
        });
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\tools\qibla.blade.php ENDPATH**/ ?>