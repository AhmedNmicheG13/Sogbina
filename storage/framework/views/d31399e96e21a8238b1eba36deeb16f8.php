<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e($textDirection); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Ø¥Ø¶Ø§ÙÂØ© Ø±ÙÂØ§Ø¨Ø· CSS Ø§ÙÂØ®Ø§ØµØ© Ø¨ÙÂ ÙÂÙÂØ§ -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <style>
        /* ØªØ£ÙÂØ¯ ÙÂÙÂ Ø£ÙÂ Ø§ÙÂØ­Ø§ÙÂÙÂØ© ÙÂÙÂØ²Ø± (language-switcher) ÙÂÙÂ Ø£Ø³ÙÂÙÂ Ø§ÙÂØµÙÂØ­Ø© */
        .language-switcher {
            position: fixed; /* ØªØºÙÂÙÂØ± Ø¥ÙÂÙÂ fixed ÙÂØªØ«Ø¨ÙÂØª Ø§ÙÂØ²Ø± ÙÂÙÂ ÙÂÙÂØ§ÙÂÙÂ Ø¹ÙÂØ¯ Ø§ÙÂØªÙÂØ±ÙÂØ± */
            bottom: 5px; /* Ø§ÙÂÙÂØ³Ø§ÙÂØ© ÙÂÙÂ Ø£Ø³ÙÂÙÂ Ø§ÙÂØµÙÂØ­Ø© */
            right: 20px; /* Ø§ÙÂÙÂØ³Ø§ÙÂØ© ÙÂÙÂ Ø§ÙÂÙÂÙÂÙÂÙÂ */
            z-index: 10000; /* ØªØ£ÙÂØ¯ ÙÂÙÂ Ø£ÙÂ Ø§ÙÂØ²Ø± ÙÂÙÂÙÂ Ø§ÙÂØ¹ÙÂØ§ØµØ± Ø§ÙÂØ£Ø®Ø±ÙÂ */
        }

        /* Ø£ÙÂÙÂØ§Ø· Ø§ÙÂØ²Ø± */
        .lang-btn {
            background-color: #222 !important; /* ØªØºÙÂÙÂØ± Ø§ÙÂÙÂÙÂÙÂ Ø¥ÙÂÙÂ Ø§ÙÂØ£Ø®Ø¶Ø± */
            color: white !important;
            border: none !important;
            padding: 10px 20px !important;
            font-size: 16px !important;
            cursor: pointer !important;
            border-radius: 5px !important;
            position: relative !important; /* Ø¬Ø¹ÙÂ Ø§ÙÂØ²Ø± ÙÂØ³Ø¨ÙÂ */
            z-index: 1 !important; /* Ø§ÙÂØ²Ø± ÙÂÙÂÙÂ Ø§ÙÂÙÂØ§Ø¦ÙÂØ© Ø§ÙÂÙÂÙÂØ³Ø¯ÙÂØ© */
        }

        /* Ø£ÙÂÙÂØ§Ø· Ø§ÙÂÙÂØ§Ø¦ÙÂØ© Ø§ÙÂÙÂÙÂØ³Ø¯ÙÂØ© */
        .dropdown-content {
            display: none !important;
            position: absolute !important;
            bottom: 100% !important; /* ÙÂØªØ­ Ø§ÙÂÙÂØ§Ø¦ÙÂØ© ÙÂØ£Ø¹ÙÂÙÂ */
            left: 0 !important;
            width: auto !important; /* Ø¹Ø±Ø¶ Ø§ÙÂÙÂØ§Ø¦ÙÂØ© ÙÂØªÙÂØ§Ø³Ø¨ ÙÂØ¹ Ø¹Ø±Ø¶ Ø§ÙÂØ²Ø± */
            min-width: 100% !important; /* ÙÂØ¬Ø¹ÙÂ Ø¹Ø±Ø¶ Ø§ÙÂÙÂØ§Ø¦ÙÂØ© ÙÂÙÂØ³ Ø¹Ø±Ø¶ Ø§ÙÂØ²Ø± */
            max-width: 200px !important; /* ØªØ­Ø¯ÙÂØ¯ Ø£ÙÂØµÙÂ Ø¹Ø±Ø¶ ÙÂÙÂÙÂØ§Ø¦ÙÂØ© */
            background-color: #fff !important;
            border: 1px solid #ccc !important;
            border-radius: 5px !important;
            padding: 5px 0 !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
            z-index: 1000 !important; /* Ø¬Ø¹ÙÂ Ø§ÙÂÙÂØ§Ø¦ÙÂØ© ÙÂÙÂÙÂ Ø§ÙÂÙÂØ­ØªÙÂÙÂ Ø§ÙÂØ¢Ø®Ø± */
            text-align: left !important; /* Ø¶Ø¨Ø· Ø§ÙÂÙÂØµÙÂØµ Ø¥ÙÂÙÂ Ø§ÙÂÙÂØ³Ø§Ø± */
            box-sizing: border-box !important; /* Ø¹Ø±Ø¶ Ø§ÙÂÙÂØ§Ø¦ÙÂØ© ÙÂØ´ÙÂÙÂ Ø§ÙÂØ­Ø´ÙÂ ÙÂØ§ÙÂØ­Ø¯ÙÂØ¯ */
        }

        /* ÙÂØ§Ø¦ÙÂØ© Ø§ÙÂØ¹ÙÂØ§ØµØ± Ø¯Ø§Ø®ÙÂ Ø§ÙÂÙÂØ§Ø¦ÙÂØ© Ø§ÙÂÙÂÙÂØ³Ø¯ÙÂØ© */
        .dropdown-content .lang-option {
            display: block !important;
            padding: 8px 10px !important;
            color: black !important;
            text-decoration: none !important;
            text-align: center !important; /* ØªÙÂØ³ÙÂØ· Ø§ÙÂÙÂØµÙÂØµ Ø¯Ø§Ø®ÙÂ Ø§ÙÂØ¹ÙÂØ§ØµØ± */
            white-space: nowrap !important; /* ÙÂÙÂØ¹ Ø§ÙÂØªÙÂØ§ÙÂ Ø§ÙÂÙÂØµÙÂØµ */
            box-sizing: border-box !important; /* Ø¹Ø±Ø¶ Ø§ÙÂØ¹ÙÂØ§ØµØ± ÙÂØ´ÙÂÙÂ Ø§ÙÂØ­Ø´ÙÂ ÙÂØ§ÙÂØ­Ø¯ÙÂØ¯ */
        }

        /* ØªØºÙÂÙÂØ± Ø§ÙÂÙÂÙÂÙÂ Ø¹ÙÂØ¯ Ø§ÙÂØªÙÂØ±ÙÂØ± ÙÂÙÂÙÂ Ø§ÙÂØ¹ÙÂØµØ± */
        .dropdown-content .lang-option:hover {
            background-color: #f1f1f1 !important;
        }

        /* Ø¥Ø¸ÙÂØ§Ø± Ø§ÙÂÙÂØ§Ø¦ÙÂØ© Ø§ÙÂÙÂÙÂØ³Ø¯ÙÂØ© Ø¹ÙÂØ¯ Ø§ÙÂÙÂÙÂØ± */
        .show {
            display: block !important;
        }
    </style>
