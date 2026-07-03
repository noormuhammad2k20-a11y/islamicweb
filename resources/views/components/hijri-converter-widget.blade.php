{{-- Hijri Converter Widget --}}
<div class="converter-widget">
    <div class="converter-header">
        <i class="fas fa-exchange-alt"></i>
        <h3>Hijri & Gregorian Converter</h3>
    </div>
    <form id="converterWidgetForm">
        <div class="form-group">
            <label for="convDirection">Conversion Type</label>
            <select id="convDirection" required>
                <option value="g2h">Gregorian to Hijri</option>
                <option value="h2g">Hijri to Gregorian</option>
            </select>
        </div>
        <div class="form-group">
            <label for="convDate">Select Date</label>
            <input type="date" id="convDate" required max="2030-12-31" min="1970-01-01">
        </div>
        <button type="submit" class="btn-primary w-100">
            <i class="fas fa-sync"></i> Convert Date
        </button>
    </form>
    
    <div id="convResult" style="display: none;">
        <h4 id="resText"></h4>
        <p id="resSub"></p>
    </div>
</div>

<style>
.converter-widget {
    background: var(--white);
    padding: 25px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid rgba(10, 58, 42, 0.05);
}
.converter-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    color: var(--primary-dark);
}
.converter-header i {
    font-size: 1.2rem;
    color: var(--gold);
}
.converter-header h3 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
}
.converter-widget .form-group {
    margin-bottom: 15px;
}
.converter-widget label {
    display: block;
    margin-bottom: 8px;
    font-size: 0.9rem;
    font-weight: 500;
    color: var(--text);
}
.converter-widget select,
.converter-widget input {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid var(--border);
    border-radius: var(--radius-md);
    font-size: 1rem;
    font-family: inherit;
    transition: all 0.2s;
}
.converter-widget select:focus,
.converter-widget input:focus {
    border-color: var(--primary);
    outline: none;
    box-shadow: 0 0 0 3px rgba(10, 58, 42, 0.1);
}
.converter-widget .btn-primary {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    padding: 12px;
    background: var(--primary);
    color: var(--white);
    border: none;
    border-radius: var(--radius-md);
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    width: 100%;
}
.converter-widget .btn-primary:hover {
    background: var(--primary-dark);
}
#convResult {
    margin-top: 20px;
    padding: 15px;
    background: rgba(212, 175, 55, 0.1);
    border-radius: var(--radius-md);
    border-left: 4px solid var(--gold);
    text-align: center;
}
#resText {
    margin: 0 0 5px 0;
    color: var(--primary-dark);
    font-size: 1.1rem;
    font-weight: 700;
}
#resSub {
    margin: 0;
    color: var(--text-light);
    font-size: 0.85rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('converterWidgetForm');
    if(form) {
        // Set today as default
        document.getElementById('convDate').valueAsDate = new Date();
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var date = document.getElementById('convDate').value;
            var dir = document.getElementById('convDirection').value;
            var btn = this.querySelector('button');
            var originalBtnText = btn.innerHTML;
            
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Converting...';
            btn.disabled = true;

            fetch('/ajax/hijri-convert?date=' + date + '&direction=' + dir)
            .then(res => res.json())
            .then(data => {
                document.getElementById('convResult').style.display = 'block';
                document.getElementById('resText').innerText = data.result_text;
                document.getElementById('resSub').innerText = data.result_subtext;
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
            }).catch(err => {
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
                alert('Conversion failed. Please try again.');
            });
        });
    }
});
</script>
