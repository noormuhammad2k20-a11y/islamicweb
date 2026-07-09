

<?php $__env->startSection('title', 'Age Calculator — Noor-e-Islam'); ?>
<?php $__env->startSection('meta_description', 'Islamic + Gregorian Age Calculator'); ?>

<?php $__env->startSection('content'); ?>
<section class="section" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="section-inner">
        <?php if (isset($component)) { $__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-header','data' => ['title' => 'Age Calculator','desc' => 'Islamic + Gregorian Age Calculator','icon' => 'fa-calculator']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Age Calculator','desc' => 'Islamic + Gregorian Age Calculator','icon' => 'fa-calculator']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e)): ?>
<?php $attributes = $__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e; ?>
<?php unset($__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e)): ?>
<?php $component = $__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e; ?>
<?php unset($__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e); ?>
<?php endif; ?>

                <div style="padding: 40px; background: #fff; border-radius: 12px; box-shadow: var(--shadow-sm); max-width: 600px; margin: 0 auto;">
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px;">Date of Birth</label>
                <input type="date" id="dob" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            </div>
            <button onclick="calculateAge()" class="btn-primary" style="width: 100%; margin-bottom: 20px;">Calculate Age</button>
            <div id="age-result" style="display: none; background: var(--secondary); padding: 20px; border-radius: 8px; text-align: center;">
                <h3 style="color: var(--primary); margin-bottom: 10px;">Your Gregorian Age</h3>
                <p id="g-age" style="font-size: 1.2rem; font-weight: 700; color: var(--text-dark); margin-bottom: 15px;"></p>
                <h3 style="color: var(--gold-dark); margin-bottom: 10px;">Your Islamic (Hijri) Age</h3>
                <p id="h-age" style="font-size: 1.2rem; font-weight: 700; color: var(--text-dark);"></p>
                <p style="font-size: 0.85rem; color: var(--text-light); margin-top: 10px;">*Hijri age is approximately 3% greater due to shorter lunar years.</p>
            </div>
        </div>
        <script>
            function calculateAge() {
                const dob = new Date(document.getElementById('dob').value);
                if (!dob || isNaN(dob)) return;
                const today = new Date();
                
                // Gregorian Age
                let age = today.getFullYear() - dob.getFullYear();
                const m = today.getMonth() - dob.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }
                
                // Approximate Hijri Age (33 Gregorian years = 34 Hijri years)
                const diffTime = Math.abs(today - dob);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                const hijriYears = Math.floor(diffDays / 354.367);
                
                document.getElementById('g-age').innerText = `${age} Years`;
                document.getElementById('h-age').innerText = `${hijriYears} Lunar Years`;
                document.getElementById('age-result').style.display = 'block';
            }
        </script>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/tools/age.blade.php ENDPATH**/ ?>