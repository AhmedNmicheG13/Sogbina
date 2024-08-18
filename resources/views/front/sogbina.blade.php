<!-- resources/views/front/footer.blade.php -->
<footer>
    <div id="encrypted-content"></div>
    <script>
        (function() {
            const encryptedContent = "QWxsIHJpZ2h0cyByZXNlcnZlZCBieSBTb2diaW5hLiBEZXZlbG9wZWQgYnkgQWhtZWQgTm1pY2hlLg==";
            const decodedContent = atob(encryptedContent);
            document.getElementById('encrypted-content').innerText = decodedContent;
        })();
    </script>
</footer>
