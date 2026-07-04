<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
    "<?php $__contextArgs = [];
if (context()->has($__contextArgs[0])) :
if (isset($value)) { $__contextPrevious[] = $value; }
$value = context()->get($__contextArgs[0]); ?>": "https://schema.org",
    "@type": "WebPage",
    "name": "<?php echo e($seoData['title']); ?>",
    "description": "<?php echo e($seoData['description']); ?>",
    "url": "<?php echo e($seoData['canonical']); ?>"
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root {
        --primary: #0A3A2A;
        --primary-dark: #052116;
        --gold: #D4AF37;
        --gold-light: #F3E5AB;
        --bg-light: #f8fafc;
        --border-light: rgba(10,58,42,0.1);
    }
    .date-hero {
        background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%);
        padding: 60px 20px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .date-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0.05;
        background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px);
        background-size: 40px 40px;
    }
    .date-hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
    }
    .date-hero-subtitle {
        font-size: 1.1rem;
        color: var(--gold-light);
        margin-bottom: 30px;
        position: relative;
        z-index: 2;
    }
    .date-cards-wrapper {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        position: relative;
        z-index: 2;
        max-width: 1000px;
        margin: 0 auto;
    }
    .main-date-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 20px;
        padding: 30px;
        width: 100%;
        max-width: 450px;
        text-align: center;
        transition: transform 0.3s ease;
    }
    .main-date-card:hover {
        transform: translateY(-5px);
        border-color: var(--gold);
    }
    .card-flag { font-size: 2rem; margin-bottom: 10px; }
    .card-region { font-size: 0.9rem; color: var(--gold-light); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; }
    .hijri-day-large { font-size: 4rem; font-weight: 800; line-height: 1; margin-bottom: 5px; font-family: 'Playfair Display', serif; }
    .hijri-month-name { font-size: 1.5rem; font-weight: 600; margin-bottom: 5px; }
    .hijri-urdu-arabic { font-family: 'Amiri', serif; font-size: 1.3rem; color: var(--gold-light); margin-bottom: 10px; }
    .gregorian-date { font-size: 0.9rem; opacity: 0.8; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 15px; margin-top: 15px; }

    .section-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: var(--primary);
        text-align: center;
        margin-bottom: 30px;
        border-bottom: 2px solid var(--gold);
        display: inline-block;
        padding-bottom: 10px;
    }
    .title-wrapper { text-align: center; margin-bottom: 40px; }