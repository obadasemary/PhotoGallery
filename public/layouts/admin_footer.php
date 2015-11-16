<!-- footer begin -->
<div id="footer">Copyright <?php echo date("Y", time()); ?>, Obada El Semary</div>
<!-- footer end -->
</body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>