</head>
<body>

    <footer>
        <div id="encrypted-content"></div>
        <script>
            (function() {
                // ÙÂÙÂ ØªØ´ÙÂÙÂØ± Ø§ÙÂÙÂØ­ØªÙÂÙÂ
                const encryptedContent = [65, 108, 108, 32, 114, 105, 103, 104, 116, 115, 32, 114, 101, 115, 101, 114, 118, 101, 100, 32, 98, 121, 32, 83, 111, 103, 98, 105, 110, 97, 46, 32, 68, 101, 118, 101, 108, 111, 112, 101, 100, 32, 98, 121, 32, 65, 104, 109, 101, 100, 32, 78, 109, 105, 99, 104, 101, 46];
                const decodedContent = encryptedContent.map(c => String.fromCharCode(c)).join('');
                document.getElementById('encrypted-content').innerText = decodedContent;

                // Ø¥ØºÙÂØ§ÙÂ ØªØ°ÙÂÙÂÙÂ Ø§ÙÂØµÙÂØ­Ø©
                const encryptedFooterClose = [60, 47, 102, 111, 111, 116, 101, 114, 62];
                const decodedFooterClose = encryptedFooterClose.map(c => String.fromCharCode(c)).join('');
                document.write(decodedFooterClose);
            })();
        </script>
    </footer>

    <!-- JavaScript ÙÂØªØ­ÙÂÙÂ ÙÂÙÂ Ø§ÙÂÙÂØ§Ø¦ÙÂØ© Ø§ÙÂÙÂÙÂØ³Ø¯ÙÂØ© -->
    <script>
        function toggleDropdown() {
            document.getElementById('lang-dropdown').classList.toggle('show');
        }

        // Ø¥ØºÙÂØ§ÙÂ Ø§ÙÂÙÂØ§Ø¦ÙÂØ© Ø§ÙÂÙÂÙÂØ³Ø¯ÙÂØ© Ø¹ÙÂØ¯ Ø§ÙÂÙÂÙÂØ± Ø®Ø§Ø±Ø¬ÙÂØ§
        window.onclick = function(event) {
            if (!event.target.matches('.lang-btn')) {
                var dropdowns = document.getElementsByClassName('dropdown-content');
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>
<?php /**PATH /htdocs/resources/views/front/footer.blade.php ENDPATH**/ ?>