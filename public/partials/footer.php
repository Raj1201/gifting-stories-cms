    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<?php
if (!empty($scripts)) {
    foreach ($scripts as $script) {
        echo "    <script src=\"{$script}\"></script>\n";
    }
}
?>
</body>
</html>
