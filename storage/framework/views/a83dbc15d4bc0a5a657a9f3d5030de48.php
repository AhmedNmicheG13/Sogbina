<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Car</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .top-banner {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .road {
            width: 80%;
            height: 200px;
            background-color: #a0a0a0;
            position: relative;
            overflow: hidden;
        }

        .car {
            width: 100px;
            height: 50px;
            background-color: red;
            position: absolute;
            bottom: 10px;
            left: -100px; /* تبدأ السيارة من خارج الشاشة */
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .passenger {
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <div class="top-banner">TOP TRAJET</div>
    <div class="road">
        <div class="car" id="car">
            <div class="passenger" id="passenger1">👤</div>
            <div class="passenger" id="passenger2">👤</div>
            <div class="passenger" id="passenger3">👤</div>
        </div>
    </div>

    <script>
        window.onload = function() {
            const car = document.getElementById('car');
            const passengers = document.querySelectorAll('.passenger');
            let carPosition = -100;
            let direction = 1; // 1 للحركة للأمام، -1 للحركة للخلف

            function moveCar() {
                carPosition += direction * 2;
                car.style.left = carPosition + 'px';

                // عند وصول السيارة إلى نقطة معينة، تنزل الركاب
                if (carPosition >= 200 && direction === 1) {
                    passengers.forEach(passenger => passenger.style.display = 'none');
                }

                // عند وصول السيارة إلى نهاية الطريق، تعود للخلف
                if (carPosition >= 600) {
                    direction = -1;
                }

                // عند عودة السيارة إلى البداية، تركب الركاب
                if (carPosition <= -100 && direction === -1) {
                    passengers.forEach(passenger => passenger.style.display = 'block');
                    direction = 1;
                }

                requestAnimationFrame(moveCar);
            }

            moveCar();
        }
    </script>
</body>
</html>
<?php /**PATH /htdocs/resources/views/front/section_one.blade.php ENDPATH**/ ?>