const leaseForm = document.getElementById('lease-form');

if (leaseForm) {
    const carSelect = document.getElementById('car-select');
    const termInput = document.getElementById('term-months');
    const downInput = document.getElementById('down-payment');
    const result = document.getElementById('monthly-result');

    const calculate = () => {
        const selected = carSelect.options[carSelect.selectedIndex];
        const price = Number(selected?.dataset?.price || 0);
        const term = Number(termInput.value || 0);
        const down = Number(downInput.value || 0);

        if (!price || !term) {
            result.textContent = 'قسط ماهانه: -';
            return;
        }

        const financed = Math.max(price - down, 0);
        const fee = price * 0.02;
        const monthly = Math.ceil((financed / term) + fee);

        result.textContent = `قسط ماهانه: ${monthly.toLocaleString('fa-IR')} تومان`;
    };

    carSelect.addEventListener('change', calculate);
    termInput.addEventListener('input', calculate);
    downInput.addEventListener('input', calculate);
}
