document.addEventListener('DOMContentLoaded', function() {
    initVehicleChart();
    animateNumbers();
});

function initVehicleChart() {
    const ctx = document.getElementById('vehicleChart').getContext('2d');
    const data = {
        labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
        datasets: [{
            label: 'Jumlah Kendaraan',
            data: [42, 39, 33, 45, 52, 23, 17],
            backgroundColor: Array(7).fill('rgba(0, 204, 255, 0.7)').map((v, i) => i === 4 ? 'rgba(255, 99, 132, 0.7)' : v),
            borderColor: Array(7).fill('rgba(0, 204, 255, 1)').map((v, i) => i === 4 ? 'rgba(255, 99, 132, 1)' : v),
            borderWidth: 1,
            borderRadius: 6
        }]
    };

    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleFont: { size: 14, weight: 'bold' },
                    bodyFont: { size: 12 },
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        stepSize: 10
                    }
                },
                x: {
                    grid: { display: false }
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            }
        }
    });
}

function animateNumbers() {
    const totalVehicles = 251;
    const avgVehicles = Math.round(totalVehicles / 7);
    const peakDay = "Jumat";

    animateValue('totalVehicles', totalVehicles, 2000);
    animateValue('avgVehicles', avgVehicles, 2000);

    setTimeout(() => {
        document.getElementById('peakDay').textContent = peakDay;
        document.getElementById('peakDay').classList.add('animate-pulse');
    }, 1000);
}

function animateValue(id, target, duration) {
    const element = document.getElementById(id);
    const increment = target / (duration / 16);
    let current = 0;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            clearInterval(timer);
            current = target;
        }
        element.textContent = Math.floor(current);
    }, 16);
}
