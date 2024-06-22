document.addEventListener('DOMContentLoaded', function() {
    const calendarDays = document.getElementById('calendar-days');
    const monthYear = document.getElementById('month-year');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const fechaInput = document.getElementById('fecha'); // Obtener el input de fecha
    const horaInput = document.getElementById('hora'); // Obtener el input de hora

    let currentDate = new Date();
    let today = new Date(); // Mantén la fecha de hoy sin cambiar

    function renderCalendar() {
        const month = currentDate.getMonth();
        const year = currentDate.getFullYear();
        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();
        const prevLastDate = new Date(year, month, 0).getDate();

        monthYear.textContent = `${currentDate.toLocaleString('default', { month: 'long' })} ${year}`;

        calendarDays.innerHTML = '';

        // Añadir días del mes anterior
        for (let x = firstDay; x > 0; x--) {
            calendarDays.innerHTML += `<div class="inactive">${prevLastDate - x + 1}</div>`;
        }

        // Añadir días del mes actual
        for (let i = 1; i <= lastDate; i++) {
            // Comprueba si es hoy
            if (i === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                calendarDays.innerHTML += `<div class="today selectable">${i}</div>`;
            } else {
                calendarDays.innerHTML += `<div class="selectable">${i}</div>`;
            }
        }

        // Añadir días del siguiente mes
        const remainingDays = 42 - (firstDay + lastDate);
        for (let j = 1; j <= remainingDays; j++) {
            calendarDays.innerHTML += `<div class="inactive">${j}</div>`;
        }

        // Añadir evento de clic a los días seleccionables
        document.querySelectorAll('.selectable').forEach(day => {
            day.addEventListener('click', function() {
                const selectedDate = new Date(year, month, parseInt(this.textContent));
                fechaInput.value = selectedDate.toISOString().substr(0, 10);
            });
        });
    }

    prevButton.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    nextButton.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

    renderCalendar();

    // Añadir evento de clic a los horarios
    document.querySelectorAll('.time-slot').forEach(slot => {
        slot.addEventListener('click', function() {
            horaInput.value = this.textContent.trim();
        });
    });
});
